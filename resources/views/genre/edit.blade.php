@extends('templateadmin')

@section('titlepage')
    Edit Genre
@endsection

@section('namaAdminLogin')
{{ $userLogin }}
@endsection

@section('namaAdminLogin2')
{{ $userLogin }}
@endsection

@section('content')
    <br/>
    <form method="post">
        @csrf
        ID : <input type="text" class="form-control" value="{{ $genre->id }}" readonly> <br/>
        Name : <input type="text" class="form-control" value="{{ $genre->name }}" name="nama" placeholder="nama_genre" required> <br/>
    <button type="submit" formaction="/genre/edit/{{ $genre->id }}" class="btn btn-primary" style="float:right;">Update</button>
    </form>
@endsection

