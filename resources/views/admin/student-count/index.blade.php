@extends('admin.master')
@section('title', 'Student-Count Index')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Student-Count Dashboard
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
                @if ($studentcount->count() < 1)
                    <form action="{{ url('admin/student_counts/store') }}" method="POST">
                        @csrf
                        <label for="count">Count</label>
                        <div class="input-group w-50">
                            <input type="number" class="form-control @error('count') is-invalid @enderror" name="count"
                                id="count">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        @error('count')
                            <div class="text-danger d-block"><small>{{ $message }}</small></div>
                        @enderror
                    </form>
                @endif
                <table class="table table-primary table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Studnet Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($student)
                            <tr>
                                <td>{{ $student->count }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm text-white" id="addBtn">
                                        <i class="fa-solid fa-plus"></i>
                                        Add More Student
                                    </button>
                                    @error('count')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                    <form action="{{ url('admin/student_counts/' . $student->id . '/update') }}"
                                        method="POST" id="addForm" style="display: none;">
                                        @csrf
                                        <div class="input-group w-50">
                                            <input type="number" class="form-control @error('count') is-invalid @enderror"
                                                name="count" placeholder="Enter student count...">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa-solid fa-plus"></i> Add
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-end">
                    {{-- {{ $projects->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#addBtn').click(function() {
                $('#addForm').css('display', 'block');
                $(this).css('display', 'none');
            });
        });
    </script>
@endsection
