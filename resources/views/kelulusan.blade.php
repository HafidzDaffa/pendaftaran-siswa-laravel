<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen bg-background flex flex-col">
    @include("components.navbar-two")
    <div class="items-center flex flex-col pt-[90px] px-[55px] gap-y-[80px] pb-[400px]">
        <div class="flex justify-center flex-col bg-primary gap-y-[56px] w-[60%] h-[396px] rounded-2xl items-center text-[24px]">
            <p class="text-center">Selamat<br /> Anda dinyatakan...</p>
            <p class="font-bold text-2xl">LULUS</p>
        </div>
    </div>
    <div class="items-center flex flex-col pt-[90px] px-[55px] gap-y-[80px] pb-[400px]">
        <div class="flex justify-center flex-col bg-primary gap-y-[56px] w-[60%] h-[396px] rounded-2xl items-center text-[24px]">
            <p class="text-center">Mohon maaf John Doe, <br /> Anda dinyatakan...</p>
            <p class="font-bold text-2xl">TIDAK LULUS</p>
        </div>
    </div>

    @include("components.footer")
</body>

</html>
