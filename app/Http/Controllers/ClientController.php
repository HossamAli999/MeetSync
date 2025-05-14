<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::where('created_by', auth()->id())->get();
        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'notes' => 'nullable',
        ]);
        $data['created_by'] = auth()->id();
        Client::create($data);
        return redirect()->route('clients.index');
    }

    public function edit(Client $client) {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client) {
        $client->update($request->only(['name', 'company', 'email', 'phone', 'notes']));
        return redirect()->route('clients.index');
    }
    public function show($id)
{
    $client = Client::with('meetings.followUps')->findOrFail($id);
    return view('clients.show', compact('client'));
}

    public function destroy(Client $client) {
        $client->delete();
        return back();
    }
}

