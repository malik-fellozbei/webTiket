<section>
    {{-- Hero Section --}}
    <div class="relative bg-slate-900 py-20 md:py-32">
        <div class="absolute inset-0">
            {{-- Gunakan thumbnail post sebagai background --}}
            <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="relative container mx-auto px-6 text-center text-white">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">{{ $post->title }}</h1>
            <div class="mt-6 flex items-center justify-center gap-4">
                {{-- Gunakan foto profil penulis --}}
                <img src="{{ $post->user->profile_photo_path ? Storage::url($post->user->profile_photo_path) : 'https://i.pravatar.cc/150?u=' . $post->user->id }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full border-2 border-white">
                <div>
                    <p class="font-semibold">{{ $post->user->name }}</p>
                    <p class="text-sm text-slate-300">{{ $post->published_at->format('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Artikel --}}
    <div class="bg-white py-12 md:py-16">
        <div class="container mx-auto px-6">
            {{-- Tampilkan konten dari Rich Editor, render HTML dengan {!! !!} --}}
            <article class="prose lg:prose-xl max-w-5xl mx-auto">
                {!! str($post->content)->sanitizeHtml() !!}
            </article>

            {{-- Social Share & Author Box --}}
            <div class="max-w-5xl mx-auto mt-12 pt-8 border-t">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-slate-700">Share this post:</span>
                        <div class="flex gap-2">
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center">FB</a>
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center">TW</a>
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center">IN</a>
                        </div>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-lg flex items-center gap-4">
                        <img src="{{ $post->user->profile_photo_path ? Storage::url($post->user->profile_photo_path) : 'https://i.pravatar.cc/150?u=' . $post->user->id }}" alt="{{ $post->user->name }}" class="w-14 h-14 rounded-full">
                        <div>
                            <p class="text-sm text-slate-500">WRITTEN BY</p>
                            <p class="font-bold text-slate-800">{{ $post->user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
