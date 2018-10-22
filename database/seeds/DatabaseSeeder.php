<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // this has to be the last since I have to kill the script before it has a chance to
        // REDO EVERYTHING
        $this->call(MongoDBCollectionSeeder::class);
    }
}
