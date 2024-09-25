<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            [
                'name' => 'Tesla Model S',
                'brand' => 'Tesla',
                'model' => 'Model S',
                'year_of_manufacture' => 2022,
                'car_type' => 'Sedan',
                'daily_rent_price' => 120,
                'availability' => 'Available',
                'car_image' => 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png',
            ],
            [
                'name' => 'Ford Mustang',
                'brand' => 'Ford',
                'model' => 'Mustang GT',
                'year_of_manufacture' => 2021,
                'car_type' => 'Coupe',
                'daily_rent_price' => 150,
                'availability' => 'Available',
                'car_image' => 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png',
            ],
            [
                'name' => 'BMW X5',
                'brand' => 'BMW',
                'model' => 'X5',
                'year_of_manufacture' => 2020,
                'car_type' => 'SUV',
                'daily_rent_price' => 200,
                'availability' => 'Unavailable',
                'car_image' => 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png',
            ],
            [
                'name' => 'Audi A4',
                'brand' => 'Audi',
                'model' => 'A4',
                'year_of_manufacture' => 2019,
                'car_type' => 'Sedan',
                'daily_rent_price' => 100,
                'availability' => 'Available',
                'car_image' => 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png',
            ],
            [
                'name' => 'Mercedes-Benz GLE',
                'brand' => 'Mercedes-Benz',
                'model' => 'GLE 350',
                'year_of_manufacture' => 2022,
                'car_type' => 'SUV',
                'daily_rent_price' => 180,
                'availability' => 'Available',
                'car_image' => 'car_images/UbYPt6atPoSrTn0PVaruqUFKSiOA5xikOEZ188va.png',
            ],
        ]);
    }
}
