<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesRefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->where('name','admin')->update(['ref'=>'Admin']);
        Role::query()->where('name','vendor')->update(['ref'=>'Vendeur  ']);
        Role::query()->where('name','sub_vendor')->update(['ref'=>'Sous-vendeur']);
    }
}
