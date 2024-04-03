@extends('layouts.admin-navbar')
@section('content')
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="">
                        <h1>Movie Details #{{$movie->id}}</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid w-100">

                <!--  content  -->
                <div class=" bg-white rounded-5 d-flex justify-content-center align-items-center w-100" style="height: 500px">
                    {{--       IMG--}}
                    <div class="w-10 d-flex align-items-center justify-content-center h-50 overflow-hidden me-5">
                        <img src="{{ asset('uploads/movie/'.$movie->image) }}" alt="movie_image"
                             class="h-75 w-100 rounded-2">
                    </div>
                    {{--        MAIN--}}
                    <div class="w-50">
                        {{--            HEADING--}}
                        <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                            <div class="fs-3 fw-bold text-capitalize w-50">{{ $movie->title }}</div>
                        </div>
                        {{--            BODY--}}
                        <div class="my-3">
                            <p>

                            </p>
                        </div>
                        <table class="table table-bordered text-center w-100 my-3">

                            <tr>
                                <td class="w-25">Director</td>
                                <td class="bg-white">{{ $movie->director }}</td>
                            </tr>

                            <tr>
                                <td class="w-25">Cast</td>
                                <td class="bg-white">
                                    @foreach($movieCasts as $movieCast)
                                        @if($movieCast->movie_id == $movie->id)
                                            @foreach($casts as $cast)
                                                <div> {{$cast->id == $movieCast->cast_id ? $cast->name:''}}</div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">Age</td>
                                <td class="bg-white">{{ $movie->age->name }}</td>
                            </tr>
                            <tr>
                                <td class="w-25">Genre</td>
                                <td class="bg-white">
                                    @foreach($movieGenres as $movieGenre)
                                        @if($movieGenre->movie_id == $movie->id)
                                            @foreach($genres as $genre)
                                                <div> {{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                        {{--BUTTON--}}
                        <form action="" class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex align-items-center w-25">
                                <a href="{{ route('movie.index') }}" class="text-decoration-none d-flex align-items-center">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
