@extends('layouts.front.app')
@section('content')

    <section class="ri-block ri-padding20 ri-box">
        <div class="content faq-content bigmargin ri-paddingbottom40">
            <div class="ri-flex tablet-break ri-marginbottom30">
                <div class="flex1 ri-paddingright20">
                    <div class="inner-content">
                        <h1 class="heading">Have a question?</h1>
                        <p>Beberapa pertanyaan dibawah yang sering ditanyakan oleh customer kami.</p>
                    </div>
                </div>
                <div class="flex1 ri-center">
                    <img src="{{ asset('compro/img/icons/faq.svg') }}" alt="" class="faq-img w-100">
                </div>
            </div>
            <div class="tab-panel tab-inline">
                <div class="tab-content">
                    <div class="ri-block ri-center ri-marginbottom30">
                        <h1>Ayoochecklist FAQ</h1>
                        <div class="form-input">
                            <div class="ri-form-group">
                                <div class="valued form-rounded">
                                    <div class="field">
                                        <input type="" name="" placeholder="Cari disini">
                                    </div>
                                    <div class="val r-val">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ri-block ri-margintop40">
                            <div class="ri-accordion ri-left">
                                <ol class="accordion-item">
                                    <li>
                                        <a class="heading">Apa itu Aplikasi Ayoocheklist?</a>
                                        <div class="content-panel">
                                            <ul class="list-item">
                                                <li><p>Aplikasi Ayoocheklist adalah aplikasi instruksional yang didesain
                                                        secara digital, untuk karyawan bagian operasional perusahaan.
                                                        Pengguna aplikasi ini salah satunya adalah tim General Affair.
                                                        Yang mana tim ini memiliki tanggung jawab, salah satunya untuk
                                                        mengkoordinir kinerja petugas kebersihan / security dalam
                                                        aktifitas hariannya.</p></li>
                                                <li><p>Semua bentuk instruksi yang disampaikan kepada penerima
                                                        instruksi, bisa langsung diterima dan dibaca secara jelas. Jika
                                                        sudah selesai melaksanakan tugasnya, penerima instruksi dapat
                                                        langsung melaporkan serta mengirimkan bukti hasil kerjanya
                                                        kepada pihak yang telah menugaskan.</p></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="heading">Mengapa kita menggunakan aplikasi tersebut, apa
                                            manfaatnya?</a>
                                        <div class="content-panel">
                                            <ul class="list-item">
                                                <li><p>Lebih praktis, tanpa perlu bertatap muka. Semua instruksi bisa
                                                        disampaikan secara digital melalui aplikasi. </p></li>
                                                <li><p>Hasil kerja dapat langsung dikomentari dan dibuktikan dengan
                                                        lampiran foto yang dapat dipertanggungjawabkan.</p></li>
                                                <li><p>Karena semua informasi terekam secara digital, maka tidak
                                                        diperlukan lagi adanya kertas-kertas sebagai berkas yang biasa
                                                        dilaporkan. Semua informasi terdokumentasi ke dalam system
                                                        secara rapi, terstruktur dan sistematis.</p></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="heading">Bagaimana caranya perusahaan saya mendapatkan aplikasi
                                            Ayoochecklist ini?</a>
                                        <div class="content-panel">
                                            <ul class="list-item">
                                                <li><p>Silahkan mengunjungi website <a href="" class="_link-default">www.Ayoochecklist.com</a>
                                                    </p></li>
                                                <li><p>Cek Paket Aplikasi yang tersedia, dan pilih sesuai dengan
                                                        kebutuhan perusahaan Anda</p></li>
                                                <li><p>Hubungi kami dengan cara mengisi form yang tersedia di website
                                                        tersebut.</p></li>
                                                <li><p>Anda bisa juga mengundang kami untuk datang ke perusahaan Anda,
                                                        dan
                                                        menjelaskan kelengkapan informasinya.</p></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="heading">Apakah bisa Aplikasi Ayoochecklist ini dicoba-coba dulu
                                            secara gratis?</a>
                                        <div class="content-panel">
                                            <ul class="list-item">
                                                <li><p>Ya bisa.</p></li>
                                                <li><p>Kami sedang membuka promo gratis penggunaan aplikasi
                                                        Ayoochecklist untuk semua
                                                        pengguna, selama bulan Juni 2020</p></li>
                                                <li><p>Selama bulan Juni 2020, khusus untuk UMKM, kami akan
                                                        menggratiskan
                                                        penggunaan aplikasi selama 6 bulan, dengan syarat dan ketentuan
                                                        yang berlaku.</p></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="ri-scrolltop"><i class="fas fa-arrow-up"></i></div>
@endsection
@section('js')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ asset('compro/js/scrolltop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('compro/js/accordion.js') }}"></script>
    <script type="text/javascript" src="{{ asset('compro/js/main.js') }}"></script>
    <script type="text/javascript">
        // tab function
        $(document).ready(function () {
            $('.tab-panel a.btn-tab').on('click', function (e) {
                e.preventDefault();

                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');

                var href = $(this).attr('href');
                $('.tab-panel > .tab-content').hide();
                $(href).fadeIn(500);
            });
        });
    </script>
@endsection
