<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('head')
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">
    <header class="bg-white shadow h-16 flex items-center px-6">
        <h1 class="text-xl font-bold">
            <a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        </h1>
    </header>

    <main class="flex-1 container mx-auto px-4 py-8 max-w-screen-lg">
        @yield('content')
    </main>

    <footer class="bg-white shadow text-center text-sm py-4">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </footer>

    @yield('scripts')
</body>
</html>

