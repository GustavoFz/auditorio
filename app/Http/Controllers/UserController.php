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

    public function deleteRole($user_id, $role_id){
    	$user = User::find($user_id);
    	$role = DB::table('roles')->select('name')
    							  ->where('id', '=', $role_id)->get();
    	echo $role->name;

    }
}
