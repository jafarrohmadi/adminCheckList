@foreach($checkListProgress as $checkList)
    <div class="fd-container-full">
        <div class="fd-wrapper" data-tanggal="{{date('dmy',strtotime($checkList->date))}}">
            <div class="activity-caption">
                <h4>{{ (new \App\Helpers\Helper())->tanggal_indo($checkList->date)}}</h4>
                <small>( {{ $checkList->location->name }} ) - Progress
                    done {{ $checkList->activeCheckListProgressDetail }}
                    / {{ $checkList->check_list_progress_detail_count }}</small>
            </div>
            <div class="activity-content">
                <ul class="historyList">
                    @foreach($checkList->checkListProgressDetail as $checkListProgressDetail)
                        @if($checkListProgressDetail->status !== 0)
                            <li>
                                <i class="far fa-check-circle"></i>
                                <span>{{ $checkListProgressDetail->checklist->name }}</span>
                            </li>
                        @else
                            <li class="notYet">
                                <i class="far fa-times-circle"></i>
                                <span>{{ $checkListProgressDetail->checklist->name }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endforeach
