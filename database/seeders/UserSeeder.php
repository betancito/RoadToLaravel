<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Country;
use App\Models\User;


class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 2000) as $index) {
            $country = Country::inRandomOrder()->first();
            User::create([
                'names'    => $faker->firstName(),
                'lastnames'=> $faker->lastName(),
                'email'    => $faker->unique()->safeEmail(),
                'gender'   => $faker->randomElement(['male', 'female', 'other']),
                'address'  => $faker->address(),
                'phone'    => $faker->phoneNumber(),
                'country_id' => $country->id,
            ]);
        }

        $this->command->info("Users seeded successfully!");
    }
}
