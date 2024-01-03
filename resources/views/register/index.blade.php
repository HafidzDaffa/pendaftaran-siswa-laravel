@extends('auth')

@section('title')
Register
@endsection

@section('content')
<div class="bg-white w-[500px] h-[700px] rounded-lg flex flex-col items-center">
    <h2 class="font-[700] text-[40px] mt-[50px] mb-[50px] text-[#41651D]">Pendaftaran</h2>
    <form action="{{ route('register.store') }}" method="post" class="flex flex-col w-full px-5">
        @csrf
        <div class="mb-8">
            <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input rounded-lg p-3 border border-black w-full" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-8">
            <label for="no_wa" class="block text-sm font-medium text-gray-600">Nomor Whatsapp:</label>
            <input type="number" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" class="form-input rounded-lg p-3 border border-black w-full" required>
            @error('no_wa') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-8">
            <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-input rounded-lg p-3 border border-black w-full" required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full bg-secondary hover:bg-sky-700 text-white p-3 rounded-lg">Daftar</button>
    </form>
</div>
@endsection
