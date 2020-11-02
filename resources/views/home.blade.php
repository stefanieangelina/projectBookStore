@extends('layouts.templateuser')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    @isset($arrBuku)
        @foreach ($arrBuku as $buku)
            <div class="col-xl-3 col-sm-5 col-11" style="margin:1%">
                <div class="card">
                    <h1 style="text-align: center;"></h1>
                    <div class="content">
                        <img src="/storage/images/{{ $buku->image }}" style="width:100%; height:100%">
                        <b>{{ $buku->name }}</b>
                        <p>Rating: {{$buku->rating}} </p>
                        <p>Harga: <b>Rp.{{$buku->sell_price}}</b></p>
                        <hr>
                        <form method="post">
                            @csrf
                            <button formaction="/book/addToCart/{{ $buku->id }}" class="btn btn-success" style="float: right; margin:15px">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
@endsection


{{-- <div id="container">
    <div id="hr"></div>
    <div id="content">
        <div id="genreBar">
            <div id="nav">
                <div id="navBox">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-danger border-0 dropdown-toggle" style="color :white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Genres
                        </button>
                        <div class="dropdown-menu">
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
                    <a class="btn btn-outline-danger border-0" style="width: 100px;color :white;" href="#" role="button">Login</a>
                </div>
                <div id="navBox2">
                    <a class="btn btn-outline-danger border-0" id="icon" style="width: 80px ;height :45px " href="#" role="button">
                        <i id="icon" class="fas fa-shopping-bag" style="font-size:30px;color:white ; padding-top :-10px !important"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="contentContainer">
            <div id="boxContent">
                <h3>Buku Terbaru</h3>
                <h6 >Genre Buku</h6>
                <a class="btn btn-outline-danger border-0"  style="width: 120px ;height :35px;float: right;margin-top:-50px;margin-right:30px"  href="#" role="button"><b>Lihat Semua</b></a>
                @for ($i = 0; $i < 6; $i++)
                    <div id="card">
                        <img id="coverBuku" src="{{url('/images/No_Picture.jpg')}}" style="width: 168px; height:250px">
                        <h5>Judul Buku</h5>
                        <h6>Pengarang</h6><br>
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
            <div id="boxContent">
                <h3>Buku Terbaru</h3>
                <h6 >Genre Buku</h6>
                <a class="btn btn-outline-danger border-0"  style="width: 120px ;height :35px;float: right;margin-top:-50px;margin-right:30px"  href="#" role="button"><b>Lihat Semua</b></a>
                @for ($i = 0; $i < 6; $i++)
                    <div id="card">
                        <img src="{{url('/images/No_Picture.jpg')}}" style="width: 168px; height:250px">
                        <h5>Judul Buku</h5>
                        <h6>Pengarang</h6><br>
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
            <div id="boxContent">
                <h3>Buku Terbaru</h3>
                <h6 >Genre Buku</h6>
                <a class="btn btn-outline-danger border-0"  style="width: 120px ;height :35px;float: right;margin-top:-50px;margin-right:30px"  href="#" role="button"><b>Lihat Semua</b></a>
                @for ($i = 0; $i < 6; $i++)
                    <div id="card">
                        <img src="{{url('/images/No_Picture.jpg')}}" style="width: 168px; height:250px">
                        <h5>Judul Buku</h5>
                        <h6>Pengarang</h6><br>
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
            <div id="hr"></div>
        </div>
    </div>
</div> --}}

