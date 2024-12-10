<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Add countries JSON file path
        $countriesPath = database_path('data' . DIRECTORY_SEPARATOR . 'countries.json');
        $this->command->info("Countries JSON file path: " . $countriesPath);
        //Check path existence
        if (!File::exists($countriesPath)) {
            $this->command->error("The JSON countries file does not exist please add one to the data folder.");
            return;
        }

        //Decode the JSON file
        $countries = json_decode(File::get($countriesPath), true);

        //Check JSON file structure
        if (!$countries) {
            $this->command->error("The JSON file invalid, please check the sructure.");
            return;
        }

        //Cycle to seed database with JSON file info
        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
            ]);
        }

        //Message to advise that seeding process was sucessfull
        $this->command->info("Countries seeded successfully!");
    }
}
