<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use DB;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $users = DB::table('users')
                ->join('profiles' , 'profiles.user_id' , '=' , 'users.id')
                ->select('users.*' , 'profiles.*')
                ->orderBy('users.created_at','desc')
                ->take('4')
                ->get();
        return view('welcome')->with('users',$users);
    }
}
