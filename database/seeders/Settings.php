<?php

namespace Database\Seeders;


use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Database\Seeder;

class Settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create(['name' => 'description_fr' , 'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam dolores 
        quidem mollitia id ipsa nisi necessitatibus iure repudiandae aperiam, odit ipsam dolor fugiat corporis nesciunt illo nemo minus.']);
        
        $setting = Setting::create(['name' => 'description_ar' , 'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam dolores 
        quidem mollitia id ipsa nisi necessitatibus iure repudiandae aperiam, odit ipsam dolor fugiat corporis nesciunt illo nemo minus.']);

        $setting = Setting::create(['name' => 'contact tél 1' , 'value' => '0770150240']);
        $setting = Setting::create(['name' => 'contact tél 2' , 'value' => '023305308']);

        $setting = Setting::create(['name' => 'email' , 'value' => 'demo@demo.com']); 

        $setting = Setting::create(['name' => 'adresse_fr' , 'value' => 'Route KADOUS SABALA N 450 GROUPE LOT 1350 SECTION 2 DRARIA']); 
        $setting = Setting::create(['name' => 'adresse_ar' , 'value' => 'هنا مجرد مثال لعنوان بالعربية شكرا ']); 


        $setting = Setting::create(['name' => 'facebook' , 'value' => 'demo@demo.com']); 
        $setting = Setting::create(['name' => 'instagram' , 'value' => 'demo@demo.com']); 

    }
}
