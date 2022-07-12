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

//        Hero section text
        Website_image::create([
            'name' => 'HeroFr',
            'lang'=>'fr',
            'title'=>'FEATURED ARTIST IN OUR MARKETPLACE',
            'main_title'=>'Coodiv create a lot of beautiful things from scratch',
            'sub_title'=>'A non-fungible token is a unit of data stored on a digital ledger, called a blockchain, that certifies a digital asset to be unique and therefore not interchangeable.',
        ]);
        Website_image::create([
            'name' => 'HeroAr',
            'lang'=>'ar',
            'title'=>'FEATURED ARTIST IN OUR MARKETPLACE',
            'main_title'=>'Coodiv create a lot of beautiful things from scratch',
            'sub_title'=>'A non-fungible token is a unit of data stored on a digital ledger, called a blockchain, that certifies a digital asset to be unique and therefore not interchangeable.',
        ]);
//        Hero section images
        $Website_image = Website_image::create([
            'name' => 'ShowImage1',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/26931130/c/1668/1325/427/…/bcc9a4/3288056379/il_340x270.3288056379_37zf.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'An NFT is a unit of data stored on a digital ledge.',
            'sub_title'=>'$2,764.89'
        ]);

        $Website_image = Website_image::create([
            'name' => 'ShowImage2',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/19833864/c/2134/1696/273/…/3d7a3b/3904995952/il_340x270.3904995952_4ct9.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'An NFT is a unit of data stored on a digital ledge.',
            'sub_title'=>'$2,764.89'
        ]);
        $Website_image = Website_image::create([
            'name' => 'ShowImage3',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/33951541/c/1688/1347/0/82…/c3042f/3691950129/il_340x270.3691950129_8qf5.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'An NFT is a unit of data stored on a digital ledge.',
            'sub_title'=>'$2,764.89'
        ]);

        $Website_image = Website_image::create([
            'name' => 'ShowImageAr1',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/26931130/c/1668/1325/427/…/bcc9a4/3288056379/il_340x270.3288056379_37zf.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'An NFT is a unit of data stored on a digital ledge.',
            'sub_title'=>'$2,764.89'
        ]);

        $Website_image = Website_image::create([
            'name' => 'ShowImageAr2',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/19833864/c/2134/1696/273/…/3d7a3b/3904995952/il_340x270.3904995952_4ct9.jpg',
            'title'=>'',
            'main_title'=>'',
            'sub_title'=>'$2,764.89'
        ]);
        $Website_image = Website_image::create([
            'name' => 'ShowImageAr3',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/33951541/c/1688/1347/0/82…/c3042f/3691950129/il_340x270.3691950129_8qf5.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'An NFT is a unit of data stored on a digital ledge.',
            'sub_title'=>'$2,764.89'
        ]);

//        tops

        $Website_image = Website_image::create([
            'name' => 'Top1',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/6060897/r/il/6413a9/2355473127/il_680x540.2355473127_lfxx.jpg',
            'title'=>'',
            'main_title'=>'Assorted Blue Band Stoneware.',
            'sub_title'=>'You can\'t resist em !'
        ]);

        $Website_image = Website_image::create([
            'name' => 'Top2',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/7136732/c/1894/1505/0/817…/b75904/3544148363/il_680x540.3544148363_43f0.jpg',
            'title'=>'',
            'main_title'=>'Leather Handle Flag End',
            'sub_title'=>'Comfy all around.'
        ]);
        $Website_image = Website_image::create([
            'name' => 'Top3',
            'lang'=>'fr',
            'image'=>'https://i.etsystatic.com/16453670/c/1970/1566/555/…/58a788/3468479551/il_680x540.3468479551_qx4k.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'Stoneware Speckled Hand Built',
            'sub_title'=>'Comfy all around.'
        ]);
        $Website_image = Website_image::create([
            'name' => 'Top1',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/6060897/r/il/6413a9/2355473127/il_680x540.2355473127_lfxx.jpg',
            'title'=>'',
            'main_title'=>'Assorted Blue Band Stoneware.',
            'sub_title'=>'You can\'t resist em !'
        ]);

        $Website_image = Website_image::create([
            'name' => 'Top2',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/7136732/c/1894/1505/0/817…/b75904/3544148363/il_680x540.3544148363_43f0.jpg',
            'title'=>'',
            'main_title'=>'Leather Handle Flag End',
            'sub_title'=>'Comfy all around.'
        ]);
        $Website_image = Website_image::create([
            'name' => 'Top3',
            'lang'=>'ar',
            'image'=>'https://i.etsystatic.com/16453670/c/1970/1566/555/…/58a788/3468479551/il_680x540.3468479551_qx4k.jpg',
            'title'=>'Pixel hand',
            'main_title'=>'Stoneware Speckled Hand Built',
            'sub_title'=>'Comfy all around.'
        ]);







    }
}
