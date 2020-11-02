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
        <!-- Modal untuk login-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" id="x">&times;</span>
                </button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body" style="background-color: white">
                        
                            
                            <input type="text" id="inputBox" name="" placeholder=" Username"><br>
                            <!-- cetak error validate-->
                            <br>
                            <input type="password"id="inputBox" name=""  placeholder=" Password">
                            <!-- cetak error validate-->
                            <br><br>
                            Belum Mendaftar?  <a href="">Daftar</a>
                        
                    </div> 
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!----->       
        <div id="header">
            <div id="headerContent">
                <img alt="Logo"  id="logo" src="{{url('/images/logoFAI.png')}}">
                <form method="POST" action="" id="formSearch">
                    @csrf
                    <input type="search" placeholder="Cari Produk, Judul Buku, Penulis" id="searchBox" name="">
                    <input type="submit" name="" id="btnToSearch" value="Search" class="btn btn-outline-danger">
                </form>
            </div>
        </div>
        <div id="content">
            <div id="genreBar">
                <div id="nav">
                    <div id="navBox">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-danger border-0 dropdown-toggle" style="color :white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Genres
                            </button>
                            <div class="dropdown-menu">
                                <!--- di for untuk genre ---->
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div id="navBox2">
                        <a class="btn btn-outline-danger border-0" style="width: 100px ;color :white;" href="#" role="button">Home</a>
                    </div>
                    <div id="navBox2">
                        <a class="btn btn-outline-danger border-0" style="width: 100px;color :white;" href="#" role="button">Top Chart</a>
                    </div>
                    <div id="navBox2">
                        <a class="btn btn-outline-danger border-0" style="width: 100px;color :white;" href="#" role="button">New Arrival</a>
                    </div>
                    <div id="navBox2">
                    </div>
                    <div id="navBox">
                        <a class="btn btn-outline-danger border-0" style="width: 100px;color :white;" data-toggle="modal" data-target="#exampleModalCenter" role="button">Login</a>
                    </div>
                    <div id="navBox2">
                        
                        <a class="btn btn-outline-danger border-0 notif" id="icon" style="width: 80px ;height :45px " href="#" role="button">
                            <i id="icon" class="fas fa-shopping-bag" style="font-size:30px;color:white ; padding-top :-10px !important"></i>
                            <span class="num"><b>2</b></span>
                        </a>
                    </div>
                </div>
            </div>
            <div id="contentContainer">
                @yield('isi')
                <div id="hr"></div>
            </div>
        </div>       
    </div>
</body>
</html>