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
                        <li class="breadcrumb-item"><a class="text-white nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="bi bi-slash-lg text-white">Movie</li>
                    </ol>
                </div>
            </div>
        </section>

        <section class="section-6 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 sidebar">
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{route('movie')}}'" class="btn text-white btn-outline-danger">
                                Reset <span class="bi bi-arrow-clockwise"></span>
                            </button>
                        </div>
                        <div class="sub-title mt-4 text-white">
                            <h2>Explore by Genres</h2>
                        </div>

                        <div class="card w-70 text-white" style="background-color: #191c33">
                            <div class="card-body justify-content-between">
                                @if($genres->count() > 0)
                                    @foreach($genres as $genre)
                                <section>
                                    <div class="form-check mb-2">
{{--                                        <input {{in_array($genre->id, $genresArray) ? 'checked' : ''}} class="form-check-input genre-label" type="checkbox" name="genre[]" value="{{$genre->id}}" id="genre-{{ $genre->id }}">--}}
                                        <a href="{{ route('movie', $genre->name) }}" class="form-check-label nav-link nav-tabs-right ">
                                            {{$genre->name}}
                                        </a>
                                    </div>
                                </section>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="sub-title mt-5 text-white">
                            <h2>Ages</h2>
                        </div>
                        <div class="card w-70 text-white" style="background-color: #191c33">
                            <div class="card-body justify-content-between">
                                @if($ages->count() > 0)
                                    @foreach($ages as $age)
                                        <section>
                                            <div class="form-check mb-2">
                                                <a class="nav-link link-light {{ ($ageSelected == $age->id) ? 'text-danger bi bi-arrow-right' : '' }}"
                                                   href="{{ route('movie', $age->name) }}">
                                                    {{$age->name}}
                                                </a>
                                            </div>
                                        </section>
                                    @endforeach
                                @endif
                            </div>
                        </div>

{{--                        <div class="sub-title mt-5 text-white">--}}
{{--                            <h2>Movies by year</h2>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2016--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2017--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2018--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2019--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2020--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2021--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2022--}}
{{--                            </button>--}}
{{--                            <button class="form-check-label btn m-1 text-white" style="background-color: #191c33">--}}
{{--                                2023--}}
{{--                            </button>--}}
{{--                        </div>--}}

                        <div class="sub-title mt-5 text-white">
                            <h2>Prices</h2>
                        </div>
                        <div class="card w-70 text-white" style="background-color: #191c33">
                            <div class="card-body d-flex justify-content-between">
                                <section>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            $0-$100
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            $100-$200
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            $200-$500
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            $500
                                        </label>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row pb-3">
                            <div class="col-12 pb-1">
                                <div class="d-flex align-items-center justify-content-end mb-4">
                                    <form action="" class="d-flex mb-0" style="width: 250px">
                                        {{--                select--}}
                                        <label for="sorting" class="w-50 d-flex align-items-center justify-content-center text-white">
                                            Sort by <span class="bi bi-filter-circle-fill"></span>
                                        </label>
                                        <select class="form-select rounded-5" aria-label="sorting" id="sorting" name="sorting"
                                                onchange="this.form.submit()">
                                            <option value="default" >Default
                                            </option>
                                            <option value="newest" >Newest
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

                            <div class="container-fluid p-0">
                                <section class="section-4">
                                    <div class="container">
                                        <div class="row pb-3">
                                            @if($movies->count() > 0)
                                                @foreach($movies as $movie)
                                                    <div class="col-md-4">
                                                        <div class="cards h-100">
                                                            @if(!empty($movie->image))
                                                                <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="card-image h-75" alt="">
                                                            @else
                                                                <img src="{{ asset('admin-assets/img/default-150x150.png') }}" class="card-image h-75" alt="">
                                                            @endif
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
                                                                <a href="{{ route('bookTickets', $movie) }}" class="watch-btn nav-link mt-2">Book now</a>
                                                            </div>
                                                            <div class="card-body h-100 pt-1 h-25">
                                                                <a class="fs-4 nav-link text-white" href="">{{$movie->title}}</a>
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
                                <div class="card-footer clearfix">
{{--                                    {{$movies->onEachSide(3)->links()}}--}}
                                </div>
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

@section('customJs')
    <script>
        $(".genre-label").change(function (){
            apply_filters();
        });

        function apply_filters(){
            var genres = [];
            $(".genre-label").each(function (){
                if ($(this).is(":checked") === true){
                    genres.push($(this).val())
                }
            })

            console.log(genres.toString())
            var url = '{{ url()->current() }}?'

            window.location.href = url+'&genre=' +genres.toString()
        }
    </script>
@endsection
