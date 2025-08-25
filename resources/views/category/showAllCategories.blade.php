@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-3">Category Lists</h1>
    <div class="p-3 shadow-lg rounded-md w-full">
        <div class="flex justify-between mb-1">
            <div class="flex justify-between gap-2">
                <form action="{{ route('show.allCategories') }}" method="GET"
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
                        <option value="">All Dates</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this_week">This Week</option>
                    </select>
                </form>

                <form action="{{ route('show.allCategories') }}" method="GET"
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
                    <select name="alphabeticalFilter" id="alphabeticalFilter"
                        class="bg-white px-9 rounded-tr-md rounded-br-md">
                        <option value="">Alphabetical</option>
                        <option value="asc" {{ request('alphabeticalFilter') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{request('alphabeticalFilter') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </form>
            </div>

            <a href="{{ route('show.categoryForm') }}"
                class="bg-amber-300 py-1 rounded-md px-2 group hover:bg-amber-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:fill-white">
                    <path
                        d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                    <path
                        d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                </svg>

                <h3 class="inline group-hover:text-white">Add Category</h3>
            </a>
        </div>
        <table class="table-auto min-w-full border-seperate overflow-x-auto *:border-b *:border-b-gray-400">
            <thead>
                <tr class="*:font-semibold *:p-4 *:text-left">
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr class="*:p-4 odd:bg-gray-100">
                        <td class="font-semibold">{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->slug }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td class="flex items-center">
                            <a href="{{ route('show.categoryEditForm', $data->id) }}"
                                class="mx-2 p-2 bg-amber-300 rounded-md hover:bg-amber-400 hover:text-white">Update</a>
                            <form action="{{ route('deleteCategory', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="mx-2 p-2 bg-red-500 text-white rounded-md cursor-pointer hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
@endadmin