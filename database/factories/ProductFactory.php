<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'detail'=>$faker->paragraph,
        'price'=>$faker->numberBetween(100,1000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(10,60),
        'user_id'=>function(){

        return \App\User::all()->random();

        },
        'category_id'=>function(){

            return \App\Model\Category::all()->random();

        },

    ];

});
