@extends('layouts.front.app')
@section('content')
    <section class="banner">
        <div class="wrapper">
            <div class="banner-content">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20">
                        <div class="inner-content">
                            <!-- Swiper -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <h1><b>Gratis</b> Pemakaian selama <b>6 Bulan</b> Pertama*</h1>
                                        <p>* Periode Juni - November</p>
                                        <a href="{{ url('redirect') }}"
                                           class="_link-default"><h3>Daftar Sekarang</h3></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <h1>Solusi penugasan yang memudahkan dalam pekerjaan anda</h1>
                                        <h3>#kerjatuntas</h3>
                                    </div>
                                </div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="ri-inlineblock new-downloadapp ri-margintop40">
                                <a href="#"><img src="{{ asset('compro/img/google-play.png') }}" alt=""
                                                 class="ri-paddingright5"></a>
                                <a href="#"><img src="{{asset('compro/img/appstore.png') }}" alt=""></a>
                            </div>

                        </div>
                    </div>
                    <div class="flex1">
                        <img src="{{asset('compro/img/content-banner.png')}}" alt="" class="phone w-100">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="content bigmargin">
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20">
                        <h1>Mengorganisir pekerjaan secara digital</h1>
                        <p>Cukup instruksikan karyawan operasional melalui aplikasi ini, maka penerima tugas akan
                            mendapatkan notifikasi untuk segera menyelesaikan tugasnya.</p>
                    </div>
                    <div class="flex1 ri-right">
                        <img src="{{asset('compro/img/icons/content1.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20 push-content ct-right">
                        <h1>Foto sebelum dan sesudah hasil pekerjaan</h1>
                        <p>Secara realtime, karyawan operasional dapat langsung melaporkan bukti hasil kerja sebelum dan
                            sesudah dikerjakan kepada pemberi tugas.</p>
                    </div>
                    <div class="flex1 ri-left pull-content">
                        <img src="{{asset('compro/img/icons/content2.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20">
                        <h1>Pelaporan tugas secara digital</h1>
                        <p>Fitur group kerja yang ada di dalam aplikasi Ayoohris, membantu karyawan lintas divisi bisa
                            saling berkoordinasi dalam menyelesaikan beberapa tugas dalam sebuah project yang dikerjakan
                            bersama. Dalam Batasan waktu tertentu ini akan lebih mudah untuk memonitor progress yang
                            telah ditentukan berdasarkan kesepakatan bersama.</p>
                    </div>
                    <div class="flex1 ri-right">
                        <img src="{{asset('compro/img/icons/content3.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20 push-content ct-right">
                        <h1>Paperless report</h1>
                        <p>Tanpa perlu menggunakan kertas lagi, kita semua sudah ikut berkontribusi menyelamatkan
                            bumi.</p>
                    </div>
                    <div class="flex1 ri-left pull-content">
                        <img src="{{asset('compro/img/icons/content4.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
            <div class="new-col ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingright20">
                        <h1>Menghemat waktu dalam membuat tugas</h1>
                        <p>Pengaturan tugas, pengalihan tugas, serta penambahan tugas rutin harian karyawan operasional,
                            bisa dilakukan menggunakan aplikasi ini. Tugas lebih jelas dan lekas tuntas.</p>
                    </div>
                    <div class="flex1 ri-right">
                        <img src="{{asset('compro/img/icons/content5.svg')}}" class="w-100 img-content" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-hero bigmargin">
        <div class="content">
            <div class="ri-padding20">
                <div class="ri-flex tablet-break">
                    <div class="flex1 ri-paddingleft40">
                        <h1 class="">Hasil kerja
                            karyawan operasional
                            secara realtime langsung
                            bisa dibuktikan.
                        </h1>
                        <p>COBA GRATIS <a class="modalfreeopen _link">DISINI</a></p>
                    </div>
                    <div class="flex1"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="ri-padding20 ri-box">
        <div class="content bigmargin">
            <div class="ri-center">
                <h1 class="ri-marginbottom40">Kelebihan kami</h1>
                <p>Tingkatkan alur kerja antara perusahaan dan karyawan dengan utilitas tambahan yang kami sediakan</p>
                <div class="ri-flex tablet-break ri-margintop40">
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages1.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Paperless</h1>
                            </div>
                            <p>Instruksi cukup melalui aplikasi. Notifikasi diterima dan tugas langsung
                                dikerjakan segera.</p>
                        </div>
                    </div>
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages2.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Praktis dan sistematis</h1>
                            </div>
                            <p>Tanpa tatap muka, buat tugas dan pengalihan tugas instruksional bisa dilakukan kapan saja
                                dan di mana saja. Begitu juga pelaporannya, bisa disampaikan saat itu juga.</p>
                        </div>
                    </div>
                    <div class="flex1 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages3.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Tampilan aplikasi simple dan mudah</h1>
                            </div>
                            <p>Rekap data pada periode yang ditentukan jika diperlukan, bisa langsung diunduh secara
                                otomatis oleh Administrator melalui aplikasinya. </p>
                        </div>
                    </div>
                </div>
                <div class="ri-flex tablet-break ri-margintop40">
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages4.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Efisensi waktu dan biaya</h1>
                            </div>
                            <p>segala informasi hasil kerja karyawan yang mendapatkan tugas instruksional, bisa
                                ditelusuri kembali historinya secara lengkap dan detail.</p>
                        </div>
                    </div>
                    <div class="flex1 ri-marginright40 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages5.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Terintegrasi dengan sistem HRIS</h1>
                            </div>
                            <p>Performa hasil kerja karyawan bagian opersional menjadi catatan penting bagi tim HRD
                                secara personal dan kontekstual.</p>
                        </div>
                    </div>
                    <div class="flex1 card-content ri-center">
                        <div class="card-service">
                            <div class="img-card">
                                <img src="{{asset('compro/img/icons/advantages6.svg')}}" alt="">
                            </div>
                            <div class="caption">
                                <h1>Open REST API <span>(Term & Condition)</span></h1>
                            </div>
                            <p>Kami juga melayani perusahaan yang bekerja sama dengan perusahaan kami untuk
                                mengintegrasikan aplikasi ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="testimonial ri-padding20 ri-box bigmargin">
        <div class="content ri-paddingtop40 ri-paddingbottom40 ri-center">
            <h1>Apa kata mereka tentang <span>Ayoochecklist</span>?</h1>
            <div class="owl-carousel">
                <div class="new-blockquote">
                    <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</q>
                    <div class="testimoni-info">
                        <div class="new-thubmnail-pp">
                            <img src="img/cobaz.png" class="w-100" alt="">
                        </div>
                        <div class="new-username">
                            <div class="name">
                                Dea Ananda
                            </div>
                            <div class="title">
                                HRD Sinarjaya Mas
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-blockquote">
                    <q>Lorem sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</q>
                    <div class="testimoni-info">
                        <div class="new-thubmnail-pp">
                            <img src="img/cobaz.png" class="w-100" alt="">
                        </div>
                        <div class="new-username">
                            <div class="name">
                                Dea Ananda
                            </div>
                            <div class="title">
                                HRD Sinarjaya Mas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="partner ri-padding20 ri-box">
        <div class="content bigmargin">
            <div class="inner-content ri-center">
                <h2>Klien kami :</h2>
                <div class="ri-block ri-margintop40 ri-marginbottom40">
                    <div class="ri-inlineblock ri-paddingright20">
                        <img src="{{asset('compro/img/clients/1.png')}}" class="inline img-logo" alt="">
                    </div>
                    <div class="ri-inlineblock ri-paddingright20">
                        <img src="{{asset('compro/img/clients/2.png')}}" class="inline img-logo" alt="">
                    </div>
                    <div class="ri-inlineblock ri-paddingright20">
                        <img src="{{asset('compro/img/clients/3.png')}}" class="inline img-logo" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modalfree modal-body ri-modal">
        <div class="container">
            <div class="center">
                <div class="back modalclose"></div>
                <div class="content small">
                    <div class="header">
                        <div class="title">
                            Form coba gratis
                        </div>
                        <div class="close modalclose">
                            <a><i class="far fa-times-circle"></i></a>
                        </div>
                    </div>
                    <div class="body">
                        <div class="ri-padding30">
                            <div class="ri-form-group">
                                <div class="basic">
                                    <input type="" name="" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="ri-form-group">
                                <div class="basic">
                                    <input type="" name="" placeholder="Alamat Email">
                                </div>
                            </div>
                            <div class="ri-form-group">
                                <div class="basic">
                                    <input type="" name="" placeholder="Nama perusahaan">
                                </div>
                            </div>
                            <div class="ri-form-group">
                                <div class="basic">
                                    <input type="" name="" placeholder="Kota">
                                </div>
                            </div>
                            <div class="ri-form-group">
                                <div class="valued">
                                    <div class="field">
                                        <select class="basic-single">
                                            <option>Jumlah Karyawan</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ri-form-group">
                                <div class="multi-row">
                                    <div class="basic phonebook">
                                        <select class="basic-single">
                                            <optgroup label="Group Option 1">
                                                <option>+62</option>
                                                <option>+88</option>
                                                <option>+99</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="basic">
                                        <input type="password" name="" placeholder="Masukan Nomor">
                                    </div>
                                </div>
                            </div>
                            <p>Dengan klik coba gratis, anda menyetujui
                                Syarat dan Ketentuan serta Kebijakan Privasi Ayoochecklist.</p>
                            <button class="ri-button grey inline full srounded" disabled="">Coba Gratis</button>

                        </div>
                        <div class="ri-block ri-center">
                            <p>2020 © Ayoochecklist.com ALL Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('ads_banner')
    <div class="ads-banner">
        <div class="ads">
            <h3>Coba juga aplikasi kehadiran digital kami</h3>
            <p>Kehadiran karyawan terekam secara digital, cepat, tepat dan akurat.</p>
        </div>
        <div class="right-btn-ads">
            <button class="ri-button btn btn-default srounded inline" onclick='location.href="https://www.ayoohadir.com"'>KUNJUNGI</button>
        </div>
        <span class="closebtn" onclick="this.parentElement.style.display='none';"><i class="fas fa-times"></i></span>
    </div>
    <div class="ri-scrolltop"><i class="fas fa-arrow-up"></i></div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <!-- call select2 js vendor-->
    <script type="text/javascript" src="{{ asset('compro/js/scrolltop.js')}}"></script>
    <script type="text/javascript" src="{{ asset('compro/js/modal.js')}}"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script type="text/javascript" src="{{ asset('compro/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            //Modal
            $(document).on('click', '.modalfreeopen', function () {
                var modal = '.' + modalclasstrim($(this));
                props_show(modal);
            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            var swiper = new Swiper('.swiper-container', {
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

        });
    </script>
@endsection

