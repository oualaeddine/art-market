<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class VendorsPermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ven_perms=[
            'view_vendor',
            'create_vendor',
            'edit_vendor',
            'delete_vendor',
        ];


        $permissions=array_merge($ven_perms);
        $permission_ids_array2 = [];
        foreach ($permissions as $key => $value) {
            $modal2 = Permission::query()->firstOrCreate(['name' =>$value]);
            $permission_ids_array2[] = $modal2->id;
        }

        Role::query()->where(['name' => 'admin'])->first()->givePermissionTo($permission_ids_array2);


    }
}
