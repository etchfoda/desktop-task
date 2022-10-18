<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class MediaShow extends Component
{
    public Model $media;

    protected $listeners = ['refreshMedia' => '$refresh'];

    public function render()
    {
        return view('livewire.media-show');
    }
}
