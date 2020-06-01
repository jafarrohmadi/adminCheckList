<?php

namespace App\Exports;

use App\Models\CheckListProgress;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportExport implements FromView
{
    use Exportable;
    public $startDate;
    public $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    /**
     * @inheritDoc
     */
    public function view(): View
    {
        if ($this->startDate && $this->endDate) {
            $checklist = CheckListProgress::with([
                'checkListProgressDetail.checkList',
                'checkListOperTugas.fromUser',
                'checkListUser',
            ])->withCount([
                    'checkListProgressDetail',
                    'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                        $query->where('status', 1)->orderBy('date', 'desc');
                    },
                ]
            )->where('date',  '>=', $this->startDate)->where('date',  '<=', $this->endDate)->get();
        } else {
            $checklist = CheckListProgress::with([
                'checkListProgressDetail.checkList',
                'checkListOperTugas.fromUser',
                'checkListUser',
            ])->withCount([
                    'checkListProgressDetail',
                    'checkListProgressDetail as activeCheckListProgressDetail' => function ($query) {
                        $query->where('status', 1)->orderBy('date', 'desc');
                    },
                ]
            )->get();
        }
        return view('excel.checklist', [
            'checkListProgress' => $checklist,
        ]);
    }
}
