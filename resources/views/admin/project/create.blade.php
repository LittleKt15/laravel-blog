@extends('admin.master')
    @section('title', 'Project Create')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Project Create Form</h3>
                </div>
                <form action="{{ url('admin/projects') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter project name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="url">URL</label>
                            <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter project URL" value="{{ old('url') }}">
                            @error('url')
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
