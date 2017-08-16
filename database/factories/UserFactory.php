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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    return [
        'firstName'     => $faker->firstName,
        'lastName'      => $faker->lastName,
        'job_title'     => $faker->jobTitle,
        'profile_image' => 'https://api.adorable.io/avatars/250/avatar.png',
        'email'         => $faker->unique()->safeEmail,
        'password'      => 'secret',
    ];
});
