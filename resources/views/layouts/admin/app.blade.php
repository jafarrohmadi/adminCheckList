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
@include('layouts.admin.notification')

<div id="main">
    <div id="content">
        <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
            <div class="ri2-table ri2-fullwidth ri2-fullheight">
                <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                    <div class="ri2-table ri2-font18 ri2-semibold">
                        <div class="ri2-cell ri2-paddingright10 ri2-borderright1 ri2-bordergrey2">
                            <a href="" class="ri2-tooltip ri2-nowrap ri2-relative"><span
                                    class="ri2-righttooltiptext">Halaman Sebelum</span><i
                                    class="fas fa-chevron-circle-left ri2-txblack5 ri2-linkhover"></i></a>
                        </div>
                        <div class="ri2-cell ri2-paddingleft10">
                            Checklist
                        </div>
                    </div>
                </div>
                <div class="ri2-cell ri2-vmid ri2-right">
                    <div class="ri2-dropdown ri2-inlineblock ri2-relative new-breadcrumbs-dropdown">
                        <button class="ri2-dropbtn new-breadcrumbs-dropbtn ri2-font12 ri2-semibold ri2-txgrey1">
                            Current Page <i class="fas fa-angle-down"></i></button>
                        <div
                            class="ri2-dropdown-content ri2-box ri2-absolute ri2-bgwhite1 new-breadcrumbs-dropdown-content ri2-left ri2-borderfull1 ri2-borderwhite4">
                            <a href="" class="ri2-block ri2-txblack3">
                                <div class="ri2-table">
                                    <div
                                        class="ri2-cell ri2-fit ri2vmid new-breadcrumbs-dropdown-left ri2-font10 ri2-paddingright5">
                                        <i class="fas fa-caret-left"></i>
                                    </div>
                                    <div class="ri2-cell ri2vmid">
                                        2nd Previous
                                    </div>
                                </div>
                            </a>
                            <a href="" class="ri2-block ri2-txblack3">
                                <div class="ri2-table">
                                    <div
                                        class="ri2-cell ri2-fit ri2vmid new-breadcrumbs-dropdown-left ri2-font10 ri2-paddingright5">
                                        <i class="fas fa-caret-left"></i>
                                    </div>
                                    <div class="ri2-cell ri2vmid">
                                        1st Previous
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
