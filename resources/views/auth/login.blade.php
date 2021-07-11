@extends('layouts.default')
@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border border-gray-200 p-5 container mx-auto rounded md:container">
    <h1 class="text-2xl my-2 mx-5">Login</h1>
    <div class="bg-gray-100 px-5 py-5 rounded">
        <form class="flex flex-col" action="{{ route('login') }}" method="POST">
            @csrf

            @if (session('status'))
            <div class="mt-3 bg-red-500 font-medium text-center text-white py-3">
                {{ session('status')}}
            </div>
            @endif

            <input class="rounded border border-gray-300 px-2 py-3 my-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="email" placeholder="Email">
            <input class="rounded border border-gray-300 px-2 py-3 my-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="password" placeholder="Password">
            <button class="rounded bg-blue-500 font-medium text-white py-3 hover:bg-blue-600" type="submit">Login</button>
        </form>
    </div>
</div>
@endsection
