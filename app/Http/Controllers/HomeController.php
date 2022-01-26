<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $widget = [
            'users' => $users,
            'user_id' => $user_id,
            'user'=> $user,
        ];

        return view('home', compact('widget'));
        
    }
}
