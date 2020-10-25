@extends('templateadmin')

@section('titlepage')
    Book List
@endsection

@section('namaAdminLogin')

@endsection

@section('namaAdminLogin2')

@endsection

@section('emailAdminLogin')

@endsection

@section('content')
<table class="table table-hover table-light">
    <thead>
        <tr>
            <th>Name</th>
            <th>Purchase Price</th>
            <th>Selling Price</th>
            <th>Discount</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($BookArr) > 0 )
            @for ($i = 0; $i < count($BookArr); $i++)
                <tr>
                    <td>{{ $BookArr[$i]->name }}</td>
                    <td>{{ $BookArr[$i]->buy_price }}</td>
                    <td>{{ $BookArr[$i]->sell_price }}</td>
                    <td>{{ $BookArr[$i]->discount }}</td>
                    <td>{{ $BookArr[$i]->stock }}</td>
                    <td>
                        <form method="POST">
                            @csrf
                            <button type="submit" formaction="/book/editForm/{{$BookArr[$i]->id}}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </button>
                            @if($BookArr[$i]->status == 0)
                                <button type="submit" formaction="/book/active/{{$BookArr[$i]->id}}" class="btn btn-success">
                                    <i class="fas fa-check"></i>
                                </button>
                            @else
                                <button type="submit" formaction="/book/nonActive/{{$BookArr[$i]->id}}" class="btn btn-danger">
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

