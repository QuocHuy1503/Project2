@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Booking</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    </head>
    <body style="background-color: #00001c;">
    <hr class="text-white">
    <section class="section-5 pt-3 pb-3 mb-3">
        <div class="container">
            <div>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="bi bi-slash-lg text-white">Booking</li>
                </ol>
            </div>
        </div>
    </section>
          @foreach ($seats as $seat)
          @php
              $rows = $seat->number_of_row;
              $cols = $seat->number_of_col;
              $nextSeat = 1;
              $currentCol = 1;
          @endphp
      @endforeach
<form action="{{route('bookingStore')}}" method="POST" enctype="multipart/form-data">
@csrf
@method('POST')
  <div class="d-flex justify-content-around">
    <div>
      <table>
        @for ($col = 1; $col <= $cols; $col++)
          <tr>
            @for ($row = 1; $row <= $rows; $row++ && $nextSeat++)
              <td>
                <!--Div một ô vào-->
                <!--Thêm cách truyền id vào-->
                {{--Ở đây t ghi  --}}
                {{-- <input type="hidden" name="seat_ids" value="{{$nextSeat}}"> --}}
                <input type="checkbox" class="btn-check" id="btn-check-{{$nextSeat}}" autocomplete="off" name="seat_id[]" value="{{$nextSeat}}">
                <label class="btn btn-primary" for="btn-check-{{$nextSeat}}">{{ $row . chr($col + 64) }}</label>
              </td>
            @endfor
          </tr>
        @endfor
      </table>
    </div>
        <!--In ghế-->
        
  
        <!--Hết-->
        {{-- Screening --}}
        <div class="d-flex flex-column">
          @foreach ($screening as $item)
            <input type="hidden" name="auditorium_id" value="{{$item->auditorium_id}}">
            <input type="hidden" name="movie_id" value="{{$item->movie_id}}">
            <input type="radio" class="btn-check" name="options-screening_start" id="success-outlined-{{$item->id}}" autocomplete="off" checked>
            <label class="btn btn-outline-success" for="success-outlined-{{$item->id}}">{{$item->screening_start}}</label>
           @endforeach
        </div>
         {{-- End Screening --}}
  </div>
  <button type="submit" class="btn btn-primary">Primary</button>
</form>


@include('layouts/scroll_to_top')
    </body>
    <script src="{{asset('frontend/js/home.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/demo.js')}}"></script>
@endsection
