<?php

use App\Post;
//use App\Product;
use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        /*
        'product_id' => function(){
        return Product::all()->random();
        },
        **/
        'user_id' => '1',
        'post_id' => function(){
            return Post::all()->random();
        },
        'comment' => $faker->paragraph,

    ];
});
