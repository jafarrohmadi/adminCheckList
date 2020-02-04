@extends('layouts.admin.app')
@section('css')
    <style type="text/css">
        .select2 {
            min-width: 100%;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #dfe4ea;
            border-radius: 2px;
            background-color: #fbfbfb;
        }

        .select2-container--default .select2-selection--multiple {
            border: none;
            border-radius: 2px;
            background-color: #dfe4ea;
            padding: 5px 4px 6px 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #1a4566;
            border: none;
            border-radius: 2px;
            color: #fff;
            margin: 5px 5px 0 0;
            padding: 0 7px;
        }

        table.dataTable tbody tr {
            vertical-align: middle;
        }
    </style>
@endsection
@section('content')
    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-bgwhite2">
        <div class="ri2-table ri2-relative ri2-fullwidth">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <a class="modaltambahtugasopen new-toolbarbutton ri2-inlineblock new-ocean-gradient ri2-font14 ri2-mobilefont12 ri2-semibold ri2-txwhite1 ri2-pointer ri2-hovering"><i
                        class="fas fa-plus-circle"></i> Tambah Tugas</a>
                @include('admin.checklist.tambahTugas')
            </div>
            <div class="ri2-cell ri2-vmid ri2-right">
                <button
                    class="modallocationopen new-ba-toolbar ri2-inlineblock ri2-vmid ri2-circle ri2-borderfull1 ri2-bordergreen1 ri2-circle ri2-bgwhite1 ri2-txblack3 ri2-center ri2-font16 ri2-nopadding ri2-pointer ri2-tooltip ri2-relative ri2-nowrap ri2-linkhover">
                    <span class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Location</span><i
                        class="fas fa-tasks"></i>
                </button>
                @include('admin.checklist.lokasi')
                <button
                    class="modalchecklistopen new-ba-toolbar ri2-inlineblock ri2-vmid ri2-circle ri2-borderfull1 ri2-bordergreen1 ri2-circle ri2-bgwhite1 ri2-txblack3 ri2-center ri2-font16 ri2-nopadding ri2-pointer ri2-tooltip ri2-relative ri2-nowrap ri2-linkhover">
                    <span class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Checklist</span><i
                        class="fas fa-tasks"></i>
                </button>
                @include('admin.checklist.checklist')
                <button
                    class="modalopertugasopen new-ba-toolbar ri2-inlineblock ri2-vmid ri2-circle ri2-borderfull1 ri2-bordergreen1 ri2-circle ri2-bgwhite1 ri2-txblack3 ri2-center ri2-font16 ri2-nopadding ri2-pointer ri2-tooltip ri2-relative ri2-nowrap ri2-linkhover">
                    <span class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Mengalih Tugaskan</span><i
                        class="fas fa-exchange-alt ri2-rotate-45"></i>
                </button>
                @include('admin.checklist.operTugas')
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="ri2-block ri2-relative ri2-fullwidth ri2-box ri2-boxpad10">
            <div class="ri2-block ri2-relative new-content-space">
                <div class="ri2-block ri2-relative">
                    <div
                        class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div
                        class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                            On Duty
                        </div>
                    </div>
                    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box">
                        <div class="new-onduty new-parent ri2-inlineblock ri2-fullwidth ri2-relative" id="onDutyData">
                        </div>
                        @if( count($onDutyData) > 4)
                            <div class="ri2-block ri2-relative ri2-center ri2-margintop20">
                                <div
                                    class="onduty-open ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
                                    <i class="fas fa-angle-double-down"></i> Lihat Semua {{ count($onDutyData) }}
                                    Personel
                                </div>
                            </div>
                            <div class="ri2-desktop-hide ri2-relative ri2-center ri2-margintop20">
                                <div
                                    class="onduty-close ri2-inlineblock ri2-font16 ri2-txblack3 ri2-pointer ri2-linkhover">
                                    <i class="fas fa-angle-double-up"></i> Sembunyikan
                                </div>
                            </div>
                        @endif
                        @include('admin.checklist.editTugas')
                        @include('admin.checklist.editOperTugas')
                    </div>
                </div>
            </div>
            <div class="ri2-block ri2-relative new-content-space">
                <div class="ri2-block ri2-relative">
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                            Checklist Progress
                        </div>
                    </div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                            <div class="ri2-block ri2-relative ri2-overflowauto ri2-paddingbottom20"
                                 data-simplebar data-simplebar-auto-hide="false">
                                <div class="dataTables_wrapper">
                                    <div class="dataTables_filter">
                                        Search Tanggal : <input type="text" name="filterChecklistProgressDate"
                                                                id="filterChecklistProgressDate" class="form-control"/>
                                    </div>
                                </div>
                                <span id="searchOutput" style="display: none"></span>
                                <span id="allOutput">
                                    @include('admin.checklist.checklistProgressList', ['checkListProgress' => $checkListProgress])
                                </span>

                            </div>
                        </div>
                    </div>
                    @include('admin.checklist.checklistProgress')
                    @include('admin.checklist.tugasNote')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.copyright')
@endsection

@section('js')
    <script type="text/javascript">
        String.prototype.escape = function() {
            var tagsToReplace = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;'
            };
            return this.replace(/[&<>]/g, function(tag) {
                return tagsToReplace[tag] || tag;
            });
        };

        let editOperTugasCheckList;

        //datatable
        var table = $('.datatable-table').DataTable();

        //date
        $('.datetimepicker').datetimepicker({
            minDate: 0,
            format: 'Y-m-d',
            timepicker: false,
        });

        $('#editOperTugasStartDate').datetimepicker("option", "disabled", true);
        var current = new Date();

        $('#editOperTugasStartDate').datetimepicker({
            minDate: new Date(current.getTime()),
            format: 'Y-m-d',
            timepicker: false,
            onClose: function (selectedDate) {
                $("#editOperTugasEndDate").datetimepicker("option", "minDate", selectedDate);
                $(this).parent().next().children().focus();
            }
        });

        $('#editOperTugasEndDate').datetimepicker({
            minDate: new Date(current.getTime()),
            format: 'Y-m-d',
            timepicker: false,
            onClose: function (selectedDate) {
                $("#editOperTugasStartDate").datetimepicker("option", "maxDate", selectedDate);
            }
        });


        function popUpMessage(message) {
            var simpan = {
                text: '<i class="far fa-comment-alt ri2-paddingright7"></i>' + message,
                timeout: 1500,
                type: 'success',
                theme: 'relax',
                layout: 'topRight',
                closeWith: ['click'],
                maxVisible: 10,
                animation: {
                    open: 'animated bounceInRight', // Animate.css class names
                    close: 'animated bounceOutRight', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 100 // unavailable - no need
                }
            };
            noty(simpan);
        }

        //select
        $('.basic-single').select2();
        $('.ri2-modal').find('change.select2').each(function (index, element) {
            var parent = $(element).closest('.ri2-modal').children();
            $(element).select2({
                dropdownParent: $(parent)
            });
        });
        $('select').on('select2:open', function () {
            $('.select2-search input').prop('focus', 0);
        });
        //$('.basic-multiple').select2();
        //$('.select2-search__field').attr("placeholder", 'Pilih');
        //$('.select2-search__field').css("width", '100%');

        //tambah tugas
        var modaltambahtugas = $('.modaltambahtugas');
        var modaltambahtugasopen = $('.modaltambahtugasopen');
        var modaltambahtugasback = $('.modaltambahtugasback');
        var modaltambahtugasclose = $('.modaltambahtugasclose');

        $(modaltambahtugasopen).on('click', function () {
            $('.modaltambahtugas').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            getUserEmployeeData();
            getChecklist();
        });

        $(modaltambahtugasback).on('click', function () {
            $('.modaltambahtugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modaltambahtugasclose).on('click', function () {
            $('.modaltambahtugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //edit tugas
        var modaledittugas = $('.modaledittugas');
        var modaledittugasopen = $('.modaledittugasopen');
        var modaledittugasback = $('.modaledittugasback');
        var modaledittugasclose = $('.modaledittugasclose');

        $(document).on("click", ".modaledittugasopen", function () {
            let id = $(this).attr("data-id");
            let name = $(this).attr("data-name");
            let locationId = $(this).attr("data-location");
            let editTugasNote = $(this).attr("data-note");
            $('#editTugasId').val(id);
            $('#editTugasUserName').val(name);
            $('#editTugasLocationId').val(locationId).change();
            $('#editTugasNote').val(editTugasNote);
            $('.modaledittugas').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            getChecklist(id);
        });

        $(modaledittugasback).on('click', function () {
            $('.modaledittugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modaledittugasclose).on('click', function () {
            $('.modaledittugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $('.modaledittugassave').on('click', function () {
            $('.modaledittugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');

            const check_list_ids = [];

            $("input[name='edit_check_list_ids']:checked").each(function () {
                check_list_ids.push(this.value);
            });

            $.ajax({
                type: 'put',
                url: "{{url('/checkListProgressDetailEditById') }}/" + $('#editTugasId').val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'location_id': $('#editTugasLocationId').val(),
                    'note': $('#editTugasNote').val(),
                    'check_list_ids': check_list_ids
                },
                success: function (data) {
                    $('.modaledittugas').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getOnDutyData();
                    popUpMessage('Success Edit CheckList');
                },
            })
        });

        $('.modaledittugasdelete').on('click', function () {
            $.ajax({
                type: 'delete',
                url: "{{url('/checkListProcessDelete') }}/" + $('#editTugasId').val(),
                data: {
                    '_token': "{{  csrf_token() }}"
                },
                success: function (data) {
                    $('.modaledittugas').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getChecklist();
                    popUpMessage('Success Tambah CheckList');
                },
            })
        });

        //edit opertugas
        var modaleditopertugas = $('.modaleditopertugas');
        var modaleditopertugasopen = $('.modaleditopertugasopen');
        var modaleditopertugasback = $('.modaleditopertugasback');
        var modaleditopertugasclose = $('.modaleditopertugasclose');
        $(document).on("click", ".modaleditopertugasopen", function () {
            let id = $(this).attr("data-id");
            let end_date = $(this).attr("data-endDate");
            let start_date = $(this).attr("data-startDate");
            let to_user = $(this).attr("data-touser");
            let from_user = $(this).attr("data-fromuser");
            let from_user_id = $(this).attr("data-from-user-id");
            let location = $(this).attr("data-location");
            let location_id = $(this).attr("data-location-id");
            let reason = $(this).attr("data-reason");

            $('.modaleditopertugas').css('display', 'block');
            $('#editOperTugasFrom').val(from_user);
            $('#editOperTugasLocation').val(location);
            $('#editOperTugasLocationId').val(location_id);
            getUserCheckListOperTugasToById(from_user_id, to_user);

            $('#editOperTugasStartDate').val(start_date);
            $('#editOperTugasEndDate').val(end_date);
            $('#editOperTugasReason').val(reason);
            $('#editOperTugasId').val(id);
            $('#editOperTugasFromUserId').val(from_user_id);

            $('body', 'html').css('overflow', 'hidden');
        });

        $(modaleditopertugasback).on('click', function () {
            $('.modaleditopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $('.modaleditopertugassave').on('click', function () {
            $('.modaleditopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
            $.ajax({
                type: 'put',
                url: "{{ url('/updateOperTugas/') }}/" + $("#editOperTugasId").val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'from_user_id': $("#editOperTugasFromUserId").val(),
                    'to_user_id': $("#editOperTugasToUserId").val(),
                    'location_id': $("#editOperTugasLocationId").val(),
                    'reason': $("#editOperTugasReason").val()
                },
                success: function (data) {
                    $('.ubahchecklistopen').parent().parent().slideDown();
                    getChecklist();
                    popUpMessage('Success Edit Mengalih Tugaskan');
                    getOnDutyData();
                },
            });
        });

        $(modaleditopertugasclose).on('click', function () {
            $('.modaleditopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //edit checklist
        var modalchecklist = $('.modalchecklist');
        var modalchecklistopen = $('.modalchecklistopen');
        var modalchecklistback = $('.modalchecklistback');
        var modalchecklistclose = $('.modalchecklistclose');

        $(modalchecklistopen).on('click', function () {
            $('.modalchecklist').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            getChecklist();
        });

        $(modalchecklistback).on('click', function () {
            $('.modalchecklist').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modalchecklistclose).on('click', function () {
            $('.modalchecklist').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //edit location
        var modallocation = $('.modallocation');
        var modallocationopen = $('.modallocationopen');
        var modallocationback = $('.modallocationback');
        var modallocationclose = $('.modallocationclose');

        $(modallocationopen).on('click', function () {
            $('.modallocation').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            getLocation();
        });

        $(modallocationback).on('click', function () {
            $('.modallocation').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modallocationclose).on('click', function () {
            $('.modallocation').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //edit opertugas
        var modalopertugas = $('.modalopertugas');
        var modalopertugasopen = $('.modalopertugasopen');
        var modalopertugasback = $('.modalopertugasback');
        var modalopertugasclose = $('.modalopertugasclose');

        $(modalopertugasopen).on('click', function () {
            $('.modalopertugas').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            $('#start_date').val('');
            $('#end_date').val('');
            $('#oper_tugas_location_id').val('');
            getUserEmployeeHaveCheckList();
            getUserEmployeeData();
        });

        $(modalopertugasback).on('click', function () {
            $('.modalopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modalopertugasclose).on('click', function () {
            $('.modalopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $('.modalopertugassave').on('click', function () {
            $.ajax({
                type: 'post',
                url: "{{url('/saveOperTugas') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'from_user_id': $("#from_user_id").val(),
                    'to_user_id': $("#to_user_id").val(),
                    'location_id': $("#oper_tugas_location_id").val(),
                    'start_date': $("#start_date").val(),
                    'end_date': $("#end_date").val(),
                    'reason': $("#operTugasReason").val(),
                },
                success: function (data) {
                    $('.modalopertugas').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    popUpMessage('Success Mengalih Tugaskan');
                }
            });
        });

        //edit checklistprogress
        var modalchecklistprogress = $('.modalchecklistprogress');
        var modalchecklistprogressopen = $('.modalchecklistprogressopen');
        var modalchecklistprogressback = $('.modalchecklistprogressback');
        var modalchecklistprogressclose = $('.modalchecklistprogressclose');

        $(document).on("click", "a.modalchecklistprogressopen", function () {
            const activeCheckList = $(this).data("active-check-list");
            const checkListAll = $(this).data("check-list-all");
            const all = $(this).data("all");

            const nameUser = $(this).data("name-user");
            const nameLocation = $(this).data("name-location");
            const photoCheckList = $(this).data("photo");
            const nameOperanTugasUser = $(this).data("name-operan-tugas-user");

            if (nameOperanTugasUser != undefined) {
                $(".nameOperanTugasUser").html('Mengalih Tugaskan dari ' + nameOperanTugasUser);
                $(".nameOperanTugasIcon").show();
            } else {
                $(".nameOperanTugasIcon").hide();
            }

            $(".nameUser").html(nameUser);
            $(".nameLocation").html(nameLocation);
            $(".photoCheckList").attr('src', photoCheckList);

            $("#checkListAllProgress").text(checkListAll);
            $("#activeCheckListProgress").text(activeCheckList);

            var html = '';

            for (var i = 0; i < all.length; i++) {
                let images = '';
                for (let pic in JSON.parse(all[i]['picture'])) {
                    images += '<div class="ri2-block ri2-relative ri2-margintop5"> ' +
                        '<button class="ri2-absolute ri2-center ri2-circle ri2-bgwhite1 ri2-txblack3 new-rotate-button ri2-pointer ri2-nopadding ri2-bordernone"> ' +
                        '<i class="fas fa-undo"></i> </button> ' +
                        '<img src="' + JSON.parse(all[i]['picture'])[pic] + '"class="ri2-fullwidth new-rotate-image new-rotate-north"> </div>'
                }
                const date = new Date(all[i]['updated_at']);
                const name = all[i]['check_list']['name'] != null ? all[i]['check_list']['name'].escape() : "";
                const note = all[i]['note'] != null ? '<div class="ri2-block ri2-relative ri2-margintop5 ri2-italic ri2-font14"><i class="far fa-comment-dots"></i>' + all[i]['note'].escape() + '</div>' : "";
                const status = all[i]['status'] == 1 ? "<i class='far fa-check-square'></i>" : "<i class='far fa-square'></i>";
                const image = all[i]['picture'] != null ? images : "";
                let lastUpdate = '<div class="ri2-block ri2-relative ri2-margintop5 ri2-font14"><i class="far fa-clock"></i> Last updated :' + date.toLocaleString() + '</div>';
                if (all[i]['status'] != 1) {
                    lastUpdate = '';
                }
                html = html + '<div class="ri2-row">' +
                    '<div class="ri2-cell ri2-fit ri2-boxpad10">' + status + '</div>' +
                    '<div class="ri2-cell ri2-boxpad10">' + name + note + image + lastUpdate +
                    '</div></div>';
            }
            $('#checkListProgressAll').html(html);
            $('.modalchecklistprogress').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
        });

        $(modalchecklistprogressback).on('click', function () {
            $('.modalchecklistprogress').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modalchecklistprogressclose).on('click', function () {
            $('.modalchecklistprogress').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //edit tugas note
        var modaltugasnote = $('.modaltugasnote');
        var modaltugasnoteopen = $('.modaltugasnoteopen');
        var modaltugasnoteback = $('.modaltugasnoteback');
        var modaltugasnoteclose = $('.modaltugasnoteclose');

        $(document).on("click", "a.modaltugasnoteopen", function () {
            const checkListProgressId = $(this).attr("data-id");
            const locationId = $(this).data("location");
            const note = $(this).data("note");

            const nameUser = $(this).data("name-user");
            const nameLocation = $(this).data("name-location");
            const photoCheckList = $(this).data("photo");
            const nameOperanTugasUser = $(this).data("name-operan-tugas-user");

            if (nameOperanTugasUser != undefined) {
                $(".nameOperanTugasUser").html('Mengalih Tugaskan dari ' + nameOperanTugasUser);
                $(".nameOperanTugasIcon").show();
            } else {
                $(".nameOperanTugasIcon").hide();
            }

            $(".nameUser").html(nameUser);
            $(".nameLocation").html(nameLocation);
            $(".photoCheckList").attr('src', photoCheckList);
            $("#tugasNoteId").val(checkListProgressId);
            $("#tugasNoteLocation").text(locationId);
            $("#note").text(note);

            $('.modaltugasnote').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
        });

        $(modaltugasnoteback).on('click', function () {
            $('.modaltugasnote').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modaltugasnoteclose).on('click', function () {
            $('.modaltugasnote').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        // open semua on duty
        $('.onduty-open').click(function () {
            $(this).parent().hide();
            $('.onduty-close').parent().show();
            $('.new-parent .new-child').slideDown();
        });
        $('.onduty-close').click(function () {
            $(this).parent().hide();
            $('.onduty-open').parent().show();
            $('.new-parent .new-child:nth-child(n+5)').slideUp();
        });

        // tambah checklist
        $('.tambahchecklistopen').click(function () {
            $(this).hide();
            $(this).siblings().slideDown();
            $("#nameCheckList").val('');
            $('.ubahchecklistopen').parent().parent().slideUp();
        });

        $('.tambahchecklistsave').click(function () {
            $.ajax({
                type: 'post',
                url: "{{url('/storeCheckList') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#nameCheckList").val(),
                },
                success: function (data) {
                    $('.tambahchecklistsave').parent().parent().slideUp();
                    $('.tambahchecklistsave').parent().parent().siblings().show();

                    $('.ubahchecklistopen').parent().parent().slideDown();
                    getChecklist();
                    popUpMessage('Success Tambah CheckList');
                },
            });
        });

        $('.tambahchecklistclose').click(function () {
            $(this).parent().parent().slideUp();
            $(this).parent().parent().siblings().show();
            $('.ubahchecklistopen').parent().parent().slideDown();
        });

        $(document).on("click", "a.ubahchecklistopen", function () {
            $(this).parent().parent().siblings().slideDown();
            $(this).parent().parent().slideUp();
            $("#editIdCheckList").val($(this).attr("data-id"));
            $("#editNameCheckList").val($(this).attr("data-name"));
            $('.tambahchecklistopen').hide();
        });

        $('.ubahchecklistsave').click(function () {
            $.ajax({
                type: 'put',
                url: "{{url('/updateCheckList') }}/" + $("#editIdCheckList").val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#editNameCheckList").val()
                },
                success: function (data) {
                    $('.ubahchecklistsave').parent().parent().slideUp();
                    $('.ubahchecklistopen').parent().parent().slideDown();
                    $('.tambahchecklistopen').show();
                    getChecklist();
                    popUpMessage('Success Edit CheckList');
                },
            });
            $('.tambahchecklistopen').show();
        });

        $('.ubahchecklisthapus').click(function () {
            $(this).parent().parent().slideUp();
            $.ajax({
                type: 'delete',
                url: "{{url('/deleteCheckList') }}/" + $("#editIdCheckList").val(),
                data: {
                    '_token': "{{  csrf_token() }}"
                },
                success: function (data) {
                    $('.ubahchecklistopen').parent().parent().slideDown();
                    $('.tambahchecklistopen').show();
                    getChecklist();
                    popUpMessage('Success Hapus CheckList');
                },
            });
        });
        $('.ubahchecklistclose').click(function () {
            $(this).parent().parent().slideUp();
            $('.ubahchecklistopen').parent().parent().slideDown();
            $('.tambahchecklistopen').show();
        });

        // tambah location
        $('.tambahlocationopen').click(function () {
            $(this).hide();
            $(this).siblings().slideDown();
            $("#namelocation").val('');
            $('.ubahlocationopen').parent().parent().slideUp();
        });

        $('.tambahlocationsave').click(function () {
            $.ajax({
                type: 'post',
                url: "{{url('/storeLocation') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#namelocation").val(),
                },
                success: function (data) {
                    $('.tambahlocationsave').parent().parent().slideUp();
                    $('.tambahlocationsave').parent().parent().siblings().show();
                    $('.ubahlocationopen').parent().parent().slideDown();
                    getLocation();
                    popUpMessage('Success Tambah location');
                },
            });
        });

        $('.tambahlocationclose').click(function () {
            $(this).parent().parent().slideUp();
            $(this).parent().parent().siblings().show();
            $('.ubahlocationopen').parent().parent().slideDown();
        });

        $(document).on("click", "a.ubahlocationopen", function () {
            $(this).parent().parent().siblings().slideDown();
            $(this).parent().parent().slideUp();
            $("#editIdlocation").val($(this).attr("data-id"));
            $("#editNamelocation").val($(this).attr("data-name"));
            $('.tambahlocationopen').hide();
        });

        $('.ubahlocationsave').click(function () {
            $.ajax({
                type: 'put',
                url: "{{url('/updateLocation') }}/" + $("#editIdlocation").val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#editNamelocation").val()
                },
                success: function (data) {
                    $('.ubahlocationsave').parent().parent().slideUp();
                    $('.ubahlocationopen').parent().parent().slideDown();
                    $('.tambahlocationopen').show();
                    getLocation();
                    popUpMessage('Success Edit location');
                    $('.tambahlocationopen').show();
                },
            });
        });

        $('.ubahlocationhapus').click(function () {
            $(this).parent().parent().slideUp();
            $.ajax({
                type: 'delete',
                url: "{{url('/deleteLocation') }}/" + $("#editIdlocation").val(),
                data: {
                    '_token': "{{  csrf_token() }}"
                },
                success: function (data) {
                    $('.ubahlocationopen').parent().parent().slideDown();
                    $('.tambahlocationopen').show();
                    getLocation();
                    popUpMessage('Success Hapus location');
                },
            });
        });
        $('.ubahlocationclose').click(function () {
            $(this).parent().parent().slideUp();
            $('.ubahlocationopen').parent().parent().slideDown();
            $('.tambahlocationopen').show();
        });
        //rotate image
        $(document).on("click", ".new-rotate-button", function () {
            //var img = $('.new-rotate-image');
            if ($(this).next('.new-rotate-image').hasClass('new-rotate-north')) {
                $(this).next('.new-rotate-image').removeClass('new-rotate-north');
                $(this).next('.new-rotate-image').addClass('new-rotate-west');
            } else if ($(this).next('.new-rotate-image').hasClass('new-rotate-west')) {
                $(this).next('.new-rotate-image').removeClass('new-rotate-west');
                $(this).next('.new-rotate-image').addClass('new-rotate-south');
            } else if ($(this).next('.new-rotate-image').hasClass('new-rotate-south')) {
                $(this).next('.new-rotate-image').removeClass('new-rotate-south');
                $(this).next('.new-rotate-image').addClass('new-rotate-east');
            } else if ($(this).next('.new-rotate-image').hasClass('new-rotate-east')) {
                $(this).next('.new-rotate-image').removeClass('new-rotate-east');
                $(this).next('.new-rotate-image').addClass('new-rotate-north');
            }
        });

        // Simpan alert
        $(document).ready(function () {

            var simpan = {
                text: '<i class="far fa-comment-alt ri2-paddingright7"></i>Message',
                timeout: 1500,
                type: 'success',
                theme: 'relax',
                layout: 'topRight',
                closeWith: ['click'],
                maxVisible: 10,
                animation: {
                    open: 'animated bounceInRight', // Animate.css class names
                    close: 'animated bounceOutRight', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 100 // unavailable - no need
                }
            };

            // missing options such as Theme!!
            $('.noty-button').click(function (e) {
                e.preventDefault();
                noty(simpan);
            });

            var hapus = {
                text: '<i class="far fa-comment-alt ri2-paddingright7"></i>Message',
                timeout: 1500,
                type: 'warning',
                theme: 'relax',
                layout: 'topRight',
                closeWith: ['click'],
                maxVisible: 10,
                animation: {
                    open: 'animated bounceInRight', // Animate.css class names
                    close: 'animated bounceOutRight', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 100 // unavailable - no need
                }
            };

            // missing options such as Theme!!
            $('.noty-button-hapus').click(function (e) {
                e.preventDefault();
                noty(hapus);
            });
        });
        $(document).on("change", "#tambahTugasUserId", function () {
            let id = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{url('/getCheckListEmployeeByUserId') }}/" + id,
                success: function (data) {
                    if (data) {
                        $('input[name="days"]').prop('checked', false);
                        $('input[name="check_list_ids"]').prop('checked', false);
                        $("#location_id").val(data['location_id']).change();
                        for (let i in data['checkListEmployeeDetail']) {
                            $('input[name="check_list_ids"][value="' + i + '"]').prop('checked', true);
                            for (let j in data['checkListEmployeeDetail'][i]) {
                                $('input[name="days"][value="' + data['checkListEmployeeDetail'][i][j] + '"]').prop('checked', true);
                            }
                        }
                    } else {
                        $("#location_id").val('').change();
                        $('input[name="days"]').prop('checked', true);
                        $('input[name="check_list_ids"]').prop('checked', true);
                    }
                },
            });

        });

        $("#modaltambahtugassave").click(function () {
            const days = [];
            const check_list_ids = [];
            $("input[name='days']:checked").each(function () {
                days.push(this.value);
            });

            $("input[name='check_list_ids']:checked").each(function () {
                check_list_ids.push(this.value);
            });

            $.ajax({
                type: 'post',
                url: "{{url('/checkListEmployeeSave') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'user_id': $("#tambahTugasUserId").val(),
                    'check_list_ids': check_list_ids,
                    'days': days,
                    'location_id': $("#location_id").val(),
                },
                success: function (data) {
                    $('.modaltambahtugas').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getUserEmployeeData();
                    popUpMessage('Success Tambah Tugas');
                },
            });
        });

        $("#modaltugasnoteedit").click(function () {
            const note = $("#note").val();
            const id = $("#tugasNoteId").val();
            $.ajax({
                type: 'put',
                url: "{{url('/editCheckListProgress') }}/" + id,
                data: {
                    '_token': "{{  csrf_token() }}",
                    'note': note,
                },
                success: function (data) {
                    $('.modaltugasnote').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    popUpMessage('Success Edit Note');
                },
            });
        });

        function getLocation() {
            $.ajax({
                type: 'get',
                url: "{!! url('/getLocation') !!}",
                success: function (data) {
                    var crudLocationIndex = '';
                    let getLocationlocal = '<option value="" selected>Pilih Lokasi</option>';
                    for (i = 0; i < data.length; i++) {
                        crudLocationIndex = crudLocationIndex + '<li> <a class="ubahlocationopen ri2-pointer ri2-linkhover" data-id="' + data[i]['id'] + '" data-name="' + data[i]['name'].escape() + '">' + data[i]["name"].escape() + '</a> </li>';
                        getLocationlocal = getLocationlocal + '<option value="' + data[i]['id'] + '">' + data[i]['name'].escape() + '</option>';
                    };
                    $('#crudLocationIndex').html(crudLocationIndex);
                    $('#location_id').html(getLocationlocal);
                },
            });
        }
        getLocation();
        function in_array_js(array, id) {
            for (let i in array) {
                if (array[i] == id) {
                    return true;
                }
            }
            return false;
        }

        function getChecklist(editDatachecklist) {
            editDatachecklist = editDatachecklist || 0;

            $.ajax({
                type: 'get',
                url: "{{url('/getCheckList') }}",
                success: function (data) {
                    let checkChecked = '';
                    let tambahTugasCheckList = '';
                    let crudCheckListIndex = '';
                    let editTugasCheckList = '';
                    const editTugasChecked = [];
                    if (editDatachecklist != 0) {
                        $.ajax({
                            type: 'get',
                            url: "{{url('/getCheckListProgressDetailByCheckListProgressId') }}/" + editDatachecklist,
                            success: function (datassss) {
                                for (var i in datassss) {
                                    editTugasChecked[editTugasChecked.length] = datassss[i]['check_list_id'];
                                }
                                for (i = 0; i < data.length; i++) {
                                    if (in_array_js(editTugasChecked, data[i]["id"])) {
                                        checkChecked = 'checked';
                                    } else {
                                        checkChecked = "";
                                    }

                                    editTugasCheckList = editTugasCheckList + ' <div class="ri2-block ri2-relative"> ' +
                                        ' <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5"> <label class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14"> ' +
                                        '<input type="checkbox" name="edit_check_list_ids" id="edit_check_list_ids" value="' + data[i]["id"] + '"' + checkChecked + '> ' +
                                        '<span class="ri2-checkmark-text">' + data[i]["name"].escape() + ' </span> <span class="ri2-checkmark"></span> </label> </div> </div>';
                                }
                                $('#editTugasCheckList').html(editTugasCheckList);
                            },
                        });
                    }

                    for (i = 0; i < data.length; i++) {
                        tambahTugasCheckList = tambahTugasCheckList + ' <div class="ri2-block ri2-relative"> ' +
                            ' <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">' +
                            ' <label class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14"> ' +
                            '<input type="checkbox" name="check_list_ids" id="check_list_ids" checked="" value="' + data[i]["id"] + '"> ' +
                            '<span class="ri2-checkmark-text">' + data[i]["name"].escape() + ' </span> <span class="ri2-checkmark"></span> </label> </div> </div>';

                        crudCheckListIndex = crudCheckListIndex + '<li> <a class="ubahchecklistopen ri2-pointer ri2-linkhover" data-id="' + data[i]['id'] + '" data-name="' + data[i]['name'].escape() + '">' + data[i]["name"].escape() + '</a> </li>';
                    }

                    $('#tambahTugasCheckList').html(tambahTugasCheckList);

                    $('#crudCheckListIndex').html(crudCheckListIndex);
                },
            });
        }

        function getUserEmployeeData() {
            $.ajax({
                type: 'get',
                url: "{{url('/getUserEmployee') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["email"] + '" data-designation="'+data[i]["designation"] +'">' + data[i]["name"] + '</option>';
                    }
                    $('#tambahTugasUserId').html(getUserEmployee);
                },
            });
        }

        function getUserEmployeeHaveCheckList() {
            $.ajax({
                type: 'get',
                url: "{{url('/getUserEmployeeHaveCheckList') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["email"] + '" data-designation="'+data[i]["designation"] +'">' + data[i]["name"] + '</option>';
                    }

                    $('#from_user_id').html(getUserEmployee);
                },
            });
        }

        function getUserEmployeeDontHaveCheckList() {
            $.ajax({
                type: 'get',
                url: "{{url('/getUserEmployeeDontHaveCheckList') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["email"] + '" data-designation="'+data[i]["designation"] +'">' + data[i]["name"] + '</option>';
                    }

//                    $('#user_id').html(getUserEmployee);
                },
            });
        }

        function getCheckListEmployeeByUserId(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/getCheckListEmployeeByUserId') }}" + '/' + id,
                success: function (data) {
                    $('#oper_tugas_location_id').val(data['location']['id']);
                    $('#oper_tugas_location_name').val(data['location']['name']);
                    if (data['oper_tugas_from_user']) {
                        getUserCheckListOperTugasToById(id, data['oper_tugas_from_user']['to_user_id']);
                        $('#operTugasReason').val(data['oper_tugas_from_user']['reason']);
                        $('#start_date').val(data['oper_tugas_from_user']['start_date']);
                        $('#end_date').val(data['oper_tugas_from_user']['end_date']);
                    } else {
                        getUserCheckListOperTugasToById(id);
                    }
                },
            });

        }

        function getUserCheckListOperTugasToById(id, selectedUser = null) {
            $.ajax({
                type: 'get',
                url: "{{url('/getUserCheckListOperTugasToById') }}" + '/' + id,
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    let select = '';
                    for (i = 0; i < data.length; i++) {
                        if (selectedUser != null && selectedUser === data[i]["id"]) {
                            select = 'selected';
                        } else {
                            select = '';
                        }
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["email"] + '" data-designation="'+data[i]["designation"] +'" '+ select +'>' + data[i]["name"] + '</option>';
                    };
                    $('#to_user_id').html(getUserEmployee).val(selectedUser).trigger('change');
                    $('#editOperTugasToUserId').html(getUserEmployee);
                },
            });

        }

        function getCheckListProgressDetailByCheckListProgressId(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/getCheckListProgressDetailByCheckListProgressId') }}" + '/' + id,
                success: function (data) {
                    return data;
                },
            });
        }

        function getOnDutyData() {
            $.ajax({
                type: 'get',
                url: "{{url('/getOnDutyData') }}",
                success: function (data) {
                    let onDuty = '';
                    for (var i in data) {
                        if (data[i]["check_list_oper_tugas_id"] !== null && data[i]["check_list_oper_tugas_id"] !== '') {
                            onDuty = onDuty + '<div class="modaleditopertugasopen ri2-floatleft ' +
                                'new-onduty-list new-child ri2-vtop ri2-boxpad15 ri2-box ri2-borderradius5 ri2-borderfull1 ri2-borderwhite3 ri2-pointer" data-id="' + data[i]["check_list_oper_tugas_id"] + '"' +
                                'data-fromUser="' + data[i]["check_list_oper_tugas"]["from_user"]["name"] +
                                '"data-location="' + data[i]["location"]["name"] + '" data-location-id="' + data[i]["location"]["id"] + '" data-from-user-id="' + data[i]["check_list_oper_tugas"]["from_user_id"] + '" data-toUser = "' + data[i]["check_list_oper_tugas"]["to_user_id"] + '"' +
                                ' data-reason ="' + data[i]["check_list_oper_tugas"]["reason"] + '" data-startDate ="' + data[i]["check_list_oper_tugas"]["start_date"] + '" data-endDate = "' + data[i]["check_list_oper_tugas"]["end_date"] + '">' +
                                ' <div class="ri2-block ri2-relative ri2-center ri2-marginbottom10">' +
                                '<div class="ri2-inlineblock ri2-relative"><img src="' + data[i]["check_list_user"]["photo"] + '" class="ri2-circle ri2-vmid ri2-borderfull3 ri2-borderwhite5 new-user-mthumbnail">' +
                                '</div></div><div class="ri2-block ri2-relative ri2-center ri2-txblack3 ri2-font16">' + data[i]["check_list_user"]["name"] + '</div>' +
                                '<div class="ri2-block ri2-relative ri2-center ri2-txgrey1 ri2-font14">' + data[i]["location"]["name"] + ' ' +
                                '<a class="ri2-relative ri2-inlineblock ri2-nowrap ri2-tooltip">' +
                                '<span class="ri2-tooltiptext ri2-normal ri2-linenormal">Mengalih Tugaskan dari ' + data[i]["check_list_oper_tugas"]["from_user"]["name"] + '</span><i class="fas fa-exchange-alt ri2-rotate-45 ri2-txgreen1"></i></a></div></div>';
                        } else {
                            onDuty = onDuty + '<div class="modaledittugasopen ri2-floatleft ' +
                                'new-onduty-list new-child ri2-vtop ri2-boxpad15 ri2-box ri2-borderradius5 ri2-borderfull1 ri2-borderwhite3 ri2-pointer" data-id="' + data[i]["id"] + '"' +
                                ' data-name="' + data[i]["check_list_user"]["name"] + '" data-location="' + data[i]["location_id"] + '"' +
                                'data-note="' + data[i]["note"] + '">' +
                                '<div class="ri2-block ri2-relative ri2-center ri2-marginbottom10">' +
                                '<div class="ri2-inlineblock ri2-relative"><img src="' + data[i]["check_list_user"]["photo"] + '" class="ri2-circle ri2-vmid ri2-borderfull3 ri2-borderwhite5 new-user-mthumbnail">' +
                                '</div></div><div class="ri2-block ri2-relative ri2-center ri2-txblack3 ri2-font16">' + data[i]["check_list_user"]["name"] + '</div>' +
                                '<div class="ri2-block ri2-relative ri2-center ri2-txgrey1 ri2-font14">' + data[i]["location"]["name"] + '</div></div>';
                        }
                    }
                    $("#onDutyData").html(onDuty);
                },
            });
        }

        getOnDutyData();
        getUserEmployeeData();

        $(function () {

            $('#filterChecklistProgressDate').datetimepicker({
                timepicker: false,
                format: 'Y-m-d',
                onSelectDate: function () {
                    let date = $('#filterChecklistProgressDate').val();
                    if (date != "{{ date('Y-m-d') }}") {
                        $.ajax({
                            type: 'get',
                            url: "{{url('/filterChecklistProgressDate') }}/" + date,
                            success: function (data) {
                                if (data) {
                                    $('#allOutput').hide();
                                    $('#searchOutput').show();
                                    $('#searchOutput').html(data);
                                    $('.sendNote').hide();
                                    $('.noteInput').prop('readonly', true);
                                    $('.datatable-table').DataTable();
                                } else {
                                    popUpMessage('Tidak ada Data');
                                    $('#searchOutput').hide();
                                    $('.sendNote').show();
                                    $('.noteInput').prop('readonly', false);
                                    $('#allOutput').show();
                                }

                            },
                        });
                    } else {
                        $('#searchOutput').hide();
                        $('#allOutput').show();
                        $('.noteInput').prop('readonly', false);
                        $('.sendNote').show();
                    }

                }
            });
        });
        $('.basic-twolines_designation').select2({
            templateResult: format_select_designation,
            templateSelection: format_select_designation
        });


        function format_select_designation(opt) {
            var optidesignation = $(opt.element).attr('data-designation');
            if(optidesignation){
                var $opt = $(
                    '<div class="main" style="font-size:14px">'+opt.text+' - <span class="sub" style="font-size:10px; opacity:0.75;">'+optidesignation+'</span></div>'
                );
                return $opt;
            }
        };
    </script>
@endsection
