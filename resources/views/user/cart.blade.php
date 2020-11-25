@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('judul')
    <br>
    CART
@endsection

@php
    $total = 0;
@endphp

@section('content')

<table class="table table-striped" style="margin-left: 5%; margin-right: 5%">
    <thead>
      <tr>
        <th>#</th>
        <th>Judul Buku</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @isset($arrCart)
            @foreach ($arrCart as $cart)
                @php
                    $total += ($cart->sell_price - $cart->discount)*$cart->qty;
                @endphp

                <tr>
                    <td>{{ $ctr++ }}</td>
                    <td>{{ $cart->name }}</td>
                    <td>Rp. {{ number_format($cart->sell_price - $cart->discount) }}</td>
                    <td>
                        <form method="POST" style="margin-left:-8%">
                            @csrf
                            <button type="submit" formaction="/qtyDown/{{$cart->id}}" class="btn btn-success" style="transform:translateX(5px)"> - </button>
                            <input type="number" min="1" name="qty" value="{{ $cart->qty }}" style="width:60px ; text-align : center" >
                            <button type="submit" formaction="/qtyUp/{{$cart->id}}" class="btn btn-success" style="transform:translateX(-25px)"> + </button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            @csrf
                            <button formaction="/deleteCart/{{$cart->id}}" class="btn btn-danger">Delete</a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
  </table>
@endsection

@section('footer')
    <form action="/checkout" method="POST" >
        @csrf
        <div style="float: left ;margin-left:5% ; text-align :left">
            Pilih jenis pengiriman : <br>
        <input type="radio" name="pengiriman"  value="standard"> Standard 3-4 Hari ( Free Ongkir ) <br>
        <input type="radio" name="pengiriman" value="express" id=""> Express 1 hari ( + Rp. 10,000 )
        </div>
        
    
    

    
        <div style="margin-right: 5%">
            <h5> Total : Rp {{ number_format($total) }}</h5>
            <br>
            <input type="hidden" value="{{$total}}" name="grandtotal">
            <button class="btn btn-info" style="float: right;"> Checkout </button>
        </div>
    
    </form>
@endsection
