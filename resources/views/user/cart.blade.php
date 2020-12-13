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
        @php
            $ctr2 = 1;
        @endphp
        @isset($arrCart)
        <form action="/checkout" method="POST" >
            @csrf
            @foreach ($arrCart as $cart)
                @php
                    $total += ($cart->sell_price - $cart->discount)*$cart->qty;
                @endphp

                <tr>
                    <td>{{ $ctr++ }}</td>
                    <td>{{ $cart->name }}</td>
                    <td>Rp. {{ number_format($cart->sell_price - $cart->discount) }}</td>
                    <td>
                            <input type="hidden" id="id" name="id{{$ctr2}}" value="{{$cart->id}}">
                            <input type="hidden" name="harga" id="harga{{$ctr2}}" value="{{ $cart->sell_price - $cart->discount }}">
                            <button type="button"  class="btn btn-success" onclick="kurang({{$ctr2}})" style="transform:translateX(5px)"> - </button>
                            <input type="number" name="qty{{$ctr2}}" id="jumlah{{$ctr2}}" value="{{ $cart->qty }}" style="width:60px ; text-align : center" >
                            <button type="button" name="btnTambah" onclick="tambah({{$ctr2}})" class="btn btn-success" style="transform:translateX(-25px)"> + </button>
                        
                        <script>
                            function tambah(t){
                                var temp = document.getElementById("jumlah"+t).value;
                                temp++;
                                document.getElementById("jumlah"+t).value = temp;
                                
                                hitung();
                            }
                            function kurang(t){
                                var temp = document.getElementById("jumlah"+t).value;
                                temp--;
                                document.getElementById("jumlah"+t).value = temp;
                                hitung();
                            }
                            function hitung(){
                                var temp ;
                                var harga ;
                                var total = 0;
                                for (let index = 1; index <= {{count($arrCart)}}; index++) {
                                    temp = parseInt(document.getElementById("jumlah"+index).value);
                                    harga = parseInt(document.getElementById("harga"+index).value);
                                    total = total +(harga * temp);
                                }
                                document.getElementById("total").innerHTML = total;
                                document.getElementById("grandTotal").value =total;

                            }
                        </script>
                            @php
                                $ctr2++;
                            @endphp
                    </td>
                    <td>
                            <button formaction="/deleteCart/{{$cart->id}}" class="btn btn-danger">Delete</a></button>
                        
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
  </table>
@endsection

@section('footer')

        <div style="float: left ;margin-left:5% ; text-align :left">
            <br/> <br/> Pilih metode pembayaran : <br>
            <input type="hidden" name="" id="check" value="0">
        <input type="radio" name="pengiriman" onclick="biasa()" value="standard" checked> Standard 3-4 Hari ( Free Ongkir ) <br>
        <input type="radio" name="pengiriman" onclick="express()"value="express" id=""> Express 1 hari ( + Rp. 10,000 )
        </div>
        <script>
            function biasa(){
                var check =parseInt(document.getElementById("check").value);
                var total =  parseInt(document.getElementById("total").innerHTML);
                if  (check == 1){
                    total = total -10000
                }
                document.getElementById("check").value =0;
                document.getElementById("total").innerHTML = total;
                document.getElementById("grandTotal").value =total;
            }
            function express(){
                var check =parseInt(document.getElementById("check").value);
                var total =  parseInt(document.getElementById("total").innerHTML);
                if  (check == 0){
                    total = total +10000
                }
                document.getElementById("check").value =1;
                document.getElementById("total").innerHTML = total;
                document.getElementById("grandTotal").value =total;
            }
        </script>


@php
$point = Auth::user()->points;
@endphp 

        <div style="margin-right: 5%">
            Pilih metode pembayaran :
            <select id="" name="payment">
                <option value="manual">Transfer ATM</option>
                <option value="midtrans">Midtrans</option>
                @if ($point >= 10)
                    <option value="point">Point</option>
                @endif
            </select><br><br>
            <h5> Total : Rp <span id="total">{{ $total }}</span></h5>
            <br>
            <input type="hidden" name="temp"value="{{$ctr}}">
            <input type="hidden" id="grandTotal"value="{{$total}}" name="grandtotal">
            <input type="submit" class="btn btn-info" style="float: right;" value="Checkout">
        </div>

    </form>
@endsection
