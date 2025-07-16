{{-- Latar belakang terang untuk seluruh bagian --}}
<section class="bg-slate-100 py-12 md:py-16">
    <div class="container mx-auto px-4">
        {{-- Pembungkus untuk memusatkan konten dan memberi jarak antar kartu --}}
        <div class="max-w-3xl mx-auto space-y-6">

            {{-- Loop untuk menampilkan kartu tiket --}}
            @for ($i = 0; $i < 3; $i++) {{-- 
                  Setiap kartu menggunakan flexbox untuk layout horizontal di desktop
                  dan vertikal di mobile (flex-col md:flex-row)
                --}} <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row items-stretch overflow-hidden">

                {{-- Bagian Gambar (Kiri) --}}
                <div class="md:w-40 shrink-0">
                    {{-- Gambar dibuat responsif dengan aspect ratio --}}
                    <img src="https://picsum.photos/seed/{{ rand(1, 1000) }}/400/600" alt="Event Artist" class="w-full h-48 md:h-full object-cover">
                </div>

                {{--
                      Bagian Konten (Kanan)
                      - Menggunakan flexbox vertikal untuk menata konten.
                      - Tombol didorong ke bawah dengan 'mt-auto'.
                    --}}
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-2xl font-bold text-slate-800">Festival</h2>
                    <p class="text-sm text-slate-500 mb-4">SBS MTV Show Ticket Package</p>

                    {{-- Detail Event --}}
                    <div class="space-y-2 text-slate-600 text-sm border-t pt-4">
                        <p class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                            <span>Selasa, 15 Juli 2025 ・ 16:16 WIB</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                            <span>Jakarta, Indonesia</span>
                        </p>
                    </div>

                    {{-- Tombol Aksi (didorong ke bawah) --}}
                    <a href="{{ route('ticket-owner') }}" class="mt-auto ml-auto text-center bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        View My Ticket
                    </a>
                </div>
        </div>
        @endfor

    </div>
    </div>
</section>
