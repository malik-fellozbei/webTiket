<nav class="bg-transparent fixed w-full z-30 top-0 start-0 text-white transition-all duration-300 ease-in-out" id="navbar">
    <div class="max-w-7xl flex items-center justify-between mx-auto px-8 py-8">
        <!-- Logo - Fixed Position -->
        <a href="{{ route('home') }}" class="text-3xl font-extrabold inline-flex items-center">
            <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l-2 2H5a2 2 0 01-2-2V4a2 2 0 012-2h4l2 2v15m4-15v15l2-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-4l-2-2V9m0 0V3m0 0h-4M9 3h4m0 0h-4m0 0v6m0 0h4m-4 0v6m0 0h4"></path>
            </svg>
            KLEvent
        </a>

        <!-- Desktop Menu & Mobile Button Container -->
        <div class="flex items-center">
            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-8 md:pr-8">
                <ul class="flex space-x-8 font-medium">
                    <li>
                        <a href="{{ route('home') }}" class="text-white hover:text-blue-400 transition-colors" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="text-white hover:text-blue-400 transition-colors">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="text-white hover:text-blue-400 transition-colors">Event</a>
                    </li>
                    <li>
                        <a href="{{ route('myticket') }}" class="text-white hover:text-blue-400 transition-colors">My Ticket</a>
                    </li>
                </ul>
            </div>

            @auth
            <div class="relative">

                <button id="user-menu-button" data-dropdown-toggle="user-menu" class="text-white border font-medium hover:bg-black/80 rounded-full text-sm px-7 py-2 text-center hidden md:block" type="button">
                    {{ auth()->user()->short_name }}
                </button>

                <div id="user-menu" class="z-50 hidden text-base list-none bg-black/30 backdrop-blur-sm rounded-lg border border-white/60 shadow-lg">
                    <div class="px-4 py-4 space-y-4">
                        <span class="block text-sm text-white truncate">{{ auth()->user()->email }}</span>
                        <hr class="border-white/70">
                    </div>
                    <ul class="pb-4" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-white hover:bg-white/20">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>
            @endauth

            @guest
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="text-white border font-medium hover:bg-black/80 rounded-full text-sm px-7 py-2 text-center hidden md:block">Login</a>
            @endguest


            <!-- Mobile Menu Button -->
            <button data-collapse-toggle="navbar-sticky" type="button" class="cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100/10 focus:outline-none focus:ring-2 focus:ring-gray-200/20 ml-3" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div class="hidden md:hidden" id="navbar-sticky">
        <div class="px-8 pt-4 pb-6">
            <div class="bg-black/30 backdrop-blur-sm rounded-lg border border-white/60 shadow-lg">
                <ul class="flex flex-col p-4 space-y-2 font-medium">
                    <li>
                        <a href="{{ route('home') }}" class="block py-3 px-4 text-white bg-blue-600/30 rounded-lg hover:bg-blue-600/50 transition-colors" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="block py-3 px-4 text-white rounded-lg hover:bg-white/10 transition-colors">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="block py-3 px-4 text-white rounded-lg hover:bg-white/10 transition-colors">Event</a>
                    </li>
                    <li>
                        <a href="{{ route('myticket') }}" class="block py-3 px-4 text-white rounded-lg hover:bg-white/10 transition-colors">My Ticket</a>
                    </li>
                    @auth
                    <li class="pt-2 border-t border-white/20">
                        <button type="button" data-dropdown-toggle="user-menu-mobile" class="w-full flex justify-between items-center py-3 px-4 text-white border border-white/30 rounded-lg hover:bg-white/10 transition-colors">
                            <span>{{ auth()->user()->short_name }}</span>
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div id="user-menu-mobile" class="hidden z-10 mt-2 bg-black/30 backdrop-blur-sm divide-y divide-white/20 border border-white/60 rounded-lg shadow w-full">
                            <ul class="p-2 text-sm text-gray-200" aria-labelledby="user-menu-button-mobile">
                                <li>
                                    <div class="block px-4 py-2 text-white/70">{{ auth()->user()->email }}</div>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-white/20 rounded-lg text-white">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endauth


                    @guest
                    <li class="pt-2 border-t border-white/20">
                        <a href="{{ route('login') }}" class="block py-3 px-4 text-white border border-white/30 rounded-lg hover:bg-white/10 transition-colors text-center">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Scroll Effect Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');

        function handleScroll() {
            if (window.scrollY > 50) {
                // Scrolled state - add blur background
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('bg-black/60', 'backdrop-blur-sm', 'shadow-lg');
            } else {
                // Top of page - transparent background
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-black/60', 'backdrop-blur-sm', 'shadow-lg');
            }
        }

        // Listen for scroll events
        window.addEventListener('scroll', handleScroll);

        // Initial check
        handleScroll();
    });

</script>
