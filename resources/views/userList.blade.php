@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border-2 border-gray-300 border-dashed p-5 container mx-auto rounded md:container">
    <h1 class="text-2xl mb-3 text-gray-500">Users List</h1>

    <ul>
    @foreach ($users as $user)
        <li class="flex flex-col">
            <a href='{{ route('profile', ['username' => $user->username]) }}'>
            <div class="flex flex-row justify-between rounded mb-3 bg-white border-2 border-gray-300 border-dashed text-gray-500 hover:border-white hover:bg-indigo-500 hover:text-white">
                 <div class="w-10/12 text-sm font-medium border-gray-200 rounded p-3">
                    {{ $user->username }}
                 </div>
                 <div class="text-center w-2/12 text-sm font-medium border-gray-200 rounded p-3">
                     {{ $user->blogscount }} Blogs
                 </div>
                 <div class="text-center w-3/12 text-sm font-medium block border-gray-200 rounded p-3">
                     {{ $user->followers_count }} Followers
                 </div>
            </div>
            </a>
        </li>
    @endforeach
    </ul>
</div>
@endsection()
