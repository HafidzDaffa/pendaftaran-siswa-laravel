@extends('walimurid')

@section('content')
    <div class="w-full flex flex-col py-[40px] px-[55px] gap-y-[80px] text-[24px]">
        <form action="{{ route('walimurid-akun.update', ['id' => $user->id]) }}" method="post" class="px-[48px] py-[66px] flex flex-col gap-y-[108px] items-center">
            @method('PATCH')
            @csrf
            <div class="w-full flex flex-col rounded-lg">
                <div class="bg-primary p-[15px] rounded-lg">
                    <h1 class="text-white text-[24px] font-bold">Akun Wali Murid</h1>
                </div>
                <div class="grid grid-cols-6 py-[54px]">
                    <div class="flex flex-col gap-y-[52px] col-span-2">
                        <label for="nama">Nama Lengkap</label>
                        <label for="no_wa">No. HP</label>
                        <label for="email">Email</label>
                        <label for="password">Password</label>
                    </div>
                    <div class="flex flex-col gap-y-[52px]">
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                        <h3>:</h3>
                    </div>
                    <div class="flex flex-col gap-y-[32px] col-span-3">
                        <input type="text" id="nama" name="nama" value="{{ $user->nama }}" class="form-input rounded-lg p-2 border border-black w-full">
                        @error('nama')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="number" id="no_wa" name="no_wa" value="{{ $user->no_wa }}" class="form-input rounded-lg p-2 border border-black w-full">
                        @error('no_wa')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class=" form-input rounded-lg p-2 border border-black w-full">
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="password" id="password" name="password" class=" form-input rounded-lg p-2 border border-black w-full">
                        @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <button type="submit" class="bg-secondary hover:bg-sky-700 text-white p-3 px-[90px] rounded-lg">Simpan</button>
            </div>
        </form>
        </form>
    </div>
@endsection
