<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
    	if (Bouncer::is(Auth::user())->an('admin')){
    		$usuarios = User::all();
    		$roles = DB::table('roles')->select('name')->get();
    		return view ('usuarios', compact('usuarios', 'roles'));
    	} else {
    		return view ('errors.403');
    	}

    }
}
