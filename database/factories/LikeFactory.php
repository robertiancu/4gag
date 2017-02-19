<?php
$factory->define(App\Like::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,50),
        'likeable_id' => $faker->numberBetween(1,100),
        'likeable' => $faker->randomElement(array('comment','post')),
    ];
});
