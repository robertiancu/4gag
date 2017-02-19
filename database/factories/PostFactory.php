<?php
$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1,50),
        'category_id' => $faker->numberBetween(1,8),
        'title' => $faker->sentence(1),
        'content' => $faker->paragraph(3),
        'likes' => $faker->randomNumber(NULL),
        'pic_url' => 'http://i.imgur.com/XvDsVvy.jpg',
    ];
});
