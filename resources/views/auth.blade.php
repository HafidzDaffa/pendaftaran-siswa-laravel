<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-[#DCDAB6] w-screen h-screen flex items-center justify-center">
       @yield('content')
    </div>
    @yield('js')
</body>
</html>