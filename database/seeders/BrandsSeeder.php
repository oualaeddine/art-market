<?php

namespace Database\Seeders;

use App\Modules\BrandsLogic\Models\Brand;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Factory::create();
        Brand::query()->create([
            'name_ar'=>" Old Navy",
            'name_fr'=>" Old Navy",
            'image'=>'brand.jpg',
        ]);

        Brand::query()->create([
            'name_ar'=>"Victoria's Secret",
            'name_fr'=>"Victoria's Secret",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Gap",
            'name_fr'=>"Gap ",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"American Eagle",
            'name_fr'=>"American Eagle ",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Outfitters",
            'name_fr'=>"Outfitters",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Coach ",
            'name_fr'=>"Coach ",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Banana Republic ",
            'name_fr'=>"Banana Republic ",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Nike",
            'name_fr'=>"Nike",
            'image'=>'brand.jpg',
        ]);
        Brand::query()->create([
            'name_ar'=>"Hermès",
            'name_fr'=>"Hermès",
            'image'=>'brand.jpg',
        ]);
    }
}
