@extends('serviceused::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Serviceused</span>
                    <a href="{{ route('serviceused.create') }}" class="btn btn-primary btn-sm">Add New Serviceused</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Proposal Number</th>
                                <th>Nama Service</th>
                                <th>Status</th>
                                <th>Serviceused</th>
                                <th>Timespent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($serviceuseds as $serviceused)
                            <tr>
                                <td>{{ $serviceused->proposal->number }}</td>
                                <td>{{ $serviceused->service_name }}</td>
                                <td>
                                    @if($serviceused->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($serviceused->status == 'ongoing')
                                        <span class="badge bg-info text-dark">Ongoing</span>
                                    @elseif($serviceused->status == 'done')
                                        <span class="badge bg-success">Done</span>
                                    @endif
                                </td>
                                <td>{{ $serviceused->service_name }}</td>
                                <td>{{ $serviceused->timespent }}</td>
                                <td>
                                    <a href="{{ route('serviceused.edit', $serviceused->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('serviceused.destroy', $serviceused->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No serviceused found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
