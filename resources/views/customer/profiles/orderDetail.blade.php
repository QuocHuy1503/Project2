@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Lịch sử đặt hàng</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body style="background-color: #00001c">
    <hr class="text-white">
    <div class="container d-flex align-items-center mt-5 h-80 overflow-hidden ">
        <div class="border w-20 rounded-start p-3 h-100 text-white" style="background-color: #191c33">
            @include('layouts/profile_menu')
        </div>
        <div class="border w-80 rounded-end p-3 h-100 text-white" style="background-color: #191c33">
            <div>
                <div class="fs-5">
                    Lịch sử đặt vé
                </div>
                <div>
                    Xem những đợt chiếu mà bạn đã đặt vé
                </div>
                <hr>
            </div>
            <div class="d-flex w-100 h-100 flex-column">
                {{-- @foreach($reservations as $reservation) --}}
                    <div class="w-100 h-30 d-flex justify-content-between align-items-center border rounded  mb-3 p-3">
                        <div class="h-100 w-75 d-flex flex-column justify-content-center">
                            <div class="fw-bold fst-italic">
                                {{-- @switch($order->order_status)
                                    @case(0)
                                        <span class="text-danger">Pending</span>
                                        @break
                                    @case(1)
                                        <span class="text-success">Confirmed</span>
                                        @break
                                    @case(2)
                                        <span class="text-primary">Delivery</span>
                                        @break
                                    @case(3)
                                        <span class="text-success">Completed</span>
                                        @break
                                    @case(4)
                                        <span class="text-danger">Cancelled</span>
                                        @break
                                @endswitch --}}
                            </div>
                            <div>
                                {{-- Thời gian chiếu phim : {{$reservation->screening_start}} --}}
                                
                            </div>
                            <div>
                                {{-- Ở phòng chiếu: {{$reservation->name}} --}}
                            </div>
                            <div>
                               {{-- Số ghế đã đặt: {{$reservation->totalSeats}}  --}}
                            </div>
                            <div>
                                {{-- Tổng tiền: {{$data['totalMoney']}} --}}
                                {{-- Tổng tiền: {{$reservation->payment_amount}}$ --}}
                            </div>
                            <div>
                                {{-- {{dd($order)}} --}}
                            </div>
                        </div>
                        <div class="h-100 w-25 d-flex align-items-center justify-content-end">
                        
                        </div>
                    </div>
                {{-- @endforeach --}}
                <div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- {{$reservations->onEachSide(2)->links()}} --}}
                    </div>
                </div>

            </div>
            
        </div>
        
    </div>
    </body>
@endsection


