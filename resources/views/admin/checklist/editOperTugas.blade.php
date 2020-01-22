<!--modal edit oper tugas-->
<div class="modaleditopertugas ri2-modal ri2-fixed ri2-fullwidth ri2-fullheight">
    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
            <div
                class="modaleditopertugasback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
            <div class="ri2-modal-content ri2-relative new-modal-content">
                <div
                    class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-boxpad40 ri2-marginbottom15 ri2-borderradius2">
                    <div
                        class="ri2-block ri2-relative ri2-font24 ri2-semibold ri2-marginbottom20 ri2-center ri2-txblack3">
                        Ubah Mengalih Tugaskan
                    </div>
                    {{ (new Helper)->tanggal_indo(date('Y-m-d')) }}
                    <br>
                    <div
                        class="ri2-block ri2-relative ri2-borderfull1 ri2-borderwhite4 ri2-borderradius2 ri2-overflowhidden ri2-marginbottom20 ri2-left">
                        <div
                            class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-borderbottom1 ri2-borderwhite4">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom10 ri2-font16 ri2-txblack3 ri2-semibold">
                                Mengalih Tugaskan Dari
                            </div>
                            <div class="ri2-block ri2-relative">
                                <div class="ri2-table ri2-relative ri2-fullwidth">
                                    <div class="ri2-cell ri2-vmid ri2-halfwidth">
                                        <input
                                            class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                            name="editOperTugasFrom" id="editOperTugasFrom" readOnly>
                                    </div>
                                    <div
                                        class="ri2-cell ri2-vmid ri2-paddingleft10 ri2-halfwidth">
                                        <input type="text"
                                               class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                               placeholder="Lokasi" id="editOperTugasLocation" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-borderbottom1 ri2-borderwhite4">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom10 ri2-font16 ri2-txblack3 ri2-semibold">
                                Mengalih Tugaskan Kepada
                            </div>
                            <div class="ri2-block ri2-relative">
                                <select
                                    class="basic-single ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth"
                                    name="editOperTugasToUserId" id="editOperTugasToUserId">
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="editOperTugasId" id="editOperTugasId">
                        <input type="hidden" name="editOperTugasFromUserId" id="editOperTugasFromUserId">
                        <input type="hidden" name="editOperTugasLocationId" id="editOperTugasLocationId">
{{--                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-borderbottom1 ri2-borderwhite4">--}}
{{--                            <div--}}
{{--                                class="ri2-block ri2-relative ri2-marginbottom10 ri2-font16 ri2-txblack3 ri2-semibold">--}}
{{--                                Periode--}}
{{--                            </div>--}}
{{--                            <div class="ri2-block ri2-relative">--}}
{{--                                <div class="ri2-table ri2-relative ri2-fullwidth">--}}
{{--                                    <div class="ri2-cell ri2-vmid ri2-halfwidth">--}}
{{--                                        <div--}}
{{--                                            class="ri2-block ri2-relative ri2-marginbottom7 ri2-font12 ri2-txgrey2">--}}
{{--                                            Dari--}}
{{--                                        </div>--}}

{{--                                        <input type="text"--}}
{{--                                               class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss"--}}
{{--                                               autocomplete="off" name="editOperTugasStartDate"--}}
{{--                                               id="editOperTugasStartDate"--}}
{{--                                               placeholder="YYYY/MM/DD"--}}
{{--                                               maxlength="20" required>--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="ri2-cell ri2-vmid ri2-paddingleft10 ri2-halfwidth">--}}
{{--                                        <div--}}
{{--                                            class="ri2-block ri2-relative ri2-marginbottom7 ri2-font12 ri2-txgrey2">--}}
{{--                                            Sampai--}}
{{--                                        </div>--}}
{{--                                        <input type="text"--}}
{{--                                               class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss"--}}
{{--                                               autocomplete="off" name="editOperTugasEndDate" id="editOperTugasEndDate"--}}
{{--                                               placeholder="YYYY/MM/DD"--}}
{{--                                               maxlength="20" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-borderbottom1 ri2-borderwhite4">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom10 ri2-font16 ri2-txblack3 ri2-semibold">
                                Reason
                            </div>
                            <div class="ri2-block ri2-relative">
                                <textarea
                                    class="ri2-textarea100 ri2-noresize ri2-boxpad10 ri2-box ri2-bgwhite2 ri2-borderradius3 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                    placeholder="Reason" name="editOperTugasReason" id="editOperTugasReason"
                                    required></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="ri2-block ri2-relative ri2-left">
                        <button
                            class="modaleditopertugassave ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                            Simpan
                        </button>
{{--                        <button--}}
{{--                            class="noty-button-hapus modaleditopertugasclose ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgyellow1 ri2-txblack3 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">--}}
{{--                            Batalkan--}}
{{--                        </button>--}}
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center">
                    <div
                        class="modaleditopertugasclose ri2-inlineblock ri2-relative ri2-modal-close ri2-txwhite1 ri2-semibold ri2-font20 ri2-pointer ri2-linkhoveryellow1">
                        <i class="fas fa-times-circle"></i> Tutup
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal edit oper tugas-->
