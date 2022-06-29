<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\JobController;
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
    Route::get('/teams',[TeamController::class,'index'])->name('teams');
    Route::get('/addteam',[TeamController::class,'create'])->name('addteam');
    Route::post('/add',[TeamController::class,'store'])->name('storeteam');

    Route::get('/addemp',[EmployeeController::class,'create'])->name('employee');
    Route::post('/store',[EmployeeController::class,'store'])->name('store');
    Route::get('/dashboard/{user}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::put('/dashboard/{user}',[EmployeeController::class,'update'])->name('employee.update');
    
    Route::get('/job',[JobController::class,'create'])->name('job');
    Route::get('/jobs',[JobController::class,'index'])->name('jobs');
    Route::post('/addjob',[JobController::class,'store'])->name('addjob');
    Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->name('editjob');
    Route::put('/jobs/{job}',[JobController::class,'update'])->name('job.update');
    Route::inertia('/emport' , 'Employees/Emport');
    Route::post('/emporting',[EmployeeController::class,'fileImport'])->name('import');
    Route::inertia('/job/description' , 'Jobs/Description');
});





require __DIR__.'/auth.php';