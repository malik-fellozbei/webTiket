<section class="relative py-12 min-h-[600px] flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    <img src="{{ Storage::url('images/authBackground.jpg') }}" alt="Banner Background" class="absolute inset-0 w-full h-full object-cover">

    {{-- Overlay (optional, adjust opacity as needed for text readability) --}}
    <div class="absolute inset-0 bg-black opacity-40"></div>

    <div class="relative z-10 text-center text-white w-full px-4">
        <h3 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4">Ads Alert !!!</h3>
        <p class="text-base sm:text-lg text-gray-200 max-w-2xl mx-auto">Advertise your events here and reach a wider audience with us!</p>
    </div>
</section>
