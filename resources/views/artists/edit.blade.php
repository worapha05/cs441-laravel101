<x-layouts.main>
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <h2 class="py-2 px-4 text-center font-bold text-2xl uppercase bg-pink-100">
            Edit Artist
        </h2>
        <div class="px-2 py-2">
            <form action="{{ route('artists.update', ['artist' => $artist]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="artist_name" class="block mb-2 font-bold text-gray-600">Artist Name</label>
                    <input type="text" id="artist_name" name="name" value="{{ $artist->name }}"
                           class="border border-gray-300 shadow p-3 w-full rounded mb-"></input>
                </div>
                <button type="submit" class="block mx-auto bg-blue-500 text-white font-bold px-4 py-2 rounded-lg">
                    Edit
                </button>

            </form>

            <form class="inline-block"
                  action="{{ route('artists.destroy', ['artist' => $artist]) }}"
                  method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-block py-2 px-4 border text-white border-gray-700 bg-red-500">
                    Delete Artist
                </button>

            </form>

            @if(session('error'))
                <p class="text-red-500 font-bold">{{ session('error') }}</p>
            @endif
        </div>
    </div>
</x-layouts.main>
