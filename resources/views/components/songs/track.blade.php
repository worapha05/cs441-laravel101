<div>
    <ul class="divide-y divide-gray-200">
            <li class="flex items-center py-4 px-6 hover:bg-gray-100">
                <span class="text-gray-700 text-lg font-medium mr-4">
                    {{ $song['id'] }}.
                </span>
                @if ($song['id'] == 1)
                    <img class="w-12 h-12 rounded-md object-cover mr-4" src="{{ url('/images/image_1.jpg') }}"
                         alt="Music">
                @elseif($song['id'] == 2)
                    <img class="w-12 h-12 rounded-md object-cover mr-4" src="{{ url('/images/image_2.jpg') }}"
                         alt="Music">
                @else
                    <img class="w-12 h-12 rounded-md object-cover mr-4" src="{{ url('/images/image_3.jpg') }}"
                         alt="Music">
                @endif
                <div class="flex-1">
                    <h3 class="text-lg font-medium text-gray-800">
                        {{ $song['title'] }}
                    </h3>
                    <p class="text-gray-600 text-base">
                        {{ $song['artist'] }} (Album: {{ $song['album'] }})
                    </p>
                </div>
                <span class="text-gray-400">
                    {{ $song['duration']['minutes'] }}:{{ $song['duration']['seconds'] }}
                </span>
            </li>
    </ul>
</div>
