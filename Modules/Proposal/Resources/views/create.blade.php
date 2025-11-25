@extends('proposal::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Proposal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('proposal.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="number">Proposal Number</label>
                            <input type="text" class="form-control" id="number" name="number" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year" min="1900" max="{{ date('Y') + 10 }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="agreed">Agreed</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Proposal</button>
                        <a href="{{ route('proposal.index') }}" class="btn btn-secondary">Cancel</a>

                        @if($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
