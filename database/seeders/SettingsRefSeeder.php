<?php

namespace Database\Seeders;

use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsRefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
          'description_fr'=>'Description en français',
          'description_ar'=>'Description en arabe',
          'contact tél 1'=>'Téléphone 1',
          'contact tél 2'=>'Téléphone 2',
          'email'=>'Email',
          'adresse_fr'=>'Adresse en français',
          'adresse_ar'=>'Adresse en arabe',
          'facebook'=>'facebook',
          'instagram'=>'instagram',
          't_n_c_fr'=>'Termes et conditions en français',
          't_n_c_ar'=>'Termes et conditions en arabe',
          'pvc_fr'=>'Confidentialité en français',
          'pvc_ar'=>'Confidentialité en arabe',
          'about_us_fr'=>'À propos de nous en français ',
          'about_us_ar'=>'À propos de nous en arabe ',
        ];
        foreach ($array as $key=>$setting){
            Setting::query()->whereName($key)->first()?->update([
               'ref'=>$setting
            ]);
        }

    }
}
