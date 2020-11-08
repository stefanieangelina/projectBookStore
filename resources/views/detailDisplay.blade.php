{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyBook.com</title>
</head>
<body> --}}

    @extends('layouts.templateuser')
    {{-- @extends('templateDetailBuku') --}}

        @section('content')
            <div id="boxContent" style="min-height: 980px" >
                <h3>{{ $detailBuku->judul }}</h3>
                <div id="card" class="rounded" >
                    <img id="coverBuku"src="{{ asset('/storage/images/'.$buku->image) }}" class="rounded"style="width: 150px; height:230px">
                    <h5 style="margin-left : 2px">{{ $detailBuku->writer }}</h5>
                    <h6 style="margin-left : 2px">{{ $detailBuku->genre }}</h6><br>
                    <div id="rating">
                        <span class="fa fa-star checked"  style="font-size:10px;"></span>
                        <span class="fa fa-star"  style="font-size:10px;"></span>
                    </div>
                    <h6 style="float: right ; margin-right : 2px">Harga: Rp. {{ number_format($buku->sell_price) }}</h6>
                </div>
            </div>
        @endsection
    </body>
    </html>
