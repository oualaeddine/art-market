<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Modules\ProductsLogic\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (Vendor::all() as $vendor) {

            for ($i = 0; $i < 10; $i++) {
                $rand_f = rand(3, 4);
                $rand_b = 1 / rand(1, 2);
                $random_rat = $rand_f + $rand_b;

                $price_old = $faker->numberBetween(1500, 6000);
                $discount = $faker->numberBetween(150, 600);
                $price = $price_old - $discount;
                $product = Product::query()->create([
                    'name_fr' => "Vendeur-$vendor->id-Produit-$i",
                    'name_ar' => "$vendor->id-البائع-$i-لمنتوج-",
                    'desc_ar' => "وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.",
                    'desc_fr' => $faker->paragraph,
                    'discount' => $discount,
                    'price_old' => $price_old,
                    'price' => $price,
                    'ref' => $vendor->id . Str::random(4) . $i,
                    'slug' => "slug-produit-$i-vendor-$vendor->id",
                    'is_active' => 1,
                    'vendor_id' => $vendor->id,
                    'image' =>'product.jpg',
                    'rating' => $random_rat
                ]);


                $product->categories()->sync($vendor->categories()->take(4)->inRandomOrder()->pluck('categories.id')->toArray());
                $product->brands()->sync($vendor->brands()->inRandomOrder()->take(4)->pluck('brands.id')->toArray());
            }
        }


    }
}
