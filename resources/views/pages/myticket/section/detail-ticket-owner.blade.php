<div class="bg-slate-100 flex flex-col min-h-screen">
    <section class="flex-grow flex items-center justify-center p-4 py-8">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl p-6 md:p-8">

            <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">
                <div class="shrink-0">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $ticket->ticket_code }}" alt="QR Code Ticket" class="w-36 h-36 rounded-lg shadow-md">
                </div>
                <div class="flex-grow">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800">Your E-Ticket</h1>
                    <p class="text-sm font-semibold text-purple-700 tracking-wider mt-1">{{ $ticket->ticket_code }}</p>
                    <a href="{{ route('myticket.download', $ticket) }}" class="mt-4 inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all">
                        Download E-Ticket
                    </a>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-200 pt-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
                    <div>
                        <p class="text-slate-500">Name</p>
                        <p class="font-semibold text-slate-700">{{ ucwords($ticket->attendee->first_name ) }} {{ ucwords($ticket->attendee->last_name ) }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">ID Card (KTP)</p>
                        <p class="font-semibold text-slate-700">
                            {{ substr($ticket->attendee->identity_number, 0, 4) . '********' . substr($ticket->attendee->identity_number, -4) }}
                        </p>
                    </div>
                    <div>
                        <p class="text-slate-500">Birthdate</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->attendee->birthdate->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Email</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->attendee->email }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Phone Number</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->attendee->phone_number }}</p>
                    </div>

                    <div class="sm:col-span-2 my-4 border-t"></div>

                    <div>
                        <p class="text-slate-500">Event</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->event->name }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Ticket Category</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->ticket->name }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Event Date</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->event->start_time->format('d F Y, H:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Transaction Number</p>
                        <p class="font-semibold text-slate-700">{{ $ticket->order->transaction_code }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-200 pt-6">
                <h3 class="font-bold text-slate-800 mb-3">Terms & Conditions</h3>
                <ul class="space-y-2 text-xs text-slate-600 list-disc list-inside">
                    <li>Wajib membawa Kartu Identitas.</li>
                    <li>E-Ticket yang sah hanya dapat dibeli melalui website resmi kami.</li>
                    <li>E-ticket tidak dapat di-refund atau diuangkan kembali.</li>
                    <li>Penonton tidak diperbolehkan masuk jika e-ticket telah digunakan oleh orang lain.</li>
                </ul>
            </div>

        </div>
    </section>
</div>
