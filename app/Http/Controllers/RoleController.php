<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use App\User;
use App\Auditorio;
use App\Agendamento;


class RoleController extends Controller
{
    public function setup() {
		Bouncer::allow('admin')->to('create', Auditorio::class);
		Bouncer::allow('admin')->to('edit', Auditorio::class);
		Bouncer::allow('admin')->to('delete', Auditorio::class);

		Bouncer::allow('secretaria')->to('edit', Auditorio::class);
		Bouncer::allow('secretaria')->to('confirm', Auditorio::class);

		Bouncer::allow('user')->to('create', Agendamento::class);

		$user1 = User::find(1);
		//$user2 = User::find(3);
		$user1->assign('admin');
		//$user2->assign('user');
		return redirect()->back();
	}
}
