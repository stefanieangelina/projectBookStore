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
    <title>MyBook.com</title>
</head>
<body>
    <nav  id="mainbar" class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm" style="background-color: white !important">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img alt="Logo" id="logo"width="30" height="30" class="d-inline-block align-top" loading="lazy" src="{{url('/images/logoFAI.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" >
            <li class="nav-item">
                <form method="post" >
                    @csrf
                    <button type="submit" id="wishBtn" formaction="/showWishlist" class="btn btn-link" style="font-size:20px"><strong>Wishlist</strong></button>
                </form>
            </li>
            <li class="nav-item">
                <form method="post">
                    @csrf
                    <button type="submit"formaction="/showCart" class="btn btn-link"><i class='fab fa-opencart'  style="font-size:25px;color:black"><span style="font-size:20px"><b>Cart</b></span></i></button>
                </form>
            </li>
            <li class="nav-item dropdown" >
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown" style="font-size:20px;color:black">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        @if(Auth::user()->email_verified_at == null)
                        belum verified
                        @endif
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/profile" class="dropdown-item">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" method="POST">
            @csrf
            <input class="form-control mr-sm-2" type="search"  placeholder="Cari Judul Buku" aria-label="Search"name="keyword" style="font-size:18px;">
            <input type="submit" formaction="/search"  value="Search" class="btn btn-outline-danger my-2 my-sm-0 font-weight-bold" style="height: 38px">
          </form>
        </div>
      </nav>

    @yield('pengumuman')

    <center><h1>@yield('judul')</h1></center>
    <br/>

    <div class="d-flex justify-content-center justify-content-sm-center justify-content-xl-center">
        {{-- <div class="row" style="width:100%; block;margin: auto;"> --}}
        {{-- <div class="container-fluid" style="padding: 15px"> --}}
            @yield('content')
        {{-- </div> --}}
    </div>

    @yield('footer')
</body>
</html>
