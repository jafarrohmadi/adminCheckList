@extends('layouts.admin.app')
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

    <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
        <div class="ri2-table ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <div class="ri2-table ri2-font18 ri2-semibold">
                    <div class="ri2-cell ri2-paddingleft10">
                        Management Users
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-bgwhite2">
        <a class="modalbuatuseropen new-toolbarbutton ri2-inlineblock new-ocean-gradient ri2-font14 ri2-mobilefont12 ri2-semibold ri2-txwhite1 ri2-pointer ri2-hovering"><i
                class="fas fa-plus-circle"></i> Buat User</a>

        <span
            style="font-size: 20px;margin: auto;padding-left: 300px;"> Total Kuota User : {{ $company->quota }} </span>
        <span style="font-size: 20px;margin: auto;"
              class="sisakuota"> Total Kuota Tersisa : {{ $company->empty_space }}</span>
    </div>

    <div class="content-body">
        <div class="ri2-block ri2-relative ri2-fullwidth ri2-box ri2-boxpad10">
            <div class="ri2-block ri2-relative new-content-space">
                <div class="ri2-block ri2-relative">
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                        <div class="ri2-block ri2-relative ri2-overflowauto ri2-paddingbottom20" data-simplebar
                             data-simplebar-auto-hide="false">
                            <table class="display datatable-table" style="width:100%;">
                                <thead>
                                <tr>
                                    <th class="fit">No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="userAll">
                                @include('admin.management_user.index_list')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.management_user.create')
    @include('admin.management_user.edit')
    @include('admin.management_user.delete')
@endsection
@section('js')
    <!--add js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('admin/js/intl-tel-input/build/js/intlTelInput.js')}}"></script>
    <script type="text/javascript">
        var input = document.querySelector("#phone_number");
        var editinput = document.querySelector("#editphone_number");
        var iti = window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (callback) {
                $.get("https://json.geoiplookup.io", function (resp) {
                    var countryCode = (resp && resp.country_code) ? resp.country_code : "";
                    callback(countryCode);
                });
            },
            nationalMode: true,
            utilsScript: "{{ asset('user/intl-tel-input/build/js/utils.js?1585994360633')}}"
            // any initialisation options go here
        });

        var edititi = window.intlTelInput(editinput, {
            separateDialCode: true,
            formatOnDisplay: false,
            initialCountry: "auto",
            nationalMode: true,
            utilsScript: "{{ asset('user/intl-tel-input/build/js/utils.js?1585994360633')}}"
            // any initialisation options go here
        });

        document.getElementById('phone_number').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{3})/g, '$1 ').trim();
        });

        document.getElementById('editphone_number').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{3})/g, '$1 ').trim();
        });

        //datatable
        $('.datatable-table').DataTable();
        //date
        $('.datetimepicker').datetimepicker();
        //select multiple
        $('.basic-multiple').select2();

        // Simpan alert
        function popUpMessage(message) {
            var simpan = {
                text: '<i class="far fa-comment-alt ri2-paddingright7"></i>' + message,
                timeout: 1500,
                type: 'success',
                theme: 'relax',
                layout: 'topRight',
                closeWith: ['click'],
                maxVisible: 10,
                animation: {
                    open: 'animated bounceInRight', // Animate.css class names
                    close: 'animated bounceOutRight', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 100 // unavailable - no need
                }
            };
            noty(simpan);
        }

        // Simpan alert
        function popUpMessageFailed(message) {
            var simpan = {
                text: '<i class="far fa-comment-alt ri2-paddingright7"></i>' + message,
                timeout: 1500,
                type: 'warning',
                theme: 'relax',
                layout: 'topRight',
                closeWith: ['click'],
                maxVisible: 10,
                animation: {
                    open: 'animated bounceInRight', // Animate.css class names
                    close: 'animated bounceOutRight', // Animate.css class names
                    easing: 'swing', // unavailable - no need
                    speed: 100 // unavailable - no need
                }
            };
            noty(simpan);
        }

        function getAllUser() {
            $.ajax({
                type: 'get',
                url: "{{url('/getAllUser') }}",
                success: function (data) {
                    $('#userAll').html(data);
                }
            });
        }


        //Buat buat reimbursement
        var modalbuatuser = $('.modalbuatuser');
        var modalbuatuseropen = $('.modalbuatuseropen');
        var modalbuatuserback = $('.modalbuatuserback');
        var modalbuatuserclose = $('.modalbuatuserclose');

        $(modalbuatuseropen).on('click', function () {
            $('.modalbuatuser').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            $("#name").val('');
            $('#phone_number').val('');
            $("#email").val('');
            $("#department").val('');
            $("#jabatan").val('');
        });

        $(modalbuatuserback).on('click', function () {
            $('.modalbuatuser').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(modalbuatuserclose).on('click', function () {
            $('.modalbuatuser').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $('.modalbuatusersave').click(function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: 'post',
                url: "{{url('/management_user') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#name").val(),
                    'phone_number': iti.getNumber(),
                    'email': $("#email").val(),
                    'phone_code': iti.getSelectedCountryData().dialCode,
                    'user_phone': $("#phone_number").val(),
                    'department': $("#department").val(),
                    'jabatan': $("#jabatan").val()
                    // 'access': $("#access").val()
                },
                success: function (data) {
                    $('.modalbuatuser').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    if (data == 'false') {
                        popUpMessageFailed('Quota Anda sudah habis , silahkan membeli di airmascloud');
                        $('.modalbuatuseropen').hide();
                    } else {
                        $('.sisakuota').html('Total Kuota Tersisa : ' + data);
                        popUpMessage('Success Tambah User');
                    }
                    getAllUser();
                    $.LoadingOverlay("hide");
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message').fadeIn().html(err.responseJSON.message);

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>'));
                        });
                    }
                    $.LoadingOverlay("hide");
                }
            });
        });

        //Buat edit reimbursement
        var modaledituser = $('.modaledituser');
        var modaledituserback = $('.modaledituserback');
        var modaledituserclose = $('.modaledituserclose');

        $(document).on("click", '.modaledituseropen', function () {
            $('.modaledituser').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
            let id = $(this).data('id');
            let name = $(this).data('name');
            let phone_number = $(this).data('phone_number');
            let email = $(this).data('email');
            let access = $(this).data('access');
            let department = $(this).data('department');
            let jabatan = $(this).data('jabatan');
            $('#editid').val(id);
            $('#editname').val(name);
            edititi.setNumber(phone_number);
            $('#editemail').val(email);
            $('#editaccess').val(access);
            $('#editdepartment').val(department);
            $('#editjabatan').val(jabatan);
        });

        $(document).on("click", '.modaleditusersave', function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: 'put',
                url: "{{url('/management_user') }}/" + $('#editid').val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#editname").val(),
                    'phone_number': edititi.getNumber(),
                    'email': $("#editemail").val(),
                    'phone_code': edititi.getSelectedCountryData().dialCode,
                    'user_phone': $("#editphone_number").val(),
                    'department': $("#editdepartment").val(),
                    'jabatan': $('#editjabatan').val(),
                    // 'access': $("#editaccess").val()
                },
                success: function (data) {
                    $('.modaledituser').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getAllUser();

                    popUpMessage('Success Edit User');
                    $.LoadingOverlay("hide");
                }, error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message').fadeIn().html(err.responseJSON.message);

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>'));
                        });
                    }
                    $.LoadingOverlay("hide");
                }
            });

        });
        $(document).on("click", '.modaledituserback', function () {
            $('.modaledituser').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(document).on("click", '.modaledituserclose', function () {
            $('.modaledituser').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        //modal hapus
        var modalhapus = $('.modalhapus');
        var modalhapusopen = $('.modalhapusopen');
        var modalhapusback = $('.modalhapusback');
        var modalhapusclose = $('.modalhapusclose');

        $(document).on("click", '.modalhapusopen', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            $('.deleteusername').html(name);
            $('#deleteuserid').val(id);

            $('.modalhapus').css('display', 'block');
            $('body', 'html').css('overflow', 'hidden');
        });

        $(document).on("click", '.modalhapusback', function () {
            $('.modalhapus').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(document).on("click", '.modalhapusclose', function () {
            $('.modalhapus').css('display', 'none');
            $('body', 'html').css('overflow', 'auto');
        });

        $(document).on("click", '.modalhapususersave', function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: 'delete',
                url: "{{url('/management_user') }}/" + $('#deleteuserid').val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                },
                success: function (data) {
                    $('.modalhapus').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getAllUser();
                    $('.modalbuatuseropen').show();
                    $('.sisakuota').html('Total Kuota Tersisa : ' + data);
                    popUpMessage('Success Delete User');
                    $.LoadingOverlay("hide");
                }
            });
        });
    </script>
@endsection
