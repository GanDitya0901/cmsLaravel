<x-master-layout>
    <h1 class="font-bold text-2xl mb-3">Admin Lists</h1>
    <div class="p-3 shadow-lg rounded-md">
        <div class="flex justify-between mb-1">
            <div class="flex justify-between gap-2">
                <form action="{{ route('show.admin') }}" method="GET"
                    class="flex rounded-md outline-1 outline-gray-400">
                    <button type="submit"
                        class="group cursor-pointer rounded-tl-md rounded-bl-md bg-amber-300 px-2 py-1 hover:bg-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-1 mb-1 inline h-[20px] w-[20px] text-gray-800 group-hover:fill-white">
                            <path
                                d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                            <path
                                d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                        </svg>

                        <h3 class="inline group-hover:text-white">Filter</h3>
                    </button>
                    <select name="usernameFilter" id="usernameFilter" class="bg-white px-9 rounded-tr-md rounded-br-md">
                        <option value="" selected>All Admin</option>
                        @foreach ($adminUsername as $id => $username)
                            <option value="{{ $username }}" {{ request('usernameFilter') == $username ? 'selected' : '' }}>
                                {{ $username }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <form action="{{ route('show.admin') }}" method="GET"
                    class="flex rounded-md outline-1 outline-gray-400">
                    <button type="submit"
                        class="group cursor-pointer rounded-tl-md rounded-bl-md bg-amber-300 px-2 py-1 hover:bg-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="mr-1 mb-1 inline h-[20px] w-[20px] text-gray-800 group-hover:fill-white">
                            <path
                                d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                            <path
                                d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                        </svg>

                        <h3 class="inline group-hover:text-white">Filter</h3>
                    </button>
                    <select name="dateFilter" id="dateFilter" class="bg-white px-9 rounded-tr-md rounded-br-md">
                        <option value="" selected>All Dates</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="this_week">This Week</option>
                    </select>
                </form>
            </div>

            <a href="{{ route('show.regAdmin') }}" class="bg-amber-300 py-1 rounded-md px-2 group hover:bg-amber-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1 group-hover:fill-white">
                    <path
                        d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                </svg>
                <h3 class="inline group-hover:text-white">Register Admin</h3>
            </a>
        </div>
        <table class="table-auto min-w-full border-seperate overflow-x-auto *:border-b *:border-b-gray-400">
            <thead>
                <tr class="*:font-semibold *:p-4 *:text-left">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr class="*:p-4 odd:bg-gray-100">
                        <td class="font-semibold">{{ $data->id }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td class="flex items-center">
                            <a href="" class="mx-2 p-2 bg-amber-300 rounded-md hover:bg-amber-400 hover:text-white">Update
                            </a>

                            <div x-data="{ openModal: false }">
                                <button @click="openModal = true"
                                    class="mx-2 p-2 bg-red-500 text-white rounded-md cursor-pointer hover:bg-red-700">Delete
                                </button>

                                {{-- Delete Modal --}}
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
                                        <p class="text-gray-500 text-center">This action will permanently delete the admin user</p>
                                        <div class="flex gap-5 mt-3">
                                            <button @click="openModal = false"
                                                class="bg-gray-400 text-white py-1 px-3 rounded-md cursor-pointer hover:bg-gray-500">
                                                Cancel
                                            </button>
                                            <form action="{{ route('destroy.admin', $data->id) }}" method="POST">
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
    </div>
</x-master-layout>