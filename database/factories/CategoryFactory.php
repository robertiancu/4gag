<?php
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'category_name' => $faker->word,
    ];
});
