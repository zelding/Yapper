<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(
            [
                0 => [
                    'id'             => 1,
                    'name'           => 'Kristóf Dékány',
                    'display_name'   => 'ZeDlinG',
                    'email'          => 'gammaray.zedling@gmail.com',
                    'password'       => '$2y$10$vh7fRuVzXp2XFzqW92Bdmulg9ua4GraeqIDij28dmy37etw8Syl1y',
                    'remember_token' => null,
                    'deleted_at'     => null,
                    'created_at'     => '2018-10-21 10:38:33',
                    'updated_at'     => '2018-10-21 10:38:33',
                ],
            ]
        );
    }
}
