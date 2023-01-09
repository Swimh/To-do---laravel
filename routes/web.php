<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\TaskController;
use App\Models\TaskCategory;
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
    return view('welcome');
});



require __DIR__.'/auth.php';



Route::group(['prefix' => "admin",'middleware' => 'auth'],function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => "tasks"],function (){
        Route::get('/',[TaskController::class,'index'])->name('tasks.index');
        Route::get('/add',[TaskController::class,'add'])->name('tasks.add');
        
        Route::post('/',[TaskController::class,'save'])->name('tasks.save');

        Route::get('/edit/{task}',[TaskController::class,'edit'])->name('tasks.edit');
        Route::put('/edit/{task}',[TaskController::class,'update'])->name('tasks.update');

        Route::delete('/delete/{task}',[TaskController::class,'delete'])->name('tasks.delete');

        Route::get('/show/{task}',[TaskController::class,'show'])->name('tasks.show');

        Route::get('/search',[TaskController::class,'search'])->name('tasks.search');
    });

    Route::group(['prefix' => 'profile'],function(){
        Route::get('/',[ProfileController::class,'index'])->name('profile.index');
        Route::put('/',[ProfileController::class,'update'])->name('profile.update');
    });
    
    Route::group(['prefix' => 'task-categories'], function(){
        Route::get('/', [TaskCategoryController::class,'index'])->name('task-categories.index');
        Route::get('/add', [TaskCategoryController::class,'add'])->name('task-categories.add');

        Route::post('/add',[TaskCategoryController::class,'save'])->name('task-categories.save');

        Route::delete('/delete/{taskCategory}', [TaskCategoryController::class,'delete'])->name('task-categories.delete');
    });
});
