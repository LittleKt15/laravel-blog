@extends('admin.master')
    @section('title', 'Skill Index')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Skill Dashboard
                        <a href="{{ url('admin/skills/create') }}" class="btn btn-primary float-end">
                            <i class="fa-solid fa-circle-plus"></i> Add Skill
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    @if (Session('add'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div>{{ Session('add') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session('del'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div>{{ Session('del') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-primary table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Percent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->percent }}</td>
                                    <td>
                                        <form action="{{ url('admin/skills/'. $skill->id .'') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/skills/'. $skill->id .'/edit') }}" class="btn btn-info btn-sm text-white">
                                                <i class="fa-solid fa-edit"></i> Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        {{ $skills->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
