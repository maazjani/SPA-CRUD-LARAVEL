<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    //Modal related methods
    public $modalTitle = 'Create Post';
    public $modalAction = 'create-post';
    public $is_edit = false;

    //form related methods
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $author;
    #[Rule('nullable')]
    public $is_published = true;

    public $posts;

    #[On('create-post')]
    public function save(){
        $this->validate();
        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'is_published' => $this->is_published
        ]);
        $this->dispatch('refresh-posts');
        $this->reset();
    }

    #[On('edit-mode')]
    public function loadEditModal($id){
        $this->modalTitle = 'Edit Post';
        $this->modalAction = 'edit-post';
        $this->is_edit = true;

        $this->posts = Post::findOrfail($id);
        $this->title = $this->posts->title;
        $this->description = $this->posts->description;
        $this->author = $this->posts->author;
        $this->is_published = $this->posts->is_published;
    }

    #[On('edit-post')]
    public function update(){
        $this->validate();

        $p = Post::findOrFail($this->posts->id);
        $p->title = $this->title;
        $p->description = $this->description;
        $p->author = $this->author;
        $p->is_published = $this->is_published;
        $p->save();

        $this->dispatch('refresh-posts');
        $this->reset();
    }

    #[On('delete-post')]
    public function delete($id){

        $p = Post::findOrFail($id);
        $p->delete();

        $this->dispatch('refresh-posts');
        $this->reset();
    }

    #[On('create-post-close')]
    #[On('edit-post-close')]
    #[On('reset-modal')]
    public function resetFieds(){
        $this->reset();
    }


    public function render()
    {
        return view('livewire.post.create');
    }
}
