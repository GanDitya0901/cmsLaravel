<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-linear-to-b from-amber-100 from-10% to-white">
    <div class="h-auto">
        <header class="w-auto m-3 p-3 flex justify-between items-center shadow rounded-2xl bg-white">
            <div class="font-bold">
                CMS
            </div>
            <nav class="flex items-center justify-center">
                @foreach ($pages as $data)
                <a href="{{ route('show.' . $data->slug) }}" class="font-semibold py-2 px-5 rounded-full hover:bg-amber-400 hover:text-white">{{ $data->title }}</a>
                @endforeach
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