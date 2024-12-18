<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = collect([
            [
                'id' => 1,
                'title' => 'เสนอตัว (Ooh!)',
                'artist' => 'PP Krit',
                'album' => 'UNDRESS',
                'duration' => [
                    'minutes' => 2,
                    'seconds' => 55
                ]
            ],
            [
                'id' => 2,
                'title' => 'Nonsense',
                'artist' => 'Sabrina Carpenter',
                'album' => "Emails I Can't Send",
                'duration' => [
                    'minutes' => 2,
                    'seconds' => 43
                ]
            ],
            [
                'id' => 3,
                'title' => "toxic till the end",
                'artist' => 'Rosé',
                'album' => 'Rosie',
                'duration' => [
                    'minutes' => 2,
                    'seconds' => 25
                ]
            ],
        ]);

        return view('songs.index', [
            'title' => 'Song Playlist',
            'songs' => $songs
        ]);
    }
}
