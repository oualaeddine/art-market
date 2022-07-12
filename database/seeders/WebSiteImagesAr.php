<?php

namespace Database\Seeders;

use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Database\Seeder;

class WebSiteImagesAr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Website_image = Website_image::create(['name' => 'SliderAr 1 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 2 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 3 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 4 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 5 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 6 ','lang'=>'ar']);


        $Website_image = Website_image::create(['name' => 'BannerAr 1','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'BannerAr 2','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'BannerAr 3','lang'=>'ar']);
    }
}
