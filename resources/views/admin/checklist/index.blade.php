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
                    class="modalchecklistopen new-ba-toolbar ri2-inlineblock ri2-vmid ri2-circle ri2-borderfull1 ri2-bordergreen1 ri2-circle ri2-bgwhite1 ri2-txblack3 ri2-center ri2-font16 ri2-nopadding ri2-pointer ri2-tooltip ri2-relative ri2-nowrap ri2-linkhover">
                    <span class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Checklist</span><i
                        class="fas fa-tasks"></i>
                </button>
                @include('admin.checklist.checklist')
                <button
                    class="modalopertugasopen new-ba-toolbar ri2-inlineblock ri2-vmid ri2-circle ri2-borderfull1 ri2-bordergreen1 ri2-circle ri2-bgwhite1 ri2-txblack3 ri2-center ri2-font16 ri2-nopadding ri2-pointer ri2-tooltip ri2-relative ri2-nowrap ri2-linkhover">
                    <span class="ri2-lefttooltiptext ri2-normal ri2-linenormal">Oper Tugas</span><i
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
                    <div
                        class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div
                        class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                            Checklist Progress
                        </div>
                    </div>
                    <div class="ri2-block ri2-relative">
                        <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                            <div class="ri2-block ri2-relative ri2-overflowauto ri2-paddingbottom20"
                                 data-simplebar data-simplebar-auto-hide="false">
                                <table class="display datatable-table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="fit">No</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Lokasi</th>
                                        <th>Progress</th>
                                        <th>Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkListProgress as $checkListProgres)
                                        <tr>
                                            <td>{{ $checkListProgres->id }}</td>
                                            <td>
                                                <div class="ri2-inlineblock ri2-relative ri2-vmid ri2-marginright7">
                                                    <img src="{{ asset('admin/image/user1.jpg') }}"
                                                         class="new-user-sthumbnail ri2-inlineblock ri2-circle ri2-vmid">
                                                </div>
                                                <span
                                                    class="new-datatable-nowrap new-datatable-male">
                                                    {{ $checkListProgres->name }}
                                                </span>
                                            </td>
                                            <td>{{ (new Helper)->tanggal_indo(date('Y-m-d', strtotime($checkListProgres->date))) }}</td>
                                            <td>{{ $checkListProgres->location->name }}</td>
                                            <td>{{ $checkListProgres->activeCheckListProgressDetail }}
                                                /{{ $checkListProgres->check_list_progress_detail_count }}
                                                <a
                                                    class="modalchecklistprogressopen ri2-txgrey1 ri2-marginleft5 ri2-pointer ri2-linkhover ri2-relative ri2-nowrap ri2-tooltip"
                                                    data-active-check-list="{{ $checkListProgres->activeCheckListProgressDetail }}"
                                                    data-check-list-all="{{ $checkListProgres->check_list_progress_detail_count }}"
                                                    data-all="{{ $checkListProgres->checkListProgressDetail }}"
                                                ><span
                                                        class="ri2-lefttooltiptext">Detail Checklist</span><i
                                                        class="fas fa-search"></i></a></td>
                                            <td>
                                                <a class="modaltugasnoteopen ri2-pointer ri2-linkhover ri2-relative ri2-nowrap ri2-tooltip ri2-txgrey1"
                                                   data-id="{{$checkListProgres->id}}"
                                                   data-location="{{ $checkListProgres->location->name }}"
                                                   data-note="{{$checkListProgres->note}}"><span
                                                        class="ri2-lefttooltiptext">Berikan Catatan</span><i
                                                        class="fas fa-pen"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </a>
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
        let editOperTugasCheckList;
        //datatable
        $('.datatable-table').DataTable();
        //date
        $('.datetimepicker').datetimepicker();

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
            getUserEmployeeDontHaveCheckList();
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
            $('#editTugasLocationId').val(locationId);
            $('#editTugasNote').val(editTugasNote);
            $('.modaledittugas').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            edit = getCheckListProgressDetailByCheckListProgressId(id);
            getChecklist(edit);
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
                url: "{{url('/site/checkListProgressDetailEditById') }}/" + $('#editTugasId').val(),
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
                    popUpMessage('Success Tambah CheckList');
                },
            })
        });

        $('.modaledittugasdelete').on('click', function () {
            $.ajax({
                type: 'delete',
                url: "{{url('/site/checkListProcessDelete') }}/" + $('#editTugasId').val(),
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

        $(modaleditopertugasopen).on('click', function () {
            $('.modaleditopertugas').css('display', 'block');
            $('#start_date').val();
            $('#end_date').val();
            $('#oper_tugas_location_id').val();

            $('body', 'html').css('overflow', 'hidden');
        });

        $(modaleditopertugasback).on('click', function () {
            $('.modaleditopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
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
            $('.modalopertugas').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
            $.ajax({
                type: 'post',
                url: "{{url('/site/saveOperTugas') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'from_user_id': $("#from_user_id").val(),
                    'to_user_id': $("#to_user_id").val(),
                    'location_id': $("#oper_tugas_location_id").val(),
                    'start_date': $("#start_date").val(),
                    'end_date': $("#end_date").val(),
                },
                success: function (data) {
                    $('.ubahchecklistopen').parent().parent().slideDown();
                    getChecklist();
                    popUpMessage('Success Tambah CheckList');
                },
            });
        });

        //edit checklistprogress
        var modalchecklistprogress = $('.modalchecklistprogress');
        var modalchecklistprogressopen = $('.modalchecklistprogressopen');
        var modalchecklistprogressback = $('.modalchecklistprogressback');
        var modalchecklistprogressclose = $('.modalchecklistprogressclose');

        $(modalchecklistprogressopen).on('click', function () {
            const activeCheckList = $(".modalchecklistprogressopen").data("active-check-list");
            const checkListAll = $(".modalchecklistprogressopen").data("check-list-all");
            const all = $(".modalchecklistprogressopen").data("all");

            $("#checkListAllProgress").text(checkListAll);
            $("#activeCheckListProgress").text(activeCheckList);
            var html = '';

            for (var i = 0; i < all.length; i++) {
                const name = all[i]['check_list']['name'] != null ? all[i]['check_list']['name'] : "";
                const note = all[i]['note'] != null ? '<div class="ri2-block ri2-relative ri2-margintop5 ri2-italic ri2-font14"><i class="far fa-comment-dots"></i>' + all[i]['check_list']['note'] + '</div>' : "";
                const status = all[i]['status'] == 1 ? "<i class='far fa-check-square'></i>" : "<i class='far fa-square'></i>";
                const image = all[i]['picture'] != null ? '<div class="ri2-block ri2-relative ri2-margintop5"> ' +
                    '<buttonclass="ri2-absolute ri2-center ri2-circle ri2-bgwhite1 ri2-txblack3 new-rotate-button ri2-pointer ri2-nopadding ri2-bordernone"> ' +
                    '<i class="fas fa-undo"></i> </button> ' +
                    '<img src="' + all[i]['picture'] + '"class="ri2-fullwidth new-rotate-image new-rotate-north"> </div>' : "";
                html = html + '<div class="ri2-row">' +
                    '<div class="ri2-cell ri2-fit ri2-boxpad10">' + status + '</div>' +
                    '<div class="ri2-cell ri2-boxpad10">' + name + note + image +
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

        $(modaltugasnoteopen).on('click', function () {
            const checkListProgressId = $(".modaltugasnoteopen").data("id");
            const locationId = $(".modaltugasnoteopen").data("location");
            const note = $(".modaltugasnoteopen").data("note");
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
            $(this).parent().parent().slideUp();
            $(this).parent().parent().siblings().show();

            $.ajax({
                type: 'post',
                url: "{{url('/site/storeCheckList') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#nameCheckList").val(),
                },
                success: function (data) {
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
            $(this).parent().parent().slideUp();
            $('.ubahchecklistopen').parent().parent().slideDown();
            $.ajax({
                type: 'put',
                url: "{{url('/site/updateCheckList') }}/" + $("#editIdCheckList").val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#editNameCheckList").val()
                },
                success: function (data) {
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
                url: "{{url('/site/deleteCheckList') }}/" + $("#editIdCheckList").val(),
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

        //rotate image
        $('.new-rotate-button').click(function () {
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
                console.log(simpan);
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
                console.log(hapus);
                e.preventDefault();
                noty(hapus);
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
                url: "{{url('/site/checkListEmployeeSave') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'user_id': $("#user_id").val(),
                    'check_list_ids': check_list_ids,
                    'days': days,
                    'location_id': $("#location_id").val(),
                },
                success: function (data) {
                    $('.modaltambahtugas').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getUserEmployeeDontHaveCheckList();
                    popUpMessage('Success Tambah Checklist');
                },
            });
        });

        $("#modaltugasnoteedit").click(function () {
            const note = $("#note").val();
            const id = $("#tugasNoteId").val();
            $.ajax({
                type: 'put',
                url: "{{url('/site/editCheckListProgress') }}/" + id,
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

        function getChecklist(editDatachecklist) {
            editDatachecklist = editDatachecklist || 0;
            console.log(editDatachecklist);
            $.ajax({
                type: 'get',
                url: "{{url('/site/getCheckList') }}",
                success: function (data) {
                    let tambahTugasCheckList = '';
                    let crudCheckListIndex = '';
                    let editTugasCheckList = '';
                    let editTugasChecked = [];

                    if (editDatachecklist != 0) {
                        console.log(JSON.parse(editDatachecklist));
                        for (var i in editDatachecklist) {
                            editTugasChecked[i] = editDatachecklist[i]['check_list_id'];
                        }
                    }

                    for (i = 0; i < data.length; i++) {
                        tambahTugasCheckList = tambahTugasCheckList + ' <div class="ri2-block ri2-relative"> ' +
                            ' <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5">' +
                            ' <label class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14"> ' +
                            '<input type="checkbox" name="check_list_ids" id="check_list_ids" checked="" value="' + data[i]["id"] + '"> ' +
                            '<span class="ri2-checkmark-text">' + data[i]["name"] + ' </span> <span class="ri2-checkmark"></span> </label> </div> </div>';

                        crudCheckListIndex = crudCheckListIndex + '<li> <a class="ubahchecklistopen ri2-pointer ri2-linkhover" data-id="' + data[i]['id'] + '" data-name="' + data[i]['name'] + '">' + data[i]["name"] + '</a> </li>';

                        if (editTugasChecked.indexOf(data[i]["id"]) > -1) {
                            checkChecked = 'checked=""';
                        } else {
                            checkChecked = "";
                        }

                        editTugasCheckList = editTugasCheckList + ' <div class="ri2-block ri2-relative"> ' +
                            ' <div class="ri2-block ri2-relative ri2-checkbox ri2-marginbottom5"> <label class="ri2-checkbox-container ri2-txblack3 ri2-paddingleft30 ri2-pointer ri2-font14 ri2-line14"> ' +
                            '<input type="checkbox" name="edit_check_list_ids" id="edit_check_list_ids" value="' + data[i]["id"] + '"' + checkChecked + '> ' +
                            '<span class="ri2-checkmark-text">' + data[i]["name"] + ' </span> <span class="ri2-checkmark"></span> </label> </div> </div>';
                    }

                    $('#tambahTugasCheckList').html(tambahTugasCheckList);
                    $('#editTugasCheckList').html(editTugasCheckList);
                    $('#crudCheckListIndex').html(crudCheckListIndex);
                },
            });
        }

        function getUserEmployeeData() {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getUserEmployee') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["nik"] + '">' + data[i]["name"] + '</option>';
                    }

                    $('#to_user_id').html(getUserEmployee);
                },
            });
        }

        function getUserEmployeeHaveCheckList() {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getUserEmployeeHaveCheckList') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["nik"] + '">' + data[i]["name"] + '</option>';
                    }

                    $('#from_user_id').html(getUserEmployee);
                },
            });
        }

        function getUserEmployeeDontHaveCheckList() {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getUserEmployeeDontHaveCheckList') }}",
                success: function (data) {
                    let getUserEmployee = '<option value="" selected>Pilih Personel</option>';
                    for (i = 0; i < data.length; i++) {
                        getUserEmployee = getUserEmployee + '<option value="' + data[i]["nik"] + '">' + data[i]["name"] + '</option>';
                    }

                    $('#user_id').html(getUserEmployee);
                },
            });
        }

        function getCheckListEmployeeByUserId(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getCheckListEmployeeByUserId') }}" + '/' + id,
                success: function (data) {
                    $('#oper_tugas_location_id').val(data['location']['name']);
                },
            });
        }
        function getCheckListProgressDetailByCheckListProgressId(id) {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getCheckListProgressDetailByCheckListProgressId') }}" + '/' + id,
                success: function (data) {
                    return data;
                },
            });
        }


        function getOnDutyData() {
            $.ajax({
                type: 'get',
                url: "{{url('/site/getOnDutyData') }}",
                success: function (data) {
                    let onDuty = '';
                    for (var i in data) {
                        onDuty = onDuty + '<div class="modaledittugasopen ri2-floatleft ' +
                            'new-onduty-list new-child ri2-vtop ri2-boxpad15 ri2-box ri2-borderradius5 ri2-borderfull1 ri2-borderwhite3 ri2-pointer" data-id="' + data[i]["id"] + '"' +
                            ' data-name="' + data[i]["name"] + '" data-location="' + data[i]["location_id"] + '"' +
                            'data-note="' + data[i]["note"] + '">' +
                            '<div class="ri2-block ri2-relative ri2-center ri2-marginbottom10">' +
                            '<div class="ri2-inlineblock ri2-relative"><img src="{{ asset("admin/image/user1.jpg") }}" class="ri2-circle ri2-vmid ri2-borderfull3 ri2-borderwhite5 new-user-mthumbnail">' +
                            '</div></div><div class="ri2-block ri2-relative ri2-center ri2-txblack3 ri2-font16">' + data[i]["name"] + '</div>' +
                            '<div class="ri2-block ri2-relative ri2-center ri2-txgrey1 ri2-font14">' + data[i]["location"]["name"] + '</div></div>';
                    }
                    $("#onDutyData").html(onDuty);
                },
            });
        }

        getOnDutyData();
        getUserEmployeeData();
    </script>
@endsection
