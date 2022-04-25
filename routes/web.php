<?php

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

Route::get('/', function () {
    return redirect('dashboard');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', function () {
    return redirect('login');
});

Route::get('home', function () {
    return redirect('dashboard');
});

Route::get('admin', function () {
    return redirect('dashboard');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function ($router) {
    $router->get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    $router->group(['prefix' => 'farmer'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\FarmerController::class, 'index'])->name('farmer.list');
        $router->get('/create', [App\Http\Controllers\Admin\FarmerController::class, 'create'])->name('farmer.create');
        $router->post('/create', [App\Http\Controllers\Admin\FarmerController::class, 'store'])->name('farmer.store');
        $router->get('/edit/{id}', [App\Http\Controllers\Admin\FarmerController::class, 'edit'])->name('farmer.edit');
        $router->put('/edit/{id}', [App\Http\Controllers\Admin\FarmerController::class, 'update'])->name('farmer.update');
        $router->delete('/destroy/{id}', [App\Http\Controllers\Admin\FarmerController::class, 'destroy'])->name('farmer.destroy');
    });

    $router->group(['prefix' => 'company'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('company.list');
        $router->get('/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('company.create');
        $router->post('/create', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('company.store');
        $router->get('/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('company.edit');
        $router->put('/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('company.update');
        $router->delete('/destroy/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name('company.destroy');
    });

    $router->group(['prefix' => 'daily-price'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\DailyPriceController::class, 'index'])->name('price.list');
        $router->get('/create', [App\Http\Controllers\Admin\DailyPriceController::class, 'create'])->name('price.create');
        $router->post('/create', [App\Http\Controllers\Admin\DailyPriceController::class, 'store'])->name('price.store');
        $router->get('/edit/{id}', [App\Http\Controllers\Admin\DailyPriceController::class, 'edit'])->name('price.edit');
        $router->put('/edit/{id}', [App\Http\Controllers\Admin\DailyPriceController::class, 'update'])->name('price.update');
        $router->delete('/destroy/{id}', [App\Http\Controllers\Admin\DailyPriceController::class, 'destroy'])->name('price.destroy');
        $router->get('/today', [App\Http\Controllers\Admin\DailyPriceController::class, 'today'])->name('price.today');
    });
    $router->group(['prefix' => 'tea-category'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\TeaCategoryController::class, 'index'])->name('category.list');
        $router->get('/create', [App\Http\Controllers\Admin\TeaCategoryController::class, 'create'])->name('category.create');
        $router->post('/create', [App\Http\Controllers\Admin\TeaCategoryController::class, 'store'])->name('category.store');
        $router->get('/edit/{id}', [App\Http\Controllers\Admin\TeaCategoryController::class, 'edit'])->name('category.edit');
        $router->put('/edit/{id}', [App\Http\Controllers\Admin\TeaCategoryController::class, 'update'])->name('category.update');
        $router->delete('/destroy/{id}', [App\Http\Controllers\Admin\TeaCategoryController::class, 'destroy'])->name('category.destroy');
    });
    $router->group(['prefix' => 'sale'], function ($router) {
        $router->get('/', [App\Http\Controllers\Admin\SaleController::class, 'index'])->name('sale.list');
        $router->get('/create', [App\Http\Controllers\Admin\SaleController::class, 'create'])->name('sale.create');
        $router->post('/create', [App\Http\Controllers\Admin\SaleController::class, 'store'])->name('sale.store');
        $router->get('/edit/{id}', [App\Http\Controllers\Admin\SaleController::class, 'edit'])->name('sale.edit');
        $router->put('/edit/{id}', [App\Http\Controllers\Admin\SaleController::class, 'update'])->name('sale.update');
        $router->delete('/destroy/{id}', [App\Http\Controllers\Admin\SaleController::class, 'destroy'])->name('sale.destroy');
    });
});
