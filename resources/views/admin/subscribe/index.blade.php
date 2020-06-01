@extends('layouts.admin.app')
@section('content')
    <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
        <div class="ri2-table ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <div class="ri2-table ri2-font18 ri2-semibold">
                    <div class="ri2-cell ri2-paddingleft10">
                        Subscribe
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-bgwhite2">
        <input type="number" name="licence" id="amount"
               class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
               placeholder="Jumlah karyawan">
        <span class="spanerror"></span>
    </div>

    <div class="ri2-flex ri2-relative ri2-cell-end2">
        <div class="ri2-block ri2-flex1 ri2-relative ri2-vtop new-content-cellspace ri2-box ri2-cell-end2 tour1">
            <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
            <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
            <div class="ri2-block ri2-relative">
                <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                    Total Biaya Layanan
                </div>
            </div>
            <form method="post" action="{{url('subscribe')}}">
                @csrf
                <div class="ri2-block ri2-relative ri2-center ri2-boxpad20 ri2-box">
                    <div class="ri2-inlineblock ri2-fullwidth" style="max-width: 190px;">

                        <div class="ri2-block ri2-relative">
                            <div class="ri2-block ri2-relative ri2-checkbox">
                                <label
                                    class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                    <input type="radio" name="paket" value="free">
                                    <span class="ri2-checkmark-text">&nbsp;</span>
                                    <span class="ri2-checkmark"></span>
                                </label>
                            </div>
                            <div class="ri2-table ri2-relative ri2-fullwidth">
                                <div class="ri2-cell ri2-left ri2-vmid">
                                    <div class="ri2-block ri2-relative ri2-font16 ri2-semibold">
                                        Rp <span class="twelvebulan">0</span> per 12 bulan
                                    </div>
                                    <div class="ri2-block ri2-relative ri2-font12 ri2-txgrey2 ri2-semibold">
                                        * Lebih hemat 5%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center ri2-boxpad20 ri2-box">
                    <div class="ri2-inlineblock ri2-fullwidth" style="max-width: 190px;">
                        <div class="ri2-block ri2-relative ri2-checkbox">
                            <label
                                class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                <input type="radio" name="paket" value="free">
                                <span class="ri2-checkmark-text">&nbsp;</span>
                                <span class="ri2-checkmark"></span>
                            </label>
                        </div>
                        <div class="ri2-block ri2-relative">
                            <div class="ri2-table ri2-relative ri2-fullwidth">
                                <div class="ri2-cell ri2-left ri2-vmid">
                                    <div class="ri2-block ri2-relative ri2-font16 ri2-semibold">
                                        Rp <span class="sixbulan">0</span> per 6 bulan
                                    </div>
                                    <div class="ri2-block ri2-relative ri2-font12 ri2-txgrey2 ri2-semibold">
                                        * Lebih hemat 3%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center ri2-boxpad20 ri2-box">
                    <div class="ri2-inlineblock ri2-fullwidth" style="max-width: 190px;">
                        <div class="ri2-block ri2-relative ri2-checkbox">
                            <label
                                class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                <input type="radio" name="paket" value="free">
                                <span class="ri2-checkmark-text">&nbsp;</span>
                                <span class="ri2-checkmark"></span>
                            </label>
                        </div>
                        <div class="ri2-block ri2-relative">
                            <div class="ri2-table ri2-relative ri2-fullwidth">
                                <div class="ri2-cell ri2-left ri2-vmid">
                                    <div class="ri2-block ri2-relative ri2-font16 ri2-semibold">
                                        Rp <span class="onebulan">0</span> per 1 bulan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center ri2-boxpad20 ri2-box">

                    <div class="ri2-inlineblock ri2-fullwidth" style="max-width: 190px;">
                        <div class="ri2-block ri2-relative ri2-checkbox">
                            <label
                                class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                <input type="radio" name="paket" value="free">
                                <span class="ri2-checkmark-text">&nbsp;</span>
                                <span class="ri2-checkmark"></span>
                            </label>
                        </div>
                        <div class="ri2-block ri2-relative">
                            <div class="ri2-table ri2-relative ri2-fullwidth">
                                <div class="ri2-cell ri2-left ri2-vmid">
                                    <div class="ri2-block ri2-relative ri2-font16 ri2-semibold">
                                        Free
                                    </div>
                                    <div class="ri2-block ri2-relative ri2-font12 ri2-txgrey2 ri2-semibold">
                                        *untuk 10 user saat pertama join
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-margintop20">
                            <button
                                class="noty-button ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer"
                                type="submit">Simpan
                            </button>
                        </div>

                    </div>

                </div>
            </form>
        </div>

        <form>
            <div class="ri2-contents">
                <div
                    class="ri2-block ri2-flex1 ri2-relative ri2-vtop new-content-cellspace ri2-box ri2-cell-end2 tour1">
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                            Biaya Layanan
                        </div>
                    </div>
                    <div class="ri2-block ri2-relative ri2-center ri2-boxpad20 ri2-box">
                        <div class="ri2-inlineblock ri2-fullwidth" style="max-width: 190px;">
                            <div class="ri2-block ri2-relative">
                                <div class="ri2-table ri2-relative ri2-fullwidth">
                                    <div class="ri2-cell ri2-left ri2-vmid">
                                        <div class="ri2-block ri2-relative ri2-font16 ri2-semibold">
                                            Rp 12.500 per karyawan
                                        </div>
                                        <div class="ri2-block ri2-relative ri2-font12 ri2-txgrey2 ri2-semibold">
                                            Minimal 6 Karyawan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('js')
    <script>
        $("#amount").on("input", function () {
            if ($(this).val() > 5) {
                let one = $(this).val() * 12500;
                let six = ($(this).val() * 12500 * 6) - ($(this).val() * 12500 * 6 * 0.03);
                let twelve = ($(this).val() * 12500 * 12) - ($(this).val() * 12500 * 12 * 0.05);
                $(".onebulan").text(one);
                $(".sixbulan").text(six);
                $(".twelvebulan").text(twelve);
            } else {
                $(".spanerror").text('Minimum 6 karyawan');
            }
        });
    </script>
@endsection
