@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    Transaksi dibuat, Harap melanjutkan ke Pembayaran sebesar <br>
    Rp . {{Session::get('total')}} , dan jangan lupa untuk menulis kode transaksi pada komen transfer

    <form action="/uploadBukti" method="POST">
        @csrf
        Upload bukti Transaksi : <input type="file" name="bukti" id="" enctype="multipart/form-data">
    </form>
    
@endsection