@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Movie Details</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">

{{--    <main>--}}
{{--        <section class="section-6 pt-3 container">--}}
{{--            <div class="mx-auto d-flex py-sm-3">--}}
{{--                        @if(!empty($movie->image))--}}
{{--                            <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="rounded" width="300px" alt="">--}}
{{--                        @else--}}
{{--                            <img src="{{ asset('admin-assets/img/default-150x150.png') }}" class="rounded" width="300px" alt="">--}}
{{--                        @endif--}}
{{--                    <div class="px-5 text-right text-white">--}}
{{--                        <div class="fs-2">--}}
{{--                            {{$movie->title}}--}}
{{--                        </div>--}}
{{--                        <div class="language">--}}
{{--                            <span>{{$movie->language}}</span>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <span>{{$movie->release_date}}</span>--}}
{{--                            <span class="bi bi-dot">{{$movie->duration}}</span>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <span>--}}
{{--                                <b>Genre:</b>--}}
{{--                                @foreach($movieGenres as $movieGenre)--}}
{{--                                    @if($movieGenre->movie_id == $movie->id)--}}
{{--                                        <li class="bi bi-do">--}}
{{--                                            @foreach($genres as $genre)--}}
{{--                                                <span> {{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</span>--}}
{{--                                            @endforeach--}}
{{--                                        </li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <span>--}}
{{--                                <b>Cast:</b>--}}
{{--                                @foreach($movieCasts as $movieCast)--}}
{{--                                    @if($movieCast->movie_id == $movie->id)--}}
{{--                                        @foreach($casts as $cast)--}}
{{--                                            <span>{{$cast->id == $movieCast->cast_id ? $cast->name:''}}</span>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}

{{--                                @endforeach</span>--}}
{{--                        </div>--}}
{{--                        <div class="mt-3">--}}
{{--                            <a href="#" class="watch-btn nav-link">Book now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--            <hr class="text-white">--}}
{{--            <section class="section-3 text-white mt-5">--}}
{{--                <div>--}}
{{--                    <div class="content-heading">--}}
{{--                        <h2>Cast</h2>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex pb-3">--}}
{{--                        @foreach($movieCasts as $movieCast)--}}
{{--                            @if($movieCast->movie_id == $movie->id)--}}
{{--                                @foreach($casts as $cast)--}}
{{--                                    <span class="bi bi-dot">--}}
{{--                                        <img class="w-25 h-25" src="{{ $cast->id == $movieCast->cast_id ? asset('uploads/cast/'.$cast->image) : '' }}" alt="">--}}
{{--                                        <span>{{$cast->id == $movieCast->cast_id ? $cast->name:''}}</span>--}}
{{--                                    </span>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}

{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </section>--}}
{{--    </main>--}}
    <main>
        <section class="section-5 pt-3 pb- mb-3">
            <div class="container">
                <div class="text-white">
                    <ul class="breadcrumb primary-color text-white mb-0">
                        <li><a class="nav-link text-danger fw-bold" href="{{ route('home') }}">Home<span class="text-white bi bi-slash-lg"></span></a></li>
                        <li><a class="nav-link text-danger fw-bold" href="{{ route('movie') }}">Movie</a></li>
                        <li class="bi bi-slash-lg text-white breadcrumb-item">{{ $movie->title }}</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section-7 pt-3 mb-3">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 fixed">
                        <div>
                            @if(!empty($movie->image))
                                <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="rounded-4 w-100" alt="">
                            @else
                                <img src="{{ asset('admin-assets/img/default-150x150.png') }}" class="rounded" width="300px" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 fs-5">
                        <div class=" right text-white">
                            <h1>{{$movie->title}}</h1>
                            <div class="language">
                                <span>{{$movie->language}}</span>
                            </div>
                            <div class="mt-3">
                                <span>{{\Carbon\Carbon::parse($movie->release_date)->format('d-m-Y')}}</span>
                                <span class="bi bi-dot">{{$movie->duration}}</span>
                            </div>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis officiis dolor aut nihil iste porro
                                ullam repellendus inventore voluptatem nam veritatis exercitationem doloribus voluptates dolorem nobis voluptatum
                                qui, minus facere. {!! $movie->description !!}</p>
                            <div class="mt-3">
                                <span>
                                    <b>Genre:</b>
                                    @foreach($movieGenres as $movieGenre)
                                        @if($movieGenre->movie_id == $movie->id)
                                            <li class="">
                                                @foreach($genres as $genre)
                                                    <span> {{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</span>
                                                @endforeach
                                            </li>
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                            <div class="mt-3">
                                <span>
                                    <b>Cast:</b>
                                    @foreach($movieCasts as $movieCast)
                                        @if($movieCast->movie_id == $movie->id)
                                            <span class="bi bi-das">
                                            @foreach($casts as $cast)
                                                <span>{{$cast->id == $movieCast->cast_id ? $cast->name:''}}</span>
                                            @endforeach
                                            </span>
                                            ,
                                        @endif
                                    @endforeach
                                    ...
                                </span>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('bookTickets', $movie->title) }}" class="watch-btn nav-link">Book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
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
