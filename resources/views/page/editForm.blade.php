@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-3">Page Update</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('editPage', $page->id) }}" method="POST" class="grid grid-cols-4 gap-5">
                @csrf
                @method('PUT')

                <div class="col-span-2">
                    <label for="title" class="font-semibold">Page Title</label>
                    <input type="text" placeholder="Enter title" name="title" value="{{ $page->title }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="slug" class="font-semibold">Slug</label>
                    <input type="text" placeholder="Enter slug" name="slug" value="{{ $page->slug }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('slug')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allPages') }}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>
                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
@endadmin

@master
<x-master-layout>
    <h1 class="font-bold text-2xl mb-3">Page Update</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('editPage', $page->id) }}" method="POST" class="grid grid-cols-4 gap-5">
                @csrf
                @method('PUT')

                <div class="col-span-2">
                    <label for="title" class="font-semibold">Page Title</label>
                    <input type="text" placeholder="Enter title" name="title" value="{{ $page->title }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="slug" class="font-semibold">Slug</label>
                    <input type="text" placeholder="Enter slug" name="slug" value="{{ $page->slug }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('slug')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allPages') }}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>
                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
@endmaster