<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistCollection;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use App\Repositories\ArtistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        $artists = $this->artistRepository->getAll();
        return new ArtistCollection($artists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:artists,name'],
            'image' => [
                'mimes:jpeg,jpg,png',
                'max:1024',
            ]
        ]);

        $file = $request->file('image');
        $filename = time() . '-'. $file?->getClientOriginalName();
        $path = $file?->storeAs('artists', $filename, 'public');

        $artist = $this->artistRepository->create([
            'name' => $request->get('name'),
            'image_path' => $path,
        ]);

        return new ArtistResource($artist);
    }
    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return new ArtistResource($artist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        Gate::authorize('update', $artist);
        $request->validated();

        $this->artistRepository->update([
            'name' => $request->get('name')
        ], $artist->id);
        return new ArtistResource($artist->refresh());
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        $id = $artist->id;
        if ($artist->songs->isEmpty()) {
            $artist->delete();
            return [
                'success' => true,
                'message' => "Artist with id {$id} has been deleted"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Cannot delete artist with id {$id}"
            ];
        }
    }
}
