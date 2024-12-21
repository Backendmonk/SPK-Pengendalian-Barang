<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
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


    public function inputPenjualanView(){
        $Arraybarang = [
            'databarang'=>ModelBarang::all()
        ];
        return view('Penjualan.TambahPenjualan',$Arraybarang);
    }


    public function DetailBarang(Request $reqid){


        $id = $reqid->id;

        $Arraybarang = [
            'databarang'=>ModelBarang::find($id)
        ];

        return view('Penjualan.Detailbarang',$Arraybarang);
    }



    public function InputPenjualan(Request $reqData){

        $id = $reqData->id;
        $namabarang = $reqData->namabarang;
        $hargajual = $reqData->hargajual;
        $qtyawal = $reqData->qty;
        $qtyjual = $reqData->qtytambah;
        $total = $hargajual*$qtyjual;
        $qtyAkhir = $qtyawal - $qtyjual;


            if ($qtyawal< $qtyjual ) {
                # code...
                return redirect()->route('datapenjualanbarang')->with('errorqty','');
            }else{

                try {
                    //code...
                    $InputDoDbPenjualan = new ModelPenjualan();
    
                    $InputDoDbPenjualan->id_barang = $id;
                    $InputDoDbPenjualan->nama_barang = $namabarang;
                    $InputDoDbPenjualan->harga_barang = $hargajual;
                    $InputDoDbPenjualan->qty = $qtyjual;
                    $InputDoDbPenjualan->total_bayar = $total;
                    $InputDoDbPenjualan->save();
                     
                    ///
    
    
                    $updateBarang = ModelBarang::find($id);
    
                    $updateBarang->stok=$qtyAkhir;
                      $updateBarang->save();
                   
                   
    
                   return redirect()->route('datapenjualanbarang')->with('pesanbenar','');
                  } catch (\Throwable $th) {
                    //throw $th;
                    return redirect()->route('datapenjualanbarang')->with('error','');
                  }

            }
            

             
                    //code...
                   
                    

               

            
       
        
        


    }


    
}
