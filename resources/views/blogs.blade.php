@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border-2 border-gray-300 border-dashed p-5 container mx-auto rounded md:container">
    <div class="flex justify-between mb-6">
        <h1 class="inline text-2xl text-gray-500">Blogs</h1>
        <div>
            <h3 class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium">
                @if (Auth::user()->blogscount == 1)
                    {{Auth::user()->blogscount }} Blog
                @else
                    {{Auth::user()->blogscount }} Blogs
                @endif
            </h3>
            <h3 class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium">
                @if (Auth::user()->followers_count == 1)
                    {{Auth::user()->followers_count }} Follower
                @else
                    {{Auth::user()->followers_count }} Followers
                @endif
            </h3>
            <a href='#' class="inline-block rounded text-sm px-3 py-2 text-white bg-indigo-500 font-medium hover:bg-indigo-700" onclick="showNewBlogForm()">New</a>
        </div>
    </div>
    <div id="new_blog_form" class="hidden">
        <form action="{{ route('blogs') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @csrf
            <label class="mt-3 block text-sm font-medium text-gray-400">
                Title
            </label>
            <input type="text" name="title" placeholder="Blog title" class="rounded border-2 border-gray-300 border-dashed mt-1 p-3 outline-none focus:border-gray-400">
            @error('title')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <label class="mt-3 block text-sm font-medium text-gray-400">
                Text
            </label>
            <textarea rows="5" name="text" placeholder="Blog text" class="rounded border-2 border-gray-300 border-dashed mt-1 p-3 outline-none focus:border-gray-400" ></textarea>
            @error('text')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div>
                <label class="mt-3 block text-sm font-medium text-gray-400">
                  Photo
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed bg-white rounded-md">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file" class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                        <span>Upload a file</span>
                        <input id="file" name="file" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                      PNG, JPG, GIF up to 10MB
                    </p>
                  </div>
                </div>
            </div>
            @error('file')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <button type="submit" class="rounded text-center bg-indigo-500 py-2 mt-3 mb-6 text-white font-medium hover:bg-indigo-700">Add</button>
        </form>
    </div>
    @foreach ($blogs as $blog)
    <div class="bg-white p-3 my-2 border-2 border-gray-300 border-dashed rounded">
        <div class="flex justify-between mb-3">
            <h3 class="inline text-md bg-indigo-500 px-2 rounded text-white">{{ $blog->title }}</h3>
            <form action="{{ route('delBlog', ['id' => $blog->id]) }}" method="POST">
                @csrf
                <button type="submit" class="rounded px-2 py-1 bg-indigo-500 font-bold text-xs text-white hover:bg-indigo-700">
                    remove
                </button>
            </form>
        </div>
        @if ($blog->image != "empty")
            <img class="rounded mb-3" src="{{ asset('uploads/' . $blog->image) }}">
        @endif
        <p>{{ $blog->blogText }}</p>
    </div>
    @endforeach
</div>

<script>
    function showNewBlogForm() {
        console.log("Works");

        var blogForm = document.getElementById("new_blog_form");

        console.log(blogForm.classList);

        if(blogForm.classList.contains("hidden")) {
            blogForm.classList.remove("hidden");
            blogForm.classList.add("display");
        } else {
            blogForm.classList.remove("display");
            blogForm.classList.add("hidden");
        }
    }
</script>
@endsection()
