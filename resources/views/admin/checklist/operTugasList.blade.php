<div class="operTugasnew-parent ri2-inlineblock ri2-fullwidth ri2-relative">
    @foreach($checkListOperTugas as $checkListOperTugases)
        <div
            class="modalopertugaseditlistopen ri2-floatleft new-onduty-list operTugasnew-child ri2-vtop ri2-boxpad15 ri2-box ri2-borderradius5 ri2-borderfull1 ri2-borderwhite3 ri2-pointer"
            data-id="{{$checkListOperTugases->id}}" data-from_user_id="{{$checkListOperTugases->from_user_id}}"
            data-to_user_id="{{$checkListOperTugases->to_user_id}}"
            data-location="{{$checkListOperTugases->location_id}}"
            data-location-name="{{$checkListOperTugases->location->name}}"
            data-start_date="{{$checkListOperTugases->start_date}}" data-end_date="{{$checkListOperTugases->end_date}}"
            data-reason="{{$checkListOperTugases->reason}}"
            data-from_user_name="{{$checkListOperTugases->fromUser->name}}">
            <div class="ri2-block ri2-relative ri2-center ri2-marginbottom10">
                <img src="{{ $checkListOperTugases->toUser['photo'] ? asset("images/upload/profile/".$checkListOperTugases->toUser['photo']) : asset('images/avatars/man.jpg') }}"
                     class="ri2-circle ri2-vmid ri2-borderfull3 ri2-borderwhite5 new-user-mthumbnail">
            </div>
            <div class="ri2-block ri2-relative ri2-center ri2-txblack3 ri2-font16">
                {{ $checkListOperTugases->toUser['name'] ?? '' }}
            </div>
            <div class="ri2-block ri2-relative ri2-center ri2-txgrey1 ri2-font14">
                {{ $checkListOperTugases->location['name'] ?? '' }} <a
                    class="ri2-relative ri2-inlineblock ri2-nowrap ri2-tooltip"><span
                        class="ri2-tooltiptext ri2-normal ri2-linenormal">Operan dari {{ $checkListOperTugases->fromUser['name'] }}</span><i
                        class="fas fa-exchange-alt ri2-rotate-45 ri2-txgreen1"></i></a>
            </div>
        </div>
    @endforeach
</div>
@if( count($checkListOperTugas) > 4)
    <div class="ri2-block ri2-relative ri2-center ri2-margintop20">
        <div
            class="opertugaslist-open ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
            <i class="fas fa-angle-double-down"></i> Lihat Semua {{ count($checkListOperTugas) }}
            Personel
        </div>
    </div>
    <div class="ri2-desktop-hide ri2-relative ri2-center ri2-margintop20">
        <div
            class="opertugaslist-close ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
            <i class="fas fa-angle-double-up"></i> Sembunyikan
        </div>
    </div>
@endif

