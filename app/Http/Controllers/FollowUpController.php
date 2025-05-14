<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;
use App\Models\Meeting;

class FollowUpController extends Controller
{
    public function index() {
        $followups = FollowUp::where('created_by', auth()->id())->with('meeting')->get();
        return view('followups.index', compact('followups'));
    }

    public function create() {
        $meetings = Meeting::where('user_id', auth()->id())->get();
        return view('followups.create', compact('meetings'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'meeting_id' => 'required|exists:meetings,id',
            'task' => 'required',
            'due_date' => 'nullable|date'
        ]);

        $data['created_by'] = auth()->id();
        FollowUp::create($data);
        return redirect()->route('followups.index');
    }

    public function edit(FollowUp $followup) {
        $meetings = Meeting::where('user_id', auth()->id())->get();
        return view('followups.edit', compact('followup', 'meetings'));
    }

    public function update(Request $request, FollowUp $followup) {
        $data = $request->validate([
            'meeting_id' => 'required|exists:meetings,id',
            'task' => 'required',
            'due_date' => 'nullable|date',
            'is_done' => 'boolean'
        ]);

        $followup->update($data);
        return redirect()->route('followups.index');
    }

    public function show($id)
{
    $followup = FollowUp::with('meeting.client')->findOrFail($id);
    return view('followups.show', compact('followup'));
}

    public function destroy(FollowUp $followup) {
        $followup->delete();
        return back();
    }
}

