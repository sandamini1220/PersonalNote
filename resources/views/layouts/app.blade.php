<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Notes App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600">📒 Notes App</a>
            <div class="flex items-center gap-4">
                @auth
                    <span>
                        Hello, {{ auth()->user()->name }} ({{ auth()->user()->role }}) |
                        <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">Edit Profile</a>
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-600 hover:underline ml-4">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-6 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 mt-8">
        © {{ now()->year }} Notes App — Built with Laravel 11
    </footer>

</body>
</html>
