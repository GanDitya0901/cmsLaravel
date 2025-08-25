<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex h-screen">
        <div class="hidden h-full w-1/2 bg-cover bg-center md:block">
            <img src="{{ asset('images/AuthImage.jpg') }}" alt="Login Image" class="w-full h-full object-cover">
        </div>

        <div class="flex h-full w-full items-center justify-center bg-white md:w-1/2 px-3">
            <div class="w-full max-w-sm rounded-2xl">
                <h1 class="flex justify-center text-3xl font-bold mb-10">User Login</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="my-5">
                        <label for="username" class="mb-2 block font-semibold text-lg">
                            <svg class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Username
                        </label>
                        <input type="text" name="username" placeholder="Enter Username" required
                            class="w-full rounded-sm bg-gray-100 p-2 focus:outline-2 focus:outline-amber-300 disabled:bg-gray-100 disabled:text-gray-500 disabled:outline-2 disabled:outline-gray-400" />
                    </div>

                    <div class="my-5">
                        <label for="password" class="mb-2 block font-semibold text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" class="w-[20px] h-[20px] text-gray-800 inline mb-1 mr-1">
                                <path
                                    d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                                <path
                                    d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                            </svg>
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Enter Password" required
                            class="w-full rounded-sm bg-gray-100 p-2 focus:outline-2 focus:outline-amber-300 disabled:bg-gray-100 disabled:text-gray-500 disabled:outline-2 disabled:outline-gray-400" />
                    </div>

                    <div class="mt-12 flex items-center justify-between">
                        <a class="cursor-pointer text-sm text-amber-400 hover:text-amber-500">Forget Password?</a>
                        <button class="cursor-pointer rounded-lg bg-amber-300 px-5 py-2 hover:bg-amber-400 hover:text-white 
                        transition duration-150 ease-in-out hover:scale-110">Login</button>
                    </div>

                    <div class="flex items-center justify-center">
                        @if ($errors->any())
                            <ul class="bg-red-300 block p-1 mt-5">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 font-semibold">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </form>

                <div class="mt-12 flex items-center justify-center">
                    <span class="text-sm">Not registered? <a href="{{ route('show.register') }}"
                            class="text-amber-400 hover:text-amber-500 cursor-pointer">Sign Up</a> </span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>