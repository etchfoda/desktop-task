<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentForm extends Component
{
    public string $content = '';
    public $media;

    protected $rules = [
        'content' => 'required|min:6|max:300',
    ];

    public function render()
    {
        return view('livewire.comment-form');
    }

    public function saveComment()
    {
        $this->validate();
        $this->media->comments()->create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);
        $this->content = '';
        session()->flash('message', 'comment submitted successfully.');
        $this->emitUp('refreshCommentList');
    }
}
