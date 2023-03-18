<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=> 'admin']);
        $user = Role::create(['name' => 'user']);

        $show = Permission::create([
            'name' => 'product.show'
        ]);
        $destroy = Permission::create([
            'name' => 'product.destroy'
        ]);
        $index = Permission::create([
            'name' => 'product.index'
        ]);
        $create = Permission::create([
            'name' => 'product.create'
        ]);
        $edit = Permission::create([
            'name' => 'product.edit'
        ]);
        $user->givePermissionTo($show, $index);
        $admin->givePermissionTo(Permission::all());
        $administrator = User::factory()->Create([
            'name' => 'Admin',
            'email' => 'Admin@edu.hse.ru'
        ]);
        $administrator->assignRole('admin');
    }
}
