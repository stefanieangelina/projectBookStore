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
    <br/>
    <form method="post">
        @csrf
        ID : <input type="text" class="form-control" value="{{ $Admin->id }}" readonly>
        Username : <input type="text" class="form-control" value="{{ $Admin->username }}" readonly>
        Email : <input type="email" class="form-control" value="{{ $Admin->email_user }}" name="email" required>
        Alamat : <input type="text" class="form-control" name="alamat" value="{{ $Admin->alamat_user }}" required>
        Telepon : <input type="tel" class="form-control" name="telepon" value="{{ $Admin->telepon_user }}" required> <br/>
        <button type="submit" formaction="/admin/edit/{{$Admin->id}}" class="btn btn-primary" style="float: right;">Update</button>
    </form>
@endsection

