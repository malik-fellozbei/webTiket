@extends('layouts.app')

@section('content')
<main>
    <x-navbar />

    <div class="min-h-screen pt-28 bg-cover bg-center flex items-center justify-center p-4" style="background-image:  url('{{asset(Storage::url('images/authBackground.jpg'))}}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 flex flex-col lg:flex-row w-full max-w-6xl rounded-lg overflow-hidden shadow-2xl">
            <div class="w-full lg:w-1/2 bg-white p-8 md:p-12 flex flex-col justify-center items-center">
                <div class="w-full max-w-md">
                    <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6 text-center">LET'S GET YOU STARTED</h2>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 text-center">Create an Account</h3>

                    <form action="{{ route('createAccount') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 sr-only">Your Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-base" placeholder="Johnson Doe">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 sr-only">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-base" placeholder="johnsondoe@nomail.com">
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 sr-only">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-base" placeholder="********">
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sr-only">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-base" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full cursor-pointer flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-md font-medium text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                                GET STARTED
                            </button>
                        </div>
                    </form>

                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500 font-semibold">Or</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button type="button" class="w-full cursor-pointer max-h-12 flex items-center justify-center py-3 px-4 border-1 border-gray-100 rounded-md shadow-sm text-sm font-light text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            <img src="{{ Storage::url('icon/google.svg') }}" alt="Google icon" class="h-9 w-9">
                            <span>Sign up with Google</span>
                        </button>
                        <button type="button" class="w-full cursor-pointer max-h-12 flex items-center justify-center py-3 px-4 border-1 border-gray-100 rounded-md shadow-sm text-sm font-light text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            <img src="{{ Storage::url('icon/facebook.svg') }}" alt="Facebook icon" class="h-5 w-5 mr-3">
                            Sign up with Facebook
                        </button>
                        <button type="button" class="w-full cursor-pointer max-h-12 flex items-center justify-center py-3 px-4 border-1 border-gray-100 rounded-md shadow-sm text-sm font-light text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            <img src="{{ Storage::url('icon/apple.svg') }}" alt="Apple icon" class="h-5 w-5 mr-3">
                            Sign up with Apple
                        </button>
                    </div>

                    <div class="mt-8 text-center text-sm text-gray-600">
                        Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">LOGIN HERE</a>
                    </div>
                </div>
            </div>


            <div class="hidden lg:flex w-1/2 bg-gray-900 text-white p-12 flex-col justify-center items-start relative overflow-hidden">

                <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://via.placeholder.com/800x1200/333333/666666?text=Audience');"></div>

                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <svg class="h-8 w-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l-2 2H5a2 2 0 01-2-2V4a2 2 0 012-2h4l2 2v15m4-15v15l2-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-4l-2-2V9m0 0V3m0 0h-4M9 3h4m0 0h-4m0 0v6m0 0h4m-4 0v6m0 0h4"></path>
                        </svg>
                        <span class="text-3xl font-bold">KapanLagiEvent</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">Konser Spektakuler</h1>
                    <p class="text-lg md:text-xl leading-relaxed mb-8">
                        Experience an unforgettable concert that will leave you breathless! Join us for a night filled with mesmerizing performances, stunning visuals, and an electric atmosphere. Feel the rhythm and let the music take you on a journey like no other!
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
