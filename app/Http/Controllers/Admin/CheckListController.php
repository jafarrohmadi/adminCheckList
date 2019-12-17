<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ClientController;
use App\Models\CheckList;
use App\Models\CheckListEmployee;
use App\Models\CheckListEmployeeDetail;
use App\Models\CheckListOperTugas;
use App\Models\CheckListProgress;
use App\Models\CheckListProgressDetail;
use App\Models\Location;
use Illuminate\Http\Request;
use DB;

class CheckListController extends ClientController
{
    public function index()
    {
        $location = Location::all();
        $checkListProgress = CheckListProgress::with('checkListProgressDetail.checkList')->withCount([
                'checkListProgressDetail',
                'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                    $query->where('status', 1)->orderBy('date', 'desc');
                },
            ]
        )->get()->map(function ($item) {
            $item['name'] = $this->getUserEmployeeNameById($item['user_id']);
            return $item;
        });

        $onDutyData = $this->getOnDutyData();
        return view('admin.checklist.index', compact('location', 'checkListProgress', 'onDutyData'));
    }

    public function getUserEmployee()
    {
        $data = parent::getUserEmployee();
        $value = [];
        foreach ($data['data'] as $datas) {
            if (stristr($datas['designation'], 'Office Boy')) {
                $value[] = $datas;
            }
        }

        return $value;
    }

    public function getUserEmployeeHaveCheckList()
    {
        $data = parent::getUserEmployee();
        $value = [];
        $checkListEmp = CheckListEmployee::pluck('user_id')->toArray();
        foreach ($data['data'] as $datas) {
            if (stristr($datas['designation'], 'Office Boy') && in_array($datas['nik'], $checkListEmp)) {
                $value[] = $datas;
            }
        }

        return $value;
    }

    public function getUserEmployeeDontHaveCheckList()
    {
        $data = parent::getUserEmployee();
        $value = [];
        $checkListEmp = CheckListEmployee::pluck('user_id')->toArray();
        foreach ($data['data'] as $datas) {
            if (stristr($datas['designation'], 'Office Boy') && in_array($datas['nik'], $checkListEmp) == false) {
                $value[] = $datas;
            }
        }

        return $value;
    }

    public function getCheckListEmployeeByUserId($id)
    {
        return CheckListEmployee::with('location')->where('user_id', $id)->first();
    }

    public function checkListEmployeeSave(Request $request)
    {
        $checkListEmployee = new CheckListEmployee();
        $checkListEmployee->user_id = $request->user_id;
        $checkListEmployee->location_id = $request->location_id;
        $checkListEmployee->save();
        foreach ($request->days as $days) {
            foreach ($request->check_list_ids as $check_list_id) {
                $checkListEmployeeDetail = new CheckListEmployeeDetail();
                $checkListEmployeeDetail->check_list_employee_id = $checkListEmployee->id;
                $checkListEmployeeDetail->day = $days;
                $checkListEmployeeDetail->check_list_id = $check_list_id;
                $checkListEmployeeDetail->save();
            }
        }

        return $checkListEmployee;
    }

    // public function checkListEmployeeUpdate($id, Request $request)
    // {
    //     CheckListEmployeeDetail::where('check_list_employee_id', $id)->delete();

    //     $checkListEmployee              = CheckListEmployee::find($id);
    //     $checkListEmployee->user_id     = $request->user_id;
    //     $checkListEmployee->location_id = $request->location_id;
    //     $checkListEmployee->save();
    //     foreach ($request->days as $days) {
    //         foreach ($request->check_list_ids as $check_list_id) {
    //             $checkListEmployeeDetail                         = new CheckListEmployeeDetail();
    //             $checkListEmployeeDetail->check_list_employee_id = $checkListEmployee->id;
    //             $checkListEmployeeDetail->day                    = $days;
    //             $checkListEmployeeDetail->check_list_id          = $check_list_id;
    //             $checkListEmployeeDetail->save();
    //         }
    //     }
    // }

    public function checkListProcessDelete($id)
    {
        CheckListProgressDetail::where('check_list_employee_id', $id)->delete();
        CheckListProgress::destroy($id);
        return 'true';
    }

    public function checkListProgressDetailEditById($id, Request $request)
    {
        $checkListProgress = CheckListProgress::find($id);
        $checkListProgress->location_id = $request->location_id;
        $checkListProgress->note = $request->note;
        $checkListProgress->save();
        $checkListProgress->checkListProgressDetail()->delete();

        foreach ($request->check_list_ids as $check_list_id) {
            $CheckListProgressDetail = new CheckListProgressDetail();
            $CheckListProgressDetail->check_list_progress_id = $checkListProgress->id;
            $CheckListProgressDetail->check_list_id = $check_list_id;
            $CheckListProgressDetail->save();
        }

        return $checkListProgress;
    }

    public function editCheckListProgress($id, Request $request)
    {
        $checkListProgress = CheckListProgress::find($id);
        $checkListProgress->note = $request->note;
        $checkListProgress->save();
        return $checkListProgress;
    }

    public function getCheckList()
    {
        return CheckList::all();
    }

    public function storeCheckList(Request $request)
    {
        $checkList = new CheckList();
        $checkList->name = $request->name;
        $checkList->save();
        return $checkList;
    }

    public function updateCheckList($id, Request $request)
    {
        $checkList = CheckList::find($id);
        $checkList->name = $request->name;
        $checkList->save();
        return $checkList;
    }

    public function deleteCheckList($id)
    {
        CheckList::destroy($id);
        return 'true';
    }

    public function saveOperTugas(Request $request)
    {
        $data = CheckListOperTugas::where(['from_user_id' => $request->from_user_id, 'to_user_id' => $request->to_user_id, 'location_id' => $request->location_id
        ])->get()->map(function ($item, $key) use ($request) {

            $itemStartDate = strtotime($item->start_date);
            $itemEndDate = strtotime($item->end_date);
            $requestStartDate = strtotime($request->start_date);
            $requestEndDate = strtotime($request->end_date);

            if ($requestStartDate >= $itemStartDate && $requestEndDate <= $itemEndDate) {
                return $item;
            }
        });

        if (count($data) == 0) {
            $checkListOperTugas = new CheckListOperTugas();
            $checkListOperTugas->from_user_id = $request->from_user_id;
            $checkListOperTugas->to_user_id = $request->to_user_id;
            $checkListOperTugas->location_id = $request->location_id;
            $checkListOperTugas->start_date = $request->start_date;
            $checkListOperTugas->end_date = $request->end_date;
            $checkListOperTugas->save();

            return $checkListOperTugas;
        }
    }

    public function getOnDutyData()
    {
        $checkListProgress = CheckListProgress::with('location')->where('date', date('Y-m-d'))->get()->map(function ($item, $key) {
            $item['name'] = $this->getUserEmployeeNameById($item['user_id']);
            return $item;
        });

        return $checkListProgress;
    }

    public function getCheckListProgressDetailByCheckListProgressId($id)
    {
        return CheckListProgressDetail::where('check_list_progress_id', $id)->get();
    }
}
