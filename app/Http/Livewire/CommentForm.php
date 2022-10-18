<?php

namespace App\Http\Livewire;

use App\Notifications\CommentAdded;
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
        $comment = $this->media->comments()->create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);
        if ($this->media->user_id !== auth()->id()) {
            $this->media->user->notify(new CommentAdded($this->media, $comment));
        }
        $this->content = '';
        session()->flash('message', 'comment submitted successfully.');
        $this->emitUp('refreshCommentList');
    }
}
