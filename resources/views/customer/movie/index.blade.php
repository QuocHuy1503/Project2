@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Movie</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">
{{--    <div class="container-fluid p-0">--}}
{{--        <div class=" position-relative d-flex justify-content-center align-items-center text-white">--}}
{{--            --}}
{{--        </div>--}}
{{--    </div>--}}

    <main>
        <section class="section-5 pt-3 pb-3 mb-3">
            <div class="container">
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-white nav-link" href="#">Home</a></li>
                        <li class="breadcrumb-item text-white">Shop</li>
                    </ol>
                </div>
            </div>
        </section>

        <section class="section-6 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sidebar">
                        <div class="sub-title text-white">
                            <h2>Categories</h2>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="accordion accordion-flush" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Electronics
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="navbar-nav">
                                                    <a href="" class="nav-item nav-link">Mobile</a>
                                                    <a href="" class="nav-item nav-link">Tablets</a>
                                                    <a href="" class="nav-item nav-link">Laptops</a>
                                                    <a href="" class="nav-item nav-link">Speakers</a>
                                                    <a href="" class="nav-item nav-link">Watches</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Men's Fashion
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="navbar-nav">
                                                    <a href="" class="nav-item nav-link">Shirts</a>
                                                    <a href="" class="nav-item nav-link">Jeans</a>
                                                    <a href="" class="nav-item nav-link">Shoes</a>
                                                    <a href="" class="nav-item nav-link">Watches</a>
                                                    <a href="" class="nav-item nav-link">Perfumes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Women's Fashion
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="navbar-nav">
                                                    <a href="" class="nav-item nav-link">T-Shirts</a>
                                                    <a href="" class="nav-item nav-link">Tops</a>
                                                    <a href="" class="nav-item nav-link">Jeans</a>
                                                    <a href="" class="nav-item nav-link">Shoes</a>
                                                    <a href="" class="nav-item nav-link">Watches</a>
                                                    <a href="" class="nav-item nav-link">Perfumes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Applicances
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="navbar-nav">
                                                    <a href="" class="nav-item nav-link">TV</a>
                                                    <a href="" class="nav-item nav-link">Washing Machines</a>
                                                    <a href="" class="nav-item nav-link">Air Conditioners</a>
                                                    <a href="" class="nav-item nav-link">Vacuum Cleaner</a>
                                                    <a href="" class="nav-item nav-link">Fans</a>
                                                    <a href="" class="nav-item nav-link">Air Coolers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="sub-title mt-5 text-white">
                            <h2>Genres</h2>
                        </div>

                        <div class="card w-60">
                            <div class="card-body d-flex justify-content-between">
                                <section>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Romance
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Sony
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Oppo
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Vivo
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Vivo
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Vivo
                                        </label>
                                    </div>
                                </section>
                                <section>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Canon
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Sony
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Oppo
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Vivo
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Vivo
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="sub-title mt-5 text-white">
                            <h2>Movies by year</h2>
                        </div>
                        <div>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2016
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2017
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2018
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2019
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2020
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2021
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2022
                            </button>
                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">
                                2023
                            </button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row pb-3">
                            <div class="col-12 pb-1">
                                <div class="d-flex align-items-center justify-content-end mb-4">
                                    <form action="" class="d-flex mb-0" style="width: 250px">
                                        {{--                select--}}
                                        <label for="sorting" class="w-50 d-flex align-items-center justify-content-center text-white">
                                            Sort by
                                        </label>
                                        <select class="form-select rounded-5" aria-label="sorting" id="sorting" name="sorting"
                                                onchange="this.form.submit()">
                                            <option value="default" >Default
                                            </option>
                                            <option value="newest" >Newest
                                            </option>
                                            <option value="bestseller">
                                                Bestseller
                                            </option>
                                            <option value="low_to_high">
                                                Price: Low to High
                                            </option>
                                            <option value="high_to_low">
                                                Price: High to Low
                                            </option>
                                        </select>
                                    </form>
{{--                                    <div class="ml-2">--}}
{{--                                        <div class="btn-group">--}}
{{--                                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Sorting</button>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                <a class="dropdown-item" href="#">Latest</a>--}}
{{--                                                <a class="dropdown-item" href="#">Price High</a>--}}
{{--                                                <a class="dropdown-item" href="#">Price Low</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="images/product-1.jpg" alt=""></a>
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

                            <div class="col-md-12 pt-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







    </main>
    {{--  Products  --}}

    {{--  SHIPPING  --}}

    @include('layouts/scroll_to_top')
    </body>
    <script src="{{asset('frontend/js/home.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/js/demo.js')}}"></script>
@endsection
