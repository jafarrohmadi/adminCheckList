<!--modal edit tugas-->
<div class="modaledittugaslist ri2-modal ri2-fixed ri2-fullwidth ri2-fullheight">
    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
            <div
                class="modaledittugaslistback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
            <div class="ri2-modal-content ri2-relative new-modal-content">
                <div
                    class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-marginbottom15 ri2-borderradius2 ri2-overflowhidden">
                    <div
                        class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
                        Edit Tugas List
                    </div>
                    <div
                        class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                        <input type="hidden" name="editTugasListId" id="editTugasListId">
                        <input type="hidden" name="editTugasListNote" id="editTugasListNote">
                        <input type="hidden" name="editTugasListUserId" id="editTugasListUserId">
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Personel
                            </div>
                            <div class="ri2-block ri2-relative">
                                <input
                                    class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                    name="editTugasListUserName" id="editTugasListUserName" readOnly>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Pilih Lokasi
                            </div>
                            <div class="ri2-block ri2-relative">
                                <select
                                    class="basic-single ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth"
                                    name="editTugasListLocationId" id="editTugasListLocationId">
                                </select>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Atur Tugas
                            </div>
                            <div class="ri2-block ri2-relative">
                                <span id='editTugasListCheckList'></span>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Hari
                            </div>
                            <div class="ri2-block ri2-relative">
                                <span id='editDayCheckList'></span>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-left">
                            <button
                                class="modaledittugaslistsave ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                                Simpan
                            </button>
                            <button
                                class="modaledittugaslistdelete ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgyellow1 ri2-txblack3 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center">
                    <div
                        class="modaledittugaslistclose ri2-inlineblock ri2-relative ri2-modal-close ri2-txwhite1 ri2-semibold ri2-font20 ri2-pointer ri2-linkhoveryellow1">
                        <i class="fas fa-times-circle"></i> Tutup

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal edit tugas-->
