@extends('admin.master')
@section('title', 'Post Index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Post Dashboard
                    <a href="{{ url('admin/posts/create') }}" class="btn btn-primary float-end">
                        <i class="fa-solid fa-circle-plus"></i> Add Post
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
                <table class="table table-primary table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td>{{ $index + $posts->firstItem() }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" width="100px" class="img-fluid">
                                </td>
                                <td>
                                    <form action="{{ url('admin/posts/'.$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('admin/posts/'. $post->id .'/edit') }}" class="btn btn-info btn-sm text-white">
                                            <i class="fa-solid fa-edit"></i> Edit
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                        <a href="{{ url('admin/posts/'.$post->id) }}" class="btn btn-warning btn-sm text-white">
                                            <i class="fa-solid fa-comments"></i> Comments
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-end">
                    {{ $posts }}
                </div>
            </div>
        </div>
    </div>
@endsection
