<div class="container mx-auto px-4 py-16">

    <header class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-indigo-950 mb-2">News & Articles</h1>
        <p class="text-lg text-gray-600">Discover the latest news, tips, and insights from our team.</p>
    </header>

    {{-- Grid untuk menampilkan post --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($posts as $post)
        <a href="{{ route('blog.detail', $post) }}" class="block">
            <div class="card h-[500px] flex flex-col bg-white p-4 rounded-3xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-60 object-cover mb-6 rounded-2xl">
                <div class="flex flex-col flex-grow px-1 pb-1">
                    <h3 class="text-xl font-semibold text-indigo-900 mb-4 leading-tight">{{ $post->title }}</h3>
                    <p class="text-black text-base mb-3 flex-grow">{{ $post->excerpt }}</p>
                    <div class="text-red-500 text-sm font-medium hover:text-red-700 mt-auto">
                        <span class="text-black">{{ $post->published_at->format('d M') }} - {{ $post->user->name }} | </span> Baca Selengkapnya
                    </div>
                </div>
            </div>
        </a>
        @empty
        <p class="col-span-3 text-center text-gray-500">No articles found.</p>
        @endforelse
    </div>

    <div class="text-center mt-12">
        @if(isset($event))
        <button wire:click="loadMore" class="border rounded-full hover:text-indigo-700 text-indigo-900 font-semibold py-4 px-8 transition-colors duration-300">
            <span wire:loading.remove wire:target="loadMore">Load More</span>
            <span wire:loading wire:target="loadMore">Loading...</span>
        </button>
        @endif
    </div>

</div>
