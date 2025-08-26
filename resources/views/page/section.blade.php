@admin
<x-admin-layout>
    <h1 class="font-bold text-2xl mb-6">Section - Page {{ $page->title }}</h1>
    <x-section-layout>
        <div class="flex justify-center">
            <h1 class="font-bold tracking-wide text-lg">Add Section</h1>
        </div>
        <form action="" class="mt-4 p-2">
            <div class="flex items-center gap-3">
                <label for="">Select Type: </label>
                <select name="" id="" class="w-40 bg-gray-200 rounded-md py-1 px-2">
                    <option value="sss">sss</option>
                </select>
            </div>
            <div class="flex flex-col mt-6">
                <label for="">Heading</label>
                <input name="" placeholder="Enter heading"
                    class="bg-gray-200 rounded-md mt-2 py-1 px-2 focus:outline-3 focus:outline-amber-300"></input>

                <label for="" class="mt-4">Body</label>
                <textarea name="" id="" cols="30" rows="5"
                    class="bg-gray-200 rounded-md mt-2 py-1 px-2 focus:outline-3 focus:outline-amber-300"></textarea>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="" class="bg-gray-300 py-1 px-3 rounded-md hover:bg-gray-500 hover:text-white">Back</a>
                <button
                    class="bg-amber-300 py-1 px-3 rounded-md cursor-pointer hover:bg-amber-400 hover:text-white">Submit</button>
            </div>
        </form>
    </x-section-layout>
    
    {{-- Table Start --}}
    <table class="table-auto min-w-full border-seperate overflow-x-auto *:border-b *:border-b-gray-400 mt-6">
        <thead>
            <tr class="*:font-semibold *:p-4 *:text-left">
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    {{-- Table End --}}
</x-admin-layout>
@endadmin