<div class="sidenav">
    <div class="nav">
        <h2>Main Menu</h2>
        <div class="menu">
            <a class="submenu scrollme" href="{{ url('/') }}">Beranda</a>
            <a class="submenu scrollme" href="{{ url('/product') }}">Produk & Fitur</a>
            <a class="submenu scrollme" href="{{ url('/price') }}">Biaya</a>
            <a class="submenu scrollme" href="{{url('/faq')}}">FAQ</a>
            <button class="ri-button btn btn-primary-outline inner mrounded"
                    onclick="location.href='{{ url('/login') }}'">LOGIN
            </button>
            <button class="ri-button btn btn-primary-outline inner mrounded"
                    onclick="location.href='{{ url('/login') }}'">DAFTAR
            </button>
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>

<nav class="header sticky-anchor">
    <div class="wrapper">
        <div class="flex">
            <div>
                <a href="{{ url('/') }}">
                    <figure><img src="{{ asset('compro/img/logo.png')}}" title="Ayoochecklist Logo"></figure>
                </a>
            </div>
            <div>
                <a class="submenu scrollme" href="{{ url('/') }}">Beranda</a>
                <a class="submenu scrollme" href="{{ url('/product') }}">Produk & Fitur</a>
                <a class="submenu scrollme" href="{{ url('price') }}">Biaya</a>
                <a class="submenu scrollme" href="{{url('faq')}}">FAQ</a>
                <a class="menu-bar"><i class="fas fa-bars"></i></a>
                <button class="ri-button btn btn-primary-outline mrounded"
                        onclick="location.href='{{ url('/login') }}'">LOGIN
                </button>
                <button class="ri-button btn btn-primary-outline mrounded"
                        onclick="location.href='{{ url('/login') }}'">DAFTAR
                </button>
            </div>
        </div>
    </div>
</nav>
