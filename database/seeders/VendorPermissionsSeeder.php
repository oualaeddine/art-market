<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class VendorPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashbaord_perms = [
            'view_home',
        ];
        $users_perms=[
          'view_users',
          'create_users',
          'edit_users',
          'delete_users',
        ];

        $categories_perms = [
            'view_categories',
            'create_categories',
            'edit_categories',
            'delete_categories',
        ];

        $brand_perms = [
            'view_brand',
            'create_brand',
            'edit_brand',
            'delete_brand',
        ];

        $images_perms = [
            'view_img',
            'create_img',
            'edit_img',
            'delete_img',
        ];

        $products_perms = [
            'view_product',
            'create_product',
            'edit_product',
            'delete_product',
        ];

        $command_perms = [
            'view_command',
            'create_command',
            'edit_detail_command',
            'delete_command',

        ];

        $raw_orders_perms = [
            'view_raw_order',
            'create_raw_order',
            'edit_raw_order',
            'delete_raw_order',
        ];


        $permissions=array_merge($users_perms,$categories_perms,$dashbaord_perms,$brand_perms,$images_perms,$products_perms,$command_perms,$raw_orders_perms);
        $permission_ids_array2 = [];
        foreach ($permissions as $key => $value) {
            $modal2 = Permission::query()->firstOrCreate(['name' => 'vendor_'.$value,'guard_name'=>'vendor'], ['name' => 'vendor_'.$value,'guard_name'=>'vendor']);
            $permission_ids_array2[] = $modal2->id;
        }

      Role::query()->create(['name' => 'vendor','guard_name'=>'vendor'])->givePermissionTo($permission_ids_array2);
      Role::query()->create(['name' => 'sub_vendor','guard_name'=>'vendor'])->givePermissionTo($permission_ids_array2);


    }
}
