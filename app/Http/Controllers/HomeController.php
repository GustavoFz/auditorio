<?php

namespace App\Http\Controllers;

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
        Bouncer::allow('admin')->to('create', User::class);
        Bouncer::allow('admin')->to('edit', User::class);
        Bouncer::allow('admin')->to('delete', User::class);

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
        $user1->assign('secretaria');
        return redirect()->route('site.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('site.home');
    }
}
