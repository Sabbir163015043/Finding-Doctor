@extends('front_end.layout.master')

@section('content')


        <br>
        <br>
        <br>
{{--        @include('front_end.admin.partials.header')--}}

        <!-- Main -->
        <div class="container-fluid bootstrap snippet" style="min-height: 500px">

            <!-- upper section -->
            <div class="row">
                @include('front_end.admin.partials.sidebar')
                <div class="col-md-9">
                    <!-- column 2 -->
                    <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
                    <hr>
                    <div class="row">
                        <div class="jumbotron">
                            <div class="row w-100">
                                <div class="col-md-3">
                                    <div class="card border-info mx-sm-1 p-3">
                                        <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                                        <div class="text-info text-center mt-3"><h4>Store Data</h4></div>
                                        <div class="text-info text-center mt-2"><h1>{{$mydata}}</h1></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-success mx-sm-1 p-3">
                                        <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div>
                                        <div class="text-success text-center mt-3"><h4>Receive Data</h4></div>
                                        <div class="text-success text-center mt-2"><h1>{{ $receive }}</h1></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-danger mx-sm-1 p-3">
                                        <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div>
                                        <div class="text-danger text-center mt-3"><h4>Hospital</h4></div>
                                        <div class="text-danger text-center mt-2"><h1>{{$hospital}}</h1></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-warning mx-sm-1 p-3">
                                        <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                                        <div class="text-warning text-center mt-3"><h4>Doctor</h4></div>
                                        <div class="text-warning text-center mt-2"><h1>{{$doctor}}</h1></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--/row-->
                </div><!--/col-span-9-->
            </div><!--/row-->
            <!-- /upper section -->
        </div><!--/container-->
        <!-- /Main -->




@endsection
@push('style-css')
    <style>
        .my-card
        {
            position:absolute;
            left:40%;
            top:-20px;
            border-radius:50%;
        }
    </style>
@endpush
