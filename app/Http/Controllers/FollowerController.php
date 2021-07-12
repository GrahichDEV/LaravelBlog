<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    function follow(Request $request) {
        Follower::create([
            'userID' => Auth::user()->id,
            'followedID' => $request->id,
        ]);

        // Increment the Followers of followed ID
        $user = User::find($request->id);
        $user->followers_count += 1;
        $user->save();

        return redirect()->back();
    }

    function unfollow(Request $request) {
        // Unfollow
        Follower::where([
            ['userID','=',Auth::user()->id],
            [ 'followedID','=',$request->id],
        ])->delete();

        // Update users followers count
        $user = User::find($request->id);
        $user->followers_count -= 1;
        $user->save();

        return redirect()->back();
    }
}
