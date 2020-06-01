@extends('layouts.front.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/js/intl-tel-input/build/css/intlTelInput.css')}}">
    <style>
        .iti__flag {
            background-image: url("{{ asset('admin/js/intl-tel-input/build/img/flags.png')}}");
        }

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("{{ asset('admin/js/intl-tel-input/build/img/flags@2x.png')}}");
            }
        }
    </style>
@endsection
@section('content')
    <section class="ri-padding20 ri-box">
        <div class="content mediummargin">
            <div class="ri-center ri-paddingtop40 ri-paddingbottom40">
                <h1 class="ri-marginbottom40">Bandingkan paketnya dan pilih yang paling sesuai dengan kebutuhan bisnis
                    Anda</h1>
                <div class="ri-flex tablet-break ri-margintop40">
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-pricing">
                            <h2>Demo</h2>
                            <ul class="list-card">
                                <li>Checklist Tugas</li>
                                <li>Real Time Report</li>
                                <li>Multiple Attachment (Foto)</li>
                                <li>Catatan Tambahan Dari Tugas</li>
                                <li>History Tugas</li>
                                <li>Notifikasi Dari Atasan</li>
                                <li>E-Guidance</li>
                            </ul>
                            <hr>
                            <p>Jumlah Pemakai: 10 User</p>
                            <p>Periode: 6 Bulan</p>

                            <button class="modalfreeopen ri-button btn btn-primary srounded inline">COBA GRATIS</button>
                        </div>
                    </div>
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-pricing">
                            <h2>Basic</h2>
                            <ul class="list-card">
                                <li>Checklist Tugas</li>
                                <li>Real Time Report</li>
                                <li>Multiple Attachment (Foto)</li>
                                <li>Catatan Tambahan Dari Tugas</li>
                                <li>History Tugas</li>
                                <li>Notifikasi Dari Atasan</li>
                            </ul>
                            <hr>
                            <p>Jumlah Pemakai: 10 User</p>
                            <p>Periode: 3 Bulan</p>

                            <button class="modalcontactopen ri-button btn btn-primary srounded inline">CONTACT US
                            </button>
                        </div>
                    </div>
                    <div class="flex1 card-content ri-center">
                        <div class="card-pricing">
                            <p class="pricing-pop">MOST POPULAR</p>
                            <h2>Premium</h2>
                            <ul class="list-card">
                                <li>Checklist Tugas</li>
                                <li>Real Time Report</li>
                                <li>Multiple Attachment (Foto)</li>
                                <li>Catatan Tambahan Dari Tugas</li>
                                <li>History Tugas</li>
                                <li>Notifikasi Dari Atasan</li>
                                <li>E-Guidance</li>
                            </ul>
                            <hr>
                            <p>Jumlah Pemakai: 50 User</p>
                            <p>Periode: 6 Bulan</p>

                            <button class="modalcontactopen ri-button btn btn-primary srounded inline">CONTACT US
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ri-flex tablet-break ri-margintop40">
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-pricing">
                            <h2>Customize</h2>
                            <p>Kami juga menyediakan solusi bagi perusahaan Anda yang ingin memodifikasi dan menambahkan
                                beberapa fitur didalam aplikasi Ayoochecklist.</p>

                            <button class="modalcontactopen ri-button btn btn-primary srounded inline">CONTACT US
                            </button>
                        </div>
                    </div>
                    <div class="flex1 ri-marginright40"></div>
                    <div class="flex1 ri-marginright40"></div>
                </div>
            </div>
        </div>
    </section>

    <div class="ri-scrolltop"><i class="fas fa-arrow-up"></i></div>

    <div class="modalfree modal-body ri-modal">
        <div class="container">
            <div class="center">
                <div class="back modalclose"></div>
                <div class="content small">
                    <div class="header">
                        <div class="title">
                            Form coba gratis
                        </div>
                        <div class="close modalclose">
                            <a><i class="far fa-times-circle"></i></a>
                        </div>
                    </div>
                    <div class="xk_boxthanks new-horizontal600 ri2-centercontent ri2-block ri2-relative"
                         style="display:none;padding: 40px;">
                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-center">
                            <img src="{{ asset('compro/img/frontpage-icon4.png') }}" style="width: 40px;">
                            <h1 title="" class="ri2-txgreen1 ri2-font24 ri2-mobilefont28 ri2-marginbottom20">Email
                                Terkirim</h1>
                            <p title="" class="ri2-txblack3 ri2-font16 ri2-mobilefont14 ri2-line28 new-noto">
                                Terima kasih atas email dari anda. Kami akan menghubungi anda secepatnya
                            </p>
                        </div>
                    </div>
                    <div class="xk_boxform">
                        <form action="{{ url('contactUs') }}" method="post" id="form_request_demo">
                            @csrf
                            <input type="hidden" name="type" value="free">
                            <div class="body">
                                <div class="ri-padding30">
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="name" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="email" name="email" placeholder="Alamat Email" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="company_name" placeholder="Nama perusahaan"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="country" placeholder="Kota" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="valued">
                                            <div class="field">
                                                <select class="basic-single" name="count_employee" required>
                                                    <option value="">Jumlah Karyawan</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" class="upd_a" id="phone_a" name="mobile_init"
                                                   placeholder="Masukan Nomor" required maxlength="50">

                                            <input id="phone_code_a" name="phone_code" type="hidden">
                                            <input id="mobile_a" name="mobile" type="hidden">
                                        </div>
                                    </div>
                                    <p>Dengan klik coba gratis, anda menyetujui
                                        Syarat dan Ketentuan serta Kebijakan Privasi Ayoochecklist.</p>
                                    <button class="ri-button grey inline full srounded">Coba Gratis</button>
                                </div>
                                <div class="ri-block ri-center">
                                    <p>2020 © Ayoochecklist.com ALL Rights Reserved</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modalcontact modal-body ri-modal">
        <div class="container">
            <div class="center">
                <div class="back modalclose"></div>
                <div class="content small">
                    <div class="header">
                        <div class="title">
                            Contact Us
                        </div>
                        <div class="close modalclose">
                            <a><i class="far fa-times-circle"></i></a>
                        </div>
                    </div>

                    <div class="xk_boxthanks new-horizontal600 ri2-centercontent ri2-block ri2-relative"
                         style="display:none;padding: 40px;">
                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-center">
                            <img src="{{ asset('compro/img/frontpage-icon4.png') }}" style="width: 40px;">
                            <h1 title="" class="ri2-txgreen1 ri2-font24 ri2-mobilefont28 ri2-marginbottom20">Email
                                Terkirim</h1>
                            <p title="" class="ri2-txblack3 ri2-font16 ri2-mobilefont14 ri2-line28 new-noto">
                                Terima kasih atas email dari anda. Kami akan menghubungi anda secepatnya
                            </p>
                        </div>
                    </div>

                    <div class="xk_boxform">
                        <form action="{{url('contactUs')}}" method="post" id="form_request_contact">
                            @csrf
                            <input type="hidden" name="type" value="paid">
                            <div class="body">
                                <div class="ri-padding30">
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="name" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="email" name="email" placeholder="Alamat Email" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="company_name" placeholder="Nama perusahaan"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="country" placeholder="Kota" required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" name="count_employee" placeholder="Jumlah Karyawan"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="ri-form-group">
                                        <div class="basic">
                                            <input type="text" class="upd_b" id="phone_b" name="mobile_init"
                                                   placeholder="Masukan Nomor" maxlength="50">

                                            <input id="phone_code_b" name="phone_code" type="hidden">
                                            <input id="mobile_b" name="mobile" type="hidden">
                                        </div>
                                    </div>
                                    <p>Dengan klik contact us, anda menyetujui
                                        Syarat dan Ketentuan serta Kebijakan Privasi Ayoochecklist.</p>
                                    <button class="ri-button grey inline full srounded">Contact Us</button>

                                </div>
                                <div class="ri-block ri-center">
                                    <p>2020 © Ayoochecklist.com ALL Rights Reserved</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <!-- call select2 js vendor-->
    <script type="text/javascript" src="{{ asset('compro/js/scrolltop.js')}}"></script>
    <script type="text/javascript" src="https://ux.ayooproject.com/ri-module/js/modal.js"></script>
    <script type="text/javascript" src="{{ asset('compro/js/main.js')}}"></script>
    <script src="{{ asset('admin/js/intl-tel-input/build/js/intlTelInput.js')}}"></script>
    <script src="{{ asset('admin/js/loadingoverlay/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('admin/js/loadingoverlay/loadingoverlay_progress.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            //Modal
            $(document).on('click', '.modalfreeopen', function () {
                var modal = '.' + modalclasstrim($(this));
                props_show(modal);
            });

            $(document).on('click', '.modalcontactopen', function () {
                var modal = '.' + modalclasstrim($(this));
                props_show(modal);
            });

            $(document).on("submit", "form#form_request_demo", function (event) {
                event.preventDefault();
                var the_data = $(this).serialize();
                console.log(the_data);
                $("body").LoadingOverlay("show");
                var the_url = "{{ url('/contactUs') }}";
                $.ajax({
                    url: the_url,
                    type: "post",
                    enctype: 'multipart/form-data',
                    data: the_data,
                    success: function (data) {
                    }, error: function (e) {
                    }
                }).done(function () {
                    console.log("success");
                })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        $("body").LoadingOverlay("hide");
                        $('.xk_boxthanks').slideDown();
                        $('.xk_boxform').slideUp();
                    });

            });

            $(document).on("submit", "form#form_request_contact", function (event) {
                event.preventDefault();
                var the_data = $(this).serialize();
                console.log(the_data);
                $("body").LoadingOverlay("show");
                var the_url = "{{ url('/contactUs') }}";
                $.ajax({
                    url: the_url,
                    type: "post",
                    enctype: 'multipart/form-data',
                    data: the_data,
                    success: function (data) {
                    }, error: function (e) {
                    }
                }).done(function () {
                    console.log("success");
                })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        $("body").LoadingOverlay("hide");
                        $('.xk_boxthanks').slideDown();
                        $('.xk_boxform').slideUp();
                    });

            });
        })
        ;

        var input_a = document.querySelector("#phone_a");
        var iti_a = window.intlTelInput(input_a, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get("https://json.geoiplookup.io", function (resp) {
                    var countryCode = (resp && resp.country_code) ? resp.country_code : "";
                    callback(countryCode);
                });
            },
            nationalMode: true,
            utilsScript: "{{ asset('/js/tellinput/utils.js') }}",
        });

        document.getElementById('phone_a').addEventListener('input_a', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{3})/g, '$1').trim();
        });

        var input_b = document.querySelector("#phone_b");
        var iti_b = window.intlTelInput(input_b, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get("https://json.geoiplookup.io", function (resp) {
                    var countryCode = (resp && resp.country_code) ? resp.country_code : "";
                    callback(countryCode);
                });
            },
            nationalMode: true,
            utilsScript: "{{ asset('/js/tellinput/utils.js') }}",
        });

        document.getElementById('phone_b').addEventListener('input_b', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{3})/g, '$1').trim();
        });


        function upd_a() {
            $('#phone_code_a').val(iti_a.getSelectedCountryData().dialCode);
            $('#mobile_a').val(iti_a.getNumber());
        }

        function upd_b() {
            $('#phone_code_b').val(iti_b.getSelectedCountryData().dialCode);
            $('#mobile_b').val(iti_b.getNumber());
        }

        input_a.addEventListener("countrychange", function () {
            upd_a();
        });

        input_b.addEventListener("countrychange", function () {
            upd_b();
        });

    </script>

@endsection
