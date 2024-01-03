<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen bg-background flex flex-col">
    @include("components.navbar")
    <div class="w-full flex flex-col py-[40px] px-[55px] gap-y-[80px] pb-[400px]">
        @include("components.table-pendaftaran")
        @include("components.table-pendaftaran")
    </div>
    @include("components.footer")
</body>

</html>
