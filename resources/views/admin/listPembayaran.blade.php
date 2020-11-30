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
                    <td>{{ $transArr[$i]->user_id }}</td>
                    <td>{{ $transArr[$i]->total }}</td>
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
                            @else
                                @if ($transArr[$i]->status_trans == 1)
                                    {{ Finnish }}
                                @elseif ($transArr[$i]->status_trans == 2)
                                    {{ Rejected }}
                                @endif
                            @endif
                        </form>
                    </td>
                </tr>
            @endfor
        @endif
    </tbody>
</table>
@endsection

