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
});
