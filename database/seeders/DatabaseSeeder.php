<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    // User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);

    Storage::deleteDirectory('public/post');
    Storage::makeDirectory('public/post');


    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(CategorySeeder::class);
    $this->call(TagSeeder::class);
  }
}
