<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permiso1 = Permission::create(['name' => 'crear usuarios']);
        $admin1 = Role::create(['name'=>'superAdmin']);
        $admin1->givePermissionTo($permiso1);

        $permiso2 = Permission::create(['name' => 'administrar roles']);
        $admin2= Role::create(['name'=>'administrador']);
        $admin2->givePermissionTo($permiso2);
        $admin1->givePermissionTo($permiso2);
        $usuario = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>bcrypt('password'),
        ]);

        $usuario->assignRole($admin1);

        
       
       
    }
}

