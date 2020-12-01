@extends('layouts.templateuser')

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    <form method="POST">
        @csrf
        Name : <input type="text" value="{{ Auth::user()->name }}" name="name"> <br/><br/>
        Email : {{ Auth::user()->email }} <br/><br/>
        Address : <input type="text" value="{{ Auth::user()->address }}" name="alamat"> <br/><br/>
        Phone : <input type="text" value="{{ Auth::user()->phone }}" name="nomer"> <br/><br/>

        <button class="btn btn-primary" name="btnEdit" formaction="/isiProfile">Edit</button>
    </form>
@endsection
