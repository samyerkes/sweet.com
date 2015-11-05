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
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $faker->email,
        'role_id' => '3',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 3, $max = 27),
        'dateOrdered' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
        'status_id' => $faker->numberBetween($min = 1, $max = 3),
        'address' => $faker->address(),
        'payment' => $faker->creditCardNumber(),
        'dateCompleted' => NULL,
    ];
});

$factory->define(App\OrderProduct::class, function (Faker\Generator $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 25),
        'product_id' => $faker->numberBetween($min = 1, $max = 5),
        'quantity' => $faker->numberBetween($min = 1, $max = 20),
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 27),
        'name' => $faker->word(),
        'street' => $faker->streetAddress(),
        'city' => $faker->city(),
        'state' => $faker->stateAbbr(),
        'zip' => $faker->postcode(),
    ];
});

$factory->define(App\CreditCard::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 27),
        'name' => $faker->word(),
        'number' => $faker->creditCardNumber(),
        'expiration' => $faker->creditCardExpirationDate(),
        'cvc' => 123,
    ];
});
