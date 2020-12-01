@extends('layouts.templateuser')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    Nama : {{ Auth::user()->name }}
    <br/><br/>

    Email : {{ Auth::user()->email }}
    <br/><br/>

    Address : {{ (Auth::user()->address == null)? 'Belum ada data' :  Auth::user()->address }}
    <br/><br/>

    Phone : {{ (Auth::user()->phone == null)? 'Belum ada data' :  Auth::user()->phone }}
    <br/><br/>

    Points : {{ Auth::user()->points }}
    <br/><br/>

    <form method="POST">
        @csrf
        <button class="btn btn-primary" name="btnEdit" formaction="/edit">Edit Profile</button>
    </form>
@endsection
