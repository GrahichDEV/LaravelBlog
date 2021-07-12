@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border border-gray-200 p-5 container mx-auto rounded md:container">
    <h1 class="text-2xl mb-3">Users List</h1>

    <ul>
    @foreach ($users as $user)
        <li class="flex flex-col">
            <div class="flex flex-row justify-between rounded mb-3 bg-white border border-gray-200 hover:bg-blue-500 hover:text-white">
                <a href='{{ route('profile', ['username' => $user->username]) }}'
                    class="w-7/12 border-gray-200 rounded font-medium p-2">
                     {{ $user->username }}
                 </a>
                 <div class="text-center w-2/12 text-sm font-medium border-gray-200 rounded p-3">
                     {{ $user->blogscount }} Blogs
                 </div>
                 <div class="text-center w-3/12 text-sm font-medium block border-gray-200 rounded p-3">
                     {{ $user->followers_count }} Followers
                 </div>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endsection()
