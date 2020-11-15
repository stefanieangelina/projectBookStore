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
    <!-- script munculkan login pop up!! --> 
    @if (session('pesan'))
    <script>
        $(document).ready(function(){
            $("#exampleModalCenter").modal('show');
        });
    </script>
    @endif   
    <title>Bukuku.com</title>
</head>
<body>
@if(session('alert'))
    <script>alert(session::get('alert'));</script>
@endif

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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="modal-body" style="background-color: white">

                            <input type="text" id="inputBox" name="email" placeholder=" Username" value="{{old('email')}}"><br>
                            @error('user')
                                <div style="color:red; font-weight:bold"> {{$message}}</div>
                            @enderror
                            <br>
                            <input type="password" id="inputBox" name="password"  placeholder=" Password" value="{{old('password')}}">
                            @error('password')
                                <div style="color:red; font-weight:bold"> {{$message}}</div>
                            @enderror
                            @if (session('pesan'))
                                <div style="color:red; font-weight:bold"> {{session('pesan')}}</div>
                            @endif
                            <br><br>
                            Belum Mendaftar?  <a href="/toregist">Daftar</a>

                    </div>
                    <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Login">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <!----->
        <div id="header">
            <div id="headerContent">
                <img alt="Logo"  id="logo" src="{{url('/images/logoFAI.png')}}">
                <form method="POST" action="/search" id="formSearch">
                    @csrf
                    <input type="text" placeholder="Cari Produk, Judul Buku, Penulis" id="searchBox" name="search">
                    <input type="submit" id="btnToSearch" value="Search" class="btn btn-outline-danger">
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
                        <a class="btn btn-outline-danger border-0" id="icon" style="width: 80px ;height :45px " href="#" role="button">
                            <i id="icon" class="fas fa-shopping-bag" style="font-size:30px;color:white ; padding-top :-10px !important"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="contentContainer">
                <!--- slide show banner untuk menambah minat beli costumer ---->
                <div id="carouselExampleIndicators" class="carousel slide rounded" data-ride="carousel" style="height: 250px; width :900px;margin-left : 460px;padding-top: 40px">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{url('/images/bannerInvert.jpg')}}" alt="First slide" style="width: 250px;height:200px">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{url('/images/banner.jpg')}}" alt="Second slide" style="width: 250px;height:200px">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{url('/images/bannerInvert.jpg')}}" alt="Third slide" style="width: 250px;height:200px">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                <!--- container buku + tamplilan buku ---->
                <div id="boxContent">
                    <h3>Buku Terbaru</h3>
                    <h6 >Genre Buku</h6>
                    <a class="btn btn-outline-danger border-0"  style="width: 120px ;height :35px;float: right;margin-top:-50px;margin-right:30px"  href="#" role="button"><b>Lihat Semua</b></a>
                    @for ($i = 0; $i < 6; $i++)
                        <div id="card" class="rounded">
                            <img id="coverBuku"src="{{url('/images/No_Picture.jpg')}}" class="rounded"style="width: 150px; height:230px">
                            <h5 style="margin-left : 2px">Judul Buku</h5>
                            <h6 style="margin-left : 2px">Pengarang</h6><br>
                            <div id="rating">
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star"  style="font-size:10px;"></span>
                                <span class="fa fa-star"  style="font-size:10px;"></span>
                            </div>
                            <h6 style="float: right ; margin-right : 2px">IDR 75.000</h6>
                        </div>
                    @endfor
                </div>
                <!--- ---->
                <div id="boxContent">
                    <h3>Buku Terbaru</h3>
                    <h6 >Genre Buku</h6>
                    <a class="btn btn-outline-danger border-0"  style="width: 120px ;height :35px;float: right;margin-top:-50px;margin-right:30px"  href="#" role="button"><b>Lihat Semua</b></a>
                    @for ($i = 0; $i < 6; $i++)
                        <div id="card" class="rounded">
                            <img id="coverBuku"src="{{url('/images/No_Picture.jpg')}}" class="rounded"style="width: 150px; height:230px">
                            <h5 style="margin-left : 2px; overflow: hidden; max-height: 75px">The Life-Changing Magic of Tidying Up: The Japanese Art of Decluttering and Organizing</h5>
                            <h6 style="margin-left : 2px;height :20px;overflow: hidden; max-height: 20px">Simon and Schuster</h6><br>
                            <div id="rating">
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star checked"  style="font-size:10px;"></span>
                                <span class="fa fa-star"  style="font-size:10px;"></span>
                                <span class="fa fa-star"  style="font-size:10px;"></span>
                            </div>
                            <h6 style="float: right ; margin-right : 2px">IDR 75.000</h6>
                        </div>
                    @endfor
                </div>
                <!--- ---->
                <div id="hr"></div>
            </div>
        </div>
    </div>
</body>
</html>
