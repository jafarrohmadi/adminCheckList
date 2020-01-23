<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ClientController;
use App\Http\Requests\CheckListEmployeeSaveRequest;
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
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CheckListController extends ClientController
{
    public function index()
    {
        $location          = Location::all();
        $checkListProgress =
            CheckListProgress::with([ 'checkListProgressDetail.checkList', 'checkListOperTugas.fromUser', 'checkListUser' ])->withCount([
                    'checkListProgressDetail',
                    'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                        $query->where('status', 1)->orderBy('date', 'desc');
                    },
                ]
            )->whereDate('date', date('Y-m-d'))->get();

        $onDutyData = $this->getOnDutyData();
        return view('admin.checklist.index', compact('location', 'checkListProgress', 'onDutyData'));
    }

    public function getUserEmployee()
    {
        $user  = User::where('designation', 'like', '%Office Boy%')->get();
        $value = [];
        if (count($user) === 0) {
            $data         = parent::getUserEmployee();
            $value        = [];
            $checkListEmp = CheckListEmployee::pluck('user_id')->toArray();
            foreach ($data['data'] as $datas) {
                if (stristr($datas['designation'], 'Office Boy') && in_array($datas['nik'], $checkListEmp) == false) {
                    $value[]           = $datas;
                    $faker             = Faker::create();
                    $user              = new User();
                    $user->email       = $faker->email;
                    $user->password    = Hash::make('jafar123');
                    $user->nik         = $datas['nik'] ??  random_int(1000000000, 9000000000);
                    $user->name        = $datas['name'];
                    $user->division    = $datas['division'];
                    $user->department  = $datas['department'];
                    $user->photo       = $datas['photo'];
                    $user->designation = 'Office Boy';
                    $user->save();
                }
            }
            return $value;
        }

        return $user;
    }

    public function getUserEmployeeHaveCheckList()
    {
        return User::has('checkListEmployee')
            ->with('checkListEmployee')
            ->where('designation', 'like', '%Office Boy%')
            ->get();
    }

    public function getUserEmployeeDontHaveCheckList()
    {
        return User::doesnthave('checkListEmployee')
            ->where('designation', 'like', '%Office Boy%')
            ->get();
    }

    public function getUserCheckListOperTugasToById($id)
    {
        return User::where('designation', 'like', '%Office Boy%')
            ->where('nik', '!=', $id)
            ->get();
    }

    public function getCheckListEmployeeByUserId($id)
    {
        $checkListEmployee = CheckListEmployee::with([
            'location', 'operTugasFromUser',
        ])->where('user_id', $id)->latest('updated_at')->first();

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
        $findCheckList = CheckListEmployee::where('user_id', $request->user_id)->first();
        if ($findCheckList) {
            $checkListEmployee = $findCheckList;
            $checkListEmployee->checkListEmployeeDetail()->delete();
        } else {
            $checkListEmployee = new CheckListEmployee();
        }

        $checkListEmployee->user_id     = $request->user_id;
        $checkListEmployee->location_id = $request->location_id;
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

    public function checkListProcessDelete($id)
    {
        CheckListProgressDetail::where('check_list_employee_id', $id)->delete();
        CheckListProgress::destroy($id);
        return 'true';
    }

    public function checkListProgressDetailEditById($id, Request $request)
    {
        $checkListProgress              = CheckListProgress::find($id);
        $checkListProgress->location_id = $request->location_id;
        if ($request->note != 'null') {
            $checkListProgress->note = $request->note;
            $checkListProgress->userUpdate = Auth::id();
        }
        $checkListProgress->save();
        $checkListProgress->checkListProgressDetail()->delete();

        foreach ($request->check_list_ids as $check_list_id) {
            $CheckListProgressDetail                         = new CheckListProgressDetail();
            $CheckListProgressDetail->check_list_progress_id = $checkListProgress->id;
            $CheckListProgressDetail->check_list_id          = $check_list_id;
            $CheckListProgressDetail->save();
        }

        return $checkListProgress;
    }

    public function editCheckListProgress($id, Request $request)
    {
        $checkListProgress = CheckListProgress::find($id);
        if ($request->note != 'null') {
            $checkListProgress->note = $request->note;
//            $checkListProgress->userUpdate = Auth::id();
            $checkListProgress->userUpdate = 1;
        }
        $checkListProgress->save();
        return $checkListProgress;
    }

    public function getCheckList()
    {
        return CheckList::where('status', 1)->get();
    }

    public function storeCheckList(Request $request)
    {
        $checkList       = new CheckList();
        $checkList->name = $request->name;
        $checkList->save();
        return $checkList;
    }

    public function updateCheckList($id, Request $request)
    {
        $checkList       = CheckList::find($id);
        $checkList->name = $request->name;
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

    public function saveOperTugas(SaveOperTugasRequest $request)
    {
        $checkListOperTugas = CheckListOperTugas::where([
            'from_user_id' => $request->from_user_id,
            'to_user_id'   => $request->to_user_id,
            'location_id'  => $request->location_id,
        ])->first();

        if (!$checkListOperTugas) {
            $checkListOperTugas = new CheckListOperTugas();
        }

        $checkListOperTugas->from_user_id = $request->from_user_id;
        $checkListOperTugas->to_user_id   = $request->to_user_id;
        $checkListOperTugas->location_id  = $request->location_id;
        $checkListOperTugas->start_date   = $request->start_date;
        $checkListOperTugas->end_date     = $request->end_date;
        $checkListOperTugas->reason       = $request->reason;
        $checkListOperTugas->save();

        return $checkListOperTugas;
    }

    public function updateOperTugas(Request $request, $id)
    {
        $firstCheckListOperTugas = CheckListOperTugas::find($id);

        $secondCheckListOperTugas               = new CheckListOperTugas();
        $secondCheckListOperTugas->from_user_id = $request->from_user_id;
        $secondCheckListOperTugas->to_user_id   = $request->to_user_id;
        $secondCheckListOperTugas->location_id  = $request->location_id;
        $secondCheckListOperTugas->start_date   = date('Y-m-d');
        $secondCheckListOperTugas->end_date     = date('Y-m-d');
        $secondCheckListOperTugas->reason       = $request->reason;
        $secondCheckListOperTugas->save();

        $lastCheckListOperTugas               = new CheckListOperTugas();
        $lastCheckListOperTugas->from_user_id = $firstCheckListOperTugas->from_user_id;
        $lastCheckListOperTugas->to_user_id   = $firstCheckListOperTugas->to_user_id;
        $lastCheckListOperTugas->location_id  = $firstCheckListOperTugas->location_id;
        $lastCheckListOperTugas->start_date   = date('Y-m-d', strtotime('+1 day'));
        $lastCheckListOperTugas->end_date     = $firstCheckListOperTugas->end_date;
        $lastCheckListOperTugas->reason       = $firstCheckListOperTugas->reason;
        $lastCheckListOperTugas->save();

        $firstCheckListOperTugas->end_date = date('Ymd', strtotime('-1 day'));
        $firstCheckListOperTugas->save();

        $checkListProgress =
            CheckListProgress::where([ 'check_list_oper_tugas_id' => $id, 'date' => date('Y-m-d') ])->delete();

        return;
    }

    public function getOnDutyData()
    {
        $checkListProgress = CheckListProgress::with([ 'location', 'checkListOperTugas.fromUser', 'checkListUser' ])
            ->where('date', date('Y-m-d'))->get();

        return $checkListProgress;
    }

    public function getCheckListProgressDetailByCheckListProgressId($id)
    {
        return CheckListProgressDetail::where('check_list_progress_id', $id)->get();
    }

    public function filterChecklistProgressDate($date = null)
    {
        $checkListProgress =
            CheckListProgress::with([ 'checkListProgressDetail.checkList', 'checkListOperTugas.fromUser', 'checkListUser' ])->withCount([
                    'checkListProgressDetail',
                    'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                        $query->where('status', 1)->orderBy('date', 'desc');
                    },
                ]
            )->whereDate('date', $date)->get();
        if (count($checkListProgress) > 0) {
            return view('admin.checklist.checklistProgressList', compact('checkListProgress'));
        }
        return;

    }

}
