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
                            @if(!$infos->count())
                                <h3 style="color:red">Sorry Data Not Found!!</h3>

                            @endif
                                <h3 class="text-center text-success">Receive Item</h3>
                            @foreach($infos as $info)

                            <div class="well">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img style="width:200px;border-radius: 5px" class="media-object" src="{{asset("")}}{{$info->userinformation->image}}">
                                    </a>
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="media-heading">{{$info->userinformation->doctor_name}}</h4>
                                                <h6 class="media-heading">{{$info->userinformation->designation}}</h6>
                                            </div>
{{--                                            <div class="col-md-6">--}}
{{--                                                <form action="{{route('store.senditem')}}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    <div class="form-group">--}}
{{--                                                    <label for="exampleInputEmail1"> User</label>--}}
{{--                                                    <select name="user" id="" class="form-control">--}}
{{--                                                        <option value="">---select User---</option>--}}
{{--                                                        @foreach($users as $user)--}}
{{--                                                            <option value="{{$user->id}}">{{ $user->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                    <small class="text-danger">{{ $errors->first('user') }}</small>--}}
{{--                                                        <input type="hidden" name="send_item" value="{{ $info->id }}">--}}
{{--                                                        <input type="hidden" name="sender" value="{{ Auth::user()->id }}">--}}
{{--                                                        <button type="submit" class="btn btn-sm btn-danger">Send</button>--}}
{{--                                                </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
                                        </div>


{{--                                        <p class="text-right">By {{Auth::user()->name}}</p>--}}
                                        <h5>
                                            Test Type: - {{$info->userinformation->testingtype->name}}<br>
                                            Hospital Name: - {{$info->userinformation->hospital_name}}<br>
                                        </h5>
                                        <ul class="list-inline list-unstyled">
                                            <li style="font-size: 12px"><span><i class="glyphicon glyphicon-calendar"></i> {{$info->created_at->format('jS F Y h:i:s A')}} </span></li>
                                            <li>|</li>
                                            <li style="font-size: 12px">Sender {{ $info->send_by }}</li>
                                            <form action="{{ route('destroy.senditem', $info->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            <li><span><button class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button> </span></li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
