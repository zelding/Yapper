<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(
            [
                0 => [
                    'id'         => 1,
                    'name'       => 'admin',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:23',
                    'updated_at' => null,
                ],
                1 => [
                    'id'         => 2,
                    'name'       => 'user',
                    'guard_name' => 'web',
                    'created_at' => '2018-10-21 14:37:24',
                    'updated_at' => null,
                ],
            ]
        );
    }
}
