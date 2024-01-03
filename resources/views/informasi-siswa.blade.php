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
        <div class="px-[48px] py-[66px] flex flex-col gap-y-[108px] items-center">
            <div class="w-full flex flex-col rounded-lg">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Data Pribadi</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[52px] col-span-2">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <label for="ttl">Tempat, Tanggal Lahir</label>
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="flex flex-col gap-y-[52px]">
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="ttl" name="ttl" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class=" form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="alamat" name="alamat" class=" form-input rounded-lg p-2 border border-black w-full" required>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col rounded-lg">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Data Keluarga</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[52px] col-span-2">
                        <label for="nama_orang_tua">Nama Orang Tua/Wali Murid</label>
                        <label for="no_hp">No. HP</label>
                        <label for="pekerjaan_orang_tua">Pekerjaan Orang Tua</label>
                        <label for="penghasilan_orang_tua">Penghasilan Orang Tua</label>
                        <label for="kepemilikan_rumah">Kepemilikan Rumah</label>
                    </div>
                    <div class="flex flex-col gap-y-[52px]">
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="number" id="no_hp" name="no_hp" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" class=" form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="penghasilan_orang_tua" name="penghasilan_orang_tua" class=" form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="text" id="kepemilikan_rumah" name="kepemilikan_rumah" class=" form-input rounded-lg p-2 border border-black w-full" required>
                    </div>

                </div>
            </div>
            <form class="w-full flex flex-col rounded-lg justify-center">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Unggah File</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[52px] col-span-2">
                        <label for="pas_foto">Pas Foto</label>
                        <label for="akta">Akta Kelahiran</label>
                        <label for="kk">Kartu Keluarga</label>
                        <label for="ktp">KTP Orang Tua/Wali Murid</label>
                    </div>
                    <div class="flex flex-col gap-y-[52px]">
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        <input type="file" id="pas_foto" name="pas_foto" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="file" id="akta" name="akta" class="form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="file" id="kk" name="kk" class=" form-input rounded-lg p-2 border border-black w-full" required>
                        <input type="file" id="ktp" name="ktp" class=" form-input rounded-lg p-2 border border-black w-full" required>
                    </div>

                </div>
                <div class="mx-auto">
                    <button type="submit" class="bg-secondary hover:bg-sky-700 text-white p-3 px-[90px] rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @include("components.footer")
</body>

</html>
