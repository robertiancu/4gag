<?php
$factory->define(App\Report::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,50),
        'post_id' => $faker->numberBetween(1,50),
        'reason' => $faker->sentence(1),
    ];
});
