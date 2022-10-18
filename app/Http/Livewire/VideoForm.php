<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class VideoForm extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title = '';
    /** @var TemporaryUploadedFile */
    public $video;

    protected $rules = [
        'title' => 'required|min:4|max:192',
        'video' => 'mimes:mp4|max:5120', // 5MB
    ];

    public function render()
    {
        return view('livewire.video-form');
    }

    public function saveVideo()
    {
        $this->validate();
        $path = $this->video->store('videos', 'public');
        Video::query()->create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'path' => $path,
        ]);
        $this->title = '';
        $this->video = null;
        session()->flash('message', 'video submitted successfully.');
        $this->redirectRoute('videos.index');
    }
}
