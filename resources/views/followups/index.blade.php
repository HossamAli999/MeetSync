@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="bi bi-list-check me-2"></i>Follow-Ups</h2>
        <a href="{{ route('followups.create') }}" class="btn btn-primary rounded-pill shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Add Follow-Up
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse ($followups as $followup)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-square me-2" style="font-size: 1.2rem;"></i>
                            <div>
                                <p class="mb-0">{{ $followup->task }}</p>
                                <small class="text-muted">({{ $followup->meeting->client->name }})</small>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('followups.show', $followup->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                                <i class="bi bi-eye me-1"></i> Show
                            </a>
                            <a href="{{ route('followups.edit', $followup) }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('followups.destroy', $followup->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Are you sure you want to delete this follow-up?')">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No follow-ups found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
