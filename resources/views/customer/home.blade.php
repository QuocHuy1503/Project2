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
                    <a class="fade-in fade-bottom nav-link fs-4 d-flex text-white btn btn-warning" href="{{route('movie')}}">
                        View more Film<span class="bi bi-incognito p-2"></span>
                    </a>
                </button>
            </div>
        </div>

        <div id="play" class="play">
            <div class="play-video">
                <iframe width="420" height="315"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=0">
                </iframe>
            </div>
        </div>
        <section class="text-white">
            <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active c-item">
                        <img src="https://images.unsplash.com/photo-1579033461380-adb47c3eb938?fit=crop&w=1964&q=100" class="d-block w-100 h-75" alt="Slide 1">
                        <div class="carousel-caption mb-4">
                            <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
                            <h1 class="display-1 fw-bolder text-capitalize">The Aurora Tours</h1>
                            <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Book a tour</button>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <img src="https://images.unsplash.com/photo-1516466723877-e4ec1d736c8a?fit=crop&w=2134&q=100" class="d-block w-100 h-75" alt="Slide 2">
                        <div class="carousel-caption top-0 mt-4">
                            <p class="text-uppercase fs-3 mt-5">The season has arrived</p>
                            <p class="display-1 fw-bolder text-capitalize">3 available tours</p>
                            <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
                                    data-bs-target="#booking-modal">Book a tour</button>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <img src="https://images.unsplash.com/photo-1612686635542-2244ed9f8ddc?fit=crop&w=2070&q=100" class="d-block w-100 h-75" alt="Slide 3">
                        <div class="carousel-caption top-0 mt-4">
                            <p class="text-uppercase fs-3 mt-5">Destination activities</p>
                            <p class="display-1 fw-bolder text-capitalize">Go glacier hiking</p>
                            <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
                                    data-bs-target="#booking-modal">Book a tour</button>
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
        <section class="section-3 text-white">
            <div class="container">
                <div class="content-heading">
                    <h2>Genres</h2>
                </div>
                <div class="row pb-3">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Action</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Adventure</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Comedy</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Fantasy</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card justify-content-center">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Horror</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Romance</h2>
                                    <p>100 Movies</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="img-fluid" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Thriller</h2>
                                    <p>100 Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="">
                                <img src="{{asset('customer-assets/images/cat-1.jpg')}}" alt="" class="img-fluid" width="100px">
                            </div>
                            <div class="right">
                                <div class="text-center">
                                    <h2>Science fiction</h2>
                                    <p>100 Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-4 pt-5">
            <div class="container">
                <div class="content-heading text-white">
                    <h2>Trending Movies</h2>
                </div>
                <div class="row pb-3">
                    <div class="col-md-3">
                        <div class="cards h-100">
                            <img src="{{asset('customer-assets/images/jw4.jpg')}}" class="card-image h-75" alt="">
                            <div class="card-bodies d-flex flex-column">
                                <h1 class="card-title">John Wick</h1>
                                <p class="card-subtitle">
                                    <span>2023</span>
                                    <span class="bi bi-dot">1 hr 25 mins</span>
                                </p>
                                <p class="card-info">dddddddddddd</p>
                                <a class="btn " style="background: rgba(255,255,255, .1)">
                                    <span class="d-none">Added to my list</span>
                                    <span class="text-white">Add to my list</span>
                                </a>
                            </div>
                            <div class="card-body h-100 pt-1 h-25">
                                <a class="fs-4 nav-link text-white" href="#">John Wick 4</a>
                                <a class="fs-6 nav-link d-flex text-white-50" href="#">Action <p class="bi bi-dot">Thriller</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cards h-100">
                            <img src="{{asset('customer-assets/images/jw4.jpg')}}" class="card-image h-75" alt="">
                            <div class="card-bodies d-flex flex-column">
                                <h1 class="card-title">John Wick</h1>
                                <p class="card-subtitle">
                                    <span>2023</span>
                                    <span class="bi bi-dot">1 hr 25 mins</span>
                                </p>
                                <p class="card-info">dddddddddddd</p>
                                <a class="btn " style="background: rgba(255,255,255, .1)">
                                    <span class="d-none">Added to my list</span>
                                    <span class="text-white">Add to my list</span>
                                </a>
                            </div>
                            <div class="pt-1 h-25">
                                <a class="fs-4 nav-link text-white" href="#">John Wick 4</a>
                                <a class="fs-6 nav-link d-flex text-white-50" href="#">Action <p class="bi bi-dot">Thriller</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cards h-100">
                            <img src="{{asset('customer-assets/images/spm-nwh.jpg')}}" class="card-image h-75" alt="">
                            <div class="card-bodies d-flex flex-column">
                                <h3 class="card-title">Spider Man: No Way Home</h3>
                                <p class="card-subtitle">
                                    <span>2023</span>
                                    <span class="bi bi-dot">1 hr 25 mins</span>
                                </p>
                                <p class="card-info">dddddddddddd</p>
                                <a class="btn " style="background: rgba(255,255,255, .1)">
                                    <span class="d-none">Added to my list</span>
                                    <span class="text-white">Add to my list</span>
                                </a>
                            </div>
                            <div class="pt-1 h-25">
                                <a class="fs-4 nav-link text-white" href="#">John Wick 4</a>
                                <a class="fs-6 nav-link d-flex text-white-50" href="#">Action <p class="bi bi-dot">Thriller</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cards h-100">
                            <img src="{{asset('customer-assets/images/spm-nwh.jpg')}}" class="card-image h-75" alt="">
                            <div class="card-bodies d-flex flex-column">
                                <h3 class="card-title">Spider Man: No Way Home</h3>
                                <p class="card-subtitle">
                                    <span>2023</span>
                                    <span class="bi bi-dot">1 hr 25 mins</span>
                                </p>
                                <p class="card-info">dddddddddddd</p>
                                <a class="btn " style="background: rgba(255,255,255, .1)">
                                    <span class="d-none">Added to my list</span>
                                    <span class="text-white">Add to my list</span>
                                </a>
                            </div>
                            <div class="pt-1 h-25">
                                <a class="fs-4 nav-link text-white" href="#">John Wick 4</a>
                                <a class="fs-6 nav-link d-flex text-white-50" href="#">Action <p class="bi bi-dot">Thriller</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <div class="product-image position-relative">
                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>
                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                <div class="product-action">
                                    <a class="btn btn-dark" href="#">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center mt-3">
                                <a class="h6 link" href="product.php">Dummy Product Title</a>
                                <div class="price mt-2">
                                    <span class="h5"><strong>$100</strong></span>
                                    <span class="h6 text-underline"><del>$120</del></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{--        <section class="section-4 pt-5">--}}
        {{--            <div class="container">--}}
        {{--                <div class="section-title">--}}
        {{--                    <h2>Latest Produsts</h2>--}}
        {{--                </div>--}}
        {{--                <div class="row pb-3">--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-md-3">--}}
        {{--                        <div class="card product-card">--}}
        {{--                            <div class="product-image position-relative">--}}
        {{--                                <a href="" class="product-img"><img class="card-img-top" src="{{asset('customer-assets/images/product-1.jpg')}}" alt=""></a>--}}
        {{--                                <a class="whishlist" href="222"><i class="far fa-heart"></i></a>--}}

        {{--                                <div class="product-action">--}}
        {{--                                    <a class="btn btn-dark" href="#">--}}
        {{--                                        <i class="fa fa-shopping-cart"></i> Add To Cart--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="card-body text-center mt-3">--}}
        {{--                                <a class="h6 link" href="product.php">Dummy Product Title</a>--}}
        {{--                                <div class="price mt-2">--}}
        {{--                                    <span class="h5"><strong>$100</strong></span>--}}
        {{--                                    <span class="h6 text-underline"><del>$120</del></span>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}
    </div>

    {{--  Products  --}}

    {{--  SHIPPING  --}}

    @include('layouts/scroll_to_top')
    </body>
    <!-- AdminLTE for demo purposes -->
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
@endsection

