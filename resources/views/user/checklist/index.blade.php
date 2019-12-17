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

    <link rel="stylesheet" href="{{ asset('user/styles/fd-style.css') }}">
    <script src="{{ asset('user/scripts/modernizr.js') }}"></script>
</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="main-wrapper">

    <header>
        <div class="fd-container-full">
            <div class="fd-wrapper">
                <div class="fd-slot">
                    <span>Welcome, <strong>{{ $user['data']['nickname'] }}</strong></span>
                    <figure>
                        <img src="{{ $user['data']['photo'] }}" alt="">
                    </figure>
                </div>
                <div class="fd-slot">
                    <a
                        href="#"
                        class="bell-notif"
                        onclick="swal('Tolong dibetulkan toilet kamar mandi lantai 2 @ayookopi',{icon: 'warning'})">
                        <div class="fd-badge"></div>
                        <img src="{{ asset('user/images/icons/large-bell.png') }}" alt="">
                    </a>
                    <!-- <a href="#">
                      <img src="images/icons/large-share-job.png" alt="">
                    </a> -->
                </div>
            </div>
        </div>
        <div class="date-n-time">
            <div class="fd-wrapper">
                <div class="fd-slot">
                    <img src="{{ asset('user/images/icons/small-calendar.png') }}" alt="">
                    <p><strong>{{ ucfirst((new \App\Helpers\Helper())->getThisDay()) }},</strong>{{ (new \App\Helpers\Helper())->tanggal_indo(date('Y-m-d'), false) }}</p>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="activity">
            <div class="fd-container-full">
                <div class="fd-wrapper">
                    <div class="activity-caption">
                        <h4>Tugas utama</h4>
                        <small>{{ $checkListProgress->location->name }}</small>
                    </div>
                    <div class="activity-content">
                        <div class="fd-accordion">
                            @foreach($checkListProgress->checkListProgressDetail as $checkListProgress)
                            <div class="fd-accordion-item">
                                <div class="fd-accordion-header">
                                    <div class="check">
                                        <div class="fd-checkbox-custom">
                                            <label class="toggleButton">
                                                <input type="checkbox"/>
                                                <div>
                                                    <svg viewBox="0 0 44 44">
                                                        <path d="M14,24 L21,31 L39.7428882,11.5937758 C35.2809627,6.53125861 30.0333333,4 24,4 C12.95,4 4,12.95 4,24 C4,35.05 12.95,44 24,44 C35.05,44 44,35.05 44,24 C44,19.3 42.5809627,15.1645919 39.7428882,11.5937758" transform="translate(-2.000000, -2.000000)"></path>
                                                    </svg>
                                                </div>
                                            </label>
                                        </div>
                                        <div>
                                            <h4>{{$checkListProgress->checkList->name}}</h4>
                                            <time id="{{ $checkListProgress->id }}" style="display: none">06/11/2019 - 06:30</time>
                                        </div>
                                    </div>
                                    <div class="groupBtn">
                                        <input type="hidden">
                                        <figure class="photo-thumb">
                                            <img src="" alt="">
                                        </figure>
                                        <div class="takePic">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div class="comment">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="fd-accordion-body">
                                    <textarea rows="5" cols="50" placeholder='Type here..' class="textarea-custom"></textarea>
                                    <ul class="group-btn">
                                        <li>
                                            <button data-rel="save">
                                                <i class="far fa-save"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button data-rel="edit" type="button" disabled>
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button data-rel="erase" type="button" disabled>
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="fd-wrapper">
                    <div class="activity-caption">
                        <h4>Tugas Tambahan</h4>
                        <small>Ayooservice Lt.4</small>
                    </div>
                    <div class="activity-content">
                        <div class="fd-accordion">

                            <div class="fd-accordion-item">
                                <div class="fd-accordion-header">
                                    <div class="check">
                                        <div class="fd-checkbox-custom">
                                            <label class="toggleButton">
                                                <input type="checkbox"/>
                                                <div>
                                                    <svg viewBox="0 0 44 44">
                                                        <path d="M14,24 L21,31 L39.7428882,11.5937758 C35.2809627,6.53125861 30.0333333,4 24,4 C12.95,4 4,12.95 4,24 C4,35.05 12.95,44 24,44 C35.05,44 44,35.05 44,24 C44,19.3 42.5809627,15.1645919 39.7428882,11.5937758" transform="translate(-2.000000, -2.000000)"></path>
                                                    </svg>
                                                </div>
                                            </label>
                                        </div>
                                        <div>
                                            <h4>Membersihkan lantai</h4>
                                            <time>06/11/2019 - 06:30</time>
                                        </div>
                                    </div>
                                    <div class="groupBtn">
                                        <input type="hidden">
                                        <figure class="photo-thumb">
                                            <img src="" alt="">
                                        </figure>
                                        <div class="takePic">
                                            <i class="fas fa-camera"></i>
                                        </div>
                                        <div class="comment">
                                            <i class="fas fa-pencil-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="fd-accordion-body">
                                    <textarea rows="5" cols="50" placeholder='Type here..' class="textarea-custom"></textarea>
                                    <ul class="group-btn">
                                        <li>
                                            <button data-rel="save">
                                                <i class="far fa-save"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button data-rel="edit" type="button" disabled>
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button data-rel="erase" type="button" disabled>
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="floating-bar">
        <div class="fd-container-full">
            <ul>
                <li class="select">
                    <a href="index.html">
                        <img src="{{ asset('user/images/icons/large-home.png')}}" alt="">
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('site/userHistory') }}">
                        <img src="{{ asset('user/images/icons/large-history.png') }}" alt="">
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('user/images/icons/large-logout.png') }}" alt="">
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
<div class="modal" id="photo-capture">
    <div class="modal-content">
        <span class="close fd-zIndex2"> × </span>
        <form action="">
            <div class="take-photo">
                <label for="photo-proof">
                    <i class="fas fa-camera"></i>
                    <span>Ambil Foto</span>
                </label>
                <input type="file" name="photo-proof" id="photo-proof" accept="image/*">
            </div>
            <div class="result-photo">
                <figure>
                    <img src="" alt="" data-photo="get-photo">
                </figure>
                <div>
                    <button class="btn fd-line-light-blue reTakePhoto">Ganti Foto</button>
                    <button class="btn btn-light-blue savePhoto">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="re-capture">
    <div class="modal-content">
        <span class="close fd-zIndex2"> × </span>
        <form action="">
            <div class="take-photo">
                <label for="photo-proof">
                    <i class="fas fa-camera"></i>
                    <span>Ambil Foto</span>
                </label>
                <input type="file" name="photo-proof" id="photo-proof" accept="image/*">
            </div>
            <div class="result-photo">
                <figure>
                    <img src="" alt="" data-photo="get-photo">
                </figure>
                <div>
                    <button class="btn fd-line-light-blue reTakePhoto">Ganti Foto</button>
                    <button class="btn btn-light-blue reSavePhoto">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('user/scripts/vendor.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('user/scripts/main.js') }}"></script>
</body>
</html>
