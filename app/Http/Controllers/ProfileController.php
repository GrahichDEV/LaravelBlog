<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index(Request $request) {
        $user = User::where('username', $request->username)->first();
        $blogs = Blog::where('authorID', $user->id)->get();

        // Check if following
        $follow = Follower::select(['id'])->where('followedID', $user->id)->get();
        $status = (count($follow) > 0) ? 1 : 0;

        // return $followed;
        return view('profile', ['user' => $user, 'blogs' => $blogs, 'follow' => $status]);
    }
}
