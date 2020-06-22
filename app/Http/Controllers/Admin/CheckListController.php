<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
use App\Helpers\Helper;
use App\Http\Controllers\ClientController;
use App\Http\Requests\CheckListEmployeeRequest;
use App\Http\Requests\CheckListEmployeeSaveRequest;
use App\Http\Requests\CheckListRequest;
use App\Http\Requests\LocationRequest;
use App\Http\Requests\SaveOperTugasListRequest;
use App\Http\Requests\SaveOperTugasRequest;
use App\Models\CheckList;
use App\Models\CheckListEmployee;
use App\Models\CheckListEmployeeDetail;
use App\Models\CheckListOperTugas;
use App\Models\CheckListProgress;
use App\Models\CheckListProgressDetail;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CheckListController extends ClientController
{
	public function index()
	{
		$company  = Auth::user()->company;
		$location = Location::where([
			'company' => $company,
			'status'  => 1,
		])->get();
		
		$checkListProgress = CheckListProgress::doesnthave('checkListOperTugas.fromUser')->with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->where('date', date('Y-m-d'))->get();
		
		$checkListEmployee  = CheckListEmployee::has('users')->with([
			'users',
			'location',
		])->get();
		$checkListOperTugas =
			CheckListOperTugas::has('fromUser')->with(['location'])->where('end_date', '>=', date('Y-m-d'))->get();
		
		$onDutyData = $this->getOnDutyData();
		
		return view('admin.checklist.index',
			compact('location', 'checkListProgress', 'onDutyData', 'checkListEmployee', 'checkListOperTugas'));
	}
	
	public function operTugas()
	{
		$company  = Auth::user()->company;
		$location = Location::where([
			'company' => $company,
			'status'  => 1,
		])->get();
		
		$checkListProgress = CheckListProgress::has('checkListOperTugas.fromUser')->with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->where('date', date('Y-m-d'))->get();
		
		$checkListEmployee  = CheckListEmployee::has('users')->with([
			'users',
			'location',
		])->get();
		$checkListOperTugas =
			CheckListOperTugas::has('fromUser')->with(['location'])->where('end_date', '>=', date('Y-m-d'))->get();
		
		$onDutyData = $this->getOnDutyData();
		
		return view('admin.oper_tugas.index',
			compact('location', 'checkListProgress', 'onDutyData', 'checkListEmployee', 'checkListOperTugas'));
	}
	
	
	public function getTugasList()
	{
		$checkListEmployee = CheckListEmployee::has('users')->get();
		
		return view('admin.checklist.tugasList', compact('checkListEmployee'));
	}
	
	public function getOperTugasList()
	{
		$checkListOperTugas = CheckListOperTugas::has('fromUser')->where('end_date', '>=', date('Y-m-d'))->get();
		
		return view('admin.checklist.operTugasList', compact('checkListOperTugas'));
	}
	
	public function getUserEmployee()
	{
		$user = User::where('company', Auth::user()->company)->get();
		
		return $user;
	}
	
	public function getUserEmployeeHaveCheckList()
	{
		$checkListOperTugas =
			CheckListOperTugas::has('fromUser')->where('end_date', '>=', date('Y-m-d'))->pluck('from_user_Id')->toArray();
		
		return User::has('checkListEmployee')->whereNotIn('email', $checkListOperTugas)->with('checkListEmployee',
			'checkListEmployee.location')->where('company', Auth::user()->company)->get();
	}
	
	public function getUserEmployeeDontHaveCheckList()
	{
		return User::doesnthave('checkListEmployee')->get();
	}
	
	public function getUserCheckListOperTugasToById($id)
	{
		return User::where('email', '!=', $id)->where('company', Auth::user()->company)->get();
	}
	
	public function getCheckListEmployeeByUserId($id, $location)
	{
		$checkListEmployee = CheckListEmployee::with([
			'location',
		])->where([
			'user_id'     => $id,
			'location_id' => $location,
		])->latest('updated_at')->first();
		
		if ($checkListEmployee) {
			$data = [];
			foreach ($checkListEmployee->checkListEmployeeDetail as $checkListDetail) {
				$data[$checkListDetail->check_list_id][] = $checkListDetail->day;
			}
			$checkListEmployee->checkListEmployeeDetail = $data;
		}
		
		return $checkListEmployee ?? '';
	}
	
	public function checkListEmployeeSave(CheckListEmployeeSaveRequest $request)
	{
		if (isset($request->id)) {
			$checkListEmployee = CheckListEmployee::where('id', $request->id)->first();
			$checkListEmployee->checkListEmployeeDetail()->delete();
		} else {
			$checkListEmployee = new CheckListEmployee();
		}
		
		$checkListEmployee->user_id       = $request->user_id;
		$checkListEmployee->location_id   = $request->location_id;
		$checkListEmployee->day           = json_encode($request->days);
		$checkListEmployee->check_list_id = json_encode($request->check_list_ids);
		$checkListEmployee->save();
		foreach ($request->days as $days) {
			foreach ($request->check_list_ids as $check_list_id) {
				$checkListEmployeeDetail                         = new CheckListEmployeeDetail();
				$checkListEmployeeDetail->check_list_employee_id = $checkListEmployee->id;
				$checkListEmployeeDetail->day                    = $days;
				$checkListEmployeeDetail->check_list_id          = $check_list_id;
				$checkListEmployeeDetail->save();
			}
		}
		
		return $checkListEmployee;
	}
	
	public function checkListEmployeeDelete($id)
	{
		CheckListEmployeeDetail::where('check_list_employee_id', $id)->delete();
		CheckListEmployee::destroy($id);
		
		return 'true';
	}
	
	public function checkListProcessDelete($id)
	{
		CheckListProgressDetail::where('check_list_employee_id', $id)->delete();
		CheckListProgress::destroy($id);
		
		return 'true';
	}
	
	public function checkListProgressDetailEditById($id, CheckListEmployeeRequest $request)
	{
		$checkListProgress              = CheckListProgress::find($id);
		$checkListProgress->location_id = $request->location_id;
		if ($request->note != 'null') {
			$checkListProgress->note        = (new Helper())->removetags($request->note);
			$checkListProgress->note_status = 0;
			$checkListProgress->userUpdate  = Auth::user()->email;
		}
		$checkListProgress->save();
		
		CheckListProgressDetail::where([
			'check_list_progress_id' => $checkListProgress->id,
			'picture'                => null,
			'note'                   => null,
			'status'                 => 0,
		])->delete();
		
		foreach ($request->check_list_ids as $check_list_id) {
			$checklist = CheckListProgressDetail::where([
				'check_list_progress_id' => $checkListProgress->id,
				'check_list_id'          => $check_list_id,
				'status'                 => 1,
			])->first();
			if (!$checklist) {
				$CheckListProgressDetail                         = new CheckListProgressDetail();
				$CheckListProgressDetail->check_list_progress_id = $checkListProgress->id;
				$CheckListProgressDetail->check_list_id          = $check_list_id;
				$CheckListProgressDetail->save();
			}
		}
		
		return $checkListProgress;
	}
	
	public function editCheckListProgress($id, Request $request)
	{
		$checkListProgress = CheckListProgress::find($id);
		if ($request->note != 'null') {
			$checkListProgress->note        = (new Helper())->removetags($request->note);
			$checkListProgress->note_status = 0;
			$checkListProgress->userUpdate  = Auth::user()->email;
		}
		$checkListProgress->save();
		
		return $checkListProgress;
	}
	
	public function getLocation()
	{
		return Location::where([
			'status'  => 1,
			'company' => Auth::user()->company,
		])->get();
	}
	
	public function storeLocation(LocationRequest $request)
	{
		$login = Auth::user();
		
		$location          = new Location();
		$location->name    = (new Helper())->removetags($request->name);
		$location->company = (new Helper())->removetags($login->company);
		$location->user_id = (new Helper())->removetags($login->email);
		$location->save();
		
		return $location;
	}
	
	public function updateLocation($id, LocationRequest $request)
	{
		$location       = Location::find($id);
		$location->name = (new Helper())->removetags($request->name);
		$location->save();
		
		return $location;
	}
	
	public function deleteLocation($id)
	{
		$location         = Location::find($id);
		$location->status = 0;
		$location->save();
		
		CheckListEmployeeDetail::where('check_list_id', $id)->delete();
		
		return 'true';
	}
	
	public function getCheckList()
	{
		return CheckList::where([
			'status'  => 1,
			'company' => Auth::user()->company,
		])->get();
	}
	
	public function storeCheckList(CheckListRequest $request)
	{
		$login              = Auth::user();
		$checkList          = new CheckList();
		$checkList->name    = (new Helper())->removetags($request->name);
		$checkList->user_id = (new Helper())->removetags($login->email);
		$checkList->company = (new Helper())->removetags($login->company);
		$checkList->save();
		
		return $checkList;
	}
	
	public function updateCheckList($id, CheckListRequest $request)
	{
		$checkList       = CheckList::find($id);
		$checkList->name = (new Helper())->removetags($request->name);
		$checkList->save();
		
		return $checkList;
	}
	
	public function deleteCheckList($id)
	{
		$checkList         = CheckList::find($id);
		$checkList->status = 0;
		$checkList->save();
		
		CheckListEmployeeDetail::where('check_list_id', $id)->delete();
		
		return 'true';
	}
	
	public function editOperTugasList(SaveOperTugasListRequest $request, $id)
	{
		$checkListOperTugas               = CheckListOperTugas::find($id);
		$checkListOperTugas->from_user_id = (new Helper())->removetags($request->from_user_id);
		$checkListOperTugas->to_user_id   = (new Helper())->removetags($request->to_user_id);
		$checkListOperTugas->location_id  = $request->location_id;
		$checkListOperTugas->start_date   = $request->start_date;
		$checkListOperTugas->end_date     = $request->end_date;
		$checkListOperTugas->reason       = (new Helper())->removetags($request->reason);
		$checkListOperTugas->save();
		
		return $checkListOperTugas;
	}
	
	public function saveOperTugas(SaveOperTugasListRequest $request)
	{
		$checkListOperTugas               = new CheckListOperTugas();
		$checkListOperTugas->from_user_id = (new Helper())->removetags($request->from_user_id);
		$checkListOperTugas->to_user_id   = (new Helper())->removetags($request->to_user_id);
		$checkListOperTugas->location_id  = $request->location_id;
		$checkListOperTugas->start_date   = $request->start_date;
		$checkListOperTugas->end_date     = $request->end_date;
		$checkListOperTugas->reason       = (new Helper())->removetags($request->reason);
		$checkListOperTugas->save();
		
		return $checkListOperTugas;
	}
	
	public function updateOperTugas(SaveOperTugasRequest $request, $id)
	{
		$firstCheckListOperTugas         = CheckListOperTugas::find($id);
		$firstCheckListOperTugas->reason = $request->reason;
		if ($firstCheckListOperTugas->to_user_id !== $request->to_user_id) {
			$secondCheckListOperTugas               = new CheckListOperTugas();
			$secondCheckListOperTugas->from_user_id = (new Helper())->removetags($request->from_user_id);
			$secondCheckListOperTugas->to_user_id   = (new Helper())->removetags($request->to_user_id);
			$secondCheckListOperTugas->location_id  = $request->location_id;
			$secondCheckListOperTugas->start_date   = date('Y-m-d');
			$secondCheckListOperTugas->end_date     = date('Y-m-d');
			$secondCheckListOperTugas->reason       = (new Helper())->removetags($request->reason);
			$secondCheckListOperTugas->save();
			
			$lastCheckListOperTugas               = new CheckListOperTugas();
			$lastCheckListOperTugas->from_user_id = (new Helper())->removetags($firstCheckListOperTugas->from_user_id);
			$lastCheckListOperTugas->to_user_id   = $firstCheckListOperTugas->to_user_id;
			$lastCheckListOperTugas->location_id  = $firstCheckListOperTugas->location_id;
			$lastCheckListOperTugas->start_date   = date('Y-m-d', strtotime('+1 day'));
			$lastCheckListOperTugas->end_date     = $firstCheckListOperTugas->end_date;
			$lastCheckListOperTugas->reason       = (new Helper())->removetags($firstCheckListOperTugas->reason);
			$lastCheckListOperTugas->save();
			$firstCheckListOperTugas->end_date = date('Ymd', strtotime('-1 day'));
			$checkListProgress                 = CheckListProgress::where([
				'check_list_oper_tugas_id' => $id,
				'date'                     => date('Y-m-d'),
			])->delete();
		}
		
		$firstCheckListOperTugas->save();
		
		return;
	}
	
	public function getOnDutyData()
	{
		$checkListProgress = CheckListProgress::has('checkListUser')->with([
			'location',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->where('date', date('Y-m-d'))->get();
		
		return $checkListProgress;
	}
	
	public function getCheckListProgressDetailByCheckListProgressId($id)
	{
		return CheckListProgressDetail::where(['check_list_progress_id' => $id])->get();
	}
	
	public function filterChecklistProgressDate($date = null, $type = null)
	{
		if ($type == 'tambahTugas') {
			$checkListProgress = CheckListProgress::doesnthave('checkListOperTugas.fromUser')->with([
				'checkListProgressDetail.checkList',
				'checkListUser',
			])->withCount([
				'checkListProgressDetail',
				'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
					$query->where('status', 1)->orderBy('date', 'desc');
				},
			])->where('date', $date)->get();
		} else {
			$checkListProgress = CheckListProgress::has('checkListOperTugas.fromUser')->with([
				'checkListProgressDetail.checkList',
				'checkListOperTugas.fromUser',
				'checkListUser',
			])->withCount([
				'checkListProgressDetail',
				'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
					$query->where('status', 1)->orderBy('date', 'desc');
				},
			])->where('date', $date)->get();
		}
		if (count($checkListProgress) > 0) {
			return view('admin.checklist.checklistProgressList', compact('checkListProgress'));
		}
		
		return;
	}
	
	//CheckListProgress
	
	public function getCheckListProgress($id)
	{
		$checkListProgress = CheckListProgress::with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->find($id);
		
		return view('admin.checklist.checklist-progress.index', compact('checkListProgress'));
	}
	
	//report
	
	public function report()
	{
		$checkListProgress = CheckListProgress::with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->get();
		
		return view('admin.report.index', compact('checkListProgress'));
	}
	
	public function reportfilterChecklistProgressDate($date = null)
	{
		$checkListProgress = CheckListProgress::with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->where('date', $date)->get();
		if (count($checkListProgress) > 0) {
			return view('admin.report.checklistProgressList', compact('checkListProgress'));
		}
		
		return;
	}
	
	public function reportGetCheckListProgress($id)
	{
		$checkListProgress = CheckListProgress::with([
			'checkListProgressDetail.checkList',
			'checkListOperTugas.fromUser',
			'checkListUser',
		])->withCount([
			'checkListProgressDetail',
			'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
				$query->where('status', 1)->orderBy('date', 'desc');
			},
		])->find($id);
		
		return view('admin.report.checklistProgress', compact('checkListProgress'));
	}
	
	public function reportDownload(Request $request)
	{
		$myFile = (new ReportExport($request->startDate, $request->endDate))->download('report.xls');
		
		return $myFile;
	}
	
}
