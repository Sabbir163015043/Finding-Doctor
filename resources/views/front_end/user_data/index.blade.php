@extends('front_end.layout.master')

@section('content')


<br>
<br>
<br>
{{-- @include('front_end.admin.partials.header')--}}

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
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <form action="{{ route('store.userdata') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Doctor Name</label>
                                        <input type="text" name="doctor_name" value="{{old('doctor_name')}}" class="form-control" id="name" placeholder="Enter Doctor name">
                                        <small class="text-danger">{{ $errors->first('doctor_name') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Doctor Designation</label>
                                        <input type="text" name="doctor_designation" value="{{old('doctor_designation')}}" class="form-control" id="name" placeholder="Enter Designation">
                                        <small class="text-danger">{{ $errors->first('doctor_designation') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hospital Name</label>
                                        <input type="text" name="hospital_name" value="{{old('hospital_name')}}" class="form-control" id="name" placeholder="Enter Hospital Name">
                                        <small class="text-danger">{{ $errors->first('hospital_name') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Test Category</label>
                                        <select name="test_type" id="" class="form-control">
                                            <option value="">---select test category---</option>
                                            @foreach($types as $type)
                                            <option value="{{$type->id}}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger">{{ $errors->first('test_type') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" name="date_type" class="form-control" id="name" placeholder="Enter Date">
                                        <small class="text-danger">{{ $errors->first('date_type') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" name="img" class="form-control">
                                        <small class="text-danger">{{ $errors->first('img') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <h3 class="text-center text-success"> My Data</h3>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($userinfos as $info)
                        <div class="well">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img style="width:200px;border-radius: 5px" class="media-object" src="{{asset("")}}{{$info->image}}">
                                </a>
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="media-heading">{{$info->doctor_name}}</h4>
                                            <h6 class="media-heading">{{$info->designation}}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{route('store.senditem')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"> Share With</label>
                                                    <select name="user" id="" class="form-control">
                                                        <option value="">---select User---</option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('user') }}</small>
                                                    <input type="hidden" name="send_item" value="{{ $info->id }}">
                                                    <input type="hidden" name="sender" value="{{ Auth::user()->name }}">
                                                    <button type="submit" class="btn btn-sm btn-danger">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    {{-- <p class="text-right">By {{Auth::user()->name}}</p>--}}
                                    <h5>
                                        Test Type: - {{$info->testingtype->name}}<br>
                                        Hospital Name: - {{$info->hospital_name}}<br>
                                    </h5>
                                    <ul class="list-inline list-unstyled">
                                        <li><span><i class="glyphicon glyphicon-calendar"></i> {{$info->created_at->format('jS F Y h:i:s A')}} </span></li>
                                        <li>|</li>
                                        <form action="{{ route('destroy.userdata', $info->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete?')"><i class="glyphicon glyphicon-trash"></i></button>
                                                </div>
                                            </div>
                                        </form>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <!--/row-->
        </div>
        <!--/col-span-9-->
    </div>
    <!--/row-->
    <!-- /upper section -->
</div>
<!--/container-->
<!-- /Main -->




@endsection
@push('style-css')
<style>

</style>
@endpush
