@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-calendar-event me-2"></i>Meeting Details</h2>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <strong class="text-muted">Client:</strong>
                        <p class="lead">{{ $meeting->client->name }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Date & Time:</strong>
                        <p>{{ $meeting->date_time }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Location:</strong>
                        <p>{{ $meeting->location }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Status:</strong>
                        <p>{{ $meeting->status }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Notes:</strong>
                        <p>{{ $meeting->notes ?? 'N/A' }}</p>
                    </div>
                    @if($meeting->attachment)
                        <div class="mb-4">
                            <strong class="text-muted">Attachment:</strong>
                            <p><a href="{{ asset('storage/' . $meeting->attachment) }}" target="_blank" class="btn btn-link">Download</a></p>
                        </div>
                    @endif

                    <div class="mt-5">
                        <h3 class="mb-3"><i class="bi bi-check-all me-2"></i>Follow-Ups</h3>
                        @if ($meeting->followUps->count() > 0)
                            <ul class="list-group">
                                @foreach ($meeting->followUps as $followup)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ route('followups.show', $followup->id) }}" class="text-decoration-none">
                                            {{ $followup->task }}
                                        </a>
                                        <span class="badge bg-secondary rounded-pill">Due: {{ $followup->due_date }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No follow-ups found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
