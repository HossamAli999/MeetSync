@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Follow-Up</h2>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('followups.update', $followup) }}" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="meeting_id" class="form-label">Meeting <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hand-index-thumb"></i></span>
                                <select class="form-select @error('meeting_id') is-invalid @enderror" id="meeting_id" name="meeting_id" required>
                                    <option value="" disabled>Select a meeting</option>
                                    @foreach ($meetings as $meeting)
                                        <option value="{{ $meeting->id }}" {{ $followup->meeting_id == $meeting->id ? 'selected' : '' }}>
                                            {{ $meeting->client->name }} - {{ $meeting->date_time }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('meeting_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="task" class="form-label">Task <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-check-circle"></i></span>
                                <input type="text" class="form-control @error('task') is-invalid @enderror" id="task" name="task" value="{{ old('task', $followup->task) }}" placeholder="Enter task" required>
                                @error('task')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="form-label">Due Date <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', $followup->due_date) }}" required>
                                @error('due_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="bi bi-save me-2"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //prevent form resubmission
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
@endsection
