<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class MediaTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $query;

    public $route = '';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * @throws Exception
     */
    public function render()
    {
        if (!$this->query instanceof Builder)
            throw new Exception('query binding type invalid !');

        return view('livewire.media-table', [
            'paginated' => $this->query->orderByDesc('id')
                ->where(function ($query) {
                    if (!empty($this->search))
                        $query->where('title', 'like', '%' . $this->search . '%');
                })
                ->paginate(10),
        ]);
    }

    public function deleteMedia($media)
    {
        /*if (!Str::endsWith($media->path, ['test.mp3', 'test.mp4'])) {
            Storage::disk('public')->delete($media->path);
        }*/
        $media->delete();
    }
}
