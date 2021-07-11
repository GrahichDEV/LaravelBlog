@extends('layouts.default')

@section('content')
<div class="md:w-full lg:w-6/12 2xl:w-5/12 bg-gray-100 border border-gray-200 p-5 container mx-auto rounded md:container">

    <div class="flex justify-between mb-6">
        <h1 class="inline text-2xl">Blogs</h1>
        <!-- <a href='{{ route('newBlog') }}' class="rounded py-1 px-2 bg-blue-600 font-bold text-medium text-white hover:bg-gray-600" onclick="showNewBlogForm()">New</a>
        --><a href='#' class="rounded py-1 px-2 bg-blue-600 font-bold text-medium text-white hover:bg-gray-600" onclick="showNewBlogForm()">New</a>
    </div>
    <div id="new_blog_form" class="hidden">
        <h3 class="inline-block text-lg mb-2">Add new Blog</h3>
        <form action="{{ route('blogs') }}" method="POST" class="flex flex-col">
            @csrf
            <input type="text" name="title" placeholder="Blog title" class="rounded border border-gray-1 p-3 outline-none focus:border-blue-500">
            @error('title')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <textarea rows="5" name="text" placeholder="Blog text" class="rounded border border-gray-1 mt-3 p-3 outline-none focus:border-blue-500" ></textarea>
            @error('text')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <button type="submit" class="rounded text-white bg-blue-500 py-2 mt-3 mb-10">Add</button>
        </form>
    </div>
    @foreach ($blogs as $blog)
    <div class="bg-white p-3 my-3 border border-gray-200 rounded">
        <div class="flex justify-between mb-4">
            <h3 class="inline text-xl font-medium">{{ $blog->title }}</h3>
            <form action="{{ route('delBlog', ['id' => $blog->id]) }}" method="POST">
                @csrf
                <button type="submit" class="rounded px-2 py-2 bg-blue-600 font-bold text-xs text-white hover:bg-red-500">
                    remove
                </button>
            </form>
        </div>
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
