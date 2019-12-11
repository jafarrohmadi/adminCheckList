<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ClientController;
use App\Models\CheckList;
use App\Models\CheckListEmployee;
use App\Models\CheckListProgress;
use App\Models\Location;
use Illuminate\Http\Request;

class CheckListController extends ClientController
{
    public function index ()
    {
        $location          = Location::all();
        $checkList         = CheckList::all();
        $checkListProgress = CheckListProgress::with('checkListProgressDetail', 'checkListProgressDetail.checkList')->withCount([
                'checkListProgressDetail',
                'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                    $query->where('status', 1);
                },
            ]
        )->get();
        return view('admin.checklist.index', compact('location', 'checkList', 'checkListProgress'));
    }

    public function checkListEmployeeSave (Request $request)
    {
        $checkListEmployee                 = new CheckListEmployee();
        $checkListEmployee->user_id        = $request->user_id;
        $checkListEmployee->location_id    = $request->location_id;
        $checkListEmployee->check_list_ids = json_encode($request->check_list_ids);
        $checkListEmployee->days           = json_encode($request->days);
        $checkListEmployee->save();
        return 'Save Data Success';
    }

    public function editCheckListProgress ($id, Request $request)
    {
        $checkListProgress       = CheckListProgress::find($id);
        $checkListProgress->note = $request->note;
        $checkListProgress->save();
        return $checkListProgress;
    }

    public function getCheckList ()
    {
        return CheckList::all();
    }

    public function storeCheckList (Request $request)
    {
        $checkList       = new CheckList();
        $checkList->name = $request->name;
        $checkList->save();
        return $checkList;
    }

    public function updateCheckList ($id, Request $request)
    {
        $checkList       = CheckList::find($id);
        $checkList->name = $request->name;
        $checkList->save();
        return $checkList;
    }

    public function deleteCheckList ($id)
    {
        CheckList::destroy($id);
        return 'true';
    }

    function tanggal_indo ($tanggal, $cetak_hari = true)
    {
        $hari     = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $bulan    = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

}
