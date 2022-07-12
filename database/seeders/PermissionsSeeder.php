<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{

//php artisan db:seed --class=PermissionsSeeder --force
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
        $command_perms = [
            'view_command',
            'create_command',
            'edit_detail_command',
            'delete_command',

        ];
        $document_perms = [
            'view_document',
            'create_document',
            'edit_detail_document',
            'delete_document',

        ];
        $user_perms = [
            'view_user',
            'create_user',
            'edit_user_profile',
            'delete_user',
            'block_user',
            'archive_user',
        ];
        $role_perms = [
            'view_role',
            'create_role',
            'edit_role',
            'delete_role',
        ];
        $permission_perms = [
            'view_permission',
            'edit_permission',
            'delete_permission',
        ];

        $client_perms = [
            'view_client',
            'view_detail_client',
            'edit_detail_client',
            'create_client',
            'edit_client',
            'delete_client',
        ];

        $products_perms = [
            'view_product',
            'view_detail_product',
            'edit_detail_product',
            'view_detail_product_variation',
            'edit_detail_product_variation',
            'create_product',
            'edit_product',
            'delete_product',
        ];

        $brand_perms = [
            'view_brand',
            'create_brand',
            'edit_brand',
            'delete_brand',
        ];
        $company_perms = [
            'view_company',
            'create_company',
            'edit_company',
            'delete_company',
        ];
        $notification_perms = [
            'view_notification',
            'create_notification',
            'edit_notification',
            'delete_notification',
        ];
        $stock_perms = [
            'view_stock',
            'create_stock',
            'edit_stock',
            'delete_stock',
        ];
        $delivery_channels_perms = [
            'view_delivery_channel',
            'create_delivery_channel',
            'edit_delivery_channel',
            'delete_delivery_channel',
        ];
        $delivery_channels_equivalence_perms = [
            'view_delivery_channel_equivalence',
            'create_delivery_channel_equivalence',
            'edit_delivery_channel_equivalence',
            'delete_delivery_channel_equivalence',
        ];
        $delivery_channels_trip_perms = [
            'view_delivery_channel_trip',
            'create_delivery_channel_trip',
            'edit_delivery_channel_trip',
            'delete_delivery_channel_trip',
        ];

        $modality_perms = [
            'view_modality',
            'create_modality',
            'edit_modality',
            'delete_modality',
        ];
        $status_perms = [
            'view_status',
            'create_status',
            'edit_status',
            'delete_status',
            'create_prev_status'
        ];
        $sector_perms = [
            'view_sector',
            'create_sector',
            'edit_sector',
            'delete_sector',
        ];
        $bon_achat_perms = [
            'view_bon_achat',
            'view_detail_bon_achat',
            'edit_detail_bon_achat',
            'create_bon_achat',
            'edit_bon_achat',
            'delete_bon_achat',
        ];

        $params_perms = [
            'view_param',
            'create_param',
            'edit_param',
            'delete_param',
        ];
        $params_values_perms = [
            'view_param_value',
            'create_param_value',
            'edit_param_value',
            'delete_param_value',
        ];
        $sms_perms = [
            'view_sms',
            'create_sms',
            'edit_sms',
            'delete_sms',
        ];
        $sms_history_perms = [
            'view_sms_history',
            'create_sms_history',
            'edit_sms_history',
            'delete_sms_history',
        ];

        $sms_content_perms = [
            'view_sms_content',
            'create_sms_content',
            'edit_sms_content',
            'delete_sms_content',
        ];

        $settings_perms = [
            'view_settings',
            'create_settings',
            'edit_settings',
            'delete_settings',
        ];
        $categories_perms = [
            'view_categories',
            'create_categories',
            'edit_categories',
            'delete_categories',
        ];
        $rules_perms = [
            'view_rules',
            'create_rules',
            'edit_rules',
            'delete_rules',
        ];

        $contact_perms = [
            'view_contact',
            'create_contact',
            'edit_contact',
            'delete_contact',
        ];
        $website_images_perms = [
            'view_website_img',
            'create_website_img',
            'edit_website_img',
            'delete_website_img',
        ];


        $permissions = array_merge(
            $dashbaord_perms,
            $command_perms,
//            $document_perms,
            $client_perms,
            $products_perms,
            $brand_perms,
            $user_perms,
//            $company_perms,
//            $notification_perms,
//            $stock_perms,
//            $delivery_channels_perms,
//            $delivery_channels_equivalence_perms,
//            $delivery_channels_trip_perms,
            $role_perms,
            $permission_perms,
//            $modality_perms,
//            $status_perms,
//            $sector_perms,
//            $bon_achat_perms,
            $params_perms,
//            $params_values_perms,
//            $sms_perms,
//            $sms_history_perms,
//            $sms_content_perms,
            $settings_perms,
            $rules_perms,
            $categories_perms,
            $contact_perms,
            $website_images_perms

        );
        $permission_ids_array = [];
//        $permission_ids_array2 = [];
        foreach ($permissions as $key => $value) {
            $modal = Permission::query()->firstOrCreate(['name' => $value], ['name' => $value]);
//            $modal2 = Permission::query()->firstOrCreate(['name' => $value,'guard_name'=>'vendor'], ['name' => $value]);
            $permission_ids_array[] = $modal->id;
//            $permission_ids_array2[] = $modal2->id;
        }

        $role = Role::query()->create(['name' => 'admin'])->givePermissionTo($permission_ids_array);
//        $role2 = Role::query()->create(['name' => 'vendor','guard_name'=>'vendor'])->givePermissionTo($permission_ids_array2);
        User::query()->create([
            'name' => 'admin',
//            'family_name' => 'admin_family',
//            'user_name' => 'admin_user_name',
//            'phone' => '0000000000',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ])->assignRole($role);

    }

//    public function authorize()
//    {
//        return auth()->user()->can();
//    }
}
