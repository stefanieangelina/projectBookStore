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
                            <table class="table table-striped" style="margin-left: 5%; margin-right: 5%">
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
                        <h4 style="text-align: right">Total Rp. {{number_format($grandtotal)}}</h4><br>
                        <button id="pay-button" class="btn btn-success" style="float : right">Bayar Sekarang</button>
                        <script type="text/javascript">
                            var payButton = document.getElementById('pay-button');
                            // For example trigger on button clicked, or any time you need
                            payButton.addEventListener('click', function () {
                            snap.pay('{{$snap_token}}'); // Replace it with your transaction token
                            });
                        </script>
                    </div>
                </div>
            </div>
      @endsection


  </body>
</html>
