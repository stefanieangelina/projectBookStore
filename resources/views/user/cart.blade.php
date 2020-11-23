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
                        <form method="POST">
                            @csrf
                            <button type="submit" formaction="/qtyDown/{{$cart->id}}" class="btn btn-success" style="transform:translateX(5px)"> - </button>
                            <input type="number" min="1" name="qty" value="{{ $cart->qty }}">
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
    <p> <h5 style="margin-right: 5%; float: right;"> Total : Rp {{ number_format($total) }}</h5> </p>
    <br/> <br/>

    <form method="post" style="margin-right: 5%" action="/checkout">
        @csrf
    <input type="hidden" value="{{$total}}" name="grandtotal">
        <button class="btn btn-info" style="float: right;"> Checkout </button>
    </form>
@endsection
