<div>
    {{-- Bagian Filter --}}
    <section class="relative min-h-fit px-4 py-4 md:px-10 md:-mt-32 z-10">
        <div class="md:bg-blue-950 rounded-xl shadow-2xl shadow-blue-700/25">
            <div class="px-6 md:px-16 py-6 md:py-10">
                <div class="flex-col py-5 space-y-12 sm:space-y-0 sm:grid grid-cols-3 gap-6 md:gap-x-16">
                    <div>
                        <label class="block md:text-white text-sm sm:text-base font-normal mb-2">Search Event</label>
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Konser Jazz" class="w-full py-2 sm:py-3 md:py-4 bg-transparent border-b-2 border-gray-500 md:text-white font-bold text-lg sm:text-xl focus:outline-none focus:border-white transition duration-200">
                    </div>
                    <div>
                        <label class="block md:text-white text-sm sm:text-base font-normal mb-2">Place</label>
                        <div class="relative">
                            <select wire:model.live="event_category_id" class="focus:bg-blue-950 w-full py-2 sm:py-3 md:py-4 bg-transparent border-b-2 border-gray-500 md:text-white font-bold text-lg sm:text-xl focus:outline-none appearance-none pr-8 transition duration-200">
                                <option value="">All Locations</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.54 4.54z" /></svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block md:text-white text-sm sm:text-base font-normal mb-2">Time</label>
                        <div class="relative">
                            <select wire:model.live="time" class="w-full py-2 sm:py-3 md:py-4 bg-transparent border-b-2 border-gray-500 md:text-white font-bold text-lg sm:text-xl focus:outline-none focus:bg-blue-950 appearance-none pr-8 transition duration-200">
                                <option value="">Any date</option>
                                <option value="today">Today</option>
                                <option value="tomorrow">Tomorrow</option>
                                <option value="this-week">This Week</option>
                                <option value="this-month">This Month</option>
                                <option value="this-year">This Year</option>
                                <option value="next-year">Next Year</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.54 4.54z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Bagian Daftar Event --}}
    <section class="py-7 mx-auto px-4 md:px-10 xl:px-20 2xl:px-30">
        <div class="flex flex-col md:flex-col justify-between mb-14">
            <h2 class="text-blue-950 text-3xl sm:text-4xl md:text-5xl font-extrabold mb-6 md:mb-12 w-full md:w-auto text-center md:text-left">Upcoming Events</h2>
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
                    <p>No events found matching your criteria.</p>
                </div>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <div wire:loading wire:target="loadMore" class="text-gray-500">
                    Loading...
                </div>
                {{-- Tombol hanya muncul jika ada kemungkinan ada data lebih banyak --}}
                @if ($events->count() >= $perPage)
                <button wire:loading.remove wire:target="loadMore" wire:click="loadMore" class="bg-white text-[#5a008c] px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition duration-300 ease-in-out">
                    Load More Events
                </button>
                @endif
            </div>
        </div>
    </section>
</div>
