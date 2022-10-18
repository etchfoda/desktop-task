<?php

namespace App\Http\Livewire;

use App\Models\Voice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VoicesTable extends MediaTable
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->query = Voice::query()->with('user')->withCount('comments');
        $this->route = 'voices';
    }

    public function deleteMedia($id)
    {
        $voice = Voice::query()->findOrFail($id);
        $this->authorize('delete', $voice);
        parent::deleteMedia($voice);
    }
}
