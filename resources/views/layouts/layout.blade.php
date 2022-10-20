<!DOCTYPE html>
<html lang="en">
<head>
    @stack('css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link  href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




</head>

<body>

<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <a href="/"> <label class="logo">Product Radar</label></a>
    <ul>
        <li><a  href="/" class="nav_a"  id="activation">Home</a></li>

        @if(session()->has('logged'))

            <li><a   href="/profile" class="nav_a"  >Profile</a></li>
            <li><a href="/logout" class="nav_a">Log out</a></li>
        @endif

        @if(session()->has('logged')==false)
        <li><a href="/register" class="nav_a">Register</a></li>
        <li><a href="/login" class="nav_a">Log in</a></li>
        @endif
    </ul>
</nav>

@yield('content')


















</body>
</html>
