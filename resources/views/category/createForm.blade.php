@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-3">Category Creation</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('createCategory') }}" method="POST" class="grid grid-cols-4 gap-5"
                enctype="multipart/form-data">
                @csrf

                <div class="col-span-2">
                    <label for="name" class="font-semibold">Category Name</label>
                    <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="slug" class="font-semibold">Slug</label>
                    <input type="text" placeholder="Enter slug" name="slug"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">{{ old('content') }}
                    </input>
                    @error('slug')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allCategories') }}"
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