<?php

namespace Database\Seeders;

use App\Modules\CategoriesLogic\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Factory::create();
        Category::query()->create([
            'name_ar'=>'ملابس الرجال',
            'name_fr'=>"Vêtements homme",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'ملابس نسائية',
            'name_fr'=>"Mode Femme et Accessoires",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'الأمهات والأطفال',
            'name_fr'=>"Mère et enfant",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'الألعاب والهوايات',
            'name_fr'=>"Jeux et loisirs",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'المنزل والحديقة',
            'name_fr'=>"Maison & Animalerie",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'الإكسسوارات والجواهر',
            'name_fr'=>"Bijoux et Accessoires",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'الرياضة والترفيه',
            'name_fr'=>"Sports et Loisirs",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'الملابس والإكسسوارات',
            'name_fr'=>"Accessoires de vêtements",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'أحذية',
            'name_fr'=>"Sous-vêtements et pyjamas",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
        Category::query()->create([
            'name_ar'=>'السيارات والدراجات النارية',
            'name_fr'=>"Automobiles et Motos",
            'is_active'=>1,
            'icon'=>'category.jpg',
        ]);
    }
}
