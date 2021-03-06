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
{{-- <form method="post">
    @csrf
    <button type="submit" formaction="/book/insert" class="btn btn-info" style="float: right">Add New Book</button>
</form> --}}

<table class="table table-hover table-light">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Purchase</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
            <?php
                $user = DB::table('users')->where('id', $item->user_id)->first();
            ?>
            <td>{{ $item->id }}</td>
            <td>{{ $user->name }}</td>
            <td>Rp {{ number_format($item->total) }}</td>
            <td>
                @if ($item->cara_pembayaran == "tidak poin")
                    <img src="{{ asset('/storage/BuktiBayar/'.$item->file_bukti) }}" style="width:200px; height:250px">
                @else
                    Point
                @endif
            </td>
            <td>
                <form method="POST">
                    @csrf
                    <button type="submit" formaction="/admin/transaksi/konfirm/{{$item->id}}" class="btn btn-warning">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="submit" formaction="/admin/transaksi/tolak/{{$item->id}}" class="btn btn-danger">
                        <i class="fas fa-minus-circle"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection

