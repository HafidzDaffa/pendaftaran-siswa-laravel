<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen bg-background flex flex-col">
    @include("components.navbar-two")
    <div class="w-full flex flex-col py-[40px] px-[55px] gap-y-[80px] text-[24px]">
        <div class="bg-primary py-[33px] px-[39px] flex justify-between">
            <h1 class="font-bold">Pendaftaran Murid Baru</h1>
            @if(!empty($informasi_siswa))
                <a href="/informasi-siswa/edit" class="bg-green-500 rounded-lg px-[34px] py-[8px] text-[18px] text-white font-bold hover:bg-green-700 transition-all duration-300">Edit</a>
            @endif
        </div>
        <div class="px-[48px] py-[66px] flex flex-col gap-y-[108px] items-center">
            {{-- <div class="border border-black border-1 rounded-lg w-[270px] h-[359px] flex items-center justify-center">
                Pas Foto
            </div> --}}
            <div class="border border-black border-1 rounded-lg w-[270px] h-[359px] flex items-center justify-center">
                @if(!empty($informasi_siswa->pas_foto))
                    <img class="w-full h-full" src="{{ url('storage/'.$informasi_siswa->pas_foto) }}" alt="">
                @else
                    Pass Foto
                @endif
            </div>
            <div class="w-full flex flex-col rounded-lg">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Data Pribadi</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[32px] col-span-2">
                        <h3>Nama Orang Tua/Wali Murid</h3>
                        <h3>No. HP</h3>
                        <h3>Pekerjaan Orang Tua</h3>
                        <h3>Penghasilan Orang Tua</h3>
                        <h3>Kepemilikan Ruma</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px]">
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        <h3>{{ $informasi_siswa->nama_lengkap ?? '-' }}</h3>
                        <h3>{{ $informasi_siswa->phone ?? '-' }}</h3>
                        <h3>{{ $informasi_siswa->pekerjaan_ortu ?? '-' }}</h3>
                        <h3>Rp {{ number_format($informasi_siswa->penghasilan_ortu ?? 0 , 0, ',', '.'); }}</h3>
                        <h3>{{ $informasi_siswa->kepemilikan_rumah ?? '-' }}</h3>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col rounded-lg">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Data Pribadi</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[32px] col-span-2">
                        {{-- <h3>Pas Foto</h3> --}}
                        <h3>Akta Kelahiran</h3>
                        <h3>Kartu Keluarga</h3>
                        <h3>KTP Orang Tua/Wali Murid</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px]">
                        {{-- <h3>:</h3> --}}
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        {{-- <h3>foto.jpg/jpeg/png</h3> --}}
                        <h3>{{ $informasi_siswa->akta_kelahiran ?? '-' }}</h3>
                        <h3>{{ $informasi_siswa->kartu_keluarga ?? '-' }}</h3>
                        <h3>{{ $informasi_siswa->ktp_ortu ?? '-' }}</h3>
                    </div>
                </div>
                <div class="self-center mt-[50px]">
                    <a href="/register" class="bg-secondary rounded-lg px-[51px] py-[14px] text-[18px] text-white font-bold hover:bg-sky-700 transition-all duration-300">Cek Kelulusan</a>
                </div>
            </div>
        </div>
    </div>
    @include("components.footer")
</body>

</html>
