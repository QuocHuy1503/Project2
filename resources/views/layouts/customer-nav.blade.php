<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Metrophobic&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<nav class="navbar nav-underline navbar-expand-lg bd-navbar fixed-top pt-3" style="background-color: #00001c">
    <div class="container-xxl bd-gutter flex-wrap flex-lg-nowrap text-uppercase px-0">
        <a class="navbar-brand" href="/">
            <img src="{{asset('admin-assets/img/paradise-theatre-logo.png')}}" alt="brand"
                 height="40" class="rounded">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-medium">
                <li class="nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                       href="{{route('home')}}">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link link-light dropdown-toggle {{ request()->routeIs('movie') ? 'active' : '' }}" href="{{route('movie')}}"
                       id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        MOVIE
                    </a>
                    <div class="dropdown-menu rounded-4" aria-labelledby="navbarDropdown">
                        <ul>
                            <li><a class="dropdown-item">Popular</a></li>
                            <li><a class="dropdown-item" href="{{route('movie')}}">featured</a></li>
                            <li><a class="dropdown-item" href="{{route('movie')}}">most popular</a></li>
                            <li><a class="dropdown-item" href="{{route('movie')}}">new releases</a></li>
                            <li><a class="dropdown-item" href="{{route('movie')}}">recommend</a></li>
                        </ul>
                        <ul class="accordion-item">
                            <li><a class="dropdown-item">genres</a></li>
                                <div>
                                    {{-- @foreach(getGenres() as $genre)
                                        <li><a class="dropdown-item d-none"></a></li>
                                        <li><a class="dropdown-item" href="#">{{$genre->name}}</a></li>
                                    @endforeach --}}
                                </div>
                        </ul>
                        <ul>
                            <li><a class="dropdown-item">Something else here</a></li>
                            <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                            <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                            <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                            <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('help') ? 'active' : '' }}" href="{{route('help')}}">HELP
                    </a>
                </li>
            </ul>
            <h2 class="mt-3 text-center text-white me-md-auto fw-semibold font-monospace rounded-2" style="background-image: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);">PARADISE THEATRE</h2>
            <form method="get" action="{{ route('movie') }}" class="d-flex search-form mb-0" role="search">
                @csrf
                <div class="input-group input-group-sm">
                    <input class="form-control" name="search" type="search" placeholder="Type to search..."
                           aria-label="Search"
                           value="{{request()->query('search')}}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link link-light {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{route('profile')}}">
                        <i class="bi bi-person"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light " href="">
                        <i class="bi bi-bag"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div>
    @yield('content')
</div>
<footer class="bg-dark mt-5">
    <div class="container pb-5 pt-3 backgroundEffect">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-card text-white">
                    <img src="{{asset('admin-assets/img/paradise-theatre-logo.png')}}" alt="brand"
                         height="150" class="rounded me-2">
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-card text-white">
                    <h3>Get In Touch</h3>
                    <hr class="w-25">
                    <p>No dolore ipsum accusam no lorem. <br>
                        123 Street, New York, USA <br>
                        exampl@example.com <br>
                        000 000 0000</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-card text-white">
                    <h3>Important Links</h3>
                    <hr class="w-25" style="background-size: 10px">
                    <ul class="nav flex-column">
                        {{-- <li><a class="text-decoration-none link-light" href="{{ route('about') }}" title="About">About</a></li> --}}
                        <li><a class="text-decoration-none link-light" href="{{route('contact')}}" title="Contact Us">Contact Us</a></li>
                        <li><a class="text-decoration-none link-light" href="#" title="Privacy">Privacy</a></li>
                        <li><a class="text-decoration-none link-light" href="#" title="Privacy">Terms & Conditions</a></li>
                        <li><a class="text-decoration-none link-light" href="#" title="Privacy">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-card text-white">
                    <h3>My Account</h3>
                    <hr class="w-25">
                    <ul class="nav flex-column">
                        <li><a class="text-decoration-none link-light" href="{{route('profile')}}" title="Sell">Login</a></li>
                        <li><a class="text-decoration-none link-light" href="{{route('customer.register')}}" title="Advertise">Register</a></li>
                        <li><a class="text-decoration-none link-light" href="#" title="Contact Us">My Orders</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="text-white">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3 mb-3">
                    <div class="copy-right text-center text-white">
                        <span class="text-white">2024 © Paradise Theatre - Made by Phuc&Huy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('customJs')
