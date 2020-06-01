@extends('layouts.front')

@section('content')
    <style type="text/css">
        body .main-wrapper main {
            max-width: 100%;
        }
    </style>

    <div class="flex-center position-ref full-height">
        <div class="main-wrapper">
            <main>
                <section class="login">
                    <div class="wrapping">
                        <!-- <a class="brand light">Ayoodolist</a> -->
                        <img src="{{url('/images/logo.png')}}" alt="" width="250px" height="250px">
                        <br><br>
                        <div>
                            <form id="sign-in-form" action="#">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text"
                                           id="phone-number" style="color: aliceblue;">
                                    <label class="mdl-textfield__label" for="phone-number" style="color: darkgrey;">
                                        Masukkan no..</label>
                                    <span
                                        class="mdl-textfield__error">masukkan no anda untuk mendapatkan kode OTP!</span>
                                </div>

                                <button class="btn btn-primary" id="sign-in-button">Sign-in</button>
                            </form>

                            <button class="mdl-button mdl-js-button mdl-button--raised" id="sign-out-button">
                                Sign-out
                            </button>
                            <form id="verification-code-form" action="#">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="verification-code"
                                           style="color: aliceblue;">
                                    <label class="mdl-textfield__label" for="verification-code"
                                           style="color: darkgrey;">
                                        Masukkan kode verifikasi...</label>
                                </div>
                                <input type="submit" class="btn btn-success"

                                       id="verify-code-button" value="Verify Code"/>
                                <button style="display: none;" class="btn btn-danger" id="cancel-verify-code-button">
                                    Cancel
                                </button>

                                <div style="display: block;color: darkgrey;" id="waiting_block">
                                    Mohon menunggu <span id="countdown" style="font-size: 14px;">1</span> detik untuk
                                    mengirim kembali kode
                                </div>

                                <div style="display: none; color: darkgrey;" id="sending_once_again_block">
                                    Tidak menerima kode? <span style="color: darkgrey;font-size: 14px;">
                            <a id="resend_verify_code" style="font-size: inherit;">Coba kirim kembali kode</a>
                        </span>
                                </div>

                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default" style="display:none">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Info user</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div><span id="sign-in-status"></span>
                                            <pre><code id="account-details"></code></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    @include('layouts.partials.firebase_config')
@endsection
