<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100">
    <nav class="bg-white p-4 shadow mb-6">
        <a href="{{route('listings.index') }}" class="text-lg font-semibold text-gray-800"> LeBonCoin </a>
    </nav>

    <div class="container mx-auto">
        TP LARAVEL
    </div>

    <main class="container mx-auto mt-6">
        @yield('content')
    </main>
    
</body>
</html>