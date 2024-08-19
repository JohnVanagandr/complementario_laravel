<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Creamos los roles basicos del sistema
    $super = Role::create(['name' => 'Super-Admin']);
    $admin = Role::create(['name' => 'Admin']);
    $customer = Role::create(['name' => 'Customer']);
    // Creamos los permisos basicos del sistema
    Permission::create([
      'name'        => 'users.index',
      'description' => 'Listar usuarios'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'users.edit',
      'description' => 'Editar usuarios'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'posts.index',
      'description' => 'Listar posts'
    ])->syncRoles([$customer]);
    Permission::create([
      'name'        => 'posts.create',
      'description' => 'Crear posts'
    ])->syncRoles([$customer]);
    Permission::create([
      'name'        => 'posts.edit',
      'description' => 'Editar posts'
    ])->syncRoles([$customer]);
    Permission::create([
      'name'        => 'posts.destroy',
      'description' => 'Eliminar posts'
    ])->syncRoles([$customer]);
    Permission::create([
      'name'        => 'categories.index',
      'description' => 'Listar categorias'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'categories.create',
      'description' => 'Crear categorias'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'categories.edit',
      'description' => 'Editar categorias'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'categories.destroy',
      'description' => 'Eliminar categorias'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'tags.index',
      'description' => 'Listar tags'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'tags.create',
      'description' => 'Crear tags'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'tags.edit',
      'description' => 'Editar tags'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'tags.destroy',
      'description' => 'Eliminar tags'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'permissions.index',
      'description' => 'Listar permisos'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'permissions.create',
      'description' => 'Crear permisos'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'permissions.edit',
      'description' => 'Editar permisos'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'permissions.destroy',
      'description' => 'Eliminar permisos'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'roles.index',
      'description' => 'Listar roles'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'roles.create',
      'description' => 'Crear roles'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'roles.edit',
      'description' => 'Editar roles'
    ])->syncRoles([$admin]);
    Permission::create([
      'name'        => 'roles.destroy',
      'description' => 'Eliminar roles'
    ])->syncRoles([$admin]);
  }
}
