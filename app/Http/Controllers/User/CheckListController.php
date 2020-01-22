<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\ClientController;
use App\Models\CheckList;
use App\Models\CheckListEmployee;
use App\Models\CheckListOperTugas;
use App\Models\CheckListProgress;
use App\Models\CheckListProgressDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CheckListController extends ClientController
{
    public $dateNow;
    public $user;

    public function __construct()
    {
        $this->dateNow = date('Y-m-d');
    }

    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }

        $this->user             = $user->nik;
        $findCheckListProgress  =
            CheckListProgress::where([ 'date' => $this->dateNow, 'user_id' => $this->user , 'check_list_oper_tugas_id' => null ])->first();
        $countHaveOperTugasUser = $this->haveOperTugasUser() ? count($this->haveOperTugasUser()) : 0;

        if ((!$findCheckListProgress && !$this->dontHaveJobCauseOperTugasUser())) {
            $this->findCheckListEmployee();
        }

        if ($countHaveOperTugasUser > 0) {
            foreach ($this->haveOperTugasUser() as $operTugasUser) {
                $findOperTugasCheckListProgress = CheckListProgress::where([
                    'date'                     => $this->dateNow,
                    'user_id'                  => $operTugasUser->to_user_id,
                    'check_list_oper_tugas_id' => $operTugasUser->id,
                ])->first();

                if (!$findOperTugasCheckListProgress) {
                    $this->findCheckListEmployee($operTugasUser);
                }
            }
        }

        $checkListProgress = CheckListProgress::with([ 'checkListProgressDetail', 'location' ])
            ->where([ 'date' => $this->dateNow, 'user_id' => $this->user ])
            ->orderByRaw('-check_list_oper_tugas_id ASC')
            ->get();

        $noteWarning = $this->getNoteThisDayByUserLogin();

        return view('user.checklist.index', compact([ 'user', 'checkListProgress', 'noteWarning' ]));
    }


    public function update(Request $request, $id)
    {
        $checkListProgressDetail = CheckListProgressDetail::find($id);

        if ($request->note) {
            $checkListProgressDetail->note = $request->note;
        }

        if ($request->picture) {
            $output_filename = 'ACL' . strtoupper(Str::random(20)) . '.png';
            $img             = preg_replace('#^data:image/\w+;base64,#i', '', $request->picture);
            $img             = Image::make(base64_decode($img))->resize('400', '400');
            // save image
            $img->save(public_path('user/images/upload/ACL/' . $output_filename));
            $checkListProgressDetail->picture = 'user/images/upload/ACL/'.$output_filename;
        }

        if ($request->status) {
            $checkListProgressDetail->status = $request->status;
        }

        $checkListProgressDetail->save();

        return $checkListProgressDetail;
    }

    private function dontHaveJobCauseOperTugasUser()
    {
        return CheckListOperTugas::where([ 'from_user_id' => $this->user ])
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->first();
    }

    private function haveOperTugasUser()
    {
        return CheckListOperTugas::where([ 'to_user_id' => $this->user ])
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->get();
    }

    private function findCheckListEmployee($operTugas = [])
    {
        $activeChecklist = CheckList::where('status', 1)->pluck('id')->toArray();

        if (!empty($operTugas)) {
            $findCheckListEmployeeFromOperTugas = CheckListEmployee::with([
                'checkListEmployeeDetail' => function ($query) use ($activeChecklist) {
                    $query->where('day', (new Helper)->getThisDay())->whereIn('check_list_id', $activeChecklist);
                },
            ])->where('user_id', $operTugas->from_user_id)->first();

            if ($findCheckListEmployeeFromOperTugas) {
                $this->createCheckListProgress($findCheckListEmployeeFromOperTugas, $operTugas);
            }
        } else {
            $findCheckListEmployee = CheckListEmployee::with([
                'checkListEmployeeDetail' => function ($query) use ($activeChecklist) {
                    $query->where('day', (new Helper)->getThisDay())->whereIn('check_list_id', $activeChecklist);
                },
            ])->where('user_id', $this->user)->first();
            if ($findCheckListEmployee) {
                $this->createCheckListProgress($findCheckListEmployee);
            }
        }
    }

    private function createCheckListProgress(CheckListEmployee $findCheckListEmployee, $operTugas = [])
    {
        $saveCheckListProgress              = new CheckListProgress();
        $saveCheckListProgress->user_id     = $findCheckListEmployee->user_id;
        $saveCheckListProgress->date        = $this->dateNow;
        $saveCheckListProgress->location_Id = $findCheckListEmployee->location_id;

        if (!empty($operTugas)) {
            $saveCheckListProgress->check_list_oper_tugas_id = $operTugas->id;
            $saveCheckListProgress->user_id                  = $operTugas->to_user_id;
        } else {
            $saveCheckListProgress->user_id = $findCheckListEmployee->user_id;
        }

        $saveCheckListProgress->save();

        foreach ($findCheckListEmployee->checkListEmployeeDetail as $cekListEmployeeDetail) {
            $saveCheckListProgressDetail                         = new CheckListProgressDetail();
            $saveCheckListProgressDetail->check_list_progress_id = $saveCheckListProgress->id;
            $saveCheckListProgressDetail->check_list_id          = $cekListEmployeeDetail->check_list_id;
            $saveCheckListProgressDetail->status                 = 0;
            $saveCheckListProgressDetail->save();
        }

        return;
    }

    public function userHistory()
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }

        $this->user = $user->nik;

        $checkListProgress = CheckListProgress::with([ 'checkListProgressDetail', 'location' ])
            ->withCount([
                'checkListProgressDetail',
                'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                    $query->where('status', 1)->orderBy('date', 'desc');
                },
            ])
            ->where([ 'user_id' => $this->user ])
            ->whereDate('date', '>=', Carbon::now()->subDays(7))
            ->orderBy('check_list_progress.created_at', 'desc')
            ->take(7)
            ->get();

        return view('user.checklist.history', compact('checkListProgress'));
    }

    public function searchUserHistory($date = null)
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }

        $this->user = $user->nik;

        $checkListProgress = CheckListProgress::with([ 'checkListProgressDetail', 'location' ])
            ->withCount([
                'checkListProgressDetail',
                'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                    $query->where('status', 1)->orderBy('date', 'desc');
                },
            ])
            ->where([ 'user_id' => $this->user ])
            ->orderBy('check_list_progress.created_at', 'desc')
            ->whereDate('date', '=', $date)
            ->get();

        return view('user.checklist.history_list', compact('checkListProgress'));
    }

    public function getNoteThisDayByUserLogin()
    {
        $user = Auth::user();

        if (!$user) {
            abort(404);
        }

        $this->user = $user->nik;

        $notif = CheckListProgress::where([ 'user_id' => $this->user ])
            ->whereDate('date', '=', Carbon::now())
            ->where('note', '!=', null)
            ->pluck('note');

        $noteWarning = '';
        if (count($notif) > 0) {
            foreach ($notif as $notes) {
                $noteWarning = $noteWarning . $notes;
            }
        }

        return $noteWarning;
    }
}
