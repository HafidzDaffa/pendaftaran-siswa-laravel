<div class="w-full flex justify-between py-[23px] px-[88px] items-center bg-white">
    <div class="flex gap-x-[42px] items-center text-[16px]">
        <h1>Logo</h1>
        @if(auth()->user()->role == 'admin')
            <a href="/admin/siswa" class="{{ request()->path() == 'admin/siswa' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Siswa</a>
            <a href="/admin/wali-murid" class="{{ request()->path() == 'admin/wali-murid' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Wali Murid</a>
        @else
            <a href="/dashboard" class="{{ request()->path() == 'dashboard' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Dashboard</a>
            <a href="/lihat-informasi-siswa" class="{{ request()->path() == 'lihat-informasi-siswa' ? 'font-bold text-tertiary' : '' }} hover:text-tertiary hover:font-bold transition-all duration-300">Informasi Siswa</a>
        @endif
    </div>
    <form method="POST" action="{{ route('logout.logout') }}" id="logout">
        @csrf
        <button type="submit" class="bg-red-500 rounded-lg px-[34px] py-[8px] text-[18px] text-white font-bold hover:bg-red-700 transition-all duration-300">Keluar</button>
    </form>
</div>
</div>
