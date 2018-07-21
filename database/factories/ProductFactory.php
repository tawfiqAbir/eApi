<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'detail'=>$faker->text,
        'price'=>$faker->numberBetween(500,2500),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(2,30),

    ];
});
