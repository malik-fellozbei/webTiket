<section class="relative">

    <div class="w-full h-[500px] bg-cover bg-center" style="background-image: url('{{ Storage::url($event->thumbnail) }}')"></div>

    <div class="container mx-auto px-6 -mt-16">
        <div class="bg-white rounded-xl shadow-xl p-8">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900">{{ $event->name }}</h1>
                <div class="flex flex-wrap items-center gap-x-8 gap-y-4 mt-4 text-gray-600">
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" /></svg>
                        <span>{{ $event->start_time->format('F d, Y') }}</span>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        <span>{{ $event->start_time->format('h:i A') }}</span>
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        <span>{{ $event->location_name }}, {{ $event->location_city }}</span>
                    </p>
                </div>
                <a href="{{ route('ticket.index', $event) }}">
                    <button class="cursor-pointer mt-6 bg-pink-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-pink-700 transition">
                        Buy Ticket Now
                    </button>
                </a>
            </div>

            <div class="mt-10">
                <h2 class="text-2xl font-bold text-gray-800">Description</h2>
                <div class="mt-3 text-gray-600 leading-relaxed prose max-w-none">
                    {!! $event->description !!}
                </div>
            </div>

            @if($event->latitude && $event->longitude)
            <div class="mt-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-3">Location</h2>
                <div hidden id="lang">{{$event->latitude}}</div>
                <div hidden id="long">{{$event->longitude}}</div>
                <div id="map" class="w-full h-[600px] rounded-lg z-0"></div>
            </div>
            @endif
        </div>
    </div>


</section>

@if($event->latitude && $event->longitude)
@push('scripts')
<script>
    var lang = document.querySelector('div[id=lang]').textContent
    var long = document.querySelector('div[id=long]').textContent
    var center = [lang, long];
    var propertiesmap = L.map('map').setView(center, 15);

    propertiesmap.invalidateSize();

    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19
        , subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });

    googleStreets.addTo(propertiesmap)

    var marker = L.marker([lang, long]).addTo(propertiesmap);


    setTimeout(function() {
        window.dispatchEvent(new Event("resize"));
    }, 500);

</script>
@endpush
@endif
