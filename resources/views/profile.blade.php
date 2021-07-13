@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border border-gray-200 p-5 container mx-auto rounded md:container">
    <div class="flex justify-between">
        <h3 class="text-2xl">{{ $user->username}}</h3>
        <div>
            <h3 class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium">
                @if ($user->blogscount == 1)
                    {{ $user->blogscount }} Blog
                @else
                    {{ $user->blogscount }} Blogs
                @endif
            </h3>
            <h3 class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium">
                @if ($user->followers_count == 1)
                    {{ $user->followers_count }} Follower
                @else
                    {{ $user->followers_count }} Followers
                @endif
            </h3>
            @if ($follow <= 0)
                @if (Auth::user()->id != $user->id)
                <form class="inline" action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium">Follow</button>
                </form>
                @endif
            @else
                @if (Auth::user()->id != $user->id)
                <form class="inline" action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <button class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-700 font-medium">Unfollow</button>
                </form>
                @endif
            @endif
        </div>
    </div>
    <h3 class="mt-5 text-xl mx-1">Blogs</h3>
    @if (count($blogs) <= 0)
        <p class="mt-5 text-sm mx-1 rounded bg-indigo-500 p-3 text-white font-medium">User didn't post any blogs.</p>
    @endif
    @foreach ($blogs as $blog)
    <div class="bg-white p-3 my-2 border border-gray-200 rounded">
        <div class="flex justify-between mb-3">
            <h3 class="inline text-md bg-indigo-700 px-2 rounded text-white">{{ $blog->title }}</h3>
            @if (Auth::user()->id == $user->id)
            <form action="{{ route('delBlog', ['id' => $blog->id]) }}" method="POST">
                @csrf
                <button type="submit" class="rounded px-2 py-1 bg-indigo-500 font-bold text-xs text-white hover:bg-indigo-700">
                    remove
                </button>
            </form>
            @endif
        </div>
        @if ($blog->image != "empty")
            <img class="rounded mb-3" src="{{ asset('uploads/' . $blog->image) }}">
        @endif
        <p>{{ $blog->blogText }}</p>
    @endforeach
</div>
@endsection()
