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
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-gray-800 text-white p-4 space-y-2">
                <nav class="flex flex-col space-y-2">
                    <a href="{{route('admin.roles.index')}}" class="block px-4 py-2 rounded hover:bg-gray-700">Roles</a>
                    <a href="{{route('admin.permissions.index')}}" class="block px-4 py-2 rounded hover:bg-gray-700">Permissions</a>
                </nav>
            </aside>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-100">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>