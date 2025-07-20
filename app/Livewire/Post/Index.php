<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public $posts;
    public function mount(){
        $this->posts = Post::all();
    }

    #[Title('All Posts')]
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.post.index');
    }

    #[On('refresh-posts')]
    public function loadPosts() {
        $this->posts = Post::all();
    }
}
