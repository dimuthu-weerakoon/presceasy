@extends('admin.layout.admin')
@section('content')
<h3>Users</h3>

@if(count($users)>0)
<table class="table table-dark table-hover table-borderless text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>         
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->full_name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                 <a href="" class="btn btn-light"><i class="bi bi-pencil-square"></i></a>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    
    <h4 class="text-center">No users</h4>
@endif

</table>
</div>

@endsection