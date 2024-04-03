@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Movie Details</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">

    <main>
        <section class="section-6 pt-3 container">
            <div class="mx-auto d-flex py-sm-3">
                @if($movies->count() > 0)
                    @foreach($movies as $movie)
                        @if(!empty($movie->image))
                            <img src="{{ asset('uploads/movie/'.$movie->image) }}" class="rounded" width="300px" alt="">
                        @else
                            <img src="{{ asset('admin-assets/img/default-150x150.png') }}" class="rounded" width="300px" alt="">
                        @endif
                    <div class="px-5 text-right text-white">
                        <div class="fs-2">
                            {{$movie->title}}
                        </div>
                        <div class="language">
                            <span>{{$movie->language}}</span>
                        </div>
                        <div class="mt-3">
                            <span>{{$movie->release_date}}</span>
                            <span class="bi bi-dot">{{$movie->duration}}</span>
                        </div>
                        <div class="mt-3">
                            <span>
                                <b>Genre:</b>
                                @foreach($movieGenres as $movieGenre)
                                    @if($movieGenre->movie_id == $movie->id)
                                        @foreach($genres as $genre)
                                            <span>{{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</span>
                                        @endforeach
                                    @endif

                                @endforeach</span>
                        </div>
                        <div class="mt-3">
                            <span>
                                <b>Cast:</b>
                                @foreach($movieCasts as $movieCast)
                                    @if($movieCast->movie_id == $movie->id)
                                        @foreach($casts as $cast)
                                            <span>{{$cast->id == $movieCast->cast_id ? $cast->image:''}}</span>
                                        @endforeach
                                    @endif

                                @endforeach</span>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="watch-btn nav-link">Book now</a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <hr class="text-white">
            <section class="section-3 text-white mt-5">
                <div>
                    <div class="content-heading">
                        <h2>Cast</h2>
                    </div>
                    <div class="d-flex pb-3">
                        @foreach($movieCasts as $movieCast)
                            @if($movieCast->movie_id == $movie->id)
                                @foreach($casts as $cast)
                                    <img class="w-25 h-25" src="{{ $cast->id == $movieCast->cast_id ? asset('uploads/cast/'.$cast->image) : '' }}" alt="">
                                    <span>{{$cast->id == $movieCast->cast_id ? $cast->name:''}}</span>
                                @endforeach
                            @endif

                        @endforeach
                    </div>
                </div>
            </section>
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
