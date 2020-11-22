@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
<div class="row">
    <div class="col-75 col-9">
      <div class="container">
        <form action="/action_page.php">

          <div class="row">
            <div class="col-50 col-6">
              <h3>Billing Address</h3>
              <div class="row form-group">
                <label class="col-4" for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input class="col form-control" type="text" id="fname" name="firstname" placeholder="John M. Doe">
              </div>

              <div class="row form-group">
                  <label class="col-4" for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input class="col form-control" type="text" id="email" name="email" placeholder="john@example.com">
              </div>
              <div class="row form-group">
                  <label class="col-4" for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                  <input class="col form-control" type="text" id="adr" name="address" placeholder="542 W. 15th Street">
              </div>
              <div class="row form-group">
                  <label class="col-4" for="city"><i class="fa fa-institution"></i> City</label>
                  <input class="col form-control" type="text" id="city" name="city" placeholder="New York">
              </div>

              <div class="row">
                <div class="col-50 col-6">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="NY">
                </div>
                <div class="col-50 col-6">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
              </div>
            </div>

            <div class="col-50 col-6">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September">
              <div class="row">
                <div class="col-50 col-6">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50 col-6">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>

          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25 col-3">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
        @php
            $total =0;
        @endphp
        @foreach ($arrCart as $item)
      <p><a href="#">{{$item->name}}</a> <span class="price">{{$item->sell_price}}</span></p>
            @php
                $total += ($item->sell_price - $item->discount)*$item->qty;
            @endphp
        @endforeach
        {{-- <p><a href="#">Product 1</a> <span class="price">$15</span></p>
        <p><a href="#">Product 2</a> <span class="price">$5</span></p>
        <p><a href="#">Product 3</a> <span class="price">$8</span></p>
        <p><a href="#">Product 4</a> <span class="price">$2</span></p> --}}
        <hr>
        <p>Total <span class="price" style="color:black"><b>
            {{$total}}
        </b></span></p>
      </div>
    </div>
  </div>
  @endsection
  @section('footer')
    <p> <h5 style="margin-right: 5%; float: right;"> Total : Rp {{ number_format($total) }}</h5> </p>
    <br/> <br/>

    <form method="post" style="margin-right: 5%">
        @csrf
        <button formaction="/payment" class="btn btn-info" style="float: right;"> Checkout </button>
    </form>
    
@endsection
