<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Repositories\PlaylistRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PlaylistController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = $this->playlistRepository->getByUserId(auth()->id());
        return view('playlists.index', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $accessibility = $request->input('accessibility');

        if ($name === null || $accessibility === null) {
            return redirect()->back();
        }

        if (!in_array($accessibility, ['PUBLIC', 'PRIVATE'])) {
            return redirect()->back();
        }

        $playlist = $this->playlistRepository->create([
            'name' => $name,
            'user_id' => auth()->id(),
            'accessibility' => $accessibility,
        ]);

        return redirect()->route('playlists.show', ['playlist' => $playlist]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return view('playlists.show', ['playlist' => $playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        $this->playlistRepository->delete($playlist->id);
        return redirect()->route('playlists.index');
    }

    public function __construct(
        private PlaylistRepository $playlistRepository
    ) {}

    public static function middleware() : array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }
}
