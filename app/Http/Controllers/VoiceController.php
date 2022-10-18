<?php

namespace App\Http\Controllers;

use App\Models\Voice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('voices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('voices.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Voice $voice
     * @return Application|Factory|View
     */
    public function show(Voice $voice)
    {
        return view('voices.show', compact('voice'));
    }
}
