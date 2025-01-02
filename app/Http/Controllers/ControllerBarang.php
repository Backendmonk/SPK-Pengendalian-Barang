<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelPembelian;
use App\Models\ModelPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast;

class ControllerBarang extends Controller
{
    //

    public function indexBarang(){

      if (Auth::guest()) {
        # code...
        return redirect('/');
      }else{

        $Arraypenjualan = [
            'DataPenjualan'=>ModelPenjualan::select('*')
            ->orderByRaw('CAST(total_bayar AS UNSIGNED)DESC')
            ->limit(5)
            ->get(),


            'barangdijualtotal'=>ModelPenjualan::count('id'),
            'barangdibelitotal'=>ModelPembelian::count('id'),

            'pendapatan'=>ModelPenjualan::select(DB::raw('SUM(total_bayar)AS total'))->first(),
            'pengeluaran'=>ModelPembelian::select(DB::raw('SUM(total)AS total'))->first(),
            
        ];
        return view('Barang.Dashboard',$Arraypenjualan);
      }   
    }


    //menus

    public function DataBarang(){

        $getData  = [

                'databarang'=>ModelBarang::all(),
        ];
        return view('Barang.DataBarang',$getData);
        
    }



    //views


    public function inputBarangView(){


        return view('Barang.InputBarang');
    }


    public function editBarang(Request $reqdata){


        $id= $reqdata ->id;

                $dataArray = [

                    'databarang'=>ModelBarang::find($id),
                ];
        
                return view('Barang.EditBarangForm',$dataArray);
    }




    ///Databases 


    public function BarangAdd(Request $reqDataBarang ){

        $KodeBarang = $reqDataBarang->kodebarang;
        $NamaBarang = $reqDataBarang->namabarang;
        $Hargabeli = $reqDataBarang->hargabeli;
        $HargaJual = $reqDataBarang->hargajual;
        $Qty =$reqDataBarang->qty;
        

        $cekketersediaan = ModelBarang::where('Kode_barang','=',$KodeBarang)->count('Kode_barang');
        
            if ($cekketersediaan > 0) {
                return redirect()->route('databarang')->with('PesanAdaBarang','');
            }else{

                try {

                    $INputBarang = New ModelBarang;
    
                    $INputBarang ->Kode_barang =$KodeBarang;
                    $INputBarang->nama_barang = $NamaBarang;
                    $INputBarang ->harga_beli =$Hargabeli;
                    $INputBarang->harga_jual= $HargaJual;

                    $INputBarang->stok= $Qty;


                    $INputBarang->save();

                    return redirect()->route('databarang')->with('pesanbenar','');
                    
    
    
                } catch (\Throwable $th) {
                    //throw $th;

                    return redirect()->route('databarang')->with('error','');
                }

            }

    }




    public function UpdateBarang(Request $reqdataUpdate){


        $id = $reqdataUpdate ->id;
        $KodeBarang = $reqdataUpdate->kodebarang;
        $NamaBarang = $reqdataUpdate->namabarang;
        $Hargabeli = $reqdataUpdate->hargabeli;
        $HargaJual = $reqdataUpdate->hargajual;
        $Qty =$reqdataUpdate->qty;


        try {
            //code...

            $Updatedata = ModelBarang::find($id);

            $Updatedata ->Kode_barang =$KodeBarang;
            $Updatedata->nama_barang = $NamaBarang;
            $Updatedata ->harga_beli =$Hargabeli;
            $Updatedata->harga_jual= $HargaJual;

            $Updatedata->stok= $Qty;


            $Updatedata->save();
            return redirect()->route('databarang')->with('pesanbenar','');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('databarang')->with('error','');
        }

    
    }


    public function hapusBarang(Request $reqdataHapus){

        $id = $reqdataHapus->id;


        try {
            //code...

            $datatable = ModelBarang::find($id);
            $datatable->delete();
            return redirect()->route('databarang')->with('pesanbenar','');

            
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('databarang')->with('error','');
        }
       
    }
}
