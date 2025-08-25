@admin
<x-admin-layout>
    <x-cardPost-layout>
        <div class="md:flex">
            <div class="md:shrink-0">
                <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset($post->filename) }}"
                    alt="Post Image" />
            </div>
            <div class="p-8">
                <div class="text-lg font-bold text-amber-500 capitalize">{{$post->title}}</div>
                <p class="mt-2 text-gray-500">
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </x-cardPost-layout>
</x-admin-layout>
@endadmin

@master
<x-master-layout>
    <x-cardPost-layout>
        <div class="md:flex">
            <div class="md:shrink-0">
                <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset($post->filename) }}"
                    alt="Post Image" />
            </div>
            <div class="p-8">
                <div class="text-lg font-bold text-amber-500 capitalize">{{$post->title}}</div>
                <p class="mt-2 text-gray-500">
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </x-cardPost-layout>
</x-master-layout>
@endmaster

@guestRole
<x-guest-layout>
    <x-cardPost-layout>
        <div class="md:flex">
            <div class="md:shrink-0">
                <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset($post->filename) }}"
                    alt="Post Image" />
            </div>
            <div class="p-8 flex flex-col justify-center">
                <div class="text-lg font-bold text-amber-500 capitalize">{{$post->title}}</div>
                <p class="mt-2 text-gray-500">
                    {{ $post->content }}
                </p>
                <div class="flex gap-3 mt-4">
                    @foreach ($post->categories as $category)
                        <span class="py-1 px-2 rounded-xl bg-gray-200 text-gray-500">#{{ $category->slug }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </x-cardPost-layout>

    <div class="m-3 rounded-lg bg-white p-2 shadow-md">
        <h1 class="text-lg font-semibold">Leave a Comment</h1>
        <form action="{{ route('createComment', $post->id) }}" method="POST" class="mt-3 flex flex-col gap-2">
            @csrf

            <label for="title" class="font-semibold">Title</label>
            <input type="text" name="title" placeholder="Enter title"
                class="rounded-md bg-gray-100 p-3 focus:outline-2 focus:outline-amber-300 sm:w-full md:w-96 md:grow-0"
                required />

            <label for="title" class="mt-2 font-semibold">Comment</label>
            <textarea name="content" id="" cols="30" rows="3"
                class="rounded-md bg-gray-100 p-3 focus:outline-2 focus:outline-amber-300"></textarea>

            <div class="flex flex-row-reverse gap-3">
                <button
                    class="mt-2 w-24 cursor-pointer rounded-md bg-amber-300 p-1 hover:bg-amber-400 hover:text-white">Post</button>
                <a href="{{ route('show.landingPage') }}"
                    class="mt-2 w-24 cursor-pointer rounded-md bg-gray-300 p-1 text-center hover:bg-gray-400"> Back </a>
            </div>
        </form>
    </div>
    <div class="flex mx-3 my-6">
        <form action="{{ route('show.post', $post->id) }}" method="GET"
            class="flex rounded-md outline-1 outline-gray-400">
            <button type="submit"
                class="group cursor-pointer rounded-tl-md rounded-bl-md bg-amber-300 px-2 py-1 hover:bg-amber-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:fill-white">
                    <path fill-rule="evenodd"
                        d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z"
                        clip-rule="evenodd" />
                </svg>

                <h3 class="inline group-hover:text-white">Filter</h3>
            </button>
            <select name="dateFilter" id="dateFilter" class="bg-white px-9 rounded-tr-md rounded-br-md">
                <option value="" selected>All Comment</option>
                <option value="today">Today</option>
                <option value="yesterday">Yesterday</option>
                <option value="this_week">This Week</option>
            </select>
        </form>
    </div>
    <div class="mx-3 my-8 flex flex-col items-center">
        <h1 class="font-semibold">All Comments</h1>

        @forelse ($comments as $data)
            <div class="w-full rounded-md bg-white p-2 shadow-md my-1">
                <h1 class="text-sm text-gray-400 mb-2">From {{ $data->user->username }}</h1>
                <h1 class="text-xl font-semibold capitalize">{{ $data->title }}</h1>
                <p class="text-lg">{{  $data->content }}</p>
                <div class="flex flex-row-reverse text-gray-400">
                    {{ $data->created_at }}
                </div>
            </div>

        @empty
            <p class="text-gray-400">There is still no comment</p>
        @endforelse
    </div>
</x-guest-layout>
@endguestRole