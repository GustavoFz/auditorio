<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use App\User;
use App\Auditorio;


class RoleController extends Controller
{
    public function setup() {
		Bouncer::allow('admin')->to('create', Auditorio::class);
		Bouncer::allow('admin')->to('edit', Auditorio::class);
		Bouncer::allow('admin')->to('delete', Auditorio::class);
		Bouncer::allow('admin')->to('view', Auditorio::class);
		$user1 = User::find(1);
		$user1->assign('admin');
		return redirect()->back();
	}
}
