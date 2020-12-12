<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
      type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SET_YOUR_CLIENT_KEY_HERE"
    ></script>
  </head>

  <body>
      @extends('layouts.templateDetailBuku')
      @section('content')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8"  >
                        <h3>Pembayaran</h3>
                        <div class="card border-0"style="background-color: white">
                            <table class="table table-striped" style=" margin-right: 5%">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Judul Buku</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @isset($arrCart)
                                    @foreach ($arrCart as $cart)
                                        <tr>
                                            <td>{{ $ctr++ }}</td>
                                            <td>{{ $cart->name }}</td>
                                            <td>Rp. {{ number_format($cart->sell_price - $cart->discount) }}</td>
                                            <td>
                                                {{$cart->qty}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        </div>
                        @php
                            $point = Auth::user()->points;
                        @endphp

                        @if ($pengiriman == "express")
                        <p>Pengiriman yang di pilih adalah pengiriman Express maka total akan ditambah Rp. 10,000.</p>
                        @endif
                        <h4 style="text-align: right">Total Rp. {{number_format($grandtotal)}}</h4><br>
                        @if ($pembayaran == "manual")
                        <form action="/manualPayment" method="POST">
                            @csrf
                            <input type="submit" name="" class="btn btn-success"id="pay-button"style="float : right"  value="Bayar Sekarang">
                        </form>
                        @elseif  ($pembayaran == "point")
                            @if ($grandtotal <= 100000)
                                <p>Your points : {{ $point }} </p>
                                <p>For this transaction, you must pay <b>10</b> points. </p>
                                <form action="/pointPayment" method="POST">
                                    @csrf
                                    <input type="submit" name="" class="btn btn-success"id="pay-button"style="float : right"  value="Redeem Point">
                                </form>
                            @else
                                <p>In order to redeem points, the maximum transaction is Rp 100,000. </p>
                                <form action="/showCart" method="POST">
                                    @csrf
                                    <input type="submit" name="" class="btn btn-success"id="pay-button"style="float : right"  value="Back to Cart">
                                </form>
                            @endif

                        {{-- {@elseif  ($pembayaran == "midtrans")
                        <button id="pay-button" class="btn btn-success" style="float : right">Bayar Sekarang</button>
                        <script type="text/javascript">
                            var payButton = document.getElementById('pay-button');
                            // For example trigger on button clicked, or any time you need
                            payButton.addEventListener('click', function () {
                            snap.pay('{{$snap_token}}'); // Replace it with your transaction token
                            });
                        </script>} --}}
                        @endif


                    </div>
                </div>
            </div>
      @endsection


  </body>
</html>
