<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $perPage = 9;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        $posts = Post::query()
            ->whereNotNull('published_at')
            ->with('user')
            ->orderBy('published_at', 'desc')
            ->take($this->perPage)
            ->get();

        return view('livewire.show-posts', [
            'posts' => $posts,
        ]);
    }
}