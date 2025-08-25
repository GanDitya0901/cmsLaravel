<x-master-layout>
    <div class="font-bold text-lg">
        Hello, {{ Auth::user()->username }}!
    </div>

    <div class="grid grid-cols-3 mt-5">
        <div class="w-56 h-24 rounded-2xl p-4 bg-linear-to-bl from-amber-200 to-amber-600 flex flex-col">
            <h1 class="text-2xl font-semibold block">Total Admins</h1>
            <p class="text-4xl text-right font-bold block">{{ $adminCount }}</p>
        </div>
        <div class="w-56 h-24 rounded-2xl p-4 bg-linear-to-bl from-amber-200 to-amber-600 flex flex-col">
            <h1 class="text-2xl font-semibold block">Total Posts</h1>
            <p class="text-4xl text-right font-bold block">{{ $postCount }}</p>
        </div>
    </div>
</x-master-layout>