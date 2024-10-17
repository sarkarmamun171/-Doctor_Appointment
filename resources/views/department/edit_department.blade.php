@extends('layouts.admin')
@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit Department</h3>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <form action="{{ route('update.department',$departments->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $departments->name }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
