@extends('proposal::layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Proposal List</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>All Proposal</span>
                    <a href="{{ route('proposal.create') }}" class="btn btn-primary btn-sm">Add New Proposal</a>
                </div>
                <div class="card-body">
                    @if($proposal->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Year</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proposal as $item)
                                        <tr>
                                            <td>{{ $item->number }}</td>
                                            <td>{{ $item->year ?? '-' }}</td>
                                            <td>{{ $item->description ?? '-' }}</td>
                                            <td>{{ $item->status ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    @else
                        <div class="alert alert-info">
                            No proposal found.
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
