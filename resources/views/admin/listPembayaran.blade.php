@extends('templateadmin')

@section('titlepage')
    Transaction List
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
            <th>ID</th>
            <th>Name</th>
            <th>Purchase</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($transArr) > 0 )
            @for ($i = 0; $i < count($transArr); $i++)
                <tr>
                    <td>{{ $transArr[$i]->id }}</td>
                    <td>{{ $transArr[$i]->name }}</td>
                    <td>{{ $transArr[$i]->purchase }}</td>
                    <td>
                        <form method="POST">
                            @csrf
                            @if($transArr[$i]->status_trans == 0)
                                <button type="submit" formaction="/transaksi/konfirmasi/{{$transArr[$i]->id}}" class="btn btn-success">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button type="submit" formaction="/transaksi/tolak/{{$transArr[$i]->id}}" class="btn btn-danger">
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

