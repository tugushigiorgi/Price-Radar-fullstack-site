<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset</title>

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

<form class="login_form"  action="/reset" method="post">
    @method("put")
    @csrf
    <!-- Email input -->
    <center><div class="login_form_title">პაროლის შეცვლა</div></center>
    <div class="form-outline mb-4">



        <label class="form-label" for="form2Example1">მიმდინარე პაროლი</label>
        <input type="password" id="form2Example2" class="form-control" name="old_password" />
        <span class="error">  @error('old_password'){{$message}}  @enderror</span>

    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">


        <label class="form-label" for="form2Example2">ახალი პაროლი</label>
        <input type="password" id="form2Example2" class="form-control" name="new_password" />
        <span class="error">  @error('new_password'){{$message}}  @enderror</span>

    </div>
    <button   class="btn btn-primary btn-block mb-4" id="loginBTN" style="font-weight: bold; font-size :20px ;background-color: rgba(20, 38, 48, 1); "  type="submit" >პაროლის შეცვლა</button>


    @if(Session::get('reset_fail'))
        <center> <div class="message_error">{{Session::get('reset_fail')}}</div></center>
    @endif
</form>








</body>
</html>
