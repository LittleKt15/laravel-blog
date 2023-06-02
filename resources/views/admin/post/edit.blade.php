@extends('admin.master')
@section('title', 'Post Edit')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Post Update Form</h3>
            </div>
            <form action="{{ url('admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title"
                            value="{{ $post->title ?? old('title') }}">
                        @error('title')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30"
                            rows="5" placeholder="Enter post content">{{ $post->content ?? old('content') }}</textarea>
                        @error('content')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                {{ $post->category_id === $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror">
                        <img src="{{ asset('storage/post-images/' . $post->image) }}" alt=""
                            class="img-fluid ms-2 mt-2 border border-1 border-secondary" width="100px">
                        @error('image')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary" onclick="history.back(-1)">Back</a>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
