<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelKriteria;
use App\Models\ModelPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EoqController extends Controller
{
    //

    public function AnalisisEOQ(){

        return view('EOQ.AnalisisEOQ');
    }



    public function analisis(request $reqday){

        $dayfirst = $reqday->hari1;
        $daysec = $reqday->hari2;

        $timeF = strtotime($dayfirst);
        $timeL = strtotime($daysec);


        if ($daysec < $dayfirst) {
           return redirect()->route('AnalisisE')->with('ErrorBesar','');
        }elseif ($daysec ==''|| $dayfirst=='') {
            return redirect()->route('AnalisisE')->with('ErrorKosong','');
        }else{
        
            $arrayTOTable  = [
                //dipakai jika ingin menggunakan sintax seperti SELECT(nama,id,dll) SUM(id) WHERE
                'callTbPenjualan'=>ModelPenjualan::whereBetween('tanggal',[$dayfirst,$daysec])
                ->select('id_barang','nama_barang','harga_barang',DB::raw('SUM(qty) as totalqty'))
                ->groupby('id_barang','nama_barang','harga_barang')
                ->get(),
                
                'EOQ'=>ModelKriteria::first(),
                'selisihbulan'=>(date('Y', $timeL) - date('Y', $timeF)) * 12 + (date('m', $timeL) - date('m', $timeF)) + 1,

            ];

            return view('EOQ.HasilAnalisis',$arrayTOTable);
           

            
            
        }

        
    }
}
