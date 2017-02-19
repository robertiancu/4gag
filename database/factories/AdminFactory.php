<?php
$factory->define(App\Admin::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,50),
        'rank' => $faker->numberBetween(1,3),
    ];
});
