<!--modal tambah tugas-->
<div class="modaltambahtugas ri2-modal ri2-fixed ri2-fullwidth ri2-fullheight">
    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
            <div
                class="modaltambahtugasback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
            <div class="ri2-modal-content ri2-relative new-modal-content">
                <div
                    class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-marginbottom15 ri2-borderradius2 ri2-overflowhidden">
                    <div
                        class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
                        Tambah Tugas
                    </div>
                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Pilih Personel
                            </div>
                            <div class="ri2-block ri2-relative">
                                <select
                                    class="basic-single ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth"
                                    name="user_id" id="user_id">
                                    <option value="" selected>Pilih Personel</option>
                                    <option value="1">vian</option>
                                    <option value="2">imam</option>
                                </select>
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
                                    name="location_id" id="location_id">
                                    <option value="" selected>Pilih Lokasi</option>
                                    @foreach($location as $locations)
                                        <option value="{{ $locations->id ?? '' }}">{{ $locations->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Atur Tugas
                            </div>
                            <span id="tambahTugasCheckList"></span>
                        </div>
                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                            <div
                                class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                Hari
                            </div>
                            <div class="ri2-block ri2-relative">
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="senin">
                                        <span class="ri2-checkmark-text">Senin</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>

                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="selasa">
                                        <span class="ri2-checkmark-text">Selasa</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="rabu">
                                        <span class="ri2-checkmark-text">Rabu</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="kamis">
                                        <span class="ri2-checkmark-text">Kamis</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="jumat">
                                        <span class="ri2-checkmark-text">Jumat</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="sabtu">
                                        <span class="ri2-checkmark-text">Sabtu</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                                <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">
                                    <label
                                        class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14">
                                        <input type="checkbox" name="days" id="days" checked=""
                                               value="minggu">
                                        <span class="ri2-checkmark-text">Minggu</span>
                                        <span class="ri2-checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-left">
                            <button
                                class="modaltambahtugassave ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer"
                            id="modaltambahtugassave">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ri2-block ri2-relative ri2-center">
                    <div
                        class="modaltambahtugasclose ri2-inlineblock ri2-relative ri2-modal-close ri2-txwhite1 ri2-semibold ri2-font20 ri2-pointer ri2-linkhoveryellow1">
                        <i class="fas fa-times-circle"></i> Tutup
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal tambah tugas-->
