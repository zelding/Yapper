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

$now = new \DateTime();

$factory->define(App\Entity\BlogPost::class, function (Faker $faker) use ($now) {
    return [
        "title"      => $faker->sentence,
        "summary"    => $faker->sentences(3, true),
        "content"    => $faker->paragraphs(2, true),
        "status"     => 1,
        "user_id"    => mt_rand(1, 2),
        "created_at" => $now->format('Y-m-d H:i:s'),
        "updated_at" => null,
        "deleted_at" => null
    ];
});

/*$factory->afterMaking(App\Entity\User::class, function (App\Entity\User $user, Faker $faker) {
    $user->assignRole("user");
    $user->save();
});*/
