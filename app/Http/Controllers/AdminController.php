<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware([
          'auth','admin']);
    }

    public function home()
    {
       return view('admin.dashboard');
    }
    
    public function UserManage(){

     $users= User::all();
        return view('admin.usermanage')->with('users',$users);
        
    }

}
