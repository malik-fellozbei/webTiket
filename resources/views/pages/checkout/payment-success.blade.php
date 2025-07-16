@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white p-4">

    @php
    // ID Tiket ini seharusnya didapat dari proses transaksi
    $ticketID = 'EVENT-IN-'.strtoupper(bin2hex(random_bytes(6)));
    @endphp

    <div class="w-full max-w-md rounded-2xl shadow-xl p-8 text-center">
        <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExeGdwajB4YmUzODY3c2FuaWpuMWl0em9sZXpkZDYzdGFjbXlzb250dyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/ely3apij36BJhoZ234/giphy.gif" alt="Payment Success GIF" class="w-32 h-32 mx-auto mb-4">

        <h1 class="text-3xl font-extrabold text-slate-800">Payment Successful!</h1>
        <p class="mt-3 text-slate-600">Thank you! Your transaction has been completed and your e-ticket is now ready.</p>

        <div class="mt-8 bg-slate-50 border border-dashed border-slate-300 rounded-lg p-4">
            <p class="text-sm text-slate-500">Your Ticket ID</p>
            <p class="text-lg font-bold text-purple-700 tracking-wider mt-1">{{ $ticketID }}</p>
        </div>

        <div class="mt-8 space-y-3">
            <a href="{{ route('myticket') }}" class="block w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-3 text-lg rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                View My Ticket
            </a>
            <a href="{{ route('home') }}" class="block text-sm text-slate-600 hover:underline">
                Back to Home
            </a>
        </div>
    </div>

</div>
@endsection
