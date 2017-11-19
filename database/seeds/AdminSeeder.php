<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
        	'name'=>"admin",
        	'email'=>"admin@mail.com",
        	'password'=>bcrypt("auditorio@951"),
        	'acesso'=>"admin"
        ];

        if(User::where('email', '=', $admin['email'])->count()) {
        	$usuario = User::where('email', '=', $admin['email'])->first();
        	$usuario->update($admin);
        	echo "Usuario atualizado";
		} else {
			User::create($admin);
			echo "Usuario criado";
		}
    }
}
