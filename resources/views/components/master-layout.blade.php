<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex h-full">
        <div class="h-full  w-1/6 bg-white shadow-xl md:block">
            <aside class="flex flex-col h-full w-full p-1">
                <div class="py-2 px-2 text-lg font-semibold font-serif flex flex-col items-center">
                    CMS Laravel
                </div>

                <div class="my-2 text-gray-400 flex flex-col font-light mx-2">Dashboard Menu
                    <a href="{{ route('show.masterdashboard') }}"
                        class="text-black font-semibold p-2 rounded group hover:bg-amber-400 hover:text-white">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:stroke-white group-hover:fill-white">
                                <path
                                    d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                <path
                                    d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                            </svg>


                            <h3 class="inline">Home</h3>
                        </div>
                    </a>

                    <a href="{{ route('show.admin') }}"
                        class="text-black font-semibold p-2 rounded group hover:bg-amber-400 hover:text-white">
                        <div>
                            <svg class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:stroke-white group-hover:fill-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <h3 class="inline">Admin Management</h3>
                        </div>
                    </a>

                    <a href="{{ route('show.allPost') }}"
                        class="text-black font-semibold p-2 rounded group hover:bg-amber-400 hover:text-white">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:stroke-white group-hover:fill-white">
                                <path fill-rule="evenodd"
                                    d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 0 1-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0 1 13.5 1.5H15a3 3 0 0 1 2.663 1.618ZM12 4.5A1.5 1.5 0 0 1 13.5 3H15a1.5 1.5 0 0 1 1.5 1.5H12Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 0 1 9 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0 1 16.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625v-12Z" />
                                <path
                                    d="M10.5 10.5a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963 5.23 5.23 0 0 0-3.434-1.279h-1.875a.375.375 0 0 1-.375-.375V10.5Z" />
                            </svg>

                            <h3 class="inline">Post Management</h3>
                        </div>
                    </a>
                </div>

                <div class="my-2 text-gray-400 flex flex-col font-light mx-2">Other Menu
                    <form action="{{ route('logout') }}" method="POST"
                        class="text-black font-semibold cursor-pointer p-2 rounded group hover:bg-amber-400 hover:text-white">
                        @csrf

                        <button class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:stroke-white group-hover:fill-white">
                                <path fill-rule="evenodd"
                                    d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <h3 class="inline">Logout</h3>
                        </button>
                    </form>
                </div>
            </aside>
        </div>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow flex justify-between items-center p-3">
                <h1 class="font-bold"></h1>

                <div class="flex items-center p- space-x-3">
                    <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="rounded-full w-8 h-8">
                    <div class="block">
                        <h1 class="font-semibold">{{ Auth::user()->username }}</h1>
                        <p class="text-gray-400 text-sm">Master Administrator</p>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>