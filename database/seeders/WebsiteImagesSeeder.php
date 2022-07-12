<?php

namespace Database\Seeders;

use App\Modules\WebsiteImagesLogic\Models\Website_image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_images')->truncate();

        $Website_image = Website_image::create(['name' => 'Slider 1','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Slider 2','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Slider 3','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Slider 4','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Slider 5','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Slider 6','lang'=>'fr']);

        $Website_image = Website_image::create(['name' => 'SliderAr 1 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 2 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 3 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 4 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 5 ','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'SliderAr 6 ','lang'=>'ar']);



        $Website_image = Website_image::create(['name' => 'Top 1','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Top 2','lang'=>'fr']);
        $Website_image = Website_image::create(['name' => 'Top 3','lang'=>'fr']);

        $Website_image = Website_image::create(['name' => 'TopAr 1','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'TopAr 2','lang'=>'ar']);
        $Website_image = Website_image::create(['name' => 'TopAr 3','lang'=>'ar']);


        $Website_image = Website_image::create(['name' => 'Banner','lang'=>'fr']);

        $Website_image = Website_image::create(['name' => 'BannerAr','lang'=>'ar']);



    }
}
