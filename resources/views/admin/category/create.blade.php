@extends('admin.master')
@section('title', 'Category Create')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Category Create Form</h3>
            </div>
            <form action="{{ url('admin/categories') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter category name"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
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
