<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Comment extends Component
{
    use AuthorizesRequests;

    protected $listeners = ['refresh' => '$refresh'];

    public ?\App\Models\Comment $comment = null;

    public function render()
    {
        return view('livewire.comment');
    }

    public function deleteComment()
    {
        $this->authorize('delete', $this->comment);
        $this->comment->delete();
        $this->emitUp('refreshCommentList');
    }
}
