<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $response = Http::timeout(30)  // 30 seconds timeout
    ->retry(3, 100)  // Retry 3 times with 100ms delay
    ->withoutVerifying()  // Disable SSL verification for testing
    ->get('https://restcountries.com/v3.1/all');

        if ($response -> sucessfull())
        {
            $countries = $response->json();

            foreach($countries as $country)
            {
                Country::create([
                    'name' => $country['name'],
                ]);
            }
        }else{
            echo ('failed to fetch countries');
        }
    }
}
