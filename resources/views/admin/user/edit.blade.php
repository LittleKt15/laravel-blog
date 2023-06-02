@extends('admin.master')
@section('title', 'Edit User')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit User</h5>
                    </div>
                    <form action="{{ url('admin/users/'. $user->id .'/update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="admin" @if ($user->status === "admin") selected @endif>
                                        Admin
                                    </option>
                                    <option value="user" @if ($user->status === "user") selected @endif>
                                        User
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
