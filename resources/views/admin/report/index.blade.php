@extends('layouts.admin.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('user/intl-tel-input/build/css/intlTelInput.css')}}">
    <style>
        .iti__flag {
            background-image: url("{{ asset('user/intl-tel-input/build/img/flags.png')}}");
        }

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ asset('user/intl-tel-input/build/img/flags@2x.png')}}");
            }
        }
    </style>
@endsection
@section('content')
    <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
        <div class="ri2-table ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <div class="ri2-table ri2-font18 ri2-semibold">
                    <div class="ri2-cell ri2-paddingright10 ri2-borderright1 ri2-bordergrey2">
                        <a href="" class="ri2-tooltip ri2-nowrap ri2-relative"><span class="ri2-righttooltiptext">Halaman Sebelum</span><i
                                    class="fas fa-chevron-circle-left ri2-txblack5 ri2-linkhover"></i></a>
                    </div>
                    <div class="ri2-cell ri2-paddingleft10">
                        Report Data Pekerjaan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--modal buat group kerja-->
    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-bgwhite2">
        <div class="ri2-table ri2-relative ri2-fullwidth">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <a class="modalreportopen new-toolbarbutton ri2-inlineblock new-ocean-gradient ri2-font14 ri2-mobilefont12 ri2-semibold ri2-txwhite1 ri2-pointer ri2-hovering"><i
                            class="far fa-file-alt"></i> Report</a>
                <div class="modalreport ri2-modal ri2-fixed ri2-fullwidth ri2-fullheight">
                    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
                        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
                            <div class="modalreportback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
                            <div class="ri2-modal-content ri2-relative new-modal-content">
                                <div
                                        class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-marginbottom15 ri2-borderradius2 ri2-overflowhidden">
                                    <div
                                            class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
                                        Report
                                    </div>
                                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                            <div
                                                    class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                Waktu
                                            </div>
                                            <div class="ri2-inlineblock ri2-fullwidth ri2-relative ri2-radio">
                                                <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                    <input type="radio" checked="checked" name="radio3" value="all">
                                                    <span class="radio-text">Semua Waktu</span>
                                                    <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                </label>
                                                <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                    <input type="radio" name="radio3" value="period">
                                                    <span class="radio-text">Periode</span>
                                                    <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="ri2-block ri2-relative ri2-margintop20">
                                                <div class="ri2-table ri2-relative ri2-fullwidth">
                                                    <div class="ri2-cell ri2-vmid ri2-halfwidth">
                                                        <input type="text"
                                                               class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss datetimepicker"
                                                               autocomplete="off" name="time" id="startDate"
                                                               placeholder="YYYY/MM/DD H:M" maxlength="20" required>
                                                    </div>
                                                    <div class="ri2-cell ri2-vmid ri2-paddingleft10 ri2-halfwidth">
                                                        <input type="text"
                                                               class="ri2-input40 ri2-box ri2-fullwidth ri2-paddingleft10 ri2-paddingright10 ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 form-control diss datetimepicker"
                                                               autocomplete="off" name="time" id="endDate"
                                                               placeholder="YYYY/MM/DD H:M" maxlength="20" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ri2-block ri2-relative ri2-left">
                                            <button
                                                    class="export-button modalreportclose ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                                                Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ri2-block ri2-relative ri2-center">
                                    <div
                                            class="modalreportclose ri2-inlineblock ri2-relative ri2-modal-close ri2-txwhite1 ri2-semibold ri2-font18 ri2-pointer ri2-linkhoveryellow1">
                                        <i class="fas fa-times-circle"></i> Tutup
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    @include('admin.report.checklistProgressList', ['checkListProgress' => $checkListProgress])
                                </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var table = $('.datatable-table').DataTable();
        $('.datetimepicker').datetimepicker();
        $(function () {

            $('#filterChecklistProgressDate').datetimepicker({
                timepicker: false,
                format: 'Y-m-d',
                onSelectDate: function () {
                    let date = $('#filterChecklistProgressDate').val();
                    $.ajax({
                        type: 'get',
                        url: "{{url('/report/filterChecklistProgressDate') }}/" + date,
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

                }
            });
        });

        var modalreport = $('.modalreport');
        var modalreportopen = $('.modalreportopen');
        var modalreportback = $('.modalreportback');
        var modalreportclose = $('.modalreportclose');

        $(modalreportopen).on('click', function () {
            $('.modalreport').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
        });

        $(modalreportback).on('click', function () {
            $('.modalreport').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modalreportclose).on('click', function () {
            $('.modalreport').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });
        $('#startDate').hide();
        $('#endDate').hide();
        $("input:radio[name=radio3]").change(function () {
            if ($(this).val() == 'period') {
                $('#startDate').show();
                $('#endDate').show();
            }

            if ($(this).val() == 'all') {
                $('#startDate').hide();
                $('#endDate').hide();
            }
        });

        $('.export-button').click(function () {

            if ($('#startDate').val() != null) {
                window.open("{{'report/reportDownload'}}?startDate=" + $('#startDate').val() + '&endDate=' + $('#endDate').val(), '_blank');
            } else {
                window.open("{{'report/reportDownload'}}", '_blank');
            }
        });

    </script>
@endsection
