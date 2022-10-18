<?php

namespace App\Http\Livewire;

use App\Models\Voice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class VoiceForm extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title = '';
    /** @var TemporaryUploadedFile */
    public $voice;

    protected $rules = [
        'title' => 'required|min:4|max:192',
        'voice' => 'mimes:mp3|max:5120', // 5MB
    ];

    public function render()
    {
        return view('livewire.voice-form');
    }

    public function saveVoice()
    {
        $this->validate();
        $path = $this->voice->store('voices', 'public');
        Voice::query()->create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'path' => $path,
        ]);
        $this->title = '';
        $this->voice = null;
        session()->flash('message', 'voice submitted successfully.');
        $this->redirectRoute('voices.index');
    }
}
