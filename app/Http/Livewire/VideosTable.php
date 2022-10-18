<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VideosTable extends MediaTable
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->query = Video::query()->with('user')->withCount('comments');
        $this->route = 'videos';
    }

    public function deleteMedia($id)
    {
        $video = Video::query()->findOrFail($id);
        $this->authorize('delete', $video);
        parent::deleteMedia($video);
    }
}
