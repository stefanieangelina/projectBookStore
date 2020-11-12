<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Bukuku.com</title>
</head>
<body>
    <div id="container">
        <div id="hr"></div>               
        <div id="containerRegist">
            <div id="formRegist">
                <h2>Daftar</h2>
                <br>
                <form action="" method="">
                    @csrf
                    <input type="text" id="inputBox2" name="" placeholder=" Username"><br>
                    <!-- cetak error validate-->
                    <br>
                    <input type="text" id="inputBox2" name="" placeholder=" Email"><br>
                    <!-- cetak error validate-->
                    <br>
                    <input type="password"id="inputBox2" name=""  placeholder=" Password">
                    <!-- cetak error validate-->
                    <br><br>
                    <input type="checkbox" name="" id="termsBox">Dengan pembuatan akun, Anda menyetujui Syarat & Ketentuan serta Kebijakan Privasi Bukuku.com
                    <br>
                    <input type="submit" name="" id="btnRegister" value="Daftar" class="rounded btn btn-outline-danger">
                    <br> 
                    <h6 id="backToLogin">Sudah Mendaftar?  <a href="">Masuk</a></h6>
                </form> 
            </div>
            <div id="logoDiv">
                <img src="{{url('/images/logoInvert.jpg')}}" alt="Logo" >
            </div>    
        <div>            
    </div>
</body>
</html>