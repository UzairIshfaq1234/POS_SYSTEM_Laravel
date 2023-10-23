<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\Auth_Login;
use App\Http\Controllers\Cashier;
use App\Http\Controllers\Product;
use App\Http\Controllers\ReviewerDashboard;
use App\Http\Controllers\StudentDashboard;
use App\Http\Controllers\SupervisorDashboard;
use Illuminate\Auth\Events\Login;
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

// Route::get('/', function () {
//     return view('Dashboard.welcome');
// });

// Route::get('/', [UserController::class, 'index']);

Route::get('/', [Auth_Login::class, 'index'])->name('Page.login');
Route::post('/', [Auth_Login::class, 'login'])->name('Auth.login');
Route::get('/logout', [Auth_Login::class, 'logout'])->name('logout.all');


// Admin Routes are here

Route::middleware(['Admin'])->group(function () {

    Route::get('/AdminDashboard', [AdminDashboard::class, 'index'])->name('Admin.dashboard');

    // Admin Curds links
    Route::get('/AddAdmin', [AdminDashboard::class, 'Add_Admin'])->name('Admin.add');
    Route::post('/AddAdminData', [AdminDashboard::class, 'Add_Admin_data'])->name('Admin.adddata');
    Route::get('/AllAdminData', [AdminDashboard::class, 'All_Admin_data'])->name('Admin.alldata');
    Route::get('/delAdminData/{id}', [AdminDashboard::class, 'Del_Admin_data'])->name('Admin.deldata');
    Route::post('/UpdateAdminData', [AdminDashboard::class, 'Update_Admin_data'])->name('Admin.updatedata');

    Route::get('/AllAdminDatacontent', [AdminDashboard::class, 'All_Admin_data_content'])->name('Admin.alldatacontent');

    // Admin Routes End are here

    // Product Curd links---- START
    Route::get('/AddProduct', [Product::class, 'Add_Product_view'])->name('Product.Add_Product_view');
    Route::post('/AddProductData', [Product::class, 'Add_Product_data'])->name('Product.Add_Product_data');
    Route::get('/AllProductData', [Product::class, 'All_Product_data'])->name('Product.All_Product_data');
    Route::get('/delProductData/{id}', [Product::class, 'Del_Product_data'])->name('Product.Del_Product_data');
    Route::post('/UpdateProductData', [Product::class, 'Update_Product_data'])->name('Product.Update_Product_data');
    Route::get('/viewProductData/{id}', [Product::class, 'View_Product_data'])->name('Product.View_Product_data');

    // Product Curd links---- END


    // Cashier Curd links---- START

    Route::get('/Cashier', [Cashier::class, 'Cashier_view'])->name('Cashier.Cashier_view');


    Route::post('/find-product', [Cashier::class, 'findProduct'])->name('find.product');

    Route::post('/ordersave', [Cashier::class, 'sava_order_Product'])->name('save.order');

    Route::post('/generate-pdf', [Cashier::class, 'generatePdf'])->name('generate.pdf');



    // Cashier Curd links---- END




});
