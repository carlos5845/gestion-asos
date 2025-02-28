<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear permisos
        Permission::create(['name' => 'ver dashboard']);
        Permission::create(['name' => 'gestionar usuarios']);

        // Creando roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['ver dashboard', 'gestionar todo']);

        $user = Role::create(['name' => 'usuario']);
        $user->givePermissionTo(['ver dashboard']);




        // User::factory(10)->create();
        /*$this->call([
            AgrupamientoSeeder::class,
            CategoriaSeeder::class,
            GrupoSeeder::class,
        ]);*/
    }
}
