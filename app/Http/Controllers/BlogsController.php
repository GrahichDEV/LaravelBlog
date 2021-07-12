<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    function index() {
        $blogs = Blog::where('authorID', '=', Auth::user()->id)->orderBy('id', 'desc')
            ->get();

        return view('blogs', ["blogs" => $blogs]);
    }

    function store(Request $request) {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        // Store
        /*
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->blogText = $request->text;
        $blog->authorID = Auth::user()->id;
        $blog->save();
        */

        // Storing new blog ...
        Blog::create([
            'title' => $request->title,
            'blogText' => $request->text,
            'authorID' => Auth::user()->id
        ]);

        // Increment user ID
        $user = User::find(Auth::user()->id);
        $user->blogscount += 1;
        $user->save();

        return redirect()->back();
    }

    function del(Request $request) {
        // Delete
        Blog::find($request->id)
            ->delete();

        // Increment user ID
        $user = User::find(Auth::user()->id);
        $user->blogscount -= 1;
        $user->save();

        // Redirect back
        return redirect()->back();
    }
}
