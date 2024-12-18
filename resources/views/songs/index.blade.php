<x-layouts.main>
    {{--<div class="mt-8">--}}
    {{--    @foreach($songs as $song)--}}
    {{--        <x-songs.track :song="$song"></x-songs.track>--}}
    {{--    @endforeach--}}
    {{--</div>--}}
    <div class="bg-white shadow-md rounded-md overflow-hidden max-w-lg mx-auto mt-16">
        <div class="bg-orange-100 py-2 px-4">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ $title }}
            </h2>
        </div>
        @foreach($songs as $song)
            <x-songs.track :song="$song"></x-songs.track>
        @endforeach
    </div>


</x-layouts.main>
