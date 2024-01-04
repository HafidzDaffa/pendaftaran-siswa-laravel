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
    @include("components.navbar-two")
    <div class="bg-background w-full h-screen flex overflow-hidden">
        {{-- @include("components.sidebar") --}}
        <div class="flex-col w-full h-full bg-white">
            <div class="flex flex-col w-full mt-5 p-5">
                <div class="flex w-full items-center justify-end my-4 gap-x-5">
                    <button class="bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-lg text-white">Export</button>
                    <button class="bg-blue-500 hover:bg-blue-700 px-5 py-2 rounded-lg text-white">Tambah</button>
                </div>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 overflow-y-scroll">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            #
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Nama
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Email
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            No Wa
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 w-[300px] dark:border-neutral-500">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $user->nama }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $user->email }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $user->no_wa }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 dark:border-neutral-500 flex justify-around items-center">
                                            <button class="bg-green-500 hover:bg-green-700 text-white px-5 py-2 rounded-lg">Edit</button>
                                            <button class="bg-red-500 hover:bg-red-700 text-white px-5 py-2 rounded-lg">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
