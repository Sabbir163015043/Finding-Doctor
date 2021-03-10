
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
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></h5>
                    <h5 class="register-heading"><span class="" style="color:green; font-weight:bold"></span></span></h5>
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></span></h5>
                    <h5 class="register-heading"><span class="" style="color:red; font-weight:bold"></span></span></h5>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row register-form">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Your Full Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="User Full Name *" value="" />
                                </div>
                                <div class="form-group">
                                    <label for="phonenumber">Your Phone Number</label>
                                    <input type="text" id="phonenumber" maxlength="15" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                </div>

                                <div class="form-group">
                                    <label for="passwordid">Enter your password</label>
                                    <input type="password" id="passwordid" name="password" class="form-control" placeholder="Password" value="" />
                                </div>

                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email *" value="" />
                                </div>
                                <div class="">
                                    <label for="phonenumber">Your Profile photo</label>
                                </div>
                                <div class="custom-file ">
                                    <input type="file" id="logo" name="image" class="custom-file-input">
                                    <label for="logo" class="custom-file-label text-truncate">Your profile photo</label>
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Confirm password</label>
                                    <input type="password" id="confirm" name="confirm_pass" class="form-control" placeholder="Password" value="" />
                                </div>

                                <input type="submit" class="btnRegister" name="submit"  value="Submit"/>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Apply as a Doctor</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>

                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="male" checked>
                                        <span> Male </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="female">
                                        <span>Female </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="lastname" class="form-control" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                            </div>

                            <input type="submit" class="btnRegister"  value="Register"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
