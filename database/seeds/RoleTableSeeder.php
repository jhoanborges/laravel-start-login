<?php

use Illuminate\Database\Seeder;
 use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //TIPO 1
        $role = new Role();
        $role->name = 'admin';
        $role->description='Administrador';
        $role->save();

//TIPO 2
        $role = new Role();
        $role->name = 'inversionista';
        $role->description='inversionista';
        $role->save();
    }
}
