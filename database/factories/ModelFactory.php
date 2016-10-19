<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'lname' => $faker->lastName,
        'sector' => $faker->jobTitle,
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Computer::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->creditCardNumber,
        'spect' => $faker->realText($faker->numberBetween(10,20)),
        'ip' => $faker->ipv4,
        'last_check' => $faker->date($format = 'Y-m-d', $max = '2016'),
        'client_id' => $faker->numberBetween(1,20),
    ];
});

$factory->define(App\Monitor::class, function (Faker\Generator $faker) {
    return [
        'size' => $faker->name,
        'code' => $faker->safeEmail,
        'outputs' => $faker->realText($faker->numberBetween(10,20)),
        'client_id' => $faker->numberBetween(1,20),
    ];
});