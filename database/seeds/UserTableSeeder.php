<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_emple = Role::where('name', 'oper')->first();              

        $user = new User();
        $user->name = 'Carlos Arias';
        $user->identification = '123456789';
        $user->email = 'carlosarias@gmail.com';
        $user->password = bcrypt('carlosarias');
        $user->estado = 'Activo';
        $user->save();
        $user->roles()->attach($role_emple);

        $user = new User();
        $user->name = 'Juan David Taimal';
        $user->identification = '1144107423';
        $user->email = 'juandavidxd02@gmail.com';
        $user->password = bcrypt('12345');
        $user->estado = 'Activo';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
