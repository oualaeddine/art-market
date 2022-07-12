<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1)->create();
        $this->call(YalidineWilayasSeeder::class);
        $this->call(YalidineMairiesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(Settings::class);

        $this->call(WebsiteImagesSeeder::class);
//        $this->call(WebSiteImagesAr::class);
//         $this->call(ProductsSeeder::class);

        $this->call(TCSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(ExtraPermissionsSeeder::class);
        $this->call(YalidineWilayaArab::class);
        $this->call(YalidineMairiesArab::class);
        $this->call(VendorPermissionsSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(ProductSeeder::class);
    }

}
