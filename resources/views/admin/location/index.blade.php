@extends('layouts.admin.app')
@section('content')

    <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
        <div class="ri2-table ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <div class="ri2-table ri2-font18 ri2-semibold">
                    <div class="ri2-cell ri2-paddingleft10">
                        Lokasi
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box ri2-bgwhite2">
        <a class="modalbuatuseropen new-toolbarbutton ri2-inlineblock new-ocean-gradient ri2-font14 ri2-mobilefont12 ri2-semibold ri2-txwhite1 ri2-pointer ri2-hovering"><i
                    class="fas fa-plus-circle"></i> Buat Lokasi</a>
    </div>

    <div class="content-body">
        <div class="ri2-block ri2-relative ri2-fullwidth ri2-box ri2-boxpad10">
            <div class="ri2-block ri2-relative new-content-space">
                <div class="ri2-block ri2-relative">
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                    <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                        <div class="ri2-block ri2-relative ri2-overflowauto ri2-paddingbottom20" data-simplebar
                             data-simplebar-auto-hide="false" id="userAll">

                                @include('admin.location.index_list')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.location.create')
    @include('admin.location.edit')
    @include('admin.location.delete')
@endsection
@section('js')
    <!--add js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
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
                url: "{{url('/getMenuLocation') }}",
                success: function (data) {
                    $('#userAll').html(data);
                    $('.datatable-table').DataTable();
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
                url: "{{url('/location') }}",
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#name").val(),
                },
                success: function (data) {
                    $('.modalbuatuser').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    if (data == 'false') {
                        $('.modalbuatuseropen').hide();
                    } else {
                        popUpMessage('Success Tambah Lokasi');
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
            $('#editid').val(id);
            $('#editname').val(name);
        });

        $(document).on("click", '.modaleditusersave', function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: 'put',
                url: "{{url('/location') }}/" + $('#editid').val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                    'name': $("#editname").val(),
                },
                success: function (data) {
                    $('.modaledituser').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getAllUser();

                    popUpMessage('Success Edit Location');
                    $.LoadingOverlay("hide");
                }, error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message').fadeIn().html(err.responseJSON.message);

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="edit' + i + '"]');
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
                url: "{{url('/location') }}/" + $('#deleteuserid').val(),
                data: {
                    '_token': "{{  csrf_token() }}",
                },
                success: function (data) {
                    $('.modalhapus').css('display', 'none');
                    $('body', 'html').css('overflow', 'auto');
                    getAllUser();
                    $('.modalbuatuseropen').show();
                    popUpMessage('Success Delete User');
                    $.LoadingOverlay("hide");
                }
            });
        });
    </script>
@endsection
