<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'first_lastname' => $faker->name,
        'last_lastname' => $faker->name,
        'nickname' => $faker->name,
        'adress' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('123456'),
        'photo' => "/img/users/profile.png",
        'remember_token' => str_random(10),
    ];
});
