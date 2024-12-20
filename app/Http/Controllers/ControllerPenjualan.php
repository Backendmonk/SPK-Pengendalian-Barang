<?php

namespace App\Http\Controllers;

use App\Models\ModelPenjualan;
use Illuminate\Http\Request;

class ControllerPenjualan extends Controller
{
    //aa


    public function DataPenjualanBarang(){


        $Arraypenjualan = [
            'DataPenjualan'=>ModelPenjualan::all()
        ];

        return view('Penjualan.DataPenjualan',$Arraypenjualan);
    }

    
}
