<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Repositories\ArtistRepository;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function __construct(
        private ArtistRepository $artistRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = $this->artistRepository->get();
        return view('artists.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $artist = $this->artistRepository->create(['name' => $name]);
        return redirect()->route('artists.show', ['artist' => $artist]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show', ['artist' => $artist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', ['artist' => $artist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $name = $request->input('name');
        $this->artistRepository->update(['name' => $name], $artist->id);
        return redirect()->route('artists.show', ['artist' => $artist]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        if ($artist->songs->count() > 0) {
            return redirect()->route('artists.edit', ['artist' => $artist])
                ->with('error', 'Artist already exists.');
        }
        $this->artistRepository->delete($artist->id);
        return redirect()->route('artists.index');
    }
}
