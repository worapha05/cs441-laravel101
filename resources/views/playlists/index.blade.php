<x-layouts.main>
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-pink-100 py-2 px-4 flex justify-between">
            <h2 class="text-xl font-semibold text-gray-800">My Playlists</h2>
            <a class="inline-block py-2 px-4 border border-gray-700 hover:bg-green-400"
               href="{{ route('playlists.create') }}">
                Create New Playlist
            </a>
        </div>

        <ul class="divide-y divide-gray-200">
            @foreach ($playlists as $playlist)
                <li class="flex items-center py-4 px-6 hover:bg-gray-50">
                    <span class="text-gray-700 text-lg font-medium mr-4">
                        {{ $loop->iteration }}.
                    </span>
                    <div class="flex-1">
                        <a href="{{ route('playlists.show', ['playlist' => $playlist]) }}">
                            <p class="text-lg font-medium text-gray-800">
                                {{ $playlist->name }}
                            </p>
                        </a>
                        <p class="text-gray-600 text-base">{{ $playlist->accessibility }}</p>
                    </div>
                    <span class="text-gray-400">{{ $playlist->songs->count() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.main>
