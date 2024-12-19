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


    public function editsup(request $reqid){

        $id = $reqid->id;
        $arraysupEdit = [
            'datasupID'=>ModelSuplier::find($id)
        ];

        return view('Suplier.EditSuplier',$arraysupEdit);
    }




    //CRUD

    public function SuplierAdd(request $reqsupData){

            $nama = $reqsupData->namasup;

            try {
                $inputSuplier = new ModelSuplier;

                $inputSuplier ->nama_suplier=$nama;
                $inputSuplier->save();

                return redirect()->route('datasuplier')->with('pesanbenar','');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('databarang')->with('error','');
            }
    }

    public function SuplierUpdate(Request $reqidForEdit){

        $id = $reqidForEdit->id;
        $nama_sup = $reqidForEdit->namasup;

        try {
            $UpdateSuplier = ModelSuplier::find($id);

            $UpdateSuplier->nama_suplier= $nama_sup;
            $UpdateSuplier->save();
            return redirect()->route('datasuplier')->with('pesanbenar','');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('databarang')->with('error','');
        }

    }

    public function hapussup( Request $reqidForDelete){

        $id = $reqidForDelete->id;
        try {
            //code...
            $deleteSup = ModelSuplier::find($id);

            $deleteSup->delete();
            return redirect()->route('datasuplier')->with('pesanbenar','');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('databarang')->with('error','');
        }
       
    }




}
