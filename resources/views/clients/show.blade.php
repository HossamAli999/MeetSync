@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-person-fill me-2"></i>{{ $client->name }}</h2>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <strong class="text-muted">Company:</strong>
                        <p class="lead">{{ $client->company ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Email:</strong>
                        <p>{{ $client->email ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Phone:</strong>
                        <p>{{ $client->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="mb-4">
                        <strong class="text-muted">Notes:</strong>
                        <p>{{ $client->notes ?? 'N/A' }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="mb-3"><i class="bi bi-calendar-event me-2"></i>Meetings</h3>
                        @if ($client->meetings->count() > 0)
                            <div class="list-group">
                                @foreach ($client->meetings as $meeting)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">{{ $meeting->date_time }} at {{ $meeting->location }}</h6>
                                                <small class="text-muted">Status: {{ $meeting->status }}</small>
                                            </div>
                                        </div>
                                         <div class="mt-2">
                                            <h6 class="mb-1"><i class="bi bi-check-all me-1"></i>Follow-Ups</h6>
                                            @if ($meeting->followUps->count() > 0)
                                                <ul>
                                                    @foreach ($meeting->followUps as $followup)
                                                        <li>{{ $followup->task }} (Due: {{ $followup->due_date }})</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="text-muted small">No follow-ups for this meeting.</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">No meetings found for this client.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
