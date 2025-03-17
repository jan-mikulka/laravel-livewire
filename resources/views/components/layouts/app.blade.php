<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gray-100">
    <header class="bg-white shadow-md py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-500">
                {{ config('app.name', 'Laravel') }}
            </a>
            <nav>
                <!-- Navigation links go here -->
                <a href="/dashboard/words" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md">Words
                    administration</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-6 px-6">
        <!-- Page Content -->
        {{ $slot }}
    </main>

    <footer class="bg-gray-200 text-gray-700 py-4 px-6 mt-8">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
        </div>
    </footer>

    @livewireScripts
</body>

</html>