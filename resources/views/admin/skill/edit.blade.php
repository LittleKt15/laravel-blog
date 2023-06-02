@extends('admin.master')
    @section('title', 'Skill Edit')
    @section('content')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3>Skill Update Form</h3>
                </div>
                <form action="{{ url('admin/skills/'. $skill->id .'') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter skill name" value="{{ $skill->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="percent">Percent</label>
                            <input type="number" name="percent" id="percent" class="form-control @error('percent') is-invalid @enderror" placeholder="Enter skill percent" value="{{ $skill->percent ?? old('percent') }}">
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
