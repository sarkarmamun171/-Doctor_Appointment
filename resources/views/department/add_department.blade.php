@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
<div class="card">
    <div class="card-header">
        <h4>Department List</h4>
    </div>
    <div class="card-body">
        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Department Name</th>
                <th>Action</th>
            </tr>
            @foreach ($departments as $sl=>$department)
                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('edit.department',$department->id) }}" class="btn btn-info shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
                            &nbsp;
                            <a href="{{ route('delete.department',$department->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $departments->links() }}
    </div>
</div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h4>Add Department</h4>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <form action="{{ route('store.department') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

