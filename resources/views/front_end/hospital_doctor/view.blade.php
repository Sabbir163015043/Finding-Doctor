@extends('front_end.layout.master')

@section('content')


    <br>
    <br>
    <br>
{{--    @include('front_end.admin.partials.header')--}}

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
                    <div class="row">
                        <div class="col-md-12">
                            @if(!$hospitals->count())
                                <h3 style="color:red">Sorry Data Not Found!!</h3>

                            @endif
                                <h3 class="text-center text-success">Receive Item</h3>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hospital</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        @foreach($hospitals->where('category','hospital') as $info)

                                            <div class="well">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img style="width:200px;border-radius: 5px" class="media-object" src="{{asset("")}}{{$info->image}}">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h4 class="media-heading">{{$info->hospital_name}}</h4>
                                                                <h6 class="media-heading">{{$info->city->name}}</h6>
                                                            </div>
                                                        </div>

                                                        <p>
                                                             {{$info->hospital_details}}<br>
                                                        </p>
                                                        <ul class="list-inline list-unstyled">
{{--                                                            <li style="font-size: 12px"><span><i class="glyphicon glyphicon-calendar"></i> {{$info->created_at->format('jS F Y h:i:s A')}} </span></li>--}}
{{--                                                            <li>|</li>--}}
{{--                                                            <li style="font-size: 12px">Sender {{ $info->send_by }}</li>--}}
                                                            <form action="{{ route('destroy.doctorhospital', $info->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <li><span><button style="width:300px" class="btn btn-sm btn-danger"  onclick="return confirm(' you want to delete?');"><i class="glyphicon glyphicon-trash"></i></button> </span></li>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @foreach($hospitals->where('category','doctor') as $info)

                                            <div class="well">
                                                <div class="media">
                                                    <a class="pull-left" href="#">
                                                        <img style="width:200px;border-radius: 5px" class="media-object" src="{{asset("")}}{{$info->image}}">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h4 class="media-heading">{{$info->doctor_name}}</h4>
                                                                <h6 class="media-heading">{{$info->doctortype->name}}</h6>
                                                                <h6 class="media-heading">{{$info->city->name}}</h6>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            {{$info->doctor_details}}<br>
                                                        </p>
                                                        <ul class="list-inline list-unstyled">
{{--                                                            <li style="font-size: 12px"><span><i class="glyphicon glyphicon-calendar"></i> {{$info->created_at->format('jS F Y h:i:s A')}} </span></li>--}}
{{--                                                            <li>|</li>--}}
{{--                                                            <li style="font-size: 12px">Sender {{ $info->send_by }}</li>--}}
                                                            <form action="{{ route('destroy.doctorhospital', $info->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <li><span><button style="width:300px" class="btn btn-sm btn-danger"  onclick="return confirm(' you want to delete?');"><i class="glyphicon glyphicon-trash"></i></button> </span></li>
                                                            </form>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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

    </style>
@endpush
