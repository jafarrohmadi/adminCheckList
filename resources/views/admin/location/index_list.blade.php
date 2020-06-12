<table class="display datatable-table" style="width:100%;">
    <thead>
    <tr>
        <th class="fit">No</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($location as $key  => $locations)
        <tr>
            <td>{{$key +1}}</td>
            <td><span class="new-datatable-nowrap new-datatable-male"><i
                            class="far fa-user ri2-marginright5"></i> {{$locations->name}}</span>
            </td>
            <td>
                @if($locations->access != 'admin')<span class="new-datatable-nowrap">
                <a data-id="{{$locations->id}}" data-name="{{$locations->name}}"
                   class="modaledituseropen new-datatable-action icon-only ri2-txwhite1 ri2-bggreen1 ri2-tooltip ri2-nowrap"><span
                            class="ri2-righttooltiptext">Edit</span><i
                            class="fas fa-pen"></i></a>
                <a data-id="{{$locations->id}}" data-name="{{$locations->name}}"
                   class="modalhapusopen new-datatable-action icon-only ri2-txblack1 ri2-bgyellow1 ri2-tooltip ri2-nowrap"><span
                            class="ri2-righttooltiptext">Hapus</span><i
                            class="fas fa-times"></i></a></span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>