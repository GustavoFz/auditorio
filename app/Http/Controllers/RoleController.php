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
		Bouncer::allow('admin')->to('create', Agendamento::class);
		Bouncer::allow('admin')->to('edit', Agendamento::class);
		Bouncer::allow('admin')->to('delete', Agendamento::class);
		Bouncer::allow('admin')->to('confirmar', Agendamento::class);
		Bouncer::allow('admin')->to('negar', Agendamento::class);


		Bouncer::allow('secretaria')->to('edit', Auditorio::class);
		Bouncer::allow('secretaria')->to('confirmar', Agendamento::class);
		Bouncer::allow('secretaria')->to('negar', Agendamento::class);

		Bouncer::allow('user')->to('create', Agendamento::class);

		$user1 = User::find(1);
		$user1->assign('admin');
		return redirect()->back();
	}
}
