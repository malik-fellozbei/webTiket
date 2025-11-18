<section class="bg-slate-100 py-12 md:py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-indigo-950 mb-10 text-center">My Tickets</h1>
        <div class="max-w-3xl mx-auto space-y-6">

            @forelse ($myTickets as $item)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-stretch overflow-hidden">
                <div class="md:w-40 shrink-0">
                    <img src="{{ Storage::url($item->event->thumbnail) }}" alt="{{ $item->event->name }}" class="w-full h-48 md:h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-2xl font-bold text-slate-800">{{ $item->ticket->name }}</h2>
                    <p class="text-sm text-slate-700">{{ $item->event->name }}</p>
                    <p class="text-sm text-slate-700 mb-4">{{ ucwords($item->attendee->first_name ) }} {{ ucwords($item->attendee->last_name ) }}</p>

                    <div class="space-y-2 text-slate-600 text-sm border-t pt-4">
                        <p class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                            <span>{{ $item->event->start_time->format('l, d F Y ・ h:i A') }}</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            <span>{{ $item->event->location_name }}, {{ $item->event->location_city }}</span>
                        </p>
                    </div>

                    <a href="{{ route('myticket.detail', $item) }}" class="mt-auto ml-auto text-center bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                        View My Ticket
                    </a>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                <h3 class="text-xl font-bold text-slate-700">No Tickets Found</h3>
                <p class="text-slate-500 mt-2">You don't have any paid tickets yet. Let's find an event!</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block text-purple-600 font-semibold">Explore Events</a>
            </div>
            @endforelse

        </div>
    </div>
</section>
