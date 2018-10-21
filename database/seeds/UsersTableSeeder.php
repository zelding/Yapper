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

        // admin user
        \DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'name'           => 'Kristóf Dékány',
                'display_name'   => 'ZeDlinG',
                'email'          => 'gammaray.zedling@gmail.com',
                'password'       => '$2y$10$vh7fRuVzXp2XFzqW92Bdmulg9ua4GraeqIDij28dmy37etw8Syl1y',
                'created_at'     => (new \DateTime())->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id'             => 2,
                'name'           => 'Sam Test',
                'display_name'   => 'Sam the Curious',
                'email'          => 'test@samworx.com',
                'password'       => '$2y$10$DGRw71dcLNoqqr/LB7BGY.dHMjwDrcq9BdHbFfnkirlNH.ftIj9Aq', // password
                'created_at'     => (new \DateTime())->format('Y-m-d H:i:s'),
            ],
        ]);

        // this is the account I'll use during testing and developing
        $me = \App\Entity\User::find(1);
        $me->assignRole("admin");
        $me->save;

        // this is the account you should be using while testing things
        $you = \App\Entity\User::find(2);
        $you->assignRole("admin");
        $you->save;

        // random users
        factory(App\Entity\User::class, 25)->create();
    }
}
