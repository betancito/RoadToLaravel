<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response -> sucessfull())
        {
            $countries = $response->json();

            $countriesData = array_map(function ($country) {
                return ['name' => $country['name']['common']];
            }, $countries);

            DB::table('countries')->insert($countriesData);
        }else{
            echo ('failed to fetch countries');
        }
    }
}
