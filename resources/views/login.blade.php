<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link  href="./css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<!--Stylesheet-->
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
/>
<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
/>
<!-- MDB -->
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
    rel="stylesheet"
/>
<style>
    body{
        background-color: #8f4df8;
    }
</style>
<body>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <a href="/"> <label class="logo">Product Radar</label></a>
    <ul>
        <li><a  href="/" class="nav_a"   >Home</a></li>
        @if(Session()->has('logged'))

        <li><a   href="/profile" class="nav_a"  >Profile</a></li>
        @endif
        <li><a href="/register" class="nav_a">Register</a></li>
        <li><a href="/login" class="nav_a" id="activation">Log in</a></li>

    </ul>
</nav>
<form class="login_form"  action="/login" method="post">

    @csrf
    <!-- Email input -->
    <center><div class="login_form_title">სისტემაში შესვლა</div></center>
    <div class="form-outline mb-4">



        <label class="form-label" for="form2Example1">Email address</label>
        <input type="email" id="form2Example1" class="form-control" name="email" />
        <span class="error">  @error('email'){{$message}}  @enderror</span>

    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">


        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" id="form2Example2" class="form-control" name="password" />
        <span class="error">  @error('password'){{$message}}  @enderror</span>

    </div>
    <button   class="btn btn-primary btn-block mb-4" id="loginBTN" style="font-weight: bold; font-size :20px ;background-color: rgba(20, 38, 48, 1); "  type="submit" >სისტემაში შესვლა</button>


    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a member? <a href="/register">Register</a></p>

    </div>
   @if(Session::get('login_fail'))
   <center> <div class="message_error">{{Session::get('login_fail')}}</div></center>
    @endif
</form>








</body>
</html>
