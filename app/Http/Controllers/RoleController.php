<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use App\User;

class RoleController extends Controller
{
    public function setup() {
		Bouncer::allow('admin')->to('edit');
		Bouncer::allow('admin')->to('delete');
		Bouncer::allow('admin')->to('view', User::class);
		Bouncer::disallow('admin')->to('view');
		$user1 = User::find(6);
		$user1->assign('admin');
		return redirect()->back();
	}
}
