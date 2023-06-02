@extends('admin.master')
    @section('title', 'Project Edit')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Project Update Form</h3>
                </div>
                <form action="{{ url('admin/projects/'. $project->id .'') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter project name" value="{{ $project->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="url">Percent</label>
                            <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Enter project url" value="{{ $project->url ?? old('url') }}">
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
