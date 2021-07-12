@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border border-gray-200 p-5 container mx-auto rounded md:container">
    <h1 class="text-2xl mb-3">Users List</h1>

    <ul>
    @foreach ($users as $user)
        <li>
            <a href='{{ route('profile', ['username' => $user->username]) }}'
               class="block border bg-white border-gray-200 rounded p-2 mb-1 hover:bg-blue-500 hover:text-white">
                {{ $user->username }}
            </a>
        </li>
    @endforeach
    </ul>
</div>
@endsection()
