<!DOCTYPE html>
<html lang="en" class="bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/resize@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="text-base/7 sm:text-sm/6">
    <x-main-nav />

    <main>
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

</body>

</html>