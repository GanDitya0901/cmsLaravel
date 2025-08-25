<x-admin-layout>
    <h1 class="font-bold text-2xl mb-3">Page Creation</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="" method="POST" class="grid grid-cols-4 gap-5" id="pageForm">
                @csrf

                <div class="col-span-2">
                    <label for="title" class="font-semibold">Title</label>
                    <input type="text" placeholder="Enter title" name="title" value="{{ old('title') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300"
                        required>
                </div>

                <div class="col-span-2">
                    <label for="slug" class="font-semibold">Slug</label>
                    <input type="text" placeholder="Enter slug" name="slug"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300"
                        required>{{ old('slug') }}</input>
                </div>

                <div class="col-span-4">
                    <label for="body" class="font-semibold">Content</label>
                    <div id="editorjs" class="bg-gray-100 p-2 mt-3 rounded-md w-full"></div>
                    <input type="hidden" name="body" id="contentField">
                </div>

                <div class="flex items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.allPages')}}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>

                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Add</button>
                    </div>
                </div>

                {{-- Validation Errors--}}
                {{-- @if ($errors->any())
                <ul class="px-4 py-2 bg-red-200">
                    @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif --}}
            </form>
        </div>
    </div>
</x-admin-layout>