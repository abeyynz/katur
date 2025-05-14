<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-events']);
        Permission::create(['name' => 'read-events']);
        Permission::create(['name' => 'update-events']);
        Permission::create(['name' => 'delete-events']);

        Permission::create(['name' => 'create-info']);
        Permission::create(['name' => 'read-info']);
        Permission::create(['name' => 'update-info']);
        Permission::create(['name' => 'delete-info']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'read-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

        Permission::create(['name' => 'create-organization']);
        Permission::create(['name' => 'read-organization']);
        Permission::create(['name' => 'update-organization']);
        Permission::create(['name' => 'delete-organization']);

        Permission::create(['name' => 'update-profil']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'anggota']);
        Role::create(['name' => 'mitra']);

        $admin = Role::findByName('admin');
        $admin->givePermissionTo([
            'create-events', 'read-events', 'update-events', 'delete-events',
            'create-user', 'read-user', 'update-user', 'delete-user',
            'update-profil', 'create-organization', 'read-organization', 'update-organization', 'delete-organization'
        ]);

        $anggota = Role::findByName('anggota');
        $anggota->givePermissionTo([
            'create-events', 'read-events' , 'update-profil'
        ]);

        $mitra = Role::findByName('mitra');
        $mitra->givePermissionTo([
            'create-info', 'read-info', 'update-info', 'delete-info'
        ]);
    }
}
