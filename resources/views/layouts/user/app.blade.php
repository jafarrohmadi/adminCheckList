<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#8E2DE2"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todo list</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"/>

    <link rel="stylesheet" href="{{ asset('user/styles/fd-style.css') }}">

    <script src="{{ asset('user/scripts/modernizr.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="main-wrapper">
    @yield('content')
    <div class="floating-bar">
        <div class="fd-container-full">
            <ul>
                <li @if(url()->current() === url('/site/userChecklist')) class="select" @endif>
                    <a href="{{ url('site/userChecklist') }}">
                        <img src="{{ asset('user/images/icons/large-home.png') }}" alt="">
                        <p>Home</p>
                    </a>
                </li>
                <li @if(url()->current() === url('/site/userHistory')) class="select" @endif>
                    <a href="{{ url('site/userHistory') }}">
                        <img src="{{ asset('user/images/icons/large-history.png') }}" alt="">
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                        <img src="{{ asset('user/images/icons/large-logout.png') }}" alt="">
                        <p>
                            Logout
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
<script src="{{ asset('user/scripts/vendor.js') }}"></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('user/scripts/main.js') }}"></script>
<script>
    $(function () {
        $('#timepickerHistory').datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            onSelectDate: function () {
                let date = $('#timepickerHistory').val();
                $.ajax({
                    type: 'get',
                    url: "{{url('/site/searchUserHistory') }}/" + date,
                    success: function (data) {
                        if (data) {
                            $('#searchOutput').html(data);
                            $('#searchOutput').show();
                            $('#allOutput').hide();
                        } else {
                            swal({
                                title: 'Tidak Ada Data',
                                icon: 'warning'
                            });
                            $('#searchOutput').hide();
                            $('#allOutput').show();
                        }
                    },
                });
            }
        });
    });
</script>
@yield('script')
</body>
</html>
