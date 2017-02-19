<?php
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'age' => $faker->numberBetween(10, 100),
        'remember_token' => str_random(10),
    ];
});
