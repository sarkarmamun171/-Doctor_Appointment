@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>Doctor List</h4>
            </div>
            <div class="card-body">
                @if (session('delete'))
                    <div class="alert alert-danger">{{ session('delete') }}</div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Department Name</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Fee(TK)</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($doctors as $sl => $doctor)
                        <tr>
                            <td>{{ $sl + 1 }}</td>
                            <td>{{ $doctor->rel_to_department->name }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->fee }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('edit.doctor',$doctor->id) }}"
                                        class="btn btn-info shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
                                    &nbsp;
                                    <a href="{{ route('delete.doctor',$doctor->id) }}"
                                        class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $doctors->links() }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Doctor</h4>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-body">
                <form action="{{ route('store.doctor') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Department Name</label>
                        <select name="department_id" class="form-control" id="department_id">
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Doctor Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fee</label>
                        <input type="text" name="fee" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
