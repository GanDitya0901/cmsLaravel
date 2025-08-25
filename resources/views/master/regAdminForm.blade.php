<x-master-layout>
    <h1 class="font-bold text-2xl mb-3">Admin Registration</h1>
    <div class="flex justify-center">
        <div class="p-5 shadow-lg rounded-md bg-white w-full max-w-2xl">
            <form action="{{ route('regAdmin') }}" method="POST" class="grid grid-cols-4 gap-5">
                @csrf

                <div class="col-span-2">
                    <label for="username" class="font-semibold">Username</label>
                    <input type="text" placeholder="Enter username" name="username" value="{{ old('username') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('username')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" placeholder="Enter email" name="email" value="{{ old('email') }}"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="password" class="font-semibold">Password</label>
                    <input type="password" placeholder="Enter password" name="password"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="password_confirmation" class="font-semibold">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                        class="bg-gray-100 p-2 mt-2 rounded-md w-full active:outline-2 active outline-amber-300">
                    </input>
                    @error('password_confirmation')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-center items-center m-auto">
                    <div class="">
                        <a href="{{ route('show.admin') }}"
                            class="bg-gray-300 w-full p-2 rounded-lg font-semibold hover:bg-gray-400 cursor-pointer">Back</a>
                    </div>

                    <div class="mx-3">
                        <button type="submit"
                            class="bg-amber-300 w-full p-2 rounded-lg font-semibold hover:bg-amber-400 hover:text-white cursor-pointer">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>