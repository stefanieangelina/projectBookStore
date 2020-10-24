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

@section('content')
    <br/>
    <form method="post">
        @csrf
        Name : <input type="text" class="form-control" name="nama" placeholder="nama_genre" required> <br/>
        <button type="submit" class="btn btn-primary">Insert</button>
    </form>
@endsection

