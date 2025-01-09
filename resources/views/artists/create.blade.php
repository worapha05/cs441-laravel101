<x-layouts.main>
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <h2 class="py-2 px-4 text-center font-bold text-2xl uppercase bg-pink-100">
            Create New Artist
        </h2>
        <div class="px-2 py-2">
            <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="artist_name" class="block mb-2 font-bold text-gray-600">Artist Name</label>
                    @error('name')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                    <input type="text" id="name" name="name" autocomplete="off"
                           placeholder="Put in artist name" value="{{ old('name', '') }}"
                           class="border border-gray-300 shadow p-3 w-full rounded
			                            @error('name') border-red-400 @enderror" />
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 font-bold text-gray-600">Image</label>
                    @error('image')
                    <p class="text-red-500 text-sm">
                        {{ $message }}
                    </p>
                    @enderror
                    <input type="file" id="image" name="image" autocomplete="off"
                           value="{{ old('image', '') }}"
                           class="border border-gray-300 shadow p-3 w-full rounded
                      @error('image') border-red-400 @enderror" />
                </div>

                <button type="submit" class="block mx-auto bg-blue-500 text-white font-bold px-4 py-2 rounded-lg">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-layouts.main>
