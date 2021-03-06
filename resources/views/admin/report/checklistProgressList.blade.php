<table class="display datatable-table" style="width:100%">
    <thead>
    <tr>
        <th class="fit">No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Progress</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach($checkListProgress as $checkListProgres)
        @if($checkListProgres->checkListUser)
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                    <div class="ri2-inlineblock ri2-relative ri2-vmid ri2-marginright7">
                        <img src="{{ $checkListProgres->checkListUser->photo ? asset("images/upload/profile/").'/'.$checkListProgres->checkListUser->photo : asset('images/avatars/man.jpg')}}"
                             class="new-user-sthumbnail ri2-inlineblock ri2-circle ri2-vmid">
                    </div>
                    <span
                        class="new-datatable-nowrap new-datatable-male">
                                                    {{ $checkListProgres->checkListUser->name }}
                                                </span>
                </td>
                <td>{{ (new Helper)->tanggal_indo(date('Y-m-d', strtotime($checkListProgres->date))) }}</td>
                <td>{{ $checkListProgres->location->name }}
                    @if($checkListProgres->check_list_oper_tugas_id)
                        <a class="ri2-relative ri2-inlineblock ri2-nowrap ri2-tooltip">
                        <span
                            class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Mengalih Tugaskan dari {{ $checkListProgres->checkListOperTugas->fromUser->name  ?? ''}}</span>
                            <i class="fas fa-exchange-alt ri2-rotate-45 ri2-txgreen1"></i>
                        </a>
                    @endif
                </td>

                <td>{{ $checkListProgres->activeCheckListProgressDetail }}
                    /{{ $checkListProgres->check_list_progress_detail_count }}
                    <a href="{{ url("report/getCheckListProgress/$checkListProgres->id") }}"
                       class="ri2-txgrey1 ri2-marginleft5 ri2-pointer ri2-linkhover ri2-relative ri2-nowrap ri2-tooltip">
                        <span class="ri2-lefttooltiptext">Detail Checklist</span>
                        <i class="fas fa-search"></i>
                    </a>
                </td>
            </tr>
        @endif
    @endforeach

    </tbody>
    <tbody id="searchOutput" style="display: none"></tbody>
</table>
