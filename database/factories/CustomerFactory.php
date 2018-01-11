<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
  return [
      'name' => $faker->name,
      'type' => 'haircut',
      'status' => 'waiting',
      'user_id' => 0,
  ];
});
