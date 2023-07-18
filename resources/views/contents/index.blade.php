@extends('app.main')

@section('contents')

<a href="/user/create" class="btn btn-primary my-3">Add New <i class="fa-solid fa-plus"></i></a>
<table class="table table-hover table-borderless">
    <thead>
        <tr>
            <th>no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <button class="btn btn-info"><i class="fa-solid fa-eye"></i></button>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                <a href="/user/{{ $user->id }}/delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
