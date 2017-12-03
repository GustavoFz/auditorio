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
    	 $this->authorize('edit', User::class);
    		$usuarios = User::all();
    		$roles = DB::table('roles')->select('name')->get();
    		return view ('usuarios', compact('usuarios', 'roles'));
    }
}
