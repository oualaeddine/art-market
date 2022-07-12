<?php

namespace Database\Seeders;

use App\Modules\CategoriesLogic\Models\Category;
use App\Modules\ProductsLogic\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array =  array_fill(1, 5, '');

        foreach($array as $key => $item){

            $category = Category::create(['name_ar' => 'تصنيف'.$key , 'name_fr' => 'Category '.$key]);


            $product = Product::create(['ref'=> 'product'.$key ,'name_fr' => 'Product '.$key ,'slug' => 'product'.$key, 'name_ar' => 'منتج '.$key , 'desc_ar' => ' وصف منتوج'.$key ,'rating' => 3.5
            , 'desc_fr' => 'Desc prod '.$key , 'discount' => 10 , 'price_old' => 100000 * $key , 'price' => 90000 * $key]);

            $product->categories()->attach($category->id);
            

        }

        $array =  array_fill(6, 10, '');

        foreach($array as $key => $item){

            $category = Category::create(['name_ar' => 'تصنيف'.$key , 'name_fr' => 'Category '.$key]);

            $product = Product::create(['ref'=> 'product'.$key ,'name_fr' => 'Product '.$key ,'slug' => 'product'.$key, 'name_ar' => 'منتج '.$key, 'desc_ar' => ' وصف منتوج'.$key ,'rating' => 3.5
            , 'desc_fr' => 'Desc prod '.$key , 'discount' => 5 , 'price_old' => 10000 * $key , 'price' => 9000 * $key]);

            $product->categories()->attach($category->id);
            
        }
       
    
    
    }
}
