@extends('layouts.newFront')
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
@section('body')
    <div class="main-wrapper">
        <div class="nav-bar">
            <div class="fd-wrapper">
                <div class="fd-slot"><a href="{{ url('login') }}"><i class="fas fa-arrow-left"></i></a></div>
                <div class="fd-slot"><strong>Daftar Perusahaan</strong></div>
                <div class="fd-slot"></div>
            </div>
        </div>
        <header class="header-login inner">
            <div class="fd-container-full">
                <div class="fd-wrapper">
                    <div class="form-contact">
                        <form class="material-frm" action="{{ route('register') }}" method="post">
                            <div class="fd-wrapper" >
                                @csrf

                                <div class="group-field">
                                    <label class="label">Nama Lengkap</label>
                                    <input class="input-field" name="name" type="text"
                                           placeholder="Masukan Nama Lengkap Anda">
                                </div>
                                <div class="group-field"><label class="label">Nomor Ponsel</label>
                                    <input class="input-field phone-masking" type="text" id="phone-number" style="margin-right: 100px;">
                                    <input type="hidden" name="phone_number" id="phone-number2">
                                    <input type="hidden" name="phone_code" id="phone-code">
                                    <input type="hidden" name="user_phone" id="user-phone">
                                </div>
                                <div class="group-field">
                                    <label class="label">Nama Perusahaan</label>
                                    <input class="input-field" name="company" type="text"
                                           placeholder="Masukan nama perusahaan anda">
                                </div>
                                <div class="group-field">
                                    <label class="label">Email</label>
                                    <input class="input-field" type="email" name="email"
                                           placeholder="Masukan Email Anda">
                                </div>
                                <div class="group-field">
                                    <label class="label">Buat Password</label>
                                    <input name="password" class="input-field" type="password"
                                           placeholder="Masukan Password">
                                </div>
                                <div class="group-field">
                                    <label class="label">Konfirmasi Password</label>
                                    <input class="input-field" type="password" placeholder="Ulangi Password"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <button class="btn btn-green-blue margin-top-20" type="submit">Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
    </div>
@endsection
@section('script')
    <script src="{{ asset('user/scripts/vendor.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('user/scripts/main.js')}}"></script>
    <script src="{{ asset('user/intl-tel-input/build/js/intlTelInput.js')}}"></script>
    <script>
        var input = document.querySelector("#phone-number");
        var iti = window.intlTelInput(input, {
            separateDialCode : true,
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            nationalMode: true,
            utilsScript: "{{ asset('user/intl-tel-input/build/js/utils.js?1585994360633')}}"
            // any initialisation options go here
        });

        document.getElementById('phone-number').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{3})/g, '$1 ').trim();
        });

        var handleChange = function() {
            $('#phone-number2').val(iti.getNumber());
            $('#phone-code').val(iti.getSelectedCountryData().dialCode);
            $('#user-phone').val($("#phone-number").val());
        };

        // listen to "keyup", but also "change" to update when the user selects a country
        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);
    </script>
@endsection
