@extends('admin.master')
@section('title', 'Post Comment')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Comment Lists</h3>
            </div>
            <div class="card-body">
                @if (Session('upt'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div>{{ Session('upt') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($comments->count() < 1)
                    <div class="alert alert-warning">
                        Sorry, There is no available comment here.
                    </div>
                @else
                    <table class="table table-primary table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $index => $comment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $comment->text }}</td>
                                    <td>
                                        <form action="{{ url('admin/comment/' . $comment->id . '/show_hide') }}"
                                            method="POST">
                                            @csrf
                                            <button
                                                class="btn btn-sm text-white
                                    {{ $comment->status === 'show' ? 'btn-danger' : 'btn-success' }}">
                                                {{ $comment->status === 'show' ? 'Hide' : 'Show' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                <div class="float-end">
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
