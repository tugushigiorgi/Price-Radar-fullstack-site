<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register </title>
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
        <li><a   href="/profile" class="nav_a"  >Profile</a></li>
        <li><a href="/register" class="nav_a" id="activation">Register</a></li>
        <li><a href="/login" class="nav_a"  >Log in</a></li>

    </ul>
</nav>




<form class="register_form" method="post" action="/register">


    @csrf
    <!-- Email input -->
    <center><div class="login_form_title">რეგისტრაცია</div></center>
    <div class="form-outline mb-4">


        <label class="form-label" for="form2Example1">სახელი</label>
        <br>
        <span class="error">  @error('name'){{$message}}  @enderror</span>
        <input   type="text" id="form2Example1" class="form-control" name="name" value="{{old("name")}}"/>


    </div>





    <div class="form-outline mb-4">


        <label class="form-label" for="form2Example1">ელ-ფოსტა</label>
        <br>
        <span class="error">  @error('email'){{$message}}  @enderror</span>
        <input   type="email" id="form2Example1" class="form-control" name="email" value="{{old("email")}}"/>


    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">

        <label class="form-label" for="form2Example2">პაროლი</label>
        <br>
        <span class="error">  @error('password'){{$message}}  @enderror</span>
        <input
    type="password" id="form2Example2" class="form-control"  name="password"  />









    <!-- Submit button -->
    <button type="submit" id="registerbtn" class="btn btn-primary btn-block mb-4" style="font-weight: bold; font-size :20px ;background-color: rgba(20, 38, 48, 1);  margin-top: 40px"   >რეგისტრაცია ></button>



        @if(Session::get("error"))
            <center><div class="message_error" >{{Session::get("error")}}</div></center>
             @endif





</form>








</body>
</html>
