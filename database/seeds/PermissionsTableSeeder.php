<?php

use Illuminate\Database\Seeder;

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

        \DB::table('permissions')->insert(
            [
                0 => [
                    'id'         => 1,
                    'name'       => 'add_post',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
                1 => [
                    'id'         => 2,
                    'name'       => 'edit_post',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
                2 => [
                    'id'         => 3,
                    'name'       => 'delete_post',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
                3 => [
                    'id'         => 4,
                    'name'       => 'add_comment',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
                4 => [
                    'id'         => 5,
                    'name'       => 'edit_comment',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
                5 => [
                    'id'         => 6,
                    'name'       => 'delete_comment',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
            ]
        );
    }
}
