<section>
    <div class="relative bg-cover bg-center min-h-screen md:py-24 lg:py-10 md:min-h-fit flex items-center justify-center p-4 md:p-8" style="background-image: url({{ Storage::url('images/authBackground.jpg') }});">
        <div class="absolute inset-0 bg-gray-900 opacity-60"></div>
        <div class="relative z-20 flex flex-col md:flex-row items-center justify-center text-center md:text-left max-w-6xl mx-auto my-32 space-y-8 md:space-y-0 md:space-x-12">
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ Storage::url('images/greenday.png') }}" alt="Greenday" class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-full h-auto object-contain">
            </div>
            <div class="w-full md:w-1/2 text-white">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">Greenday In Jakarta Show Ticket Package</h1>
                <p class="text-base sm:text-lg mb-6">Get your tickets now for the most anticipated show of the year! Limited seats available.</p>
                <button onclick="location.href='{{ route('event') }}'" class="bg-red-400 text-white text-xs sm:text-sm lg:text-lg font-semibold px-8 py-3 rounded-full hover:bg-red-300 transition duration-300 ease-in-out shadow-lg">
                    BOOK NOW!
                </button>
            </div>
        </div>
    </div>
</section>
