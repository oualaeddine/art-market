<?php

namespace Database\Seeders;

use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Database\Seeder;

class RefSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->updateOrCreate( [
            'id'=>1,

        ],[
            'id'=>1,
            'ref'=>'Description en français'
        ] );



        Setting::updateOrCreate( [
            'id'=>2,
        ] ,[
            'id'=>2,
            'ref'=>'Description en arabe'
        ]);



        Setting::updateOrCreate( [
            'id'=>3,
        ] ,[
            'ref'=>'Numero de téléphone 1'
        ]);



        Setting::updateOrCreate( [
            'id'=>4,

        ] ,[
            'ref'=>'Numero de téléphone 2'
        ]);



        Setting::updateOrCreate( [
            'id'=>5,

        ],[
            'ref'=>'Email'
        ] );



        Setting::updateOrCreate( [
            'id'=>6,

        ] ,[
            'ref'=>'Adresse en français'
        ]);



        Setting::updateOrCreate( [
            'id'=>7,

        ],[
            'ref'=>'Adresse en arabe'
        ] );



        Setting::updateOrCreate( [
            'id'=>8,

        ] ,[
            'ref'=>'Lien facebook'
        ]);



        Setting::updateOrCreate( [
            'id'=>9,

        ],[
            'ref'=>'Lien instagram'
        ] );



        Setting::updateOrCreate( [
            'id'=>10,

        ] ,[
            'ref'=>'Termes et conditions en français'
        ]);



        Setting::updateOrCreate( [
            'id'=>11,

        ] ,[
            'ref'=>'Termes et conditions en arabe'
        ]);



        Setting::updateOrCreate( [
            'id'=>12,

        ] ,[
            'ref'=>'A propos de nous en français'
        ]);



        Setting::updateOrCreate( [
            'id'=>13,

        ],[
            'ref'=>'A propos de nous en arabe'
        ] );


    }
}
