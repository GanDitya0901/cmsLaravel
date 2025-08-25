@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-3">Post Creation</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('createPost') }}" method="POST" class="grid grid-cols-4 gap-5"
                enctype="multipart/form-data">
                @csrf

                <div class="col-span-2">
                    <label for="title" class="font-semibold">Title</label>
                    <input type="text" placeholder="Enter title" name="title" value="{{ old('title') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4">
                    <label for="content" class="font-semibold">Content</label>
                    <textarea type="text" placeholder="Enter content" name="content"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </textarea>
                    @error('content')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4">
                    <label for="filename" class="font-semibold">Image</label>
                    <input type="file" placeholder="Enter image" name="filename"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300 
                        file:rounded-xl file:bg-amber-300 file:py-1 file:px-2 hover:file:bg-amber-400 hover:file:text-white file:cursor-pointer file:mr-3">
                    </input>
                    @error('filename')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4">
                    <label for="categories" class="font-semibold">Select Category</label>
                    <select name="categories[]" id="categories" multiple
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                        @foreach ($categories as $data)
                            <option value="{{ $data->id }}" {{ in_array($data->id, old('categories', $post->categories->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                {{ $data->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('categories[]')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allPost') }}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>

                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
@endadmin

@master
<x-master-layout>
    <h1 class="font-bold text-2xl mb-3">Post Creation</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('createPost') }}" method="POST" class="grid grid-cols-4 gap-5"
                enctype="multipart/form-data">
                @csrf

                <div class="col-span-2">
                    <label for="title" class="font-semibold">Title</label>
                    <input type="text" placeholder="Enter title" name="title" value="{{ old('title') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4">
                    <label for="content" class="font-semibold">Content</label>
                    <textarea type="text" placeholder="Enter content" name="content"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">{{ old('content') }}
                    </textarea>
                    @error('content')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4">
                    <label for="filename" class="font-semibold">Image</label>
                    <input type="file" placeholder="Enter image" name="filename"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300
                        file:rounded-xl file:bg-amber-300 file:py-1 file:px-2 hover:file:bg-amber-400 hover:file:text-white file:cursor-pointer file:mr-3">
                    </input>
                    @error('content')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allPost') }}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>

                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
@endmaster