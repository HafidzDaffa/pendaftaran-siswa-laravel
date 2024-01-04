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
    <div class="bg-background w-full h-screen mt-[100px] flex overflow-hidden">
        {{-- @include("components.sidebar") --}}
        <div class="flex-col w-full h-full bg-white">
            <div class="flex flex-col w-full mt-5 p-5">
                <div class="flex w-full items-center justify-end my-4 gap-x-5">
                    <a href="{{ route('export-informasi-siswa.export') }}" class="bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-lg text-white">Export</a>
                    {{-- <button class="bg-blue-500 hover:bg-blue-700 px-5 py-2 rounded-lg text-white">Tambah</button> --}}
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
                                            Nama lengkap
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Tempat tanggal lahir
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Jenis kelamin
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Alamat
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Nama orang tua
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            No Hp
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Pekerjaan orang tua
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Penghasilan orang tua
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Kepemilikan rumah
                                        </th>
                                        <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informasi_siswas as $informasi_siswa)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->nama_lengkap }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->ttl }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->jenis_kelamin }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->alamat }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->nama_ortu }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->no_hp }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->pekerjaan_ortu }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->penghasilan_ortu }}
                                        </td>
                                        <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $informasi_siswa->kepemilikan_rumah }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 dark:border-neutral-500 flex justify-around items-center">
                                            <a href="{{ route('informasi-siswa.edit', [$informasi_siswa->id]) }}" class="bg-green-500 hover:bg-green-700 text-white px-5 py-2 rounded-lg">Edit</a>
                                            <form action="{{ route('informasi-siswa.delete', [$informasi_siswa->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-5 py-2 rounded-lg">Delete</button>
                                            </form>
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
    {{-- @include("components.footer") --}}
</body>


</html>
