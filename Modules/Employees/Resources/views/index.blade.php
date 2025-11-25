@extends('employees::layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Employee List</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Employees</span>
                    <!-- <a href="{{ url('employees/create') }}" class="btn btn-primary btn-sm">Add New Employee</a> -->
                </div>
                <div class="card-body">
                    @if($employees->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->fullname ?? '-' }}</td>
                                            <td>
                                                <form action="{{ route('employees.updateStatus', $employee->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="form-control form-control-sm" style="display: inline-block; width: auto;">
                                                        <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary btn-sm ml-2">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    @else
                        <div class="alert alert-info">
                            No employees found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection