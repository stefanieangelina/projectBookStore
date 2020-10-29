@extends('templateadmin')

@section('titlepage')
    List VIP Member
@endsection

@section('namaAdminLogin')
{{ $userLogin }}
@endsection

@section('namaAdminLogin2')
{{ $userLogin }}
@endsection

@section('content')
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>ID Member</th>
                <th>Email</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($vipArr) > 0 )
                @for ($i = 0; $i < count($vipArr); $i++)
                    <tr>
                        <td>{{ $vipArr[$i]->id }}</td>
                        <td>email user</td>
                        <td>
                            @if($vipArr[$i]->status == 0)
                                {{ "Waiting for Approve"}}
                            @else
                                {{ "VIP Member" }}
                            @endif
                        </td>
                        <td>
                            <form method="POST">
                                @csrf
                                @if($vipArr[$i]->status == 0)
                                    <button type="submit" formaction="/vip/editForm/{{$vipArr[$i]->id}}" class="btn btn-warning">
                                        Approve
                                    </button>
                                @endif
                                @if($vipArr[$i]->trashed())
                                    <button type="submit" formaction="/vip/active/{{$vipArr[$i]->id}}" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @else
                                    <button type="submit" formaction="/vip/nonActive/{{$vipArr[$i]->id}}" class="btn btn-danger">
                                        <i class="	fas fa-minus-circle"></i>
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


