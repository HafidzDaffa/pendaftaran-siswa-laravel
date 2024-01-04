@extends('auth')

@section('title')
Login
@endsection

@section('content')
<div class="bg-white w-[500px] h-[700px] rounded-lg flex flex-col items-center">
    <h2 class="font-[700] text-[40px] mt-[50px] mb-[50px] text-[#41651D]">Login</h2>
    @if(session()->has('error'))
    <div class="w-full px-5">
        <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                {{ session('error') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    @endif
    <form action="{{ route('login.store') }}" method="post" class="flex flex-col w-full px-5">
        @csrf
        <div class="mb-8">
            <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-input rounded-lg p-3 border border-black w-full" required>
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-8">
            <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
            <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-input rounded-lg p-3 border border-black w-full" required>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-secondary hover:bg-sky-700 text-white p-3 rounded-lg">Masuk</button>
    </form>
</div>
@endsection
