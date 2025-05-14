@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-check-circle-fill me-2"></i>Follow-Up Task Details</h2>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <strong class="text-muted">Meeting:</strong>
                        <p>
                            <a href="{{ route('meetings.show', $followup->meeting->id) }}" class="text-decoration-none">
                                {{ $followup->meeting->date_time }}
                            </a>
                        </p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Task:</strong>
                        <p>{{ $followup->task }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Due Date:</strong>
                        <p>{{ $followup->due_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
