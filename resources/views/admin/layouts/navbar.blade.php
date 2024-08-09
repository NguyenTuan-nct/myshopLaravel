<link rel="stylesheet" href="{{ url('CSS/navbar.css') }}">

<!-- resources/views/admin/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homeafter') }}">
                        <i class="fas fa-home"></i> <!-- Icon Home -->
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sanpham.viewsp') }}">
                        <i class="fas fa-box"></i> <!-- Icon Box -->
                        Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('khachhang.index') }}">
                        <i class="fas fa-user"></i> <!-- Icon User -->
                        Khách Hàng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoices.index') }}">
                        <i class="fas fa-file-invoice-dollar"></i> <!-- Icon Invoice -->
                        Hóa Đơn
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> <!-- Icon Logout -->
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> <!-- Icon Login -->
                        Login
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


