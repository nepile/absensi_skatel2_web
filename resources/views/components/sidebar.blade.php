<!-- Hamburger Menu -->
<div id="sidebarCollapse" class="mt-2">
    <i class="fas fa-bars"></i>
</div>

<!-- Sidebar -->
<nav id="sidebar" class="col-md-2 d-md-block sidebar" style="background: #af1f22">
    <div class="position-sticky">
        <!-- Logo -->
        <a href="{{ route('overview') }}" class="navbar-brand mb-3">
            <img src="{{ asset('img/logo2.png') }}" width="120" alt="">
        </a>
        <hr style="border-color: #fff">
        
        <!-- Sidebar Menu -->
        <ul class="nav flex-column" style="row-gap: 8px">
            <li class="nav-item @if($id_page == 1) active-navbar @endif">
                <a class="nav-link text-light" href="{{ route('overview') }}"><i class="fas fa-home"></i> Overview</a>
            </li>
            <li class="nav-item @if($id_page == 2) active-navbar @endif">
                <a class="nav-link text-light" href="{{ route('presensi') }}"><i class="fas fa-chart-bar"></i> Data Presensi</a>
            </li>
            <li class="nav-item @if($id_page == 3) active-navbar @endif">
                <a class="nav-link text-light" href="{{ route('guru') }}"><i class="fas fa-user"></i> Data Guru</a>
            </li>
            <li class="nav-item @if($id_page == 4) active-navbar @endif">
                <a class="nav-link text-light" href="{{ route('siswa') }}"><i class="fas fa-graduation-cap"></i> Data Siswa</a>
            </li>
            <li class="nav-item @if($id_page == 5) active-navbar @endif">
                <a class="nav-link text-light" href="{{ route('user_activity') }}"><i class="fas fa-eye"></i> User Activity</a>
            </li>
            <li class="nav-item">
                <form class="nav-link text-light" method="POST" action="{{ route('handleLogout') }}" style="cursor: pointer">
                    @csrf
                    <div class="d-flex align-items-center">
                        <i class="fas fa-sign-out"></i> 
                        <button class="btn p-0 text-light ms-2" type="submit">Logout</button>
                    </div>
                </form>
            </li>
            <!-- Add other menu items as needed -->
        </ul>
    </div>
</nav>