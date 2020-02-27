<!--modal opertugas-->
<div class="modalopertugas ri2-modal ri2-fixed ri2-fullwidth ri2-fullheight">
    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
            <div
                class="modalopertugasback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
            <div class="ri2-modal-content ri2-relative new-modal-content">
                <div
                    class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-marginbottom15 ri2-borderradius2 ri2-overflowhidden">
                    <div
                        class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
                        Mengalih Tugaskan
                    </div>
                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <ul id="add-task-errors-opertugas" style="padding: 0px">
                            </ul>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Mengalih Tugaskan Dari
                            </div>
                            <div class="ri2-block ri2-relative">
                                <div class="ri2-table ri2-relative ri2-fullwidth">
                                    <div class="ri2-cell ri2-vmid ri2-halfwidth">
                                        <select
                                            class="basic-twolines_designation ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth"
                                            name="from_user_id" id="from_user_id"
                                            onchange="getCheckListEmployeeByUserId(this.value);"
                                        >
                                        </select>
                                    </div>
                                    <div
                                        class="ri2-cell ri2-vmid ri2-paddingleft10 ri2-halfwidth">
                                        <input type="hidden" id="oper_tugas_location_id" name="oper_tugas_location_id">
                                        <input type="text"
                                               class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                               placeholder="Lokasi" id='oper_tugas_location_name'
                                               name='oper_tugas_location_name' readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Mengalih Tugaskan Kepada
                            </div>
                            <div class="ri2-block ri2-relative">
                                <select
                                    class="basic-twolines_designation ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth"
                                    name="to_user_id" id="to_user_id">
                                </select>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div class="ri2-table ri2-relative ri2-fullwidth">
                                <div class="ri2-cell ri2-vmid ri2-halfwidth">
                                    <div
                                        class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                        Mulai
                                    </div>
                                    <input type="text"
                                           class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss datetimepicker"
                                           autocomplete="off" name="start_date" id="start_date"
                                           placeholder="YYYY/MM/DD H:M" maxlength="20" required>
                                </div>
                                <div class="ri2-cell ri2-vmid ri2-paddingleft10 ri2-halfwidth">
                                    <div
                                        class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                        Sampai
                                    </div>
                                    <input type="text"
                                           class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss datetimepicker"
                                           autocomplete="off" name="end_date" id="end_date"
                                           placeholder="YYYY/MM/DD H:M" maxlength="20" required>
                                </div>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Reason
                            </div>
                            <div class="ri2-block ri2-relative">
                                <textarea
                                    class="ri2-textarea100 ri2-noresize ri2-boxpad10 ri2-box ri2-bgwhite2 ri2-borderradius3 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14"
                                    placeholder="Reason" name="operTugasReason" id="operTugasReason" required></textarea>

                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-left">
                            <button
                                class="modalopertugassave ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center">
                    <div
                        class="modalopertugasclose ri2-inlineblock ri2-relative ri2-modal-close ri2-txwhite1 ri2-semibold ri2-font20 ri2-pointer ri2-linkhoveryellow1">
                        <i class="fas fa-times-circle"></i> Tutup
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal opertugas-->
