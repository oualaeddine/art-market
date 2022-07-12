<?php

use App\Modules\ClientsLogic\Controllers\Client\GetClient;
use App\Modules\OrdersLogic\Controllers\raw\AddOrderProduct;
use App\Modules\OrdersLogic\Controllers\raw\DeleteOrderProduct;
use App\Modules\VendorsLogic\Controllers\Vendor\brands\SyncBrands;
use App\Modules\VendorsLogic\Controllers\Vendor\brands\ToggleBrand;
use App\Modules\VendorsLogic\Controllers\Vendor\categories\SyncCategories;
use App\Modules\VendorsLogic\Controllers\Vendor\categories\ToggleCategory;
use App\Modules\VendorsLogic\Controllers\Vendor\clients\DeleteClient;
use App\Modules\VendorsLogic\Controllers\Vendor\clients\StoreClient;
use App\Modules\VendorsLogic\Controllers\Vendor\images\DeleteImage;
use App\Modules\VendorsLogic\Controllers\Vendor\images\StoreImage;
use App\Modules\VendorsLogic\Controllers\Vendor\images\UpdateImage;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\DeleteOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\EditOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\GenerateCoupon;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\ShowCouponPage;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\ShowCreateOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\ShowOrderDetails;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\StoreOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\normal\UpdateOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\DeleteOrderRaw;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\GetAddresses;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\GetClients;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\GetCommune;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\GetProducts;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\GetRawOrderDetail;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\UpdateOrderRaw;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\raw\UpgradeOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\orders\ShowUpgradeToOrder;
use App\Modules\VendorsLogic\Controllers\Vendor\products\DeleteProduct;
use App\Modules\VendorsLogic\Controllers\Vendor\products\DeleteProductImage;
use App\Modules\VendorsLogic\Controllers\Vendor\products\GetProductImages;
use App\Modules\VendorsLogic\Controllers\Vendor\products\StoreProduct;
use App\Modules\VendorsLogic\Controllers\Vendor\products\StoreProductImages;
use App\Modules\VendorsLogic\Controllers\Vendor\products\ToggleProduct;
use App\Modules\VendorsLogic\Controllers\Vendor\products\UpdateProduct;
use App\Modules\VendorsLogic\Controllers\Vendor\products\UpdateProductImage;
use App\Modules\VendorsLogic\Controllers\Vendor\users\DeleteUser;
use App\Modules\VendorsLogic\Controllers\Vendor\users\StoreUser;
use App\Modules\VendorsLogic\Controllers\Vendor\users\ToggleUser;
use App\Modules\VendorsLogic\Controllers\Vendor\users\UpdateUser;
use App\Modules\VendorsUi\Controllers\Vendor\brands\ShowBrands;
use App\Modules\VendorsUi\Controllers\Vendor\categories\ShowCategories;
use App\Modules\VendorsUi\Controllers\Vendor\clients\ShowClients;
use App\Modules\VendorsUi\Controllers\Vendor\images\GetImage;
use App\Modules\VendorsUi\Controllers\Vendor\images\ShowImages;
use App\Modules\VendorsUi\Controllers\Vendor\orders\normal\ShowOrders;
use App\Modules\VendorsUi\Controllers\Vendor\orders\raw\ShowRawOrders;
use App\Modules\VendorsUi\Controllers\Vendor\products\ShowCreateProduct;
use App\Modules\VendorsUi\Controllers\Vendor\products\ShowEditProduct;
use App\Modules\VendorsUi\Controllers\Vendor\products\ShowProducts;
use App\Modules\VendorsUi\Controllers\Vendor\users\ShowCreateUser;
use App\Modules\VendorsUi\Controllers\Vendor\users\ShowEditUser;
use App\Modules\VendorsUi\Controllers\Vendor\users\ShowUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

/****
 * website ROUTES
 */

require __DIR__ . '/../app/Modules/WebsiteUi/Routes/web.php';

require __DIR__ . '/../app/Modules/WebsiteLogic/Routes/web.php';
Route::get('migrate', function (){
    \Illuminate\Support\Facades\Artisan::call('migrate');
});


Route::group(['prefix' => 'cod-dash'], function () {
    Auth::routes(['register'=>false]);
    Route::get('/reload-captcha', [App\Http\Controllers\Auth\LoginController::class, 'reload_captcha'])->name('reload-captcha');
});


Route::group(['prefix' => 'cod-dash/vendor', 'as' => 'vendor.', 'middleware' => ['auth:vendor']], function () {

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('profile', \App\Modules\VendorsUi\Controllers\VendorProfile::class)->name('profile');
    Route::put('profile/update', \App\Modules\VendorsLogic\Controllers\Vendor\UpdateVendor::class)->name('profile.update');

    Route::get('profile/user', \App\Modules\VendorsUi\Controllers\Profile::class)->name('user.profile');
    Route::put('profile/user/update', \App\Modules\VendorsLogic\Controllers\Vendor\UpdateVendorUser::class)->name('user.profile.update');
    //create users
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('', ShowUsers::class)->name('index');
        Route::get('create', ShowCreateUser::class)->name('create');
        Route::post('store', StoreUser::class)->name('store');
        Route::get('{user}/edit', ShowEditUser::class)->name('edit');
        Route::put('{user}/update', UpdateUser::class)->name('update');
        Route::put('{user}/toggle', ToggleUser::class)->name('toggle');
        Route::delete('{user}/delete', DeleteUser::class)->name('delete');
    });
    //clients
    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
        Route::get('', ShowClients::class)->name('index');
        Route::post('store', StoreClient::class)->name('store');
        Route::delete('{clients_vendor}/delete', DeleteClient::class)->name('delete');

    });

    //sync categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('', ShowCategories::class)->name('index');
        Route::put('{category}/toggle', ToggleCategory::class)->name('toggle');
        Route::put('/sync', SyncCategories::class)->name('sync');
    });

    //sync brands
    Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
        Route::get('', ShowBrands::class)->name('index');
        Route::put('{brand}/toggle', ToggleBrand::class)->name('toggle');
        Route::put('/sync', SyncBrands::class)->name('sync');
    });

    //create images
    Route::group(['prefix' => 'images', 'as' => 'images.'], function () {
        Route::get('', ShowImages::class)->name('index');
        Route::put('{image}/update', UpdateImage::class)->name('update');
        Route::get('{image}/get', GetImage::class)->name('get');
        Route::delete('{image}/delete', DeleteImage::class)->name('delete');
        Route::post('images/store', StoreImage::class)->name('store');

    });

    //products
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('', ShowProducts::class)->name('index');
        Route::get('create', ShowCreateProduct::class)->name('create');
        Route::post('store', StoreProduct::class)->name('store');
        Route::put('{product}/toggle', ToggleProduct::class)->name('toggle');
        Route::get('{product}/edit', ShowEditProduct::class)->name('edit');
        Route::put('{product}/update', UpdateProduct::class)->name('update');
        Route::delete('{product}/delete', DeleteProduct::class)->name('delete');
        Route::delete('delete/image/{id}', DeleteProductImage::class)->name('delete.image');
        Route::put('update/image/{id}', UpdateProductImage::class)->name('update.image');
        Route::get('{product}/get-images', GetProductImages::class)->name('get-image');
        Route::post('{product}/store-images', StoreProductImages::class)->name('store-image');

    });

    //raw commands
    Route::group(['prefix' => 'orders/raw', 'as' => 'orders.raw.'], function () {


        //raw commands
        Route::get('', ShowRawOrders::class)->name('index');
        Route::get('getDetail/{order}', GetRawOrderDetail::class)->name('getDetail');
        Route::get('getClients', GetClients::class)->name('get.clients');
        Route::get('getProducts', GetProducts::class)->name('get.products');
        Route::get('{client}/getAddresses', GetAddresses::class)->name('get.addresses');
        Route::get('{order}/toorder', ShowUpgradeToOrder::class)->name('toorder');
        Route::get('{order}/upgrade', UpgradeOrder::class)->name('upgrade');
        Route::delete('{order_product}/product/delete', DeleteOrderProduct::class)->name('upgrade.product-delete');
        Route::post('{order}/add', AddOrderProduct::class)->name('upgrade.product-add');
        Route::put('{order}/update', UpdateOrderRaw::class)->name('update');
        Route::delete('{order}/delete', DeleteOrderRaw::class)->name('delete');
        Route::get('/commune/{id}', GetCommune::class)->name('get.commune');
    });

    //commands
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('', ShowOrders::class)->name('index');
        Route::get('create', ShowCreateOrder::class)->name('create');
        Route::post('store', StoreOrder::class)->name('store');
        Route::get('getClients', GetClients::class)->name('get.clients');
        Route::get('getProducts', GetProducts::class)->name('get.products');
        Route::get('{client}/getAddresses', GetAddresses::class)->name('get.addresses');
        Route::get('/commune/{id}', GetCommune::class)->name('get.commune');
        Route::get('{order}/modifier', EditOrder::class)->name('edit');
        Route::put('{order}/update', UpdateOrder::class)->name('update');
        Route::get('{order}/details', ShowOrderDetails::class)->name('details');
        Route::get('{order}/generate-coupon', ShowCouponPage::class)->name('coupons');
        Route::post('{order}/generate-coupon/store', GenerateCoupon::class)->name('coupons.store');
        Route::delete('{order}/delete', DeleteOrder::class)->name('delete');
        Route::get('{client}/client/info', GetClient::class)->name('get.info');
    });

});


Route::group(['prefix' => 'cod-dash', 'as' => 'admin.', 'middleware' => ['auth:web']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /****
     * Products ROUTES
     */

    require __DIR__ . '/../app/Modules/ProductsUi/Routes/web.php';


    /****
     * Clients ROUTES
     */

    require __DIR__ . '/../app/Modules/ClientsUi/Routes/web.php';

    /****
     * Categories ROUTES
     */

    require __DIR__ . '/../app/Modules/CategoriesUi/Routes/web.php';


    /****
     * Orders ROUTES
     */

    require __DIR__ . '/../app/Modules/OrdersUi/Routes/web.php';

    /****
     * Brands ROUTES
     */

    require __DIR__ . '/../app/Modules/BrandsUi/Routes/web.php';


    /****
     * Users ROUTES
     */

    require __DIR__ . '/../app/Modules/UsersUi/Routes/web.php';

    /****
     * Settings ROUTES
     */

    require __DIR__ . '/../app/Modules/SettingsUi/Routes/web.php';


    /****
     * website images ROUTES
     */

    require __DIR__ . '/../app/Modules/WebsiteImagesUi/Routes/web.php';

    /****
     * Admin Vendor ROUTES
     */

    require __DIR__ . '/../app/Modules/VendorsUi/Routes/web.php';


//    /****
//     * Rules ROUTES
//     */
//
//    require __DIR__ . '/../app/Modules/RulesUi/Routes/web.php';
//
//
//    /****
//     * Points ROUTES
//     */
//
//    require __DIR__ . '/../app/Modules/PendingPointsUi/Routes/web.php';


});





