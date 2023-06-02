@extends('admin.master')
    @section('title', 'Users Index')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>User</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            @if (Session('update'))
                                <div class="alert alert-info alert-dismissible show fade">
                                    {{ Session('update') }}
                                    <button class="btn-close float-end" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if (Session('delete'))
                                <div class="alert alert-warning alert-dismissible show fade">
                                    {{ Session('delete') }}
                                    <button class="btn-close float-end" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                        </div>
                        <table class="table table-bordered table-hover table-primary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <form action="{{ url('admin/users/' . $user->id . '/delete') }}"
                                                method="POST">
                                                @csrf
                                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                                    class="btn btn-info btn-sm text-white">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete')">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
