
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/registraion.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>To registration our site !</p>
            <a href="{{ route('login') }}"><input type="submit" name="" value="Login"/><br/></a>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Apply as a User</h3>
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
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></h5>
                    <h5 class="register-heading"><span class="" style="color:green; font-weight:bold"></span></span></h5>
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></span></h5>
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></span></h5>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row register-form">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Your Full Name</label>
                                    <input type="text"class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="User Full Name *" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Your Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="Phone *" />
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="passwordid">Enter your password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="1">
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="0">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email *" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="">
                                    <label for="phonenumber">Your Profile photo</label>
                                </div>
                                <div class="custom-file ">
                                    <input type="file" id="logo" name="img" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Confirm password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <input type="submit" class="btnRegister" name="submit"  value="Submit"/>
                            </div>
                        </div>
                    </form>

                </div>
{{--                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">--}}
{{--                    <h3  class="register-heading">Apply as a Doctor</h3>--}}
{{--                    <div class="row register-form">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" class="form-control" placeholder="First Name *" value="" />--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="email" class="form-control" placeholder="Email *" value="" />--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="password" class="form-control" placeholder="Password *" value="" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="lastname" class="form-control" placeholder="Last Name *" value="" />--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />--}}
{{--                            </div>--}}

{{--                            <input type="submit" class="btnRegister"  value="Register"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

</div>
