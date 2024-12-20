<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelPembelian;
use App\Models\ModelSuplier;
use Illuminate\Http\Request;

class ControllerPembelian extends Controller
{
    //


    public function DataPermbelianBarang(){

        $Arraypembelian = [
            'DataPembelian'=>ModelPembelian::all()
        ];

        return view('Pembelian.DataPembelian',$Arraypembelian);
    }


    public function inputPembelianView(){
        $Arraybarang = [
            'databarang'=>ModelBarang::all()
        ];
        return view('Pembelian.TambahPembelian',$Arraybarang);
    }


    public function DetailBarang(Request $reqid){


        $id = $reqid->id;

        $Arraybarang = [
            'databarang'=>ModelBarang::find($id),
            'datasuplier'=>ModelSuplier::all()
        ];

        return view('Pembelian.Detailbarang',$Arraybarang);
    }



    public function InputPembelian(Request $reqData){

        $id = $reqData->id;
        $namabarang = $reqData->namabarang;
        $hargabeli = $reqData->hargabeli;
        $qtyawal = $reqData->qty;
        $suplier = $reqData->suplier;
        $qtytambah = $reqData->qtytambah;
        $total = $hargabeli*$qtytambah;
        $qtyAkhir = $qtyawal + $qtytambah;

        $selectnamasup = ModelSuplier::where('id','=',$suplier)->first();
        $namasuplier = $selectnamasup->nama_suplier;


            

              try {
                //code...
                $InputDoDbPembelian = new ModelPembelian;

                $InputDoDbPembelian->id_suplier = $suplier;
                $InputDoDbPembelian->id_barang = $id;
                $InputDoDbPembelian->nama_barang = $namabarang;
                $InputDoDbPembelian->hargabeli = $hargabeli;
                $InputDoDbPembelian->qty = $qtyAkhir;
                $InputDoDbPembelian->total = $total;
                $InputDoDbPembelian->nama_suplier = $namasuplier;
                $InputDoDbPembelian->save();
                
                
                


                ///


                $updateBarang = ModelBarang::where('Kode_barang','=',$id)->first();

                $updateBarang->stok=$qtyAkhir;
                  $updateBarang->save();
               
               

               return redirect()->route('datapembelianbarang')->with('pesanbenar','');
              } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('datapembelianbarang')->with('error','');
              }
                    //code...
                   
                    

               

            
       
        
        


    }

    
}
