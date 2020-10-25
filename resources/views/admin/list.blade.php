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
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>Name</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($AdminArr) > 0 )
                @for ($i = 0; $i < count($AdminArr); $i++)
                    <tr>
                        <td>{{ $AdminArr[$i]->username }}</td>
                        <td>{{ $AdminArr[$i]->alamat_user }}</td>
                        <td>{{ $AdminArr[$i]->telepon_user }}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                <button type="submit" formaction="/admin/editForm/{{$AdminArr[$i]->id}}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if($AdminArr[$i]->status_user == 0)
                                    <button type="submit" formaction="/admin/active/{{$AdminArr[$i]->id}}" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @else
                                    <button type="submit" formaction="/admin/nonActive/{{$AdminArr[$i]->id}}" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
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

