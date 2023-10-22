<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'role-show',
           'users list',
           'add new user',
           'show user detail',
           'delete user',
           'edit user',
           'show all products',
           'create product',
           'edit product',
           'delete product',
           'show product',
           'show all categories',
           'create category',
           'edit category',
           'delete category',
           'show products of category'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
