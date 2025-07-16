<section class="py-7 mx-auto px-4 md:px-10 xl:px-20 2xl:px-30">
    <div class="flex flex-col md:flex-row justify-between items-center mb-14">
        <h2 class="text-blue-950 text-3xl sm:text-4xl md:text-5xl font-extrabold mb-6 md:mb-0 w-full md:w-auto text-center md:text-left">Upcoming Events</h2>

        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <select class="bg-blue-900/10 text-gray-700 px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none pr-14 w-full">
                    <option>Weekdays</option>
                    <option>Weekends</option>
                    <option>All Days</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <div class="relative w-full sm:w-auto">
                <select class="bg-blue-900/10 text-gray-700 px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none pr-14 w-full">
                    <option>Event Type</option>
                    <option>Concert</option>
                    <option>Festival</option>
                    <option>Theatre</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <div class="relative w-full sm:w-auto">
                <input type="text" placeholder="Search" class="bg-blue-900/10 text-gray-700 py-3 pl-10 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 w-full"> {{-- Added w-full --}}
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    @php
    $events = [
    [
    'month' => 'APR',
    'day' => '14',
    'title' => 'Wonder Girls 2010 World Tour San Francisco',
    'description' => 'We\'ll get you directly seated and inside for you to enjoy the show.',
    'image_seed' => 'kpop'
    ],
    [
    'month' => 'JUL',
    'day' => '25',
    'title' => 'Summer Indie Fest 2025 at The Park',
    'description' => 'Enjoy the best indie bands under the summer sky with great food.',
    'image_seed' => 'festival'
    ],
    [
    'month' => 'SEP',
    'day' => '05',
    'title' => 'Tech Innovators Summit: The Future of AI',
    'description' => 'Join industry leaders and innovators to explore the future of AI.',
    'image_seed' => 'tech'
    ],
    [
    'month' => 'OCT',
    'day' => '19',
    'title' => 'Downtown Art & Culture Exhibition Night',
    'description' => 'Discover captivating works from the most exciting contemporary artists.',
    'image_seed' => 'art'
    ],
    [
    'month' => 'NOV',
    'day' => '02',
    'title' => 'Stand-Up Comedy Special: Laugh Factory',
    'description' => 'A night full of non-stop laughter with the best comedians in town.',
    'image_seed' => 'comedy'
    ],
    [
    'month' => 'DEC',
    'day' => '08',
    'title' => 'The Grand Holiday Orchestra Performance',
    'description' => 'An exquisite evening of beautiful classical holiday music.',
    'image_seed' => 'orchestra'
    ],

    [
    'month' => 'JAN',
    'day' => '18',
    'title' => 'New Year Marathon 2026: City Run',
    'description' => 'Start the year strong with a scenic run through the city streets.',
    'image_seed' => 'running'
    ],
    [
    'month' => 'FEB',
    'day' => '14',
    'title' => 'Valentine\'s Day Special Cooking Class',
    'description' => 'Learn to cook a romantic three-course meal with your partner.',
    'image_seed' => 'cooking'
    ],
    [
    'month' => 'MAR',
    'day' => '22',
    'title' => 'Spring Fashion Week Showcase',
    'description' => 'Get a first look at the latest trends from top designers.',
    'image_seed' => 'fashion'
    ],
    [
    'month' => 'APR',
    'day' => '05',
    'title' => 'International Film Festival Premiere',
    'description' => 'Watch exclusive screenings and meet the filmmakers behind the magic.',
    'image_seed' => 'cinema'
    ],
    [
    'month' => 'MAY',
    'day' => '17',
    'title' => 'National Gaming Championship Finals',
    'description' => 'Witness the top esports teams battle for the ultimate glory.',
    'image_seed' => 'gaming'
    ],
    [
    'month' => 'JUN',
    'day' => '21',
    'title' => 'Mid-Year Jazz & Blues Night',
    'description' => 'Relax and unwind to the smooth sounds of live jazz and blues music.',
    'image_seed' => 'jazz'
    ],
    [
    'month' => 'JUL',
    'day' => '04',
    'title' => 'Annual Beach Volleyball Open Tournament',
    'description' => 'Feel the heat and excitement of professional beach volleyball.',
    'image_seed' => 'beach'
    ],
    [
    'month' => 'AUG',
    'day' => '15',
    'title' => 'Sci-Fi & Fantasy Fan Convention (Comic Con)',
    'description' => 'Meet your favorite stars, cosplay, and explore a world of fantasy.',
    'image_seed' => 'scifi'
    ],
    [
    'month' => 'SEP',
    'day' => '27',
    'title' => 'National Book Fair & Author Meetup',
    'description' => 'Discover new reads and get your favorite books signed by the authors.',
    'image_seed' => 'books'
    ],
    [
    'month' => 'OCT',
    'day' => '31',
    'title' => 'Halloween Horror Nights: The Reckoning',
    'description' => 'Experience the ultimate thrill with haunted houses and scare zones.',
    'image_seed' => 'halloween'
    ],
    [
    'month' => 'NOV',
    'day' => '09',
    'title' => 'Digital Photography Masterclass Workshop',
    'description' => 'Learn professional photography techniques from an industry expert.',
    'image_seed' => 'camera'
    ],
    [
    'month' => 'DEC',
    'day' => '22',
    'title' => 'Grand Christmas Market & Winter Fair',
    'description' => 'Get into the holiday spirit with festive food, gifts, and decorations.',
    'image_seed' => 'christmas'
    ],
    [
    'month' => 'JAN',
    'day' => '29',
    'title' => 'Future Robotics & Automation Expo 2027',
    'description' => 'See the latest advancements in robotics and automation technology.',
    'image_seed' => 'robot'
    ],
    [
    'month' => 'FEB',
    'day' => '19',
    'title' => 'Winter Sports Championship: Ski & Snowboard',
    'description' => 'Watch world-class athletes compete in thrilling winter sports events Watch world-class athletes compete in thrilling winter sports events.',
    'image_seed' => 'winter'
    ],
    [
    'month' => 'JAN',
    'day' => '30',
    'title' => 'Winter Sports Championship: Ski & Snowboard',
    'description' => 'Watch world-class athletes compete in thrilling winter sports events.',
    'image_seed' => 'winter'
    ],
    ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @for ($i = 0; $i < count($events); $i++) <div class="bg-white rounded-4xl shadow-md overflow-hidden">
            <a href="{{ route('detail-event') }}">
                <img src="https://picsum.photos/seed/{{ $events[$i]['image_seed'] }}/600/400" alt="Event Image" class="w-full h-80 object-cover">


                <div class="p-5 flex items-start gap-4">

                    <div class="text-center">
                        <p class="text-sm font-bold text-purple-600 uppercase">{{ $events[$i]['month'] }}</p>
                        <p class="text-3xl font-bold text-gray-900 leading-none">{{ $events[$i]['day'] }}</p>
                    </div>


                    <div>
                        <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $events[$i]['title'] }}</h3>
                        <p class="text-gray-500 text-sm mt-2">{{ $events[$i]['description'] }}</p>
                    </div>
                </div>
            </a>
    </div>
    @endfor

    </div>

    <div class="text-center mt-10">
        <button class="border rounded-full hover:text-indigo-700 text-indigo-900 font-semibold py-4 px-8 transition-colors duration-300">
            Load More Events
        </button>
    </div>
</section>
