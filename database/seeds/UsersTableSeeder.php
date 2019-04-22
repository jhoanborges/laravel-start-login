<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =            Role::where('name', 'admin')->first();
        $inversionista =         Role::where('name', 'inversionista')->first();

               //tipo 1
      $user = User::create([
        'name' => 'Tony',
        'apellidos'=>'Stark',
        'username'=>'admin',
        'email'=>'admin@softdepot.mx',
        'password'=>bcrypt('12345678'),
        'status'=>true,
        //'tipo_usuario'=>1,
        'id_estado'=>rand(1, 32),
        'id_ciudad'=>rand(1,2492)
      ]);
      $user->roles()->attach($admin);

            $user = User::create([
        'name' => 'Jhoan',
        'apellidos'=>'Borges',
        'username'=>'jhoan.borges',
        'email'=>'beta.tester.jhoan@gmail.com',
        'password'=>bcrypt('12345678'),
        'status'=>true,
        'id_estado'=>19,
        'id_ciudad'=>986,
      ]);
      $user->roles()->attach($inversionista);



    }
}
