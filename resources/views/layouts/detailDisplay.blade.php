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
            <h3>Nama</h3>
            <h6>jumlah total produk</h6>
            <div id="card" class="rounded" >
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
        </div>
    @endsection
</body>
</html>
