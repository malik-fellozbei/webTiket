<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-8">Another Event</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($otherEvents as $otherEvent)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ route('event.detail', $otherEvent) }}">
                    <img src="{{ Storage::url($otherEvent->thumbnail) }}" alt="{{ $otherEvent->name }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <p class="text-sm font-bold text-purple-600 uppercase">{{ $otherEvent->start_time->format('M d') }}</p>
                        <h3 class="mt-2 text-lg font-bold text-gray-900">{{ $otherEvent->name }}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
