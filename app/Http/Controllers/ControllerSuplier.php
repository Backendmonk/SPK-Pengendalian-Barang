<?php

namespace App\Http\Controllers;

use App\Models\ModelSuplier;
use Illuminate\Http\Request;

class ControllerSuplier extends Controller
{
    //

    public function DataSuplier(){

        $ArraySup =[
            'datasup'=>ModelSuplier::all(),
        ];

        return view('Suplier.DataSuplier',$ArraySup);
    }


    public function inputSupView(){

        return view('Suplier.InputSuplier');
    }



    //CRUD

    public function SuplierAdd(request $reqsupData){
        
    }
}
