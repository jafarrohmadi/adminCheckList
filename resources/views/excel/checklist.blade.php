<table>
    <thead>
    <tr>
        <th>No</th>
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
                <td>{{ $checkListProgres->checkListUser->name }}</td>
                <td>{{ (new Helper)->tanggal_indo(date('Y-m-d', strtotime($checkListProgres->date))) }}</td>
                <td>{{ $checkListProgres->location->name }}
                    @if($checkListProgres->check_list_oper_tugas_id)
                        Mengalih Tugaskan dari {{ $checkListProgres->checkListOperTugas->fromUser->name  ?? ''}}

                    @endif
                </td>

                <td>{{ $checkListProgres->activeCheckListProgressDetail }}
                    /{{ $checkListProgres->check_list_progress_detail_count }}
                </td>
            </tr>
        @endif
    @endforeach

    </tbody>
</table>
