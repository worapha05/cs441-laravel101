<x-layouts.main>
    <div class="px-4">
        <h1 class="text-5xl">
            Playlist: {{ $playlist->name }}
        </h1>
        <div class="flex">
            <p class="text-gray-500">{{ $playlist->accessibility }}</p>
            <a class="inline block px-4 hover:underline"
               href="{{ route('playlists.edit', ['playlist' => $playlist]) }}">
                Edit Playlist
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        @if($playlist->songs->isEmpty())
            <form class="inline-block"
                  action="{{ route('playlists.destroy', ['playlist' => $playlist]) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-block py-2 px-4 border border-gray-700 bg-pink-100">
                    Delete Playlist
                </button>
            </form>
        @else
            <div class="bg-pink-100 py-2 px-4">
                <h2 class="text-xl font-semibold text-gray-800">Songs</h2>
            </div>
            <ul class="divide-y divide-gray-200">
                @foreach ($playlist->songs as $song)
                    <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                        <span class="text-gray-700 text-lg font-medium mr-4">{{ $loop->iteration }}.</span>
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-800">{{ $song->title }}</h3>
                            <p class="text-gray-600 text-base">{{ $song->artist->name }}</p>
                        </div>
                        <span class="text-gray-400">{{ $song->duration_to_string }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</x-layouts.main>
