<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentList extends Component
{
    public $comments;
    public $media;

    protected $listeners = ['refreshCommentList' => 'loadComments'];

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = $this->media->comments()->orderByDesc('created_at')->get();
    }


    public function render()
    {
        return view('livewire.comment-list', [
            'comments' => $this->comments,
        ]);
    }
}
