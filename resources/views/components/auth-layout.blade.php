<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Planner</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-rose h-screen flex flex-col justify-center items-center">
    <div class="flex space-x-3">
        <x-nav-link href="/">Register</x-nav-link>
        <x-nav-link href="/login">Login</x-nav-link>
    </div>
    <div class="bg-white px-8 py-6 rounded-lg w-1/3 h-1/2">
        {{ $slot }}
    </div>
</body>

</html>
