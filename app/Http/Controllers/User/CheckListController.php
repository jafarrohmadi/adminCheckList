<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\ClientController;
use App\Models\CheckList;
use App\Models\CheckListEmployee;
use App\Models\CheckListProgress;
use App\Models\CheckListProgressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckListController extends ClientController
{
    public $dateNow;
    public function __construct()
    {
        $this->dateNow = date('Y-m-d');
    }

    public function index()
    {
        $user = Session::get('user');
        $user['data']['nik'];
        $haveCheckListProgress = CheckListProgress::where(['date' => $this->dateNow, 'user_id' => 7117100344])->count();

        if ($haveCheckListProgress <= 0) {
            $findCheckListEmployee = CheckListEmployee::with(['checkListEmployeeDetail' => function ($query) {
                $query->where('day', (new Helper)->getThisDay());
            }])->where('user_id', 7117100344)->first();

            $saveCheckListProgress = new CheckListProgress();
            $saveCheckListProgress->user_id = $findCheckListEmployee->user_id;
            $saveCheckListProgress->date = $this->dateNow;
            $saveCheckListProgress->location_Id = $findCheckListEmployee->location_id;
            $saveCheckListProgress->save();

            foreach ($findCheckListEmployee->checkListEmployeeDetail as $cekListEmployeeDetail) {
                $saveCheckListProgressDetail = new CheckListProgressDetail();
                $saveCheckListProgressDetail->check_list_progress_id = $saveCheckListProgress->id;
                $saveCheckListProgressDetail->check_list_id = $cekListEmployeeDetail->check_list_id;
                $saveCheckListProgressDetail->status = 0;
                $saveCheckListProgressDetail->save();
            }
        }
        $checkListProgress = CheckListProgress::with(['checkListProgressDetail', 'location'])->where(['date' => $this->dateNow, 'user_id' => 7117100344])->first();

        return view('user.checklist.index', compact(['user', 'checkListProgress']));
    }

    public  function getUserNote($id)
    {
        return CheckListProgress::find($id);
    }

    public  function userHistory()
    {
        $checkListProgress = CheckListProgress::with(['checkListProgressDetail', 'location'])->where(['user_id' => 7117100344])->get();
        dd($checkListProgress);
        return view('user.checklist.history', compact('checkListProgress'));
    }

}
