<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerBarang extends Controller
{
    //

    public function indexBarang(){

      if (Auth::guest()) {
        # code...
        return redirect('/');
      }else{
        return view('Barang.Dashboard');
      }
          
       
        
    }
}
