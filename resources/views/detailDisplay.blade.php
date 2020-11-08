{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyBook.com</title>
</head>
<body> --}}

    {{-- @extends('layouts.templateuser') --}}
    @extends('layouts.templateDetailBuku')

        @section('content')
        @php
            $rating = $detailBuku->rating;
            $genre = DB::table('genres')
                        ->where('id', $detailBuku->genre_id)
                        ->first();
        @endphp

            <div id="boxContent" style="min-height: 980px" >
                <div id="card" class="rounded" >
                    <center><img id="coverBuku"src="{{ asset('/storage/images/'.$detailBuku->image) }}" class="rounded"></center>
                    <br/>
                    <h3 style="margin-left : 2px">{{ $detailBuku->name }}</h3>
                    <h5 style="margin-left : 2px">{{ $detailBuku->writer }}</h5>
                    <h6 style="margin-left : 2px">{{ $genre->name }}</h6>
                    <div id="rating">
                        @for ($i = 0; $i < $rating; $i++)
                            <span class="fa fa-star checked"  style="font-size:10px;"></span>
                        @endfor
                    </div>
                    <h6 style="float: left ; margin-right : 2px">Harga: Rp. {{ number_format($detailBuku->sell_price) }}</h6>

                    <br/> <br/>
                    <form method="post">
                        @csrf
                        <button formaction="/book/addToCart/{{ $detailBuku->id }}" class="btn btn-success" style="float: center; margin:5px">Add to Cart</button>
                        <button formaction="/book/addToWishlist/{{ $detailBuku->id }}" class="btn btn-primary" style="float: center; margin:5px">Add to Wishlist</button>
                    </form>
                </div>
            </div>
        @endsection
    </body>
    </html>
