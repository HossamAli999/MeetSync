<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Meeting;
use App\Models\FollowUp;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $upcomingMeetings = Meeting::where('date_time', '>=', now())->orderBy('date_time')->with('client')->get();

        $followUpTasks = FollowUp::where('due_date', '>=', now())->with('meeting.client')->get();

        $totalClients = Client::count();
        $activeClients = Client::has('meetings')->count();

        $meetings = Meeting::with('client')->get();

        return view('dashboard', compact('upcomingMeetings', 'followUpTasks', 'totalClients', 'activeClients', 'meetings'));
    }
}

