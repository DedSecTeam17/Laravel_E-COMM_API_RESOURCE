<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        //

        'name'=>$faker->word,
        'user_id'=>function(){
        return \App\User::all()->random();
    },
    ];
});
