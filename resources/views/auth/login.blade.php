
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/login.css')}}">
</head>
<body>
<div id="login-box">
    <div class="left">
        <h1>Signin</h1>
        <span class="" style="color:red; font-weight:bold;"></span>
        <span class="" style="color:red; font-weight:bold;"></span>
        <span class="" style="color:red; font-weight:bold;"></span>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder=" Email" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color:red">{{ $message }}</strong>
            </span>
            @enderror
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password" />
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong style="color:red">{{ $message }}</strong>
            </span>
            @enderror
            <input type="submit" name="signup_submit" value="Sign In" />
            <a href="{{ route('register') }}"><h4>Create an Account</h4></a>
        </form>


    </div>

    <div class="right">
        <span class="loginwith">Sign in with<br />social network</span>

        <button class="social-signin facebook">Log in with facebook</button>
        <button class="social-signin twitter">Log in with Twitter</button>
        <button class="social-signin google">Log in with Google+</button>

    </div>
    <div class="or">OR</div>

</div>
</body>
</html>
