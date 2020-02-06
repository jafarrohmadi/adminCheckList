<div class="new-parent ri2-inlineblock ri2-fullwidth ri2-relative">
    @foreach($checkListEmployee as $checkListEmploye)
        <div
            class="modaledittugaslistopen ri2-floatleft new-onduty-list new-child ri2-vtop ri2-boxpad15 ri2-box ri2-borderradius5 ri2-borderfull1 ri2-borderwhite3 ri2-pointer"
            data-id="{{$checkListEmploye->id}}" data-user_id="{{$checkListEmploye->users['email']}}"
            data-name="{{$checkListEmploye->users['name']}}" data-location="{{$checkListEmploye->location['id']}}"
            data-list="{{$checkListEmploye->check_list_id}}" data-day="{{$checkListEmploye->day}}">
            <div class="ri2-block ri2-relative ri2-center ri2-marginbottom10">
                <div class="ri2-inlineblock ri2-relative">
                    <img src="{{ $checkListEmploye->users['photo'] }}"
                         class="ri2-circle ri2-vmid ri2-borderfull3 ri2-borderwhite5 new-user-mthumbnail">
                </div>
            </div>
            <div class="ri2-block ri2-relative ri2-center ri2-txblack3 ri2-font16">
                {{ $checkListEmploye->users['name'] ?? '' }}
            </div>
            <div class="ri2-block ri2-relative ri2-center ri2-txgrey1 ri2-font14">
                {{ $checkListEmploye->location['name'] ?? '' }}
            </div>
        </div>
    @endforeach
</div>
@if( count($checkListEmployee) > 4)
    <div class="ri2-block ri2-relative ri2-center ri2-margintop20">
        <div
            class="tugaslist-open ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
            <i class="fas fa-angle-double-down"></i> Lihat Semua {{ count($checkListEmployee) }}
            Personel
        </div>
    </div>
    <div class="ri2-desktop-hide ri2-relative ri2-center ri2-margintop20">
        <div
            class="tugaslist-close ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
            <i class="fas fa-angle-double-up"></i> Sembunyikan
        </div>
    </div>
@endif

