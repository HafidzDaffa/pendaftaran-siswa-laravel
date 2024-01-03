<div class="w-full flex justify-between py-[23px] px-[88px] items-center bg-white">
    <div class="flex gap-x-[42px] items-center text-[16px]">
        <h1 class="mr-[56px]">Logo</h1>
        <a href="/" class="{{ request()->path() == '/' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Beranda</a>
        <a href="/informasi-pendaftaran" class="{{ request()->path() == 'informasi-pendaftaran' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Informasi Pendaftaran</a>
        <a href="/galeri-sekolah" class="{{ request()->path() == 'galeri-sekolah' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Galeri Sekolah</a>
    </div>
    <div>
        <a href="/register" class="bg-secondary rounded-lg px-[34px] py-[8px] text-[18px] text-white font-bold hover:bg-sky-700 transition-all duration-300">Daftar</a>
    </div>
</div>
