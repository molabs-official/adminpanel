<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeamController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[EmployeeController::class,'index'])->name('dashboard');
    Route::get('/addemp',[EmployeeController::class,'create'])->name('employee');
    Route::post('/store',[EmployeeController::class,'store'])->name('store');
    Route::post('/add',[TeamController::class,'store'])->name('storeteam');
    Route::get('/addteam',[TeamController::class,'create'])->name('addteam');
    Route::get('/dashboard/{user}/edit',[EmployeeController::class,'edit'])->name('employee.edit');

});





require __DIR__.'/auth.php';


