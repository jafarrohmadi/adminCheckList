<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var config = {
        apiKey: "AIzaSyD1P4lrH34Ye-djruMLhMms4FZCmYBLJi8",
        authDomain: "registration-fd1c6.firebaseapp.com",
        databaseURL: "https://registration-fd1c6.firebaseio.com",
        projectId: "registration-fd1c6",
        storageBucket: "registration-fd1c6.appspot.com",
        messagingSenderId: "201760200614",
        appId: "1:201760200614:web:40dc2eb978d59516c9e167",
        measurementId: "G-CDN4B5ZBLH"
    };
    firebase.initializeApp(config);

    var database = firebase.database();

    window.onload = function () {
        var auth = "{{ Auth::user() }}";
        if (auth == '') {
            onSignOutClick();
        }
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                var uid = user.uid;
                var email = user.email;
                var photoURL = user.photoURL;
                var phoneNumber = user.phoneNumber;
                var isAnonymous = user.isAnonymous;
                var displayName = user.displayName;
                var providerData = user.providerData;
                var emailVerified = user.emailVerified;
            }
            updateSignInButtonUI();
            updateSignInFormUI();
            updateSignOutButtonUI();
            updateSignedInUserStatusUI();
            updateVerificationCodeFormUI();
        });

        document.getElementById('sign-out-button').addEventListener('click', onSignOutClick);
        document.getElementById('phone-number').addEventListener('keyup', updateSignInButtonUI);
        document.getElementById('phone-number').addEventListener('change', updateSignInButtonUI);
        document.getElementById('verification-code').addEventListener('keyup', updateVerifyCodeButtonUI);
        document.getElementById('verification-code').addEventListener('change', updateVerifyCodeButtonUI);
        document.getElementById('verification-code-form').addEventListener('submit', onVerifyCodeSubmit);
        document.getElementById('cancel-verify-code-button').addEventListener('click', cancelVerification);
        document.getElementById('resend_verify_code').addEventListener('click', cancelVerification);

        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
            'size': 'invisible',
            'callback': function (response) {
                onSignInSubmit();
            }
        });

        recaptchaVerifier.render().then(function (widgetId) {
            window.recaptchaWidgetId = widgetId;
            updateSignInButtonUI();
        });
    };

    //kirim OTP
    function onSignInSubmit() {
        if (isPhoneNumberValid()) {
            window.signingIn = true;
            updateSignInButtonUI();
            var phoneNumber = getPhoneNumberFromUserInput();
            var appVerifier = window.recaptchaVerifier;
            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function (confirmationResult) {
                    console.log(confirmationResult);
                    window.confirmationResult = confirmationResult;
                    window.signingIn = false;
                    updateSignInButtonUI();
                    updateVerificationCodeFormUI();
                    updateVerifyCodeButtonUI();
                    updateSignInFormUI();
                    timeLimitOpt();
                }).catch(function (error) {
                console.error('Error during signInWithPhoneNumber', error);
                window.alert('Error during signInWithPhoneNumber:\n\n'
                    + error.code + '\n\n' + error.message);
                window.signingIn = false;
                updateSignInFormUI();
                updateSignInButtonUI();
            });
        }
    }

    //verifikasi kode
    function onVerifyCodeSubmit(e) {
        e.preventDefault();
        if (!!getCodeFromUserInput()) {
            window.verifyingCode = true;
            updateVerifyCodeButtonUI();
            var code = getCodeFromUserInput();
            confirmationResult.confirm(code).then(function (result) {
                //login sukses
                var user = result.user;
                checkUser(user.phoneNumber, user.uid);
                window.verifyingCode = false;
                window.confirmationResult = null;
                updateVerificationCodeFormUI();
            }).catch(function (error) {
                console.error('Error while checking the verification code', error);
                window.alert('Error while checking the verification code:\n\n'
                    + error.code + '\n\n' + error.message);
                window.verifyingCode = false;
                updateSignInButtonUI();
                updateVerifyCodeButtonUI();
            });
        }
    }

    //cencel
    function cancelVerification(e) {
        e.preventDefault();
        $("#waiting_block").css({"display": "none"});
        $("#sending_once_again_block").css({"display": "none"});
        window.confirmationResult = null;
        updateVerificationCodeFormUI();
        updateSignInFormUI();
    }

    function onSignOutClick() {
        firebase.auth().signOut();
    }

    function getCodeFromUserInput() {
        return document.getElementById('verification-code').value;
    }

    function getPhoneNumberFromUserInput() {
        return document.getElementById('phone-number').value;
    }

    function isPhoneNumberValid() {
        var pattern = /^\+[0-9\s\-\(\)]+$/;
        var phoneNumber = getPhoneNumberFromUserInput();
        return phoneNumber.search(pattern) !== -1;
    }


    function resetReCaptcha() {
        if (typeof grecaptcha !== 'undefined'
            && typeof window.recaptchaWidgetId !== 'undefined') {
            grecaptcha.reset(window.recaptchaWidgetId);
        }
    }


    function updateSignInButtonUI() {
        document.getElementById('sign-in-button').disabled =
            !isPhoneNumberValid()
            || !!window.signingIn;
    }


    function updateVerifyCodeButtonUI() {
        document.getElementById('verify-code-button').disabled =
            !!window.verifyingCode
            || !getCodeFromUserInput();
    }


    function updateSignInFormUI() {
        if (firebase.auth().currentUser || window.confirmationResult) {
            document.getElementById('sign-in-form').style.display = 'none';
        } else {
            resetReCaptcha();
            document.getElementById('sign-in-form').style.display = 'block';
        }
    }


    function updateVerificationCodeFormUI() {
        if (!firebase.auth().currentUser && window.confirmationResult) {
            document.getElementById('verification-code-form').style.display = 'block';
        } else {
            document.getElementById('verification-code-form').style.display = 'none';
        }
    }


    function updateSignOutButtonUI() {
        if (firebase.auth().currentUser) {
            //document.getElementById('sign-out-button').style.display = 'block';
        } else {
            document.getElementById('sign-out-button').style.display = 'none';
        }
    }

    function updateSignedInUserStatusUI() {
        var user = firebase.auth().currentUser;
        if (user) {
            document.getElementById('sign-in-status').textContent = 'Signed in';
            document.getElementById('account-details').textContent = JSON.stringify(user, null, '  ');
        } else {
            //document.getElementById('sign-in-status').textContent = 'Signed out';
            document.getElementById('account-details').textContent = 'null';
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function checkUser(phone, uid) {
        var form_action = "{{ route('otp.check.user') }}";
        var formData = new FormData();
        formData.append('phone_number', phone);
        formData.append('uid', uid);
        formData.append('phone_code', $("#phone-number").intlTelInput("getSelectedCountryData").dialCode);
        formData.append('user_phone', $("#phone-number").val();
        $.ajax({
            type: 'POST',
            url: form_action,
            processData: false,
            contentType: false,
            data: formData,
        }).done(function (data) {
            window.location.replace(data.redirect);
        }).fail(function (data) {
            console.log('failed');
        });
    }

    function timeLimitOpt() {
        var timeleft = 30;
        $("#waiting_block").css({"display": "block"});
        var downloadTimer = setInterval(function () {
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
                $("#waiting_block").css({"display": "none"});
                $("#sending_once_again_block").css({"display": "block"});
            } else {
                document.getElementById("countdown").innerHTML = timeleft;
            }
            timeleft -= 1;
        }, 1000);
    }

</script>
