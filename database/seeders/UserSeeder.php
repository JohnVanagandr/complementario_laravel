<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name'      => 'john becerra',
      'email'     => 'jfbeccera@gmail.com',
      'password'  => 'Administrador',
    ])->assignRole('Super-Admin');
    User::create([
      'name'      => 'marcela becaria',
      'email'     => 'mbecaria@gmail.com',
      'password'  => 'Administrador',
    ])->assignRole('Admin');

    User::factory(30)->create()->each(
      function (User $user) {
        //Asignamos el rol al usuario
        $user->assignRole('Customer');
      }
    );
  }
}
