<div class="new-topheader ri2-fixed ri2-fullwidth ri2-bgnavy3">
    <a href="" class="ri2-inlineblock ri2-relative new-logo ri2-bgnavy2 ri2-font24 ri2-txwhite1 ri2-paddingleft15 ri2-box ri2-vmid ri2-mobile-hide1">
        <img src="{{ asset('images/ayoohris2019w.png') }}">
    </a>
    <div class="ri2-inlineblock ri2-vmid ri2-relative new-top55">
        <div class="ri2-table ri2-relative new-top55">
            <div class="ri2-cell ri2-vmid ri2-boxpad10">
                <a class="btn-toogle ri2-relative ri2-bordernone ri2-bgtransparent ri2-txwhite1 ri2-font20 ri2-pointer ri2-tooltip  ri2-nowrap"><span class="ri2-righttooltiptext">Buka Menu</span><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </div>
    <div class="new-topright ri2-floatright">
        <div class="ri2-table ri2-relative ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box">
                <img src="{{ Auth::user()->photo ?? '' }}" class="new-top-pp ri2-circle">
            </div>
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box ri2-mobile-hide2 ri2-txwhite1 ri2-font14 ri2-semibold">
                {{ Auth::user()->name ?? '' }}
            </div>
            <div class="ri2-cell ri2-vmid ri2-boxpad10 ri2-box ri2-txwhite1 ri2-font14">
                <a href="http://ayoohris.id" class="ri2-tooltip ri2-nowrap ri2-relative ri2-bordernone ri2-bgtransparent ri2-txwhite1 ri2-font20 ri2-pointer"><span class="ri2-lefttooltiptext">AyooHris</span><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>
