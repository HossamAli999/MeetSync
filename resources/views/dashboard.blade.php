<x-app-layout>
    <x-slot name="header">  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 dark:text-gray-100 flex items-center">
                         <i class="bi bi-calendar-day mr-4 text-blue-500" style="font-size: 2rem;"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Upcoming Meetings</h3>
                            @if (isset($upcomingMeetings) && $upcomingMeetings->count() > 0)
                                <ul class="list-disc list-inside">
                                    @foreach ($upcomingMeetings as $meeting)
                                        <li>
                                            <a href="{{ route('meetings.show', $meeting->id) }}" class="text-blue-500 hover:underline">
                                                {{ $meeting->client->name }} - {{ $meeting->date_time }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No upcoming meetings.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 dark:text-gray-100 flex items-center">
                        <i class="bi bi-check-circle mr-4 text-green-500" style="font-size: 2rem;"></i>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Follow-Up Tasks</h3>
                            @if (isset($followUpTasks) && $followUpTasks->count() > 0)
                                <ul class="list-disc list-inside">
                                    @foreach ($followUpTasks as $followUp)
                                         <li>
                                            <a href="{{ route('followups.show', $followUp->id) }}" class="text-green-500 hover:underline">
                                                {{ $followUp->task }} (Due: {{ $followUp->due_date }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500">No follow-up tasks.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                 <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Meetings Overview</h3>
                         <div id="calendar">
                            @if(isset($calendar))
                                {!! $calendar->render() !!}
                            @endif
                         </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Client Summary</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Clients:</p>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ isset($totalClients) ? $totalClients : 0 }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Clients:</p>
                                 <p class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ isset($activeClients) ? $activeClients : 0 }}
                                </p>
                            </div>
                        </div>
                         <div class="mt-4">
                            <a href="{{ route('clients.index') }}" class="btn btn-primary rounded-md shadow-md">
                                <i class="bi bi-arrow-right-circle mr-2"></i> View Clients
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [
                    @if(isset($meetings))
                        @foreach($meetings as $meeting)
                        {
                            title: "{{ $meeting->client->name }}",
                            start: "{{ $meeting->date_time }}",
                            end: "{{ $meeting->date_time }}", // FullCalendar requires an end date
                            url: "{{ route('meetings.show', $meeting->id) }}", // Link to meeting details
                            color: '{{ $meeting->status == "completed" ? "green" : ($meeting->status == "cancelled" ? "red" : "blue") }}', // Color-code by status
                        },
                        @endforeach
                    @endif
                ],
                displayEventTime: true,
                eventColor: 'blue', // Default color
            });
        });
    </script>
     </x-slot>
</x-app-layout>
