<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\User\UserCreateController;
use App\Http\Controllers\User\UserDeleteController;
use App\Http\Controllers\User\UserEditController;
use App\Http\Controllers\User\UserIndexController;
use App\Http\Controllers\User\UserShowController;
use App\Http\Controllers\User\UserStoreController;
use App\Http\Controllers\User\UserUpdateController;
//use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Route::get('/', IndexController::class)->name('main.index');

Route::group(['prefix' => 'admin', /*'namespace' => 'Admin'*//*, 'middleware' => 'admin'*/], function(){ // группа роутов + middleware (или каждый по совему Route:get('/admin', 'Admin\MainController@index')->name('admin.index'); )
    Route::get('/', [IndexController::class, '__invoke'])->name('main.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('colors', ColorController::class);
    //Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    
});




Route::group(['prefix' => 'users'], function(){
    Route::get('/', [UserIndexController ::class, '__invoke'])->name('user.index');
    Route::get('/create', [UserCreateController::class, '__invoke'])->name('user.create');
    Route::post('/', [UserStoreController::class, '__invoke'])->name('user.store');
    Route::get('/{user}', [UserShowController::class, '__invoke'])->name('user.show');
    Route::get('/{user}/edit', [UserEditController::class, '__invoke'])->name('user.edit');
    Route::patch('/{user}', [UserUpdateController::class, '__invoke'])->name('user.update');
    Route::delete('/{user}', [UserDeleteController::class, '__invoke'])->name('user.delete');
});