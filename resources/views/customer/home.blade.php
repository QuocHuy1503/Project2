@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;" data-instant-intensity="mousedown">
    <hr class="text-white">
    <div class="container-fluid p-0">
        <div class=" position-relative d-flex justify-content-center align-items-center">
            <img src="{{asset('img/image-home.jpg')}}" class="w-100 object-fit-contain opacity-75" alt="home">
            <div
                class="position-absolute text-white text-capitalize d-flex justify-content-center align-items-center flex-column">
                <span class="luxury-font fs-1 fade-in fade-bottom">
                    Welcome to Your Paradise Theatre
                </span>
                <button class="btn">
                    <a class="fade-in fade-bottom nav-link fs-4 d-flex text-white btn btn-danger" href="{{route('movie')}}">
                        View more Film<span class="bi bi-incognito p-2"></span>
                    </a>
                </button>
            </div>
        </div>

        <section class="movie-banner">
        {{--            Image--}}
            <div class="m-banner-img">
                <img src="{{asset('customer-assets/images/banner-godzillaXkong.jpg')}}">
            </div>
        {{--            CONTENT--}}
            <div class="banner-container">
        {{--            TITLE CONTAINER--}}
                <div class="title-container">
                    <div class="title-top">
                        <div class="movie-title">
                            <h1>Godzilla x Kong: The New Empire</h1>
                        </div>
                        <div class="more-about-movie w-50 justify-content-between">
                            <span class="quality">Full HD</span>
                            <span>29 March 2024</span>
                            <span>115min</span>
                        </div>
                        <div class="language">
                            <span>Vietsub</span>
                        </div>
                    </div>

                    <div class="title-bottom">
                        <div class="category">
                            <strong>Category</strong>
                            <a href="#" class="nav-link">Action</a>
                        </div>
                        <div class="watch-btn">
                            <a href="javascript:void" class="watch-btn nav-link">Watch trailer</a>
                        </div>
                    </div>
                </div>
        {{--            PLAY BTN--}}
                <div class="play-btn-container">
                    <div class="play-btn">
                        <a href="javascript:void">
                            <i class="bi bi-play"></i>
                        </a>
                    </div>
                </div>

                <div id="play" class="play">
                    <a href="javascript:void" class="close-movie">
                        <i class="bi bi-x-circle-fill"></i>
                    </a>
                    <div class="play-movie">
                        <iframe id="m-video"
                             src="https://www.youtube.com/embed/lV1OOlGwExM?si=Vw6d09ZoneKs-kOl" type="video/mp4">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-white mt-2">
            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active c-item">
                        <img src="https://chieuphimquocgia.com.vn/_next/image?url=http%3A%2F%2Fapiv2.chieuphimquocgia.com.vn%2FContent%2FImages%2FBanner%2F0017484.png&w=2048&q=75" class="d-block w-100 h-100" alt="Slide 1">
                        <div class="carousel-caption">
{{--                            <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>--}}
{{--                            <h1 class="display-1 fw-bolder text-capitalize">The Aurora Tours</h1>--}}
                            <a href="#" class="watch-btn px-4 py-2 fs-5 mt-5">Book now</a>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <img src="https://chieuphimquocgia.com.vn/_next/image?url=http%3A%2F%2Fapiv2.chieuphimquocgia.com.vn%2FContent%2FImages%2FBanner%2F0017458.png&w=2048&q=75" class="d-block w-100 h-100" alt="Slide 2">
                        <div class="carousel-caption ">
{{--                            <p class="text-uppercase fs-3 mt-5">The season has arrived</p>--}}
{{--                            <p class="display-1 fw-bolder text-capitalize">3 available tours</p>--}}
                            <a href="#" class="watch-btn align-middle" data-bs-toggle="modal"
                                    data-bs-target="#booking-modal">Book now</a>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <img src="https://chieuphimquocgia.com.vn/_next/image?url=http%3A%2F%2Fapiv2.chieuphimquocgia.com.vn%2FContent%2FImages%2FBanner%2F0017456.png&w=2048&q=75" class="d-block w-100 h-100" alt="Slide 3">
                        <div class="carousel-caption">
{{--                            <p class="text-uppercase fs-3 mt-5">Destination activities</p>--}}
{{--                            <p class="display-1 fw-bolder text-capitalize">Go glacier hiking</p>--}}
                            <a href="#" class="watch-btn align-middle" data-bs-toggle="modal"
                               data-bs-target="#booking-modal">Book now</a>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <img src="https://chieuphimquocgia.com.vn/_next/image?url=http%3A%2F%2Fapiv2.chieuphimquocgia.com.vn%2FContent%2FImages%2FBanner%2F0017453.jpg&w=2048&q=75" class="d-block w-100 h-100" alt="Slide 4">
                        <div class="carousel-caption">
                            {{--                            <p class="text-uppercase fs-3 mt-5">Destination activities</p>--}}
                            {{--                            <p class="display-1 fw-bolder text-capitalize">Go glacier hiking</p>--}}
                            <a href="#" class="watch-btn align-middle" data-bs-toggle="modal"
                               data-bs-target="#booking-modal">Book now</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

{{--        <section class="section-3 text-white mt-5">--}}
{{--            <div class="container">--}}
{{--                <div class="content-heading">--}}
{{--                    <h2>Explore by Genres</h2>--}}
{{--                </div>--}}
{{--                <div class="row pb-3">--}}
{{--                    @foreach(getGenres() as $genre)--}}
{{--                    <div class="col-lg-2">--}}
{{--                        <div class="card text-white rounded-4" style="background-color: #191c33">--}}
{{--                            <div class="right px-4 pace-navy">--}}
{{--                                <div class="text-center card-body fs-5 p-2">--}}
{{--                                    <a href="{{route('home', $genre->name)}}">{{$genre->name}}</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section class="section-4 pt-5">
            <div class="container">
                <div class="content-heading text-white">
                    <h2>Trending Movies</h2>
                </div>
                <div class="row row-cols-4 pb-1">
                    @if($isFeatures->count() > 0)
                        @foreach($isFeatures as $movie)
                            <div class="col">
                                <div class="cards h-100">
                                    @if(!empty($movie->image))
                                        <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="card-image h-75 col-md-4" alt="">
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" class="card-image h-75" alt="">
                                    @endif
                                    <div class="card-bodies d-flex flex-column">
                                        <h3 class="card-title">{{$movie->title}}</h3>
                                        <span class="language">
                                            <span>{{$movie->age->name}}</span>
                                        </span>
                                        <p class="card-subtitle">
                                            <span>{{$movie->release_date}}</span>
                                            <span class="bi bi-dot">{{$movie->duration}}</span>
                                        </p>
                                        <p class="card-subtitle">
                                            <span class="text-white-50">Language: </span>
                                            {{$movie->language}}
                                        </p>
                                        <p class="card-body">
                                            <span class="text-white-50">Director: </span>
                                            {{$movie->director}}
                                        </p>
                                        <a href="#" class="watch-btn nav-link">add to my list</a>
                                        <a href="{{route('bookTickets', $movie)}}" class="watch-btn nav-link mt-2">Book now</a>
                                    </div>
                                    <div class="card-body h-100 pt-1 h-25">
                                        <a class="fs-4 nav-link text-white" href="">{{$movie->title}}</a>
                                        <a class="nav-link text-white-50" href="">@foreach($movieGenres as $movieGenre)
                                                @if($movieGenre->movie_id == $movie->id)
                                                    <span class="bi bi-dot">
                                                        @foreach($genres as $genre)
                                                            <span> {{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</span>
                                                        @endforeach
                                                    </span>
                                                @endif

                                            @endforeach</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span class="text-white fs-4 text-center bg-danger">No Movies found</span>
                    @endif
            </div>
        </section>

        <section class="section-4 pt-5">
            <div class="container">
                <div class="section-title text-white">
                    <h2>Latest Produsts</h2>
                </div>
                <div class="row pb-3 card-body">
                    @if($latestMovies->count() > 0)
                        @foreach($latestMovies as $movie)
                            <div class="col-md-3">
                                <div class="cards h-100">
                                    <img src="{{asset('customer-assets/images/jw4.jpg')}}" class="card-image h-75" alt="">
                                    <div class="card-bodies d-flex flex-column">
                                        <h3 class="card-title">{{$movie->title}}</h3>
                                        <p class="card-subtitle">
                                            <span>{{$movie->release_date}}</span>
                                            <span class="bi bi-dot">{{$movie->duration}}</span>
                                        </p>
                                        <p class="card-subtitle">
                                            <span class="text-white-50">Language: </span>
                                            {{$movie->language}}
                                        </p>
                                        <p class="card-body">
                                            <span class="text-white-50">Director: </span>
                                            {{$movie->director}}
                                        </p>
                                        <a href="#" class="watch-btn nav-link">add to my list</a>
                                        <a href="#" class="watch-btn nav-link mt-2">Book now</a>
                                    </div>
                                    <div class="card-body h-100 pt-1 h-25">
                                        <a class="fs-4 nav-link text-white" href="#">{{$movie->title}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span class="text-white fs-4 text-center bg-danger">No Movies found</span>
                    @endif
                </div>
                    </div>
                </section>
    </div>

    {{--  Products  --}}

    {{--  SHIPPING  --}}

    @include('layouts/scroll_to_top')
    </body>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('frontend/js/home.js')}}"></script>
    <script src="{{asset('customer-assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('customer-assets/js/bootstrap.bundle.5.1.3.min.js')}}"></script>
    <script src="{{asset('customer-assets/js/instantpages.5.1.0.min.js')}}"></script>
    <script src="{{asset('customer-assets/js/lazyload.17.6.0.min.js')}}"></script>
    <script src="{{asset('customer-assets/js/slick.min.js')}}"></script>
    <script src="{{asset('customer-assets/js/custom.js')}}"></script>
    <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    <script>
        $(document).on('click','.play-btn a', function (){
            $('.play').addClass('active-popup');
        })

        $(document).on('click','.watch-btn a', function (){
            $('.play').addClass('active-popup');
        })

        $(document).on('click','.close-movie', function (){
            $('.play').removeClass('active-popup');
        })
        $('.play-btn a').click(function (){
            $('#m-video')[0].play()
        })
        $('.watch-btn a').click(function (){
            $('#m-video')[0].play()
        })
        $('.close-movie').click(function (){
            $('#m-video')[0].pause()
        })

    </script>
@endsection

