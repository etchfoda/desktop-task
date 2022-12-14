<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('videos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Video $video
     * @return Application|Factory|View
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }
}
