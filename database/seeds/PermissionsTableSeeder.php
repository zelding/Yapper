<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->delete();

        $admin = Role::findByName("admin");
        $user  = Role::findByName("user");

        Permission::create([
            'id'         => 1,
            'name'       => 'add_post',
            'guard_name' => 'web'
        ])->save();

        Permission::create([
            'id'         => 2,
            'name'       => 'edit_post',
            'guard_name' => 'web'
        ])->save();

        Permission::create([
            'id'         => 3,
            'name'       => 'delete_post',
            'guard_name' => 'web'
        ])->save();

        Permission::create([
            'id'         => 4,
            'name'       => 'add_comment',
            'guard_name' => 'web'
        ])->save();

        Permission::create([
            'id'         => 5,
            'name'       => 'edit_comment',
            'guard_name' => 'web'
        ])->save();

        Permission::create([
            'id'         => 6,
            'name'       => 'delete_comment',
            'guard_name' => 'web'
        ])->save();

        $admin->givePermissionTo(
            "add_post",
            "edit_post",
            "delete_post",
            "add_comment",
            "edit_comment",
            "delete_comment"
        );

        $user->givePermissionTo("add_comment");

        $admin->save();
        $user->save();
    }
}
