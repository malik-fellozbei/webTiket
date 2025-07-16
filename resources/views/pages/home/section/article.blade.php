<section class="py-24 bg-white text-white">
    <div class="mx-auto px-4 md:px-10 xl:px-20 2xl:px-30">
        <h2 class="text-indigo-950 mb-14 text-3xl sm:text-4xl md:text-5xl font-bold text-center">News & Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-10">

            @for ($i = 0; $i < 8; $i++) <div class="card h-[500px] flex flex-col bg-white p-4 rounded-3xl shadow-lg">
                <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/600/400" alt="Gambar Berita" class="w-full h-60 object-cover mb-6 rounded-2xl">

                <div class="flex flex-col flex-grow px-1 pb-1">
                    <h3 class="text-xl font-semibold text-indigo-900 mb-4">
                        @if($i % 3 == 0)
                        Tips Aman Menonton Konser Musik di Musim Hujan
                        @elseif($i % 3 == 1)
                        Cara Mendapatkan Tiket Presale Konser Idamanmu
                        @else
                        Review Konser Spektakuler Minggu Lalu
                        @endif
                    </h3>

                    <p class="text-black text-base mb-3 flex-grow">
                        Jangan biarkan hujan merusak pengalaman konsermu! Simak tips persiapan agar tetap nyaman dan aman.
                    </p>

                    <a href="#" class="text-red-500 text-sm font-medium hover:text-red-700 mt-auto">
                        <span class="text-black">12 Mar - Jhon Doe | </span> Baca Selengkapnya
                    </a>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>
