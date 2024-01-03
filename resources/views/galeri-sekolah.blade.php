<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="w-full bg-background flex flex-col h-full">
    @include("components.navbar")
    <div class="flex flex-col items-center w-full h-full px-[62px]">
        <h1 class="mt-[57px] mb-[77px] text-[32px] font-bold">Dokumentasi Kegiatan Belajar</h1>
        <div class="w-full flex justify-between space-x-[40px]">
            <div class="w-full min-h-[475px] border border-1 border-gray-300">
            </div>
            <div class="w-full min-h-[475px] border border-1 border-gray-300">
            </div>
        </div>
        <div class="w-full min-h-[475px] my-[24px] border border-1 border-gray-300">
        </div>
        <div class="w-full flex justify-between space-x-[40px]">
            <div class="w-full min-h-[475px] border border-1 border-gray-300">
            </div>
            <div class="w-full min-h-[475px] border border-1 border-gray-300">
            </div>
        </div>
        <div class="w-full min-h-[475px] my-[24px] border border-1 border-gray-300">
        </div>
        <div class="w-full flex justify-between space-x-[40px] mb-[66px]">
            <div class="w-full min-h-[280px] border border-1 border-gray-300">
            </div>
            <div class="w-full min-h-[280px] border border-1 border-gray-300">
            </div>
            <div class="w-full min-h-[280px] border border-1 border-gray-300">
            </div>
            <div class="w-full min-h-[280px] border border-1 border-gray-300">
            </div>
        </div>
    </div>
    </div>
    @include("components.footer")
</body>

</html>
