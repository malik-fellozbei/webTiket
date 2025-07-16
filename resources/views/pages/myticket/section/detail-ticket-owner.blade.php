<div class="bg-slate-100 flex flex-col min-h-screen">

    @php
    // Data tiket ini seharusnya didapat dari database berdasarkan ID tiket
    $ticket = [
    'id' => 'EVENT-IN-'.strtoupper(bin2hex(random_bytes(6))),
    'transaction_id' => 'TIX-020223-37967',
    'price' => 'Rp. 328.000',
    'location' => 'DKI Jakarta, Indonesia',
    'customer_name' => 'Tiara Prasetyo',
    'category' => 'Normal - Day 1',
    'event_date' => '10 Februari 2023, 14:00',
    'terms' => [
    'Wajib membawa Kartu Identitas.',
    'Sudah divaksin tahap kedua atau Booster tahap ketiga, dan status Peduli Lindungi menunjukkan warna Hijau.',
    'E-Ticket yang sah hanya dapat dibeli melalui website resmi KiosTix.',
    'Satu identitas dapat membeli maksimal 5 tiket.',
    'E-ticket tidak dapat di-refund atau diuangkan kembali.',
    'Kami tidak bertanggung jawab atas keaslian tiket yang dibeli di luar website resmi.',
    'Penonton tidak diperbolehkan masuk jika e-ticket telah digunakan oleh orang lain atau tidak valid.',
    'Penyelenggara berhak menindak tegas dan mengeluarkan pengunjung yang tidak mematuhi protokol kesehatan.',
    'Penyelenggara berhak memodifikasi susunan acara, mengubah, atau mengakhiri tanpa pemberitahuan.',
    'Dalam keadaan Force Majeure, promotor berhak membatalkan atau mengubah waktu acara tanpa pemberitahuan.',
    ]
    ];
    @endphp

    <section class="flex-grow flex items-center justify-center p-4 py-8">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl p-6 md:p-8">

            {{-- Bagian Atas: QR Code, Judul, dan Tombol --}}
            <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">
                <div class="shrink-0">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $ticket['id'] }}" alt="QR Code Ticket" class="w-36 h-36 rounded-lg shadow-md">
                </div>
                <div class="flex-grow">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800">Your Ticket</h1>
                    <p class="text-sm font-semibold text-purple-700 tracking-wider mt-1">{{ $ticket['id'] }}</p>
                    <a href="#" class="mt-4 inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Download E-Ticket
                    </a>
                </div>
            </div>

            {{-- Detail Informasi Tiket --}}
            <div class="mt-8 border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
                    <div>
                        <p class="text-slate-500">Nomor Transaksi</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['transaction_id'] }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Harga</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['price'] }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Lokasi</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['location'] }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Nama Customer</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['customer_name'] }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Kategori</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['category'] }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Tanggal Acara</p>
                        <p class="font-semibold text-slate-700">{{ $ticket['event_date'] }}</p>
                    </div>
                </div>
            </div>

            {{-- Syarat & Ketentuan --}}
            <div class="mt-8 border-t border-slate-200 pt-6">
                <h3 class="font-bold text-slate-800 mb-3">Syarat & Ketentuan</h3>
                <ul class="space-y-2 text-xs text-slate-600 list-disc list-inside">
                    @foreach ($ticket['terms'] as $term)
                    <li>{{ $term }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
</div>
