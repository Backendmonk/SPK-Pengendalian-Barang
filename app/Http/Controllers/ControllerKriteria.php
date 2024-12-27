<?php

namespace App\Http\Controllers;

use App\Models\ModelKriteria;
use Illuminate\Http\Request;

class ControllerKriteria extends Controller
{
    //


    public function DataKriteria(){

        $arraykriteria  = [
            'datakriteria'=>ModelKriteria::all()
        ];

        return view('Kriteria.DataKriteria',$arraykriteria);
    }


    public function inputKriteriaView(){
            $CekJumlahKriteria = ModelKriteria::all()->count();

           
            if ($CekJumlahKriteria > 0  ) {
                return redirect()->route('datakriteria')->with('ktada','');
                
                
                
            }else{
                return view('Kriteria.TambahKriteria');
                
            }
        
    }


    public function KriteriaAdd(Request $reqkriteriadata){


        $biayasimpan = $reqkriteriadata->bsimpan;
        $biayapesan = $reqkriteriadata->pesan;
        $waktu = $reqkriteriadata->waktu;
        $waktutunggu = $waktu/30;
        $pengamanan = $reqkriteriadata->pengamanan;

        try {
            //code...


            $inputToTBKriteria  = new ModelKriteria;

                    $inputToTBKriteria->biaya_simpan = $biayasimpan;
                    $inputToTBKriteria->biaya_pesan = $biayapesan;
                    $inputToTBKriteria->waktu_tunggu =$waktutunggu;
                     $inputToTBKriteria->kebutuhan_pengaman = $pengamanan;
                
                     $inputToTBKriteria->save();

                     return redirect()->route('datakriteria')->with('pesanbenar','');

                    
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('datakriteria')->with('error','');

        }

    }


    public function hapuskriteria(Request $reqid){

        $id = $reqid->id;

        $fidID = ModelKriteria::find($id);

        $fidID->delete();
        return redirect()->route('datakriteria')->with('pesanbenar','');


    }


}
