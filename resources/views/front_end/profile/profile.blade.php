@extends('front_end.layout.master')

@section('content')


    <br>
    <br>
    <br>
{{--    @include('front_end.admin.partials.header')--}}

    <!-- Main -->
        <div class="container-fluid">
            <div class="row">
                @include('front_end.admin.partials.sidebar')
                <div class="container bootstrap snippet">
                    <div class="row">
                        <div class="col-md-3"><!--left col-->
                            <div class="text-center">
                                @if(!$user->image)
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                @else
                                    <img src="{{asset("")}}{{$user->image}}" style="border-radius: 100%; width: 130px;height: 130px;" class="avatar img-circle img-thumbnail" alt="avatar">
                                    <h4>{{$user->name}}</h4>
                                    <h5>{{$user->email}}</h5>
                                    <h5>{{$user->phone}}</h5>
                                @endif
                            </div></hr><br>
                        </div><!--/col-3-->
                        <div class="col-md-6">
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
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                                <li><a data-toggle="tab" href="#messages">Change Password</a></li>
                            </ul>


                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>
                                    <form class="form" action="{{route('user.profile.update',Auth::user()->id)}}" enctype="multipart/form-data" method="POST" id="registrationForm">
                                       @csrf
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="name"><h4>Name</h4></label>
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="name"><h4>Email</h4></label>
                                                <input type="text" class="form-control" name="email" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="name"><h4>Phone</h4></label>
                                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" >
                                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile"><h4>Image</h4></label>
                                                <input type="file" name="img" class="text-center center-block file-upload">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
{{--                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>--}}
                                            </div>
                                        </div>
                                    </form>

                                    <hr>

                                </div><!--/tab-pane-->
                                <div class="tab-pane" id="messages">

                                    <h2></h2>

                                    <hr>
                                    <form class="form" action="{{route('user.profile.changePassword')}}" method="post" id="registrationForm">
                                        @csrf
                                        <div class="form-group">

                                            <div class="col-xs-12">
                                                <label for="first_name"><h4>Current Password</h4></label>
                                                <input id="current-password" type="password" class="form-control" name="current-password" placeholder="Enter Current Password" required>
                                                <small class="text-danger">{{ $errors->first('current-password') }}</small>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-12">
                                                <label for="first_name"><h4>New Password</h4></label>
                                                <input id="new-password" type="password" class="form-control" name="new-password" required placeholder="New Password">
                                                <small class="text-danger">{{ $errors->first('new-password') }}</small>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-12">
                                                <label for="first_name"><h4>Confirm New Password</h4></label>
                                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required placeholder="Confirm Password">
                                                <small class="text-danger">{{ $errors->first('new-password_confirmation') }}</small>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Change Password</button>
{{--                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>--}}
                                            </div>
                                        </div>
                                    </form>

                                </div><!--/tab-pane-->

                            </div><!--/tab-pane-->
                        </div><!--/tab-content-->

                    </div><!--/col-9-->
                </div><!--/row-->
            </div><!--/row-->
        </div>
        <!-- upper section -->

        <!-- /upper section -->




@endsection
@push('style-css')
    <style>

    </style>
@endpush
