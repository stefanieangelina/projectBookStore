@extends('templateadmin')

@section('titlepage')
    List Admin
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
    <form method="post">
        @csrf
        <button type="submit" formaction="/admin/insert" class="btn btn-info" style="float: right">Add New Admin</button>
    </form>
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
            @if(count($AdminArr) > 0 )
                @for ($i = 0; $i < count($AdminArr); $i++)
                    <tr>
                        <td>{{ $AdminArr[$i]->name }}</td>
                        <td>{{ $AdminArr[$i]->address }}</td>
                        <td>{{ $AdminArr[$i]->phone }}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                <button type="submit" formaction="/admin/editForm/{{$AdminArr[$i]->id}}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if($AdminArr[$i]->trashed())
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

