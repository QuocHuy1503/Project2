@extends('layouts.admin-navbar')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="small-box card">
                        <div class="inner">
                            <h3 style="font-size: 1.5rem">Top 5 phim thịnh hành</h3>
                            <div class="d-flex justify-between">
                                <table class="table table-hover table-bordered text-nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Tên phim</th>
                                            <th scope="col">Số ghế bán được</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topFiveMostPopularMovies as $item)
                                            <tr class="text-center">
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->reservation_count}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-4">
                    <div class="small-box card">
                        <div class="inner">
                            <h3 style="font-size: 1.5rem">Top 5 phim không thịnh hành</h3>
                            <div class="d-flex justify-between">
                                <table class="table table-hover table-bordered text-nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Tên phim</th>
                                            <th scope="col">Số ghế bán được</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topFiveLeastPopularMovies as $item)
                                            <tr class="text-center">
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->reservation_count}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    {{-- @php
        $dataPoints = array(
                array("y" => 25, "label" => "Sunday"),
                array("y" => 15, "label" => "Monday"),
                array("y" => 25, "label" => "Tuesday"),
                array("y" => 5, "label" => "Wednesday"),
                array("y" => 10, "label" => "Thursday"),
                array("y" => 0, "label" => "Friday"),
                array("y" => 20, "label" => "Saturday")
              );
    @endphp --}}
    <script>
        window.onload = function () {
            var chart1 = new CanvasJS.Chart("chartContainer1",{
                data: [{
                    type: "line",
                    dataPoints : <?php echo json_encode($firstChartData, JSON_NUMERIC_CHECK); ?>
                }]
            });
            var chart2 = new CanvasJS.Chart("chartContainer2",{          
                data: [{
                    type: "column",
                    dataPoints : <?php echo json_encode($secondChartData, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart1.render();
            chart2.render();

        }
    </script>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="small-box card">
                        <div class="inner">
                            <h3 style="font-size: 1.5rem">Những khung giờ phổ biến</h3>
                            <div class="d-flex justify-between">
                                <table class="table table-hover table-bordered text-nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Thời gian chiếu phim phổ biến</th>
                                            <th scope="col">Số ghế bán được</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($popularBookingHours as $item)
                                            <tr class="text-center">
                                                <td>{{$item->booking_hour}} h</td>
                                                <td>{{$item->booking_count}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <div id="chartContainer1" style="width: 367px;height:105px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-content-between">
                            <div>
                                <h5 class="card-title">Users Behavior</h5>
                            </div>
                            <div>
                                <p class="card-category">24 Hours performance</p>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div id="chartContainer2" style="height: 370px; width: 100%;">
                            </div>
                        </div>
                        {{--   <div class="card-footer ">

                            <div>
                                <i class="fa fa-history"></i> Updated 3 minutes ago
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
@section('customJs')
    <script>
        console.log('hello')
    </script>
@endsection
