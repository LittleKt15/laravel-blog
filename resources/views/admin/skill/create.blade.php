@extends('admin.master')
    @section('title', 'Skill Create')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Skill Create Form</h3>
                </div>
                <form action="{{ url('admin/skills') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter skill name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="percent">Percent</label>
                            <input type="number" name="percent" id="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="Enter skill percent" value="{{ old('percent') }}">
                            @error('percent')
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
