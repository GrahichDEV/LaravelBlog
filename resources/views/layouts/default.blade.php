<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <nav class="bg-indigo-500">
        <div class="flex justify-between">
            <ul class="flex flex-row py-3">
                <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'home') bg-indigo-700 @endif hover:bg-indigo-700"><a href='{{ route('home') }}'>Home</a></li>
                @guest
                    <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'login') bg-indigo-700 @endif hover:bg-indigo-700"><a href='{{ route('login') }}'>Login</a></li>
                    <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'register') bg-indigo-700 @endif hover:bg-indigo-700"><a href='{{ route('register') }}'>Register</a></li>
                @endguest
                @auth
                <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'blogs') bg-indigo-700 @endif hover:bg-indigo-700"><a href='{{ route('blogs') }}'>Blogs</a></li>
                <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'userList') bg-indigo-700 @endif hover:bg-blindigoue-700"><a href='{{ route('userList') }}'>User List</a></li>
                @endauth
            </ul>
            @auth
            <ul class="flex flex-row py-3">
                <li class="rounded mx-1 text-white font-medium px-2 py-1 @if (Request::route()->getName() == 'profile') bg-indigo-700 @endif hover:bg-indigo-700"><a href='{{ route('profile', ['username' => Auth::user()->username]) }}'>{{ Auth::user()->username }}</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="mx-1 text-white font-medium px-2 py-1" type="submit">Logout</button>
                </form>
            </ul>
            @endauth
        </div>
    </nav>
    <div class="my-10 mx-2">
        @yield('content')
    </div>
</body>
</html>
