@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen bg-white">


    <main class="flex-grow flex items-center justify-center p-4">
        <div class="w-full max-w-md rounded-2xl shadow-xl p-8 text-center">
            <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExMDA0MnNwdjc2Yzg0NHpvbzc0cGU3aGQ2ZG9ud200ZzM2YjRiaXNvYyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/VlqzeaRnhCvPLfrSh6/giphy.gif" alt="Payment Failed GIF" class="w-32 h-32 mx-auto mb-4">

            <h1 class="text-3xl font-extrabold text-red-600">Payment Failed</h1>
            <p class="mt-3 text-slate-600">Unfortunately, we were unable to process your payment. Please check your payment details and try again.</p>

            <div class="mt-8 space-y-3">
                <a href="{{ route('checkout') }}" class="block w-full bg-slate-800 text-white font-bold py-3 text-lg rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    Try Again
                </a>
                <a href="{{ route('home') }}" class="block text-sm text-slate-600 hover:underline">
                    Contact Support
                </a>
            </div>
        </div>
    </main>

</div>
@endsection
