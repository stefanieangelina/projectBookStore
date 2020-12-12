@extends('templateadmin')

@section('titlepage')
    User List
@endsection

@section('namaAdminLogin')
    {{ $userLogin }}
@endsection

@section('namaAdminLogin2')
    {{ $userLogin }}
@endsection

@section('pengumuman')
    @include('alert')
@endsection

@section('content')
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($UserArr) > 0 )
                @for ($i = 0; $i < count($UserArr); $i++)
                    <tr>
                        <td>{{ $UserArr[$i]->name }}</td>
                        <td>{{ $UserArr[$i]->address }}</td>
                        <td>{{ $UserArr[$i]->phone }}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                {{-- <button type="submit" formaction="/user/editForm/{{$UserArr[$i]->id}}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
                                @if($UserArr[$i]->trashed())
                                    <button type="submit" formaction="/user/active/{{$UserArr[$i]->id}}" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @else
                                    <button type="submit" formaction="/user/nonActive/{{$UserArr[$i]->id}}" class="btn btn-danger">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
@endsection


