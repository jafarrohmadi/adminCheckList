<div id="back" class="back"></div>
<div id="mySidenav" class="sidenav ri2-bgnavy1" id="tes">
    <div class="nav-block" data-simplebar>
        <div class="nav-topbottom"></div>
        <nav class="nav" role="navigation">
            <ul>
                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ url('location') }}"
                           @if(url()->current() === url('location')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-map-marker awesome-nav"></i></div>
                            Lokasi</a></li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ url('menu_checklist') }}"
                           @if(url()->current() === url('menu_checklist')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-list-alt awesome-nav"></i></div>
                            Checklist</a></li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ route('checklist') }}"
                           @if(url()->current() === url('checklist')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-chart-line awesome-nav"></i></div>
                            Tambah Tugas</a></li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ url('operTugas') }}"
                           @if(url()->current() === url('operTugas')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-chart-line awesome-nav"></i></div>
                            Mengalih Tugaskan</a></li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ url('report') }}"
                           @if(url()->current() === url('report')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-file awesome-nav"></i></div>
                            Laporan Tugas</a></li>
                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->access == 'admin')
                    <li><a href="{{ url('management_user') }}"
                           @if(url()->current() === url('management_user')) class="selected" @endif>
                            <div class="nav-icon"><i class="fas fa-user awesome-nav"></i></div>
                            Users</a></li>
                @endif
            </ul>
        </nav>
        <div class="nav-topbottom"></div>
    </div>
</div>
<!-- <div id="sidenavfix" class="sidenav-fix"></div> -->
