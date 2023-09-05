<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            ['name' => 'Tokyo'],
            ['name' => 'Yokohama'],
            ['name' => 'Kyoto'],
            ['name' => 'Osaka'],
            ['name' => 'Sapporo'],
            ['name' => 'Nagoya']
        );

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
