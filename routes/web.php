<?php

use App\Http\Controllers\ControllerBarang;
use App\Http\Controllers\ControllerKriteria;
use App\Http\Controllers\ControllerPembelian;
use App\Http\Controllers\ControllerPenjualan;
use App\Http\Controllers\ControllerSuplier;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\EoqController;
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
        //menus
        route::get('/index','IndexBarang');
        route::get('/DataBarang','DataBarang')->name('databarang');
       

        //view
        route::post('/inputBarangView','inputBarangView')->name('inputbarang');
        route::post('/editBarang','editBarang');


        // Push Table

        route::post('/BarangAdd','BarangAdd');

        route::post('/UpdateBarang','UpdateBarang');
        route::post('/hapusBarang','hapusBarang');
});

route::controller(ControllerSuplier::class)->middleware('auth')->group(function(){

    //views
    route::get('/DataSuplier','DataSuplier')->name('datasuplier');
    route::post('/inputSupView','inputSupView');
    route::post('/editsup','editsup');

    //Databases
    route::post('/SuplierAdd','SuplierAdd');
    route::post('/SuplierUpdate','SuplierUpdate');
    route::post('/hapussup','hapussup');


    

});

route::controller(ControllerPembelian::class)->middleware('auth')->group(function(){
    //views
            route::get('/DataPermbelianBarang','DataPermbelianBarang')->name('datapembelianbarang');
            route::post('/inputPembelianView','inputPembelianView');
            route::post('/DetailBarang','DetailBarang');
    

            //db

            route::post('/InputPembelian','InputPembelian');


          
            
});


route::controller(ControllerPenjualan::class)->middleware('auth')->group(function(){

    route::get('/DataPenjualanBarang','DataPenjualanBarang')->name('datapenjualanbarang');

    route::post('/inputPenjualanView','inputPenjualanView');
    route::post('/DetailBarang','DetailBarang');
    
    //db

    route::post('/InputPenjualan','InputPenjualan');
});



route::controller(ControllerKriteria::class)->middleware('auth')->group(function(){

    route::get('/kriteria','DataKriteria')->name('datakriteria');
    route::post('/inputKriteriaView','inputKriteriaView');

    route::post('/KriteriaAdd','KriteriaAdd');
    route::post('/hapusKriteria','hapuskriteria');

    
});

route::controller(EoqController::class)->middleware('auth')->group(function(){


    route::get('/analisisEOQ','AnalisisEOQ')->name('AnalisisE');

    route::post('/analisis','analisis');
});



