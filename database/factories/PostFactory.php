<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->realText(10),
        'content' => $faker->realText(255),
        'start_date' => $faker->date('Y-m-d'),
        'start_time' => $faker->date('h:i'),
        'end_date' => $faker->date('Y-m-d'),
        'end_time' => $faker->date('h:i'),
        'place' => $faker->streetAddress,
        'place_url' => $faker->url,
        'price' => $faker->randomNumber(4),
        'parking' => $faker->numberBetween(0, 2),
        'other' => $faker->realText,
        // 'user_id' => 1,
        'updated_at' => now(),
        'created_at' => now(),
    ];
});
