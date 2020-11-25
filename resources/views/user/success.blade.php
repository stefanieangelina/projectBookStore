@extends('layouts.templateDetailBuku')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    @foreach (Session::get('listTrans') as $item)
        {{$item->id}}
    @endforeach

    delete yang di db:cart -> masukan ke htrans & dtrans -> hitung point  ->  masukan point ke user
@endsection