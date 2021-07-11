<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    static function index() {
        $blogs = Blog::orderBy('id', 'desc')
            ->get();

        return view('blogs', ["blogs" => $blogs]);
    }

    function store(Request $request) {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|min:20',
        ]);

        // Store
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->blogText = $request->text;
        $blog->save();

        return redirect()->back();
    }

    function del(Request $request) {
        // Delete
        Blog::find($request->id)
            ->delete();

        // Redirect back
        return redirect()->back();
    }
}
