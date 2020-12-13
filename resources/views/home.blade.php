@extends('layouts.templateuser')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
<div class="row" style="width:100%; block;margin: auto;">
    @isset($arrBuku)
        @foreach ($arrBuku as $buku)
            <div class="col-xl-3 col-sm-5 col-11" style="margin:1%">
                <div class="card" style="max-height: 600px" >
                    <h1 style="text-align: center;"></h1>
                    <div class="content" style="font-size: 20px">
                        <center><img src="{{ asset('/storage/images/'.$buku->image) }}" style="width:35%; height:75%"></center><br/>
                        <div style="min-height: 60px;max-height:72px;overflow: hidden;padding: 5px"><b >{{ $buku->name }}</b></div>

                        <div  style="font-size: 15px;padding :5px;color:gray"><p>{{ $buku->writer }}</p></div>
                        <div id="rating">
                            @for ($i = 0; $i < $buku->rating; $i++)
                                <span class="fa fa-star checked"  style="font-size:14px;"></span>
                            @endfor
                            @for ($i = 0; $i < 5-$buku->rating; $i++)
                                <span class="fa fa-star"  style="font-size:14px;"></span>
                            @endfor
                        </div>
                        <br>
                        @if ($buku->discount == 0)
                            <div style="padding: 5px"><p>Harga: Rp. {{ number_format($buku->sell_price) }}</p></div>
                        @else
                            <div style="padding: 5px"><p>Harga: <strike> Rp. {{ number_format($buku->sell_price) }}</strike> Rp. {{ number_format($buku->sell_price - $buku->discount) }}</p></div>
                        @endif

                        <hr>
                        <form method="post" class="col-sm">
                            @csrf
                            <button formaction="/book/viewDetail/{{ $buku->id }}" class="btn btn-warning sm-4" style="float: right; margin:5px">View Detail</button>
                            <button formaction="/book/addToCart/{{ $buku->id }}" class="btn btn-success sm-4" style="float: right; margin:5px">Add to Cart</button>
                            <button formaction="/book/addToWishlist/{{ $buku->id }}" class="btn btn-primary sm-4" style="float: right; margin:5px">Add to Wishlist</button>
                        </form>
                        <br/> <br/> <br/>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
</div>
@endsection
@if(Auth::user()->email_verified_at == null)
    belum verified
@endif


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

