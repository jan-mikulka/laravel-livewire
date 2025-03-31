<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100" x-data x-on:click="$dispatch('search:clear-results')">
    <div class="bg-gray-50 text-gray-800">
        <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl lg:max-w-7xl">
                <nav class="bg-white shadow-md"> <!-- Light background for navigation -->
                    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
                        <div class="w-full flex justify-between" id="navbar-default">
                            <ul
                                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-300 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                                <li>
                                    <a href="/dashboard" class="block py-2 px-3 text-blue-500 hover:text-blue-700">Admin
                                        Dashboard</a>
                                </li>
                                <li>
                                    <a href="/dashboard/sources"
                                        class="block py-2 px-3 text-blue-500 hover:text-blue-700">Sources</a>
                                </li>
                                <li>
                                    <a href="/dashboard/statements"
                                        class="block py-2 px-3 text-blue-500 hover:text-blue-700">Statements</a>
                                </li>
                                <li>
                                    <a href="/dashboard/words"
                                        class="block py-2 px-3 text-blue-500 hover:text-blue-700">Words</a>
                                </li>
                            </ul>
                            <ul
                                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-300 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                                <li>
                                    <a href="/logout"
                                        class="block py-2 px-3 text-blue-500 hover:text-blue-700">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="mt-6">
                    {{$slot}}
                </main>
            </div>
        </div>
    </div>
</body>

</html>