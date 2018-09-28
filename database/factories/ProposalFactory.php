<?php

use Faker\Generator as Faker;
use App\Proposal;

$factory->define(Proposal::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'organization_name' => $faker->bs,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->safeEmail,
        'summary' => $faker->paragraph(3, true),
        'background' => $faker->paragraph(2, true),
        'activities' => $faker->paragraph(2, true),
        'budget' => $faker->numberBetween(20, 100),
    ];
});
