<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#8E2DE2">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>todo list</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/styles/fd-style.css')}}">
    <script src="{{asset('user/scripts/modernizr.js')}}"></script>
    @yield('css')
</head>
<body><!--[if IE]><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
    href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
@yield('body')

@yield('script')
</body>
</html>
