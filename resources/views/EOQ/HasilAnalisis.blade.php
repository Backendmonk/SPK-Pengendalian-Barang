@extends('Template.main')

@section('judul')
    Hasil Analisis
@endsection


@section('isi')
    

@if (session()->has('pesanbenar'))
<script>

    Swal.fire({
    title: "Good job!",
    text: "Data Kamu Tersimpan!",
    icon: "success"
    });
</script>
    
@endif



@if (session()->has('PesanAdaBarang'))
<script>

    Swal.fire({
    title: "barang Ada!",
    text: "Barang tersebut Sudah Terinput",
    icon: "warning"
    });
</script>
@endif


@if (session()->has('error'))
<script>

    Swal.fire({
    title: "Error",
    text: "KELASAHAN",
    icon: "error"
    });
</script>
@endif

    <br>
    <center><h1>Hasil Analisis EOQ</h1>
    

    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Analisis EOQ</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah kebutuhan</th>
                        <th>Harga</th>
                        <th>EOQ</th>
                        
                    </tr>
                </thead>



                
                <tbody>
                    @foreach ($callTbPenjualan as $penjualan)
                    
                    <tr>
                       
                       
                        <td>{{ $penjualan->id_barang }}</td>
                        <td>{{ $penjualan->nama_barang }}</td>
                        <td>{{ $penjualan->totalqty }}</td>
                        <td>RP {{ number_format($penjualan->harga_barang,0,'.','.')  }}</td>
                        <td>@php
                            
                                //diketahui 
                                $S = $EOQ->biaya_pesan;
                                $H = $EOQ->biaya_simpan;
                                $D = $penjualan->totalqty;
                            $hasilEOQ = (2*$S*$D)/$H;

                            echo number_format($hasilEOQ,0,'.','.');
                        @endphp</td>
                    </tr>
                    @endforeach
          
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Table Pendukung-->
<!-- MIN MAX-->


<br>
    <center><h1>Hasil Pendukung MAX MIN</h1>
    

    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Pendukung Max MIN</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableSec" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Rata-Rata Kebutuhan</th>
                        <th>Kebutuhan Pengamanan</th>                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($callTbPenjualan as $data)
                    <tr>
                        <td>{{ $data->id_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>

                        @php
                           

                              $RataRataPemesanan = $data->totalqty;
                              $Averagekebutuhan= $RataRataPemesanan/$selisihbulan;


                              $persen = $EOQ->kebutuhan_pengaman/100;
                              $kebPengaman =  $Averagekebutuhan* $persen;

                               

                        @endphp


                        <td> @php
                           
                                echo $Averagekebutuhan; 
                        @endphp
                        </td>
                        <td>
                            @php
                                
                                echo  $kebPengaman;
                            @endphp
                              
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <small>Rata rata pemesanan Akan dibagi secara otomatis sesuai selisih bulan yang dipilih</small>
            </table>
        </div>
    </div>
</div>


<!-- MIN MAX-->


<br>
    <center><h1>Hasil  MAX MIN</h1>
    

    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Max MIN</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableth" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>MAX</th>
                        <th>MIN</th>
                        
                        <th>Q</th>
                        
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($callTbPenjualan as $data)
                    <tr>
                        <td>{{ $data->id_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>

                        @php

                            //deklarasi variable
                                $S = $EOQ->biaya_pesan;
                                $H = $EOQ->biaya_simpan;
                                $D = $data->totalqty;
                                $lead  = $EOQ->waktu_tunggu;

                            $hasilEOQ = (2*$S*$D)/$H;

                           

                              $RataRataPemesanan = $data->totalqty;
                              $Averagekebutuhan= $RataRataPemesanan/$selisihbulan;


                              $persen = $EOQ->kebutuhan_pengaman/100;
                              $kebPengaman =  $Averagekebutuhan* $persen;

                               

                        @endphp


                        <td> @php
                            $max = round($hasilEOQ +  $kebPengaman);
                                echo $max; 
                        @endphp
                        </td>
                        <td>
                            @php
                                $min =($lead + $Averagekebutuhan ) + $kebPengaman; 
                                echo $min;
                            @endphp
                              
                        </td>
                        <td>

                            @php
                                
                                echo $max-$min;
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- <small>Rata rata pemesanan Akan dibagi secara otomatis sesuai selisih bulan yang dipilih</small> --}}
            </table>
        </div>
    </div>
</div>





    
@endsection