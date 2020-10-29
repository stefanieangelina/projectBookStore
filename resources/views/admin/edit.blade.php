@extends('templateadmin')

@section('titlepage')
    Edit Admin
@endsection

@section('namaAdminLogin')
Auth::user()->name;
@endsection

@section('namaAdminLogin2')
Auth::user()->name;
@endsection

@section('emailAdminLogin')

@endsection

@section('content')
    <br/>
    <form method="post">
        @csrf
        ID : <input type="text" class="form-control" value="{{ $Admin->id }}" readonly>
        Name : <input type="text" class="form-control" value="{{ $Admin->name }}" readonly>
        Email : <input type="email" class="form-control" value="{{ $Admin->email }}" name="email" required>
        Address : <input type="text" class="form-control" name="alamat" value="{{ $Admin->address }}" required>
        Telephone : <input type="tel" class="form-control" name="telepon" value="{{ $Admin->phone }}" required> <br/>
        <button type="submit" formaction="/admin/edit/{{$Admin->id}}" class="btn btn-primary" style="float: right;">Update</button>
    </form>
@endsection

