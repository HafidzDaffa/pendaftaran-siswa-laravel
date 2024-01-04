@extends('informasi-siswa')

@section('content')
<div class="w-full flex flex-col py-[40px] px-[55px] gap-y-[80px] text-[24px]">
    <form action="{{ route('informasi-siswa.store') }}" enctype="multipart/form-data" method="post" class="px-[48px] py-[66px] flex flex-col gap-y-[108px] items-center">
        @csrf
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
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('nama_lengkap')
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                    <input type="text" id="ttl" name="ttl" value="{{ old('ttl') }}" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('ttl')
                        <span class="text-red-500">{{ $message }}</span> 
                    @enderror
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('jenis_kelamin')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('alamat')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
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
                    <input type="text" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('nama_ortu')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="number" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('no_hp')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu') }}" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('pekerjaan_ortu')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="number" id="penghasilan_ortu" name="penghasilan_ortu" value="{{ old('penghasilan_ortu') }}" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('penghasilan_ortu')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="text" id="kepemilikan_rumah" name="kepemilikan_rumah" value="{{ old('kepemilikan_rumah') }}" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('kepemilikan_rumah')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
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
                    <input type="file" id="pas_foto" name="pas_foto" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('pas_foto')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="file" id="akta_kelahiran" name="akta_kelahiran" class="form-input rounded-lg p-2 border border-black w-full">
                    @error('akta_kelahiran')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="file" id="kartu_keluarga" name="kartu_keluarga" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('kartu_keluarga')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="file" id="ktp_ortu" name="ktp_ortu" class=" form-input rounded-lg p-2 border border-black w-full">
                    @error('ktp_ortu')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mx-auto">
                <button type="submit" class="bg-secondary hover:bg-sky-700 text-white p-3 px-[90px] rounded-lg">Simpan</button>
            </div>
        </form>
    </form>
</div>
@endsection