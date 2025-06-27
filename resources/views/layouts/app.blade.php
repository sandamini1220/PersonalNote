<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Personal Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cover bg-center text-gray-900 min-h-screen flex flex-col" style="background-image: url('{{ asset('images/background.jpg') }}')">

    <!-- Navbar -->
    <header class="bg-white bg-opacity-90 shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600">📘 Personal Note</h1>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm">
                        {{ auth()->user()->name }} ({{ auth()->user()->role }})
                        | <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-600 hover:underline text-sm ml-2">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-xs text-gray-500 py-4">
        © {{ now()->year }} Personal Note | Built with Laravel & Tailwind
    </footer>

</body>
</html>
