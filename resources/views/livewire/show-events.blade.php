<section class="py-7 mx-auto px-4 md:px-10 xl:px-20 2xl:px-30">
    <div class="flex flex-col md:flex-row justify-between items-center mb-14">
        <h2 class="text-blue-950 text-3xl sm:text-4xl md:text-5xl font-extrabold mb-6 md:mb-0 w-full md:w-auto text-center md:text-left">Upcoming Events</h2>

        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <select wire:model.live="dayType" class="bg-blue-900/10 text-gray-700 px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none pr-14 w-full">
                    <option value="">All Days</option>
                    <option value="weekdays">Weekdays</option>
                    <option value="weekends">Weekends</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <div class="relative w-full sm:w-auto">
                <select wire:model.live="event_category_id" class="bg-blue-900/10 text-gray-700 px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none pr-14 w-full">
                    <option value="">All Event Types</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <div class="relative w-full sm:w-auto">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search" class="bg-blue-900/10 text-gray-700 py-3 pl-10 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div wire:loading.class.delay="opacity-50" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($events as $event)
        <div class="bg-white rounded-4xl shadow-md overflow-hidden">
            <a href="{{ route('event.detail', $event) }}">
                <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }}" class="w-full h-80 object-cover">
                <div class="p-5 flex items-start gap-4">
                    <div class="text-center">
                        <p class="text-sm font-bold text-purple-600 uppercase">{{ $event->start_time->format('M') }}</p>
                        <p class="text-3xl font-bold text-gray-900 leading-none">{{ $event->start_time->format('d') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $event->name }}</h3>
                        @if ($event->eventCategory)
                        <span class="text-xs text-purple-700 font-semibold">{{ $event->eventCategory->name }}</span>
                        @endif
                        <p class="text-gray-500 text-sm mt-2">{!! Str::limit($event->description, 100) !!}</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="md:col-span-2 lg:col-span-3 text-center text-gray-500 py-10">
            <p>No events found.</p>
        </div>
        @endforelse
    </div>

    <div class="text-center mt-10">
        <div wire:loading wire:target="loadMore" class="text-gray-500">
            Loading...
        </div>
        @if(isset($event))
        <button wire:loading.remove wire:target="loadMore" wire:click="loadMore" class="bg-white text-[#5a008c] px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition duration-300 ease-in-out">
            Load More Events
        </button>
        @endif
    </div>
</section>
