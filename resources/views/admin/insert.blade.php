@extends('templateadmin')

@section('titlepage')
    Register New Admin
@endsection

@section('namaAdminLogin')

@endsection

@section('namaAdminLogin2')

@endsection

@section('emailAdminLogin')

@endsection

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    <br/>
    <form method="post">
        @csrf
        Name : <input type="text" class="form-control" name="username" required>
        Email : <input type="email" class="form-control" name="email" required>
        Password : <input type="password" class="form-control" name="pass" required>
        Address : <input type="text" class="form-control" name="alamat" required>
        Telephone : <input type="tel" class="form-control" name="telepon" required> <br/>
        <button type="submit" formaction="/admin/insertAdmin" class="btn btn-primary">Insert</button>
    </form>
@endsection

