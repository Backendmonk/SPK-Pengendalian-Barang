<?php

use App\Http\Controllers\ControllerBarang;
use App\Http\Controllers\ControllerUser;
use Illuminate\Routing\Controllers\Middleware;
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



Route::controller(ControllerUser::class)->middleware('guest')->group(function(){

            Route::get('/', function () {
                return view('login');
            })->name('login');


        route::get('/registerakun','registerAkunView')->name('akunview');
        route::post('/login','loginAkun');

        route::post('/registerAkunBaru','RegisterAkunBaru');


});


route::controller(ControllerUser::class)->middleware('auth')->group(function(){

            route::get('/logout','logout');
});

route::controller(ControllerBarang::class)->middleware('auth')->group(function(){

        route::get('/index','IndexBarang');
});



