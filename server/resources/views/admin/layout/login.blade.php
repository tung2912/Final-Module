<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <base href="{{asset('/admin_resource/resource')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous"/>
<style>
    /*Fonts*/
    @import 'https://fonts.googleapis.com/css?family=Open+Sans';
    @import 'https://fonts.googleapis.com/css?family=Galada';

    ::selection {
        background: #ffb7b7; /* WebKit/Blink Browsers */
    }

    ::-moz-selection {
        background: #ffb7b7; /* Gecko Browsers */
    }

    * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    :focus {
        outline: none
    }

    /*Reset*/
    body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6,
    pre, form, fieldset, input, textarea, p, blockquote, th, td {
        padding: 0;
        margin: 0;
    }

    body, input {
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
        color: #4c4c4c;
    }

    body {
        background-color: #292931;
        background: url(https://www.wallpaperflare.com/static/610/351/628/house-mountains-clouds-brown-wallpaper.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    form {
        margin: 10px 35px;
    }

    input {
        border: none;
    }

    a {
        text-decoration: none;
        color: rgb(255, 255, 255);

    }

    a:hover {
        color: rgba(255, 152, 0, 0.79);
        text-decoration: underline;

    }

    input[type=text], input[type=password] {
        width: 200px;
        height: 38px;
        border: 1px solid #cbc9c9;
        padding-left: 5px;
        margin-left: -5px;
        margin-top: 3px;
        border-radius: 0px 3px 3px 0px;
        -webkit-border-radius: 0px 3px 3px 0px;
        -moz-border-radius: 0px 3px 3px 0px;
    }

    input[type=submit] {
        width: 237px;
        height: 40px;
        margin-left: 17px;
        /*border-radius:3px;*/
        background-color: #ae6a6a;
        color: #f8f8f8;
        border-radius: 2px 2px 12px 12px;
        -webkit-border-radius: 2px 2px 12px 12px;
        -moz-border-radius: 2px 2px 12px 12px;

    }

    input[type=submit]:hover {
        background-color: #607d8b;
        color: #f8f8f8;
        cursor: pointer;

    }

    #icon {
        background-color: #F4F4F4;
        color: #625864;
        display: inline-block;
        font-size: 14px;
        padding-top: 10px;
        padding-bottom: 7px;
        width: 40px;
        margin-left: 15px;
        margin-bottom: 20px;
        text-align: center;
        border-top: solid 1px #cbc9c9;
        border-bottom: solid 1px #cbc9c9;
        border-left: solid 1px #cbc9c9;
        border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        -moz-border-radius: 3px 0 0 3px;
    }

    .wrapper {
        margin: 50px auto;
        width: 343px;
        height: 280px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
    }

    .wrapper h1 {
        font-family: 'Galada', cursive;
        color: #f4f4f4;
        letter-spacing: 8px;
        text-align: center;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .wrapper hr {
        opacity: 0.2;

    }

    .crtacc {
        margin-left: 75px;
    }
</style>
<body>

<div class="wrapper animated bounce">
    <div style="text-align: center;">
        <img style="width: 150px" src="{{ asset('admin_resource/images/homeLogo.png') }}" alt="">
    </div>
    <hr >
    @if(\Illuminate\Support\Facades\Session::has('login-error'))
        <div style="color: #c13b3b; text-align: center; font-weight: bolder">
            {{ \Illuminate\Support\Facades\Session::get('login-error') }}
        </div>
    @endif
    <form method="post">
        @csrf
        <label id="icon" for="email"><i class="fa fa-user"></i></label>
        <input type="text" placeholder="Username" name="email" id="email">

        <label id="icon" for="password"><i class="fa fa-key"></i></label>
        <input type="password" placeholder="Password" id="password" name="password">
        <input type="submit" value="Sign In">
        <hr>
    </form>
</div>

</body>
</html>
