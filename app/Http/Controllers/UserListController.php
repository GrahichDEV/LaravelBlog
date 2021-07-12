<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserListController extends Controller
{
    function index() {
        // $users = DB::table('users')->get()->;
        $users = DB::select('select * from users');

        return view('userList', ['users' => $users]);
    }
}
