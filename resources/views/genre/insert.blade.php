@extends('templateadmin')

@section('titlepage')
    Insert Genre
@endsection

@section('namaAdminLogin')

@endsection

@section('namaAdminLogin2')

@endsection

@section('emailAdminLogin')

@endsection

@include('alert')

@section('content')
    <form method="post">
        @csrf
        Name : <input type="text" class="form-control" name="nama" placeholder="nama_genre" required> <br/>
        <button type="submit" formaction="/genre/insertGenre" class="btn btn-primary" style="float:right;">Insert</button>
    </form>
@endsection

