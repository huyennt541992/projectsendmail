<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Kadai3Controller;
use App\Http\Controllers\Kadai2Controller;
use App\Http\Controllers\Kadai1Controller;

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

//client route 
Route::get('/',function(){
    return view('welcome');
})->name('home');


Route::prefix('users/kadai3')->group(function(){

    //danh sach user 
    Route::get('/',[Kadai3Controller::class,'index'])->name('users.list');

    Route::post('/',[Kadai3Controller::class,'sendmail']);
    //edit usser
    Route::get('/{id}/edit',[Kadai3Controller::class,'getUser'])->name('users.edit');

    Route::put('/{id}/edit',[Kadai3Controller::class,'updateUser']);
    //add user
    Route::get('/add',[Kadai3Controller::class,'addUser'])->name('users.add');

    Route::post('/confirm',[Kadai3Controller::class,'confirmUser'])->name('users.confirm');

    Route::post('/add',[Kadai3Controller::class,'handleAddUser']);
    //delete user
    Route::get('/{id}/delete',[Kadai3Controller::class,'deleteUser'])->name('users.delete');

    
});

Route::prefix('users/kadai2')->group(function(){

    //danh sach user 
    Route::get('/',[Kadai2Controller::class,'index'])->name('users.list2');

    Route::post('/',[Kadai2Controller::class,'sendmail']);
    //edit usser
    Route::get('/{id}/edit',[Kadai2Controller::class,'getUser'])->name('users.edit2');

    Route::put('/{id}/edit',[Kadai2Controller::class,'updateUser']);
    //add user
    Route::get('/add',[Kadai2Controller::class,'addUser'])->name('users.add2');

    Route::post('/confirm',[Kadai2Controller::class,'confirmUser'])->name('users.confirm2');

    Route::post('/add',[Kadai2Controller::class,'handleAddUser']);
    //delete user
    Route::get('/{id}/delete',[Kadai2Controller::class,'deleteUser'])->name('users.delete2');

});

Route::prefix('users/kadai1')->group(function(){

    //danh sach user 
    Route::get('/sendmail',[Kadai1Controller::class,'index'])->name('users.add1');

    Route::post('/confirm',[Kadai1Controller::class,'confirmUser'])->name('users.confirm1');

    Route::post('/sendmail',[Kadai1Controller::class,'sendmail']);
    //edit usser
    // Route::get('/{id}/edit',[Kadai2Controller::class,'getUser'])->name('users.edit2');

    // Route::put('/{id}/edit',[Kadai2Controller::class,'updateUser']);
    // //add user
    // Route::get('/add',[Kadai2Controller::class,'addUser'])->name('users.add2');

    // Route::post('/confirm',[Kadai2Controller::class,'confirmUser'])->name('users.confirm2');

    // Route::post('/add',[Kadai2Controller::class,'handleAddUser']);
    // //delete user
    // Route::get('/{id}/delete',[Kadai2Controller::class,'deleteUser'])->name('users.delete2');

});



