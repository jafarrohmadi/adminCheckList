<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.admin.meta')
    <link href="{{ asset('admin/css/jquery.datetimepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/noty-buttons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/noty-animate.css') }}"/>
    @yield('css')
</head>
<body>
@include('layouts.admin.top')
@include('layouts.admin.sidenav')

<div id="main">
    <div id="content">
        @yield('content')
    </div>
</div>

<script type="text/javascript" src="{{ asset('admin/js/foot.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('admin/js/datatable.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/js/jquery.noty.packaged.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('admin/js/php-date-formatter.js')}}"></script>
<script src="{{ asset('admin/js/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('admin/js/jquery.datetimepicker.js')}}"></script>

@yield('js')

</body>
</html>
