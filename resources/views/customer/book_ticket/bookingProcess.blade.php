@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Movie Details</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">

    <div class="text-white container mt-5"><a href="{{ route('movie') }}" class="nav-link bi bi-arrow-left ">Back</a></div>
    <section class="mt-5">
        <form action="#" class="form w-75">
            <!-- Progress bar -->
            <div class="progressbar w-25 ">
                <div class="progress" id="progress"></div>

                <div
                    class="progress-step progress-step-active"
                    data-title=""
                ></div>
                <div class="progress-step" data-title=""></div>
                <div class="progress-step" data-title=""></div>
                <div class="progress-step" data-title=""></div>
            </div>
            <!-- Steps -->
            <div class="form-step form-step-active">
                <h3 class="text-center text-white">Stage 1: Choose time</h3>
                <div class="container">
                    <div class="row text-white">
                        <div class="col-md">Calender</div>
                        <div class="col-md">Choose time</div>
                    </div>
                </div>

                <div class="w-25">
                    <a href="#" class="btns btn-next w-50 ml-auto">Next</a>
                </div>
            </div>
            <div class="form-step">
                <h3 class="text-center text-white">Stage 2: Choose seat</h3>
                <div class="input-group">
                    <div class="book container">
                        <div class="left rounded pt-3 pb-5">
                            <div class="cont">
                                <h6 class="fw-bolder">Screening: <span>ff</span></h6>
                                <h6 class="fw-bolder">Directed by</h6>
                                <p>{{$movie->director}}</p>
                                <h6 class="fw-bolder">Genre</h6>
                                <p>
                                    @foreach($movieGenres as $movieGenre)
                                        @if($movieGenre->movie_id == $movie->id)
                                            <span class="bi bi-dot">
                                                @foreach($genres as $genre)
                                                    <span> {{$genre->id == $movieGenre->genre_id ? $genre->name:''}}</span>
                                                @endforeach
                                            </span>
                                        @endif
                                    @endforeach
                                </p>
                                <span class="language"><span>{{ $movie->language }}</span>
                                <span class="bg-danger">{{ $movie->age->name }}</span></span>
                                <a href="#" class="btns mt-2 btn-prev w-75 d-flex nav-link link-light"><span class="bi bi-arrow-left">Previous</span> </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="head_time">
                                <h1 id="title">{{$movie->title}}</h1>
                                <div class="time">
                                    <h6><i class="bi bi-clock"></i> {{ $movie->duration }} </h6>
                                    <button>PG-13</button>
                                </div>
                            </div>

                            <div class="container">
                                <div class="screen" id="screen">
                                    Screen
                                </div>

                                <!-- chairs  -->
                                <div class="chair" id="chair">
                                    <ul class="row" id="seats">
                                        <span>J</span>
                                        <li id="seats" value="10" class="seat">560</li>
                                        <li id="seats" value="10" class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="booked">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="booked">560</li>
                                        <li class="booked">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="booked">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <li class="seat">560</li>
                                        <span>J</span>
                                    </ul>
                                    <p class="text">
                                        You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
                                    </p>
                                </div>
                            </div>



                            <!-- Details  -->
                            <div class="details" id="det">
                                <div class="details_chair">
                                    <li>Available</li>
                                    <li>Booked</li>
                                    <li>Selected</li>
                                </div>
                            </div>
                            <button class="book_tic" id="book_ticket">
                                <i class="bi bi-arrow-right-short"></i>
                            </button>
                            <button class="book_tic" id="back_ticket">
                                <i class="bi bi-arrow-left-short"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="btns-group">

                    <a href="#" class="btns btn-next w-25">Next</a>
                </div>
            </div>
            <div class="form-step">

                <div class="btns-group">
                    <a href="#" class="btns btn-prev">Previous</a>
                    <a href="#" class="btns btn-next">Next</a>
                </div>
            </div>
            <div class="form-step">

                <div class="btns-group">
                    <a href="#" class="btns btn-prev">Previous</a>
                    <input type="submit" value="Submit" class="btns" />
                </div>
            </div>
        </form>
    </section>
    @include('layouts/scroll_to_top')
    </body>
    <script src="{{asset('frontend/js/home.js')}}"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin-assets/js/demo.js')}}"></script>
    <script src="{{ asset('customer-assets/js/movie.js') }}"></script>
    <script>
        const container = document.querySelector('.container');
        const seats = document.querySelectorAll('.row .seat:not(.booked)');
        const count = document.getElementById('count');
        const total = document.getElementById('total')


        function updateSelectedCount()
        {
            const selectedSeats = document.querySelectorAll('.row .seat.selected');
            const selectedSeatsCount = selectedSeats.length;
            count.innerText = selectedSeatsCount;
            total.innerText = selectedSeatsCount * ticketPrice;
        }

        container.addEventListener('click', (e) => {
            if (e.target.classList.contains('seat') &&
                !e.target.classList.contains('booked')) {
                e.target.classList.toggle('selected');
            }

            updateSelectedCount();
        })
    </script>
@endsection
