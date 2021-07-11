<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    static function index() {
        $blogs = Blog::get();
        return view('blogs', ["blogs" => $blogs]);
    }

    function new() {
        $blog = new Blog();
        $blog->title = 'Novi Naslov';
        $blog->blogText = 'Neki text lorem ipsum ovo ono tamo vamo ljevo desno hehe.';
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