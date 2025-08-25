<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="h-auto">
        <header class="w-auto m-3 p-3 flex justify-between items-center shadow rounded-2xl">
            <div class="font-bold">
                CMS
            </div>
            <nav class="flex items-center justify-center">
                <a href="{{ route('show.landingPage') }}" class="font-semibold py-2 px-5 rounded-full hover:bg-amber-400 hover:text-white">Home</a>
                <a href=""></a>

                <a href="" class="font-semibold py-2 px-5 rounded-full hover:bg-amber-400 hover:text-white">Menu1</a>
                <a href=""></a>

                <a href="" class="font-semibold py-2 px-5 rounded-full hover:bg-amber-400 hover:text-white">Menu1</a>
                <a href=""></a>
            </nav>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button class="font-semibold bg-amber-300 py-2 px-5 rounded-full cursor-pointer hover:bg-amber-400 hover:text-white">Logout
                    </button>
                </form>

            </div>
        </header>

        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</body>

</html>