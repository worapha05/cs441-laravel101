<nav class="sticky top-0 bg-pink-500 p-4">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
        <div class="text-white font-bold text-3xl mb-4 lg:mb-0 hover:text-gray-200 hover:cursor-pointer">My Blog
        </div>

        <div class="lg:hidden">
            <button class="text-white focus:outline-none">
                <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M4 6h16M4 12h16m-7 6h7"
                    ></path>
                </svg>
            </button>
        </div>

        <div class="lg:flex flex-col lg:flex-row lg:space-x-4 lg:mt-0 mt-4 flex flex-col items-center text-xl">
            <a href="{{ route('blog.index') }}" class="text-white px-4 py-2 hover:text-gray-200 ">Blog</a>
            <a href="{{ route('about.index') }}" class="text-white px-4 py-2 hover:text-gray-200 ">About</a>
            <a href="{{ route('songs.index') }}" class="text-white px-4 py-2 hover:text-gray-200 ">Songs</a>
            <a href="{{ route('artists.index') }}" class="text-white px-4 py-2 hover:text-gray-200 ">Artists</a>
        </div>
    </div>
</nav>
