<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in & Sign-up Page</title>
    <link rel="stylesheet" href="{{url('auth/style.css')}}">
    <style>
        .container .img-slider img {
            width: 70%;
            margin-top: 120px;
        }
    </style>
</head>
<body>
    <div class="container" id="content01">
        <div class="img-slider" style="text-align: center;">
            <h2>Welcome to Kopi Letek </h2>
            <p> Official website to control your company </p>
                <img src="{{url('auth/KLlogo.png')}}" alt="img" width="70px">
        </div>
        <div class="content">
            <h2>Registration</h2>
            <form id="form">
                <label for="name" id="nlabel">Name</label> <br>
                <input type="text" id="fname" placeholder="Name " autocomplete="off"> <br>
                <label for="email" id="elabel">Email</label> <br>
                <input type="email" id="eemail" placeholder="Email" autocomplete="off"> <br>
                <label for="password" id="plabel">Password</label> <br>
                <input type="password" name="password" id="lpassword" placeholder="password"> <br>
                <button type="submit"  onclick="UserRegister()" id="btn">Sign Up </button>
            </form>
        </div>
    </div>
    <div class="container display" id="content02">
        <div class="img-slider">
            <h2>Welcome to Kopi Letek</h2>
            <p>Official website to control your company</p>
                <img src="../KLlogo.png" alt="img" class="sign-img">
        </div>
        <div class="content">
            <h2>Registration</h2>
            <form action="" id="form">
                <label for="email" id="elabel">Email</label> <br>
                <input type="email" id="eemail" placeholder="Lucifer@gmail.com" autocomplete="off"> <br>
                <label for="password" id="plabel">Password</label> <br>
                <input type="password" name="password" id="lpassword"> <br>
                <button type="submit" onclick="SignIn()" id="btn1">Log-In </button>
            </form>
        </div>
    </div>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-analytics.js"></script>
<script src="{{url('auth/data.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="server.js"></script> -->
</body>
</html>
