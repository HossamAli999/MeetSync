@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-calendar-fill me-2"></i>Edit Meeting</h2>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('meetings.update', $meeting) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="client_id" class="form-label">Client <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <select class="form-select @error('client_id') is-invalid @enderror" name="client_id" required>
                                    <option value="" disabled>Select a client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ $meeting->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="date_time" class="form-label">Date and Time <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
<input type="datetime-local" class="form-control @error('date_time') is-invalid @enderror"
       name="date_time"
       value="{{ \Carbon\Carbon::parse($meeting->date_time)->format('Y-m-d\TH:i') }}"
       required>
                                @error('date_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="location" class="form-label">Location <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $meeting->location) }}" placeholder="Enter location" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">Status <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                                <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                                    <option value="" disabled>Select status</option>
                                    <option value="upcoming" {{ $meeting->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="completed" {{ $meeting->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $meeting->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror"  name="notes" placeholder="Enter notes" rows="4">{{ old('notes', $meeting->notes) }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="attachment" class="form-label">Attachment</label>
                            <input type="file" class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                            @error('attachment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
