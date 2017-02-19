<?php
$factory->define(App\Favourite::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'post_id' => $faker->numberBetween(1,100),
        'user_id' => $faker->numberBetween(1,50),
    ];
});
