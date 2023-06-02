@extends('admin.master')
@section('title', 'Category Edit')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Category Update Form</h3>
            </div>
            <form action="{{ url('admin/categories/' . $category->id . '') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name"
                            value="{{ $category->name ?? old('name')}}">
                        @error('name')
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
