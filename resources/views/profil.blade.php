@extends('layouts.templateuser')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    Nama : {{ Auth::user()->name }}
    <br/><br/>

    Email : {{ Auth::user()->email }}
    <br/><br/>

    Alamat : {{ (Auth::user()->address == null)? 'Belum ada data' :  Auth::user()->address }}
    <br/><br/>

    Nomer Telepon : {{ (Auth::user()->phone == null)? 'Belum ada data' :  Auth::user()->phone }}
    <br/><br/>

    Points : {{ Auth::user()->points }}
    <br/><br/>

    <form method="POST">
        @csrf
        <button class="btn btn-info" name="btnEdit" formaction="/editProfile">Edit</button>
    </form>
@endsection
