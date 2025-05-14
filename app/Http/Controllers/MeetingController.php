<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Models\Client;


class MeetingController extends Controller
{
    public function index() {
        $meetings = Meeting::where('user_id', auth()->id())->with('client')->get();
        return view('meetings.index', compact('meetings'));
    }

    public function create() {
        $clients = Client::where('created_by', auth()->id())->get();
        return view('meetings.create', compact('clients'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_time' => 'required|date',
            'location' => 'nullable',
            'status' => 'required',
            'notes' => 'nullable',
            'attachment' => 'nullable|file'
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('attachments');
        }

        $data['user_id'] = auth()->id();
        Meeting::create($data);

        return redirect()->route('meetings.index');
    }

    public function edit(Meeting $meeting) {
        $clients = Client::where('created_by', auth()->id())->get();
        return view('meetings.edit', compact('meeting', 'clients'));
    }

    public function update(Request $request, Meeting $meeting) {
        $data = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_time' => 'required|date',
            'location' => 'nullable',
            'status' => 'required',
            'notes' => 'nullable',
        ]);

        $meeting->update($data);
        return redirect()->route('meetings.index');
    }

    public function show($id)
{
    $meeting = Meeting::with('client', 'followUps')->findOrFail($id);
    return view('meetings.show', compact('meeting'));
}

    public function destroy(Meeting $meeting) {
        $meeting->delete();
        return back();
    }
}

