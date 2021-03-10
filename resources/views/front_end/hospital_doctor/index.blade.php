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
                    <h3 class="text-success text-center">Add Hospital Or Doctor</h3>
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

                            <form action="{{ route('store.doctorhospital') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">City</label>
                                            <select name="city" id="" class="form-control">
                                                <option value="">---select city ---</option>
                                                @foreach($cities as $type)
                                                    <option value="{{$type->id}}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="">---select category ---</option>
                                                    <option value="hospital">Hospital</option>
                                                    <option value="doctor">Doctor</option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('category') }}</small>
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
                                            <label for="exampleInputEmail1">Type</label>
                                            <select name="doctortype" id="" class="form-control">
                                                <option value="">---select doctor type ---</option>
                                                @foreach($doctortypes as $type)
                                                    <option value="{{$type->id}}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">{{ $errors->first('doctortype') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Doctor Details</label>
                                            <textarea rows="5" name="doctor_details" class="form-control" id="name"> </textarea>
                                            <small class="text-danger">{{ $errors->first('doctor_details') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hospital Details</label>
                                            <textarea rows="5" name="hospital_details" class="form-control" id="name"> </textarea>
                                            <small class="text-danger">{{ $errors->first('hospital_details') }}</small>
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

                               <center><button type="submit" style="width:300px" class="btn btn-sm btn-primary">Submit</button></center> 
                            </form>
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
