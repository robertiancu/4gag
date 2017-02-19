<?php
$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'post_id' => $faker->numberBetween(1,100),
        'user_id' => $faker->numberBetween(1,50),
        'content' => $faker->paragraph(3),
        'likes' => $faker->numberBetween(1,1000),
    ];
});
