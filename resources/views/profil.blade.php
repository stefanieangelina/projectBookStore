@extends('layouts.templateuser')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    Nama : {{ Auth::user()->name }}
    <br/>

    Email : {{ Auth::user()->email }}
    <br/>

    Alamat : {{ Auth::user()->address }}
    <br/>

    Nomer Telepon : {{ Auth::user()->phone }}
    <br/>

    <form method="POST">
        @csrf
        <button class="btn btn-info" name="btnEdit" formaction="/editProfile">Edit</button>
    </form>
@endsection
