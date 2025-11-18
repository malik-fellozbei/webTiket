<nav class="bg-transparent fixed w-full z-30 top-0 start-0 text-black transition-all duration-300 ease-in-out" id="navbar">
    <div class="max-w-7xl flex items-center justify-between mx-auto px-8 py-8">
        <a href="{{ route('home') }}" class="text-3xl font-extrabold inline-flex items-center">
            <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l-2 2H5a2 2 0 01-2-2V4a2 2 0 012-2h4l2 2v15m4-15v15l2-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-4l-2-2V9m0 0V3m0 0h-4M9 3h4m0 0h-4m0 0v6m0 0h4m-4 0v6m0 0h4"></path>
            </svg>
            KLEvent
        </a>

        <div class="flex items-center">
            <div class="hidden md:flex md:items-center md:space-x-8 md:pr-8">
                <ul class="flex space-x-8 font-medium">
                    {{-- Menambahkan logika untuk link aktif di menu desktop --}}
                    <li>
                        <a href="{{ route('home') }}" class="transition-colors @if(request()->is('/')) text-indigo-600 font-bold @else text-black hover:text-blue-400 @endif" @if(request()->is('/')) aria-current="page" @endif>Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="transition-colors @if(request()->is('blog*')) text-indigo-600 font-bold @else text-black hover:text-blue-400 @endif" @if(request()->is('blog*')) aria-current="page" @endif>Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="transition-colors @if(request()->is('event*')) text-indigo-600 font-bold @else text-black hover:text-blue-400 @endif" @if(request()->is('event*')) aria-current="page" @endif>Event</a>
                    </li>
                    <li>
                        <a href="{{ route('myticket') }}" class="transition-colors @if(request()->is('myticket*')) text-indigo-600 font-bold @else text-black hover:text-blue-400 @endif" @if(request()->is('myticket*')) aria-current="page" @endif>My Ticket</a>
                    </li>
                </ul>
            </div>

            @auth
            <div class="relative">

                <button id="user-menu-button" data-dropdown-toggle="user-menu" class="text-black border font-medium hover:bg-black/10 rounded-full text-sm px-7 py-2 text-center hidden md:block" type="button">
                    {{ auth()->user()->short_name }}
                </button>

                <div id="user-menu" class="z-50 hidden text-base list-none bg-white/20 backdrop-blur-sm rounded-lg border border-black/10 shadow-lg">
                    <div class="px-4 py-4 space-y-4">
                        <span class="block text-sm text-black truncate">{{ auth()->user()->email }}</span>
                        <hr class="border-black/70">
                    </div>
                    <ul class="pb-4" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-black hover:bg-black/20">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="text-black border border-black/80 font-medium hover:bg-black/10 rounded-full text-sm px-7 py-2 text-center hidden md:block">Login</a>
            @endguest

            <button data-collapse-toggle="navbar-sticky" type="button" class="cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-gray-100/10 focus:outline-none focus:ring-2 focus:ring-gray-200/20 ml-3" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </div>

    <div class="hidden md:hidden" id="navbar-sticky">
        <div class="px-8 pt-4 pb-6">
            <div class="bg-white/80 backdrop-blur-sm rounded-lg border border-black/10 shadow-lg">
                <ul class="flex flex-col p-4 space-y-2 font-medium">
                    {{-- Menambahkan logika untuk link aktif di menu mobile --}}
                    <li>
                        <a href="{{ route('home') }}" class="block py-3 px-4 rounded-lg transition-colors @if(request()->is('/')) bg-indigo-500 text-white @else text-black hover:bg-black/10 @endif" @if(request()->is('/')) aria-current="page" @endif>Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="block py-3 px-4 rounded-lg transition-colors @if(request()->is('blog*')) bg-indigo-500 text-white @else text-black hover:bg-black/10 @endif" @if(request()->is('blog*')) aria-current="page" @endif>Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="block py-3 px-4 rounded-lg transition-colors @if(request()->is('event*')) bg-indigo-500 text-white @else text-black hover:bg-black/10 @endif" @if(request()->is('event*')) aria-current="page" @endif>Event</a>
                    </li>
                    <li>
                        <a href="{{ route('myticket') }}" class="block py-3 px-4 rounded-lg transition-colors @if(request()->is('myticket*')) bg-indigo-500 text-white @else text-black hover:bg-black/10 @endif" @if(request()->is('myticket*')) aria-current="page" @endif>My Ticket</a>
                    </li>
                    @auth
                    <li class="pt-2 border-t border-black/20">
                        <button type="button" data-dropdown-toggle="user-menu-mobile" class="w-full flex justify-between items-center py-3 px-4 text-black border border-black/30 rounded-lg hover:bg-black/10 transition-colors">
                            <span>{{ auth()->user()->short_name }}</span>
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="user-menu-mobile" class="hidden z-10 mt-2 bg-white/80 backdrop-blur-sm divide-y divide-black/20 border border-black/10 rounded-lg shadow w-full">
                            <ul class="p-2 text-sm text-gray-700" aria-labelledby="user-menu-button-mobile">
                                <li>
                                    <div class="block px-4 py-2 text-black/70">{{ auth()->user()->email }}</div>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-black/20 rounded-lg text-black">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endauth

                    @guest
                    <li class="pt-2 border-t border-black/20">
                        <a href="{{ route('login') }}" class="block py-3 px-4 text-black border border-black/30 rounded-lg hover:bg-black/10 transition-colors text-center">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');

        function handleScroll() {
            if (window.scrollY > 50) {
                // Scrolled state
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-white/60', 'backdrop-blur-sm', 'border-b', 'border-white/20', 'shadow-lg');
            } else {
                // Top of page state
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-white/60', 'backdrop-blur-sm', 'border-b', 'border-white/20', 'shadow-lg');
            }
        }
        window.addEventListener('scroll', handleScroll);
        handleScroll();
    });

</script>
