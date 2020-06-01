@extends('layouts.front.app')
@section('content')

    <section class="ri-padding20 ri-box">
        <div class="content bigmargin">
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright40">
                        <h1>List Tugas</h1>
                        <p>Setiap hari pada hari kerja, kamu akan menerima daftar pekerjaan yang harus kamu selesaikan.
                            Begitu selesai, langsung checklist. Begitu praktis!</p>
                    </div>
                    <div class="flex1 ri-right align-self-center">
                        <img src="{{ asset('compro/img/icons/product/1.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-padding40 push-content">
                        <h1>Dokumentasi Tugas</h1>
                        <p>Foto …., Upload…., Laporkan……! Hasil kerjamu langsung bisa dibuktikan sekarang.</p>
                    </div>
                    <div class="flex1 ri-left align-self-center pull-content">
                        <img src="{{ asset('compro/img/icons/product/2.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright40">
                        <h1>Histori Pekerjaan</h1>
                        <p>Pekerjaan apapun yang sudah kamu selesaikan, rekam jejaknya bisa ditelusuri kembali dengan
                            bukti
                            hasil kerja yang dapat dipertanggungjawabkan.</p>
                    </div>
                    <div class="flex1 ri-right align-self-center">
                        <img src="{{ asset('compro/img/icons/product/3.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ri-scrolltop"><i class="fas fa-arrow-up"></i></div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <!-- call select2 js vendor-->
    <script type="text/javascript" src="{{ asset('compro/js/scrolltop.js')}}"></script>
    <script type="text/javascript" src="{{ asset('compro/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            //Modal
            $(document).on('click', '.modalvideoopen', function () {
                var modal = '.' + modalclasstrim($(this));
                props_show(modal);
            });
        });
    </script>
@endsection
