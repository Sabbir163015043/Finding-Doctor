
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
        <form action="" method="post">
            <input type="text" name="email" placeholder="Username Or Email" />
            <input type="password" name="password" placeholder="Password" />

            <input type="submit" name="signup_submit" value="Sign In" />
            <a href="registrations.php"><h4>Create an Account</h4></a>
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
