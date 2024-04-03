<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <title>Movie Ticket Booking Website</title>
</head>
<body>
<div class="book">
    <div class="left">
        <div class="link-light cont">
            <a class="link-light bi bi-arrow-left" href="{{ route('movie') }}">Back movie home</a>
        </div>
        <img src="{{ asset('uploads/movie/'.$movie->image) }}" alt="" id="poster">

        <div class="cont">
            <h6>Directed by</h6>
            <p>{{$movie->director}}</p>
            <h6>Starring</h6>
            <p>	@foreach($movieCasts as $movieCast)
                @if($movieCast->movie_id == $movie->id)
                        <span class="bi bi-dot"></span>
                    @foreach($casts as $cast)
                        {{$cast->id == $movieCast->cast_id ? $cast->name:''}}
                        @endforeach
                        @endif
                        @endforeach
                        </p>
            <h6>Edited by</h6>
            <p>	Ruben</p>
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

        <div class="date_type">
            <div class="left_card">
                <h6 class="title">Thursday 4 May</h6>
                <div class="card_month crd">
                    <li>
                        <h6>Mon</h6>
                        <h6 class="date_point">20</h6>
                    </li>
                    <li>
                        <h6>Tue</h6>
                        <h6 class="date_point">21</h6>
                    </li>
                    <li>
                        <h6>Wed</h6>
                        <h6 class="date_point">22</h6>
                    </li>
                    <li>
                        <h6>Thu</h6>
                        <h6 class="date_point">23</h6>
                    </li>
                    <li>
                        <h6>Fri</h6>
                        <h6 class="date_point">24</h6>
                    </li>
                    <li>
                        <h6>Sat</h6>
                        <h6 class="date_point">25</h6>
                    </li>
                    <li>
                        <h6>Sun</h6>
                        <h6 class="date_point">26</h6>
                    </li>
                    <li>
                        <h6>Mon</h6>
                        <h6 class="date_point">27</h6>
                    </li>
                    <li>
                        <h6>Tue</h6>
                        <h6 class="date_point">28</h6>
                    </li>
                    <li>
                        <h6>Wed</h6>
                        <h6 class="date_point">29</h6>
                    </li>
                    <li>
                        <h6>Thu</h6>
                        <h6 class="date_point">30</h6>
                    </li>
                    <li>
                        <h6>Fri</h6>
                        <h6 class="date_point">1</h6>
                    </li>
                    <li>
                        <h6>Sat</h6>
                        <h6 class="date_point">2</h6>
                    </li>
                    <li>
                        <h6>Sun</h6>
                        <h6 class="date_point">3</h6>
                    </li>
                </div>
            </div>
            <div class="right_card">
                <h6 class="title">Show Time</h6>
                <div class="card_month crd">
                    <li>
                        <h6>2D</h6>
                        <h6>10:00</h6>
                    </li>
                    <li>
                        <h6>2D</h6>
                        <h6>12:30</h6>
                    </li>
                    <li>
                        <h6>2D</h6>
                        <h6>14:00</h6>
                    </li>
                    <li>
                        <h6>2D</h6>
                        <h6>17:00</h6>
                    </li>
                    <li>
                        <h6>2D</h6>
                        <h6>18:00</h6>
                    </li>
                    <li>
                        <h6>3D</h6>
                        <h6>20:00</h6>
                    </li>
                    <li>
                        <h6>3D</h6>
                        <h6>10:00</h6>
                    </li>
                    <li>
                        <h6>4DX</h6>
                        <h6>21:00</h6>
                    </li>
                    <li>
                        <h6>4DX</h6>
                        <h6>22:30</h6>
                    </li>
                    <li>
                        <h6>4DX</h6>
                        <h6>12:00</h6>
                    </li>
                    <li>
                        <h6>4DX</h6>
                        <h6>12:30</h6>
                    </li>
                </div>
            </div>
        </div>

        <div class="screen" id="screen">
            Screen
        </div>

        <!-- chairs  -->
        <div class="chair" id="chair">
             <div class="row">
                <span>J</span>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <li class="seat">560</li>
                <span>J</span>
            </div>
        </div>

        <!-- Ticket  -->

        <div class="ticket" id="ticket">
            <div class="tic">
                <div class="barcode">
                    <div class="card">
                        <h6>ROW J</h6>
                        <h6>7 September 2023</h6>
                    </div>
                    <div class="card">
                        <h6>Seat 18</h6>
                        <h6>23:00</h6>
                    </div>

                    <svg id="barcode"></svg>
                    <h5>VEGUS CINEMA</h5>
                </div>
                <div class="tic_details">
                    <div class="type">4DX</div>
                    <h5 class="pvr"><span>Vegus</span> Cinema</h5>
                    <h1>Jawan</h1>
                    <div class="seat_det">
                        <div class="seat_cr">
                            <h6>ROW</h6>
                            <h6>J</h6>
                        </div>
                        <div class="seat_cr">
                            <h6>SEAT</h6>
                            <h6>18</h6>
                        </div>
                        <div class="seat_cr">
                            <h6>DATE</h6>
                            <h6>7 <sub>sep</sub></h6>
                        </div>
                        <div class="seat_cr">
                            <h6>TIME</h6>
                            <h6>11:30 <sub>pm</sub></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Details  -->
        <div class="details" id="det">
            <div class="details_chair">
                <li>Avalable</li>
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

</body>
<script src="{{asset('customer-assets/js/movie.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js" integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    JsBarcode("#barcode", "J18800792023");
</script>

