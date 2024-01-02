@extends('auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="bg-white w-[500px] h-[700px] rounded-lg flex flex-col items-center">
        <h2 class="font-[700] text-[40px] mt-[50px] mb-[50px] text-[#41651D]">Login</h2>
        <form action="#" method="post" class="flex flex-col w-full px-5">
            <div class="mb-8">
                <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                <input type="text" id="username" name="username" class="form-input rounded-lg p-3 border border-black w-full" required>
            </div>

            <div class="mb-8">
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" id="password" name="password" class="form-input rounded-lg p-3 border border-black w-full" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg">Daftar</button>
        </form>
    </div>
@endsection