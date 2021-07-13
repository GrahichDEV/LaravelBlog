@extends('layouts.default')
@section('content')
<div class="md:w-full lg:w-4/12 2xl:w-3/12 bg-gray-100 border-2 border-gray-300 border-dashed p-5 container mx-auto rounded md:container">
    <h1 class="text-2xl my-2 mx-5 text-gray-500">Register</h1>
    <div class="bg-gray-100 px-5 py-5 rounded">
        <form class="flex flex-col" action="{{ route('register') }}" method="POST">
            @csrf
            <input class="rounded border-2 border-gray-300 border-dashed px-2 py-3 my-2 focus:outline-none focus:border-gray-400 @error('username') border-red-500 @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
            @error('username')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <input class="rounded border-2 border-gray-300 border-dashed px-2 py-3 my-2 focus:outline-none focus:border-gray-400 @error('email') border-red-500 @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <input class="rounded border-2 border-gray-300 border-dashed px-2 py-3 my-2 focus:outline-none focus:border-gray-400 @error('password') border-red-500 @enderror" type="password" name="password" placeholder="Password">
            <input class="rounded border-2 border-gray-300 border-dashed px-2 py-3 my-2 focus:outline-none focus:border-gray-400 @error('password') border-red-500 @enderror" type="password" name="password_confirmation" placeholder="Confirm Password">
            @error('password')
                <p class="mb-3 text-red-500">{{ $message }}</p>
            @enderror
            <button class="rounded bg-indigo-500 font-medium text-white py-3 hover:bg-indigo-600" type="submit">Register</button>
        </form>
    </div>
</div>
@endsection
