<?php

use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'website'=>$faker->url,
        'rate'=>$faker->numberBetween(0,5),
        'created_at' => $faker->dateTimeBetween('-2 years', now()),
    ];
});
