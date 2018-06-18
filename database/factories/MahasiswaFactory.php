<?php

use Faker\Generator as Faker;

$factory->define(App\Mahasiswa::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->email,
        // 'major' => $faker->randomElement([
        //     'Teknik Informatika',
        //     'Sistem Informasi',
        //     'Teknik Mesin',
        //     'Teknik Nuklir',
        //     'Teknik Perminyakan',
        //     'Teknik Pertambangan',
        //     'Teknik Sipil',
        //     'Farmasi',
        //     'Meteorologi',
        //     'Teknologi Hasil Perikanan'
        // ]),
        'major' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'address' => $faker->address,
        'birth' => $faker->dateTimeThisDecade()->format('Y-m-d'),
        'gender' => $faker->randomElement([
            'male',
            'female'
        ])
    ];
});
