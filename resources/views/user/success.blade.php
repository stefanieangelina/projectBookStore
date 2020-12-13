@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
   <div>
    <div>
        <h3>Transaksi Berhasil</h3>
        Segera lakukan konfirmasi pembayaran dan upload bukti pembayaran di sini
    </div><br>
    <div>
        <form action="/konfirmasi" enctype="multipart/form-data" method="POST">
            @csrf
        <input type="hidden" name="htransID" id="" value="{{$id_htrans}}">
            <input type="file" name="bukti" id=""><br><br>
            <input type="submit" class="btn btn-success" value="Konfirmasi">
        </form>
    </div>
   </div>


@endsection
