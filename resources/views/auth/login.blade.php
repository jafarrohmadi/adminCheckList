@extends('layouts.newFront')

@section('body')
    <div class="main-wrapper">
        <header class="header-login">
            <div class="fd-container-full">
                <div class="fd-wrapper">
                    <div class="form-contact"><img src="images/logo.png">
                        <form class="material-frm" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="fd-wrapper">
                                <div class="group-field"><label class="label">Email</label>
                                    <input id="email" type="email"
                                           class="input-field @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus placeholder="Masukan Email Anda">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="group-field"><label class="label">Password</label>
                                    <input class="input-field" name="password" type="password" placeholder="******">
                                </div>
                            </div>
                            <button class="btn btn-green-blue margin-top-20" type="submit">Masuk
                            </button>
                        </form>
                    </div>

                    <div class="footer-option">Belum punya akun perusahaan?
                        <a href="{{url('register')}}" class="_link">Daftar</a></div>
                </div>
            </div>
        </header>
    </div>
@endsection
@section('script')
    <script src="scripts/vendor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/main.js"></script>
    <script>$(document).on("click", ".open-notif", function () {
            $(".new-notification").toggleClass("active"), $(".new-notification-overlay").toggleClass("active")
        }), $(document).on("click", ".new-notification-overlay", function () {
            $(".new-notification").removeClass("active"), $(this).removeClass("active")
        }), $(document).ready(function () {
            $(".phone_masking").mask("(000) 000-0000")
        })</script>
@endsection
