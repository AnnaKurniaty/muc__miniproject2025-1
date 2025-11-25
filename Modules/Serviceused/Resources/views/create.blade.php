@extends('serviceused::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Serviceused</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('serviceused.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="proposal_id">Proposal</label>
                            <select name="proposal_id" id="proposal_id" class="form-control" required>
                                <option value="">Select Proposal</option>
                                @foreach($proposal as $item)
                                    <option value="{{ $item->id }}">{{ $item->number }} - {{ $item->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Nama Service</label>
                            <input type="text" name="service_name" id="service_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('serviceused.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
