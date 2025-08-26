@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-6">Section - Page {{ $page->title }}</h1>
    <x-section-layout>
        <div class="flex justify-center">
            <h1 class="font-bold tracking-wide text-lg">Add Section</h1>
        </div>
        <form action="{{ route('createSection', $page->id) }}" method="POST" class="mt-4 p-2">
            @csrf

            <div class="flex items-center gap-3">
                <label for="type">Select Type: </label>
                <select name="type" id="type" class="w-40 bg-gray-200 rounded-md py-1 px-2">
                    <option value="hero">Hero Banner</option>
                    <option value="text">Text Block</option>
                </select>
            </div>
            <div class="flex flex-col mt-6">
                <label for="content[heading]">Heading</label>
                <input name="content[heading]" placeholder="Enter heading"
                    class="bg-gray-200 rounded-md mt-2 py-1 px-2 focus:outline-3 focus:outline-amber-300">{{ old('content[heading]') }}</input>

                <label for="content[body]" class="mt-4">Body</label>
                <textarea name="content[body]" id="content[body]" cols="30" rows="5"
                    class="bg-gray-200 rounded-md mt-2 py-1 px-2 focus:outline-3 focus:outline-amber-300"></textarea>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('show.allPages') }}"
                    class="bg-gray-300 py-1 px-3 rounded-md hover:bg-gray-500 hover:text-white">Back</a>
                <button class="bg-amber-300 py-1 px-3 rounded-md cursor-pointer hover:bg-amber-400 hover:text-white"
                    type="submit">Submit</button>
            </div>
        </form>
    </x-section-layout>

    {{-- Table Start --}}
    <table class="table-auto min-w-full border-seperate overflow-x-auto *:border-b *:border-b-gray-400 mt-6">
        <thead>
            <tr class="*:font-semibold *:p-4 *:text-left">
                <th>ID</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pageSection as $data)
                <tr class="*:p-4 odd:bg-gray-100">
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->type }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td class="flex items-center">
                        <div x-data="{ openModal: false }">
                            <button @click="openModal = true"
                                class="mx-2 p-2 bg-red-500 text-white rounded-md cursor-pointer hover:bg-red-700">Delete
                            </button>

                            {{-- Modal --}}
                            <div x-show="openModal"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50">
                                <div class="flex w-96 flex-col items-center gap-3 rounded-md bg-white p-6 shadow-md"
                                    @click.away="openModal = false">
                                    <h1 class="font-bold">Are you sure?</h1>
                                    <div class="flex items-center justify-center rounded-full bg-red-500 p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="h-15 w-15 fill-white">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <p class="text-gray-500">This action will permanently delete the section</p>
                                    <div class="flex gap-5">
                                        <button @click="openModal = false"
                                            class="bg-gray-400 text-white py-1 px-3 rounded-md cursor-pointer hover:bg-gray-500">
                                            Cancel
                                        </button>
                                        <form action="{{ route('deleteSection', [$data->page_id, $data->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-500 py-1 px-3 text-white rounded-md cursor-pointer hover:bg-red-600">
                                                Confirm
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Table End --}}
</x-admin-layout>
@endadmin