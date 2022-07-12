<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Modules\BrandsLogic\Models\Brand;
use App\Modules\CategoriesLogic\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Factory::create();
        for ($i=0;$i<10;$i++){
            $vendor=  Vendor::query()->create([
                'name_ar'=>"Vendeur$i",
                'name_fr'=>"بائع$i",
                 'logo_fr'=>   'logo_vendor.jpg',
                 'logo_ar'=>   'logo_vendor.jpg',
                'short_dec_fr'=>"je suis un vendeur$i",
                'short_dec_ar'=>"أنا بائع$i",

                'desc_fr'=>'ummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make',
                'desc_ar'=>'م ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم',
            ]);

           $vendor_user= $vendor->vendors()->create([
                'phone'=>"067540095$i",
                'email'=>"vendor$i@gmail.com",
                'password'=>Hash::make('password'),
                'is_active'=>1
            ]);
            $vendor_user->roles()->attach(2);

            $vendor->categories()->sync(Category::query()->inRandomOrder()->take(4)->pluck('categories.id')->toArray());
            $vendor->brands()->sync(Brand::query()->inRandomOrder()->take(4)->pluck('brands.id')->toArray());

            $vendor->images()->create([
                'name'=> 'banner',
                'img_fr'=>'banner.jpg',
                'img_ar'=>'banner.jpg',
            ]);

            $vendor->images()->create([
                'name'=> 'side bar banner',
                'img_fr'=>'logo_vendor.jpg',
                'img_ar'=>'logo_vendor.jpg',
            ]);




        }

    }
}
