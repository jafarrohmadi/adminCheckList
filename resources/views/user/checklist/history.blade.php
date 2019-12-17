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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" />

    <link rel="stylesheet" href="{{ asset('user/styles/fd-style.css') }}">

    <script src="{{ asset('user/scripts/modernizr.js') }}"></script>

</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="main-wrapper">
    <div class="nav-bar">
        <div class="fd-wrapper">
            <div class="fd-slot">
                <a href="index.html">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="fd-slot">
                <strong>History</strong>
            </div>
            <div class="fd-slot">
                <a href="#">
                    <i class="far fa-calendar-alt"></i>
                </a>
            </div>
        </div>
    </div>
    <main>
        <div class="timepickerBox">
            <div class="fd-group-field">
                <input type="text" name="" id="timepickerHistory" placeholder="YYYY/MM/DD H:M">
            </div>
            <a href="#" class="hidePickerBox">
                <i class="fas fa-angle-double-up"></i>
            </a>
        </div>
        <section class="activity-history">
            @foreach($checkListProgress as $checkList)
            <div class="fd-container-full">
                <div class="fd-wrapper" data-tanggal="{{date('dmy',strtotime($checkList->date))}}">
                    <div class="activity-caption">
                        <h4>{{ (new \App\Helpers\Helper())->tanggal_indo($checkList->date)}}</h4>
                        <small>( {{ $checkList->location->name }} ) - Progress done 5/5</small>
                    </div>
                    <div class="activity-content">
                        <ul class="historyList">
                            <li>
                                <i class="far fa-check-circle"></i>
                                <span>Membersihkan kamar mandi</span>
                            </li>
                            <li>
                                <i class="far fa-check-circle"></i>
                                <span>Membersihkan lantai</span>
                            </li>
                            <li class="notYet">
                                <i class="far fa-times-circle"></i>
                                <span>Membersihkan kaca</span>
                            </li>
                            <li>
                                <i class="far fa-check-circle"></i>
                                <span>Membersihkan kamar mandi</span>
                            </li>
                            <li class="notYet">
                                <i class="far fa-times-circle"></i>
                                <span>Membersihkan kamar mandi</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </section>
    </main>

    <div class="floating-bar">
        <div class="fd-container-full">
            <ul>
                <li>
                    <a href="index.html">
                        <img src="images/icons/large-home.png" alt="">
                        <p>Home</p>
                    </a>
                </li>
                <li class="select">
                    <a href="history.html">
                        <img src="images/icons/large-history.png" alt="">
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="images/icons/large-logout.png" alt="">
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
<script src="{{ asset('user/scripts/vendor.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('user/scripts/main.js') }}"></script>
<script>
    $(function() {
        $('#timepickerHistory').datetimepicker({timepicker:false});
    });
</script>
</body>
</html>
