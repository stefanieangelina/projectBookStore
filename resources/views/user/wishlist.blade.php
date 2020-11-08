@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('judul')
    WISHLIST
@endsection

@section('content')

<table class="table table-striped" style="margin-left: 5%; margin-right: 5%">
    <thead>
      <tr>
        <th>#</th>
        <th>Judul Buku</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @isset($arrWishlist)
            @foreach ($arrWishlist as $Wishlist)
                <tr>
                    <td>{{ $ctr++ }}</td>
                    <td>{{ $Wishlist->name }}</td>
                    <td>Rp. {{ number_format($Wishlist->sell_price) }}</td>
                    <td>
                        <form method="post">
                            @csrf
                            <button formaction="/deleteWishlist/{{$Wishlist->id}}" class="btn btn-danger">Delete</a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
  </table>
@endsection

@section('footer')

@endsection
