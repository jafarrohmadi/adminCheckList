<table class="display datatable-table" style="width:100%;">
    <thead>
    <tr>
        <th class="fit">No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Department</th>
        <th>Jabatan</th>
        <th>Atasan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user as $key  => $users)
        <tr>
            <td>{{$key +1}}</td>
            <td><span class="new-datatable-nowrap new-datatable-male"><i
                            class="far fa-user ri2-marginright5"></i> {{$users->name}}</span>
            </td>
            <td>{{ $users->phone_number }} </td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->department }}</td>
            <td>{{ isset($users->designation) ? $users->designation : $users->access }}</td>
            <td>{{ $users->boss }}</td>
            <td>
                @if($users->access != 'admin')<span class="new-datatable-nowrap">
                <a data-jabatan="{{ $users->designation }}" data-department="{{ $users->department }}"
                   data-id="{{$users->id}}" data-name="{{$users->name}}"
                   data-phone_number="{{$users->phone_number}}" data-boss="{{$users->boss}}"
                   data-email="{{$users->email}}" data-access="{{$users->access}}"
                   class="modaledituseropen new-datatable-action icon-only ri2-txwhite1 ri2-bggreen1 ri2-tooltip ri2-nowrap"><span
                            class="ri2-righttooltiptext">Edit</span><i
                            class="fas fa-pen"></i></a>
                <a data-id="{{$users->id}}" data-name="{{$users->name}}"
                   class="modalhapusopen new-datatable-action icon-only ri2-txblack1 ri2-bgyellow1 ri2-tooltip ri2-nowrap"><span
                            class="ri2-righttooltiptext">Hapus</span><i
                            class="fas fa-times"></i></a></span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>