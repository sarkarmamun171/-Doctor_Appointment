@extends('layouts.admin')
@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit Doctor</h3>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <form action="{{ route('update.doctor',$doctors->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <select name="department_id" id="" class="form-control">
                        <option value="">Select Department</option>
                        @foreach ($departments as $department )
                        <option value="{{ $department->id }}" {{ $department->id==$doctors->department_id?'selected':'' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Doctor Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $doctors->name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Doctor Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $doctors->phone }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Doctor Fee</label>
                    <input type="text" name="fee" class="form-control" value="{{ $doctors->fee }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
