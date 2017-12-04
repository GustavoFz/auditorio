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
		$roles = DB::table('roles')->select('id', 'name')->get();
		return view ('usuarios', compact('usuarios', 'roles'));
    }

    public function assignRole($user_id, $role_id){
        $this->authorize('edit', User::class);

        $user = User::find($user_id);
        $role = DB::table('roles')->select('name')
                                  ->where('id', '=', $role_id)->get()->first();
        $user->assign($role->name);

        return redirect()->back();
    }

    public function deleteRole($user_id, $role_id){
        $this->authorize('edit', User::class);

    	$user = User::find($user_id);
    	$role = DB::table('roles')->select('name')
    							  ->where('id', '=', $role_id)->get()->first();
        $user->retract($role->name);

    	return redirect()->back();
    }
}
