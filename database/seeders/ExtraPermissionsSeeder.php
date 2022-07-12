<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ExtraPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coupon_family_perms=[
//            'view_coupon_family',
//            'create_coupon_family',
//            'update_coupon_family',
//            'delete_coupon_family',
        ];

        $coupon_perms=[
//            'view_coupons',
//            'create_coupon',
//            'update_coupon',
//            'delete_coupon'
        ];
        $contact_permission=[
//          'view_contacts',
//          'update_contact',
//          'delete_contact'
        ];
        $category_permission=[
//          'view_categories',
//          'store_category',
//          'update_category',
//          'delete_category'
        ];
        $orders_permission=[
//            'view_orders',
//            'create_order',
//            'update_order',
//            'delete_order'
        ];
        $website_persm=[
//          'view_website_img',
//          'create_website_img',
//          'update_website_img',
//          'delete_website_img'
        ];

        $params_perms = [
//            'view_param',
//            'create_param',
//            'edit_param',
//            'delete_param',
        ];
        $client_perms = [
//            'view_client',
//            'view_detail_client',
//            'edit_detail_client',
//            'create_client',
//            'edit_client',
//            'delete_client',
        ];
        $brand_perms = [
//            'view_brand',
//            'create_brand',
//            'edit_brand',
//            'delete_brand',
        ];

        $raw_orders_perms = [
            'view_raw_order',
            'create_raw_order',
            'edit_raw_order',
            'delete_raw_order',
        ];

    $permissions=array_merge($coupon_family_perms,$coupon_perms,$contact_permission,$category_permission,$orders_permission,$website_persm,$params_perms,$client_perms,$brand_perms,$raw_orders_perms);
        $permission_ids_array=[];
        foreach ($permissions as $key=>$value) {
            $modal=Permission::query()->firstOrCreate(['name'=> $value], ['name' => $value]);
            $permission_ids_array[]=$modal->id;
        }
        Role::query()->where(['name'=>'admin'])->first()->givePermissionTo($permission_ids_array);
    }
}
