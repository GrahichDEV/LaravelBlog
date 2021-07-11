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
    <nav class="bg-blue-500">
        <ul class="flex flex-row">
            <li class="m-3 text-white font-medium"><a href='{{ route('home') }}'>Home</a></li>
            @auth
            <li class="m-3 text-white font-medium"><a href='{{ route('blogs') }}'>Blogs</a></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="m-3 text-white font-medium" type="submit">Logout</button>
                </form>
            @endauth
            @guest
                <li class="m-3 text-white font-medium"><a href='{{ route('login') }}'>Login</a></li>
                <li class="m-3 text-white font-medium"><a href='{{ route('register') }}'>Register</a></li>
            @endguest
        </ul>
    </nav>
    <div class="my-10 mx-2">
        @yield('content')
    </div>
</body>
</html>
