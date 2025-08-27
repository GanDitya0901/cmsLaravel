@php
    use Illuminate\Support\Str;
@endphp

<x-guest-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="font-bold text-2xl mb-2">All Posts</h1>
        <div class="flex justify-between gap-2">
            <form action="{{ route('show.home') }}" method="GET"
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
                <select name="categoryFilter" id="categoryFilter" class="group relative border border-gray-300 bg-white text-gray-500 text-lg px-3 py-1 rounded-tr-md rounded-br-md">
                    <option value="" selected class="absolute top-full right-0 rounded-md p-3 mt-2 shadow-md scale-y-0 group-focus:scale-y-100 origin-top duration-200">All Posts</option>
                    @foreach ($categories as $data)
                        <option value="{{ $data->id }}" {{ request('categoryFilter') == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    @foreach ($posts as $data)
        <x-cardPost-layout>
            <div class="md:shrink-0">
                <img src="{{ asset($data->filename) }}" alt="Post Image"
                    class="h-56 w-full bg-red-100 object-cover md:h-full md:w-48" />
            </div>
            <div class="p-3">
                <h1 class="mt-3 font-bold tracking-wide capitalize text-amber-500">{{ $data->title }}</h1>
                <p class="tracking-wide text-gray-500">{{ $data->content }}</p>
                <div class="group mt-5 inline-block py-1 px-2 rounded-md hover:bg-gray-100">
                    <a href="{{ route('show.post', $data->id) }}" class="flex items-center gap-1">
                        More details
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[15px] h-[15px] text-gray-800 inline">
                            <path fill-rule="evenodd"
                                d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-wrap gap-3 mt-5">
                    @foreach ($data->categories as $category)
                        <div class="bg-gray-200 px-2 py-1 rounded-lg text-gray-500">
                            #{{ $category->slug }}
                        </div>
                    @endforeach
                </div>
            </div>
        </x-cardPost-layout>
    @endforeach
</x-guest-layout>