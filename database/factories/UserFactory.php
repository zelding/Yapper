<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Entity\User::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'display_name'   => $faker->firstName.$faker->numberBetween(3, 1967),
        'email'          => $faker->unique()->safeEmail,
        'password'       => bcrypt($faker->hexColor.$faker->ipv6)
    ];
});

$factory->afterMaking(App\Entity\User::class, function (App\Entity\User $user, Faker $faker) {
    $user->assignRole("user");
    $user->save();
});
