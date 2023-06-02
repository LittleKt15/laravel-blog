@extends('admin.master')
    @section('title', 'Project Index')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Project Dashboard
                        <a href="{{ url('admin/projects/create') }}" class="btn btn-primary float-end">
                            <i class="fa-solid fa-circle-plus"></i> Add Project
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
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->url }}</td>
                                    <td>
                                        <form action="{{ route('projects.destroy',$project->id) }}" method="POST">{{-- url('admin/projects/'. $project->id .'') --}}
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('admin/projects/'. $project->id .'/edit') }}" class="btn btn-info btn-sm text-white">
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
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
