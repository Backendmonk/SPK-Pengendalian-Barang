@extends('Template.main')

@section('judul')
    Dashboard
@endsection

    
@section('isi')
<center><h3><b>Selamat Datang</b></h3></center>

<div class="row">
 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Barang Dijual</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangdijualtotal }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Pembelian</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangdibelitotal }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total pendapatan 
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">RP {{ number_format($pendapatan->total,0,'.','.') }}</div>
                        </div>
                      
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Pengeluaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">RP {{ number_format($pengeluaran->total,0,'.','.') }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-box fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Best Seller</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableExample" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Penjualan</th>
                        <th>Nama barang</th>
                        <th>Harga Barang</th>
                        <th>Qty Jual</th>
                        <th>Total</th>
                        {{-- <th colspan="2">Tools</th> --}}
                        
                    </tr>
                </thead>

                

                
                <tbody>

                    @foreach ($DataPenjualan as $data)
                    <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nama_barang}}</td>
                            <td>Rp {{ number_format($data->harga_barang,0,'.','.') }}</td>
                            <td>{{ $data->qty }}</td>
                            <td>RP {{ number_format($data->total_bayar,0,'.','.') }}</td>
                            {{-- <td>

                                    <form action="/editBarang" method="POST">
                                        @csrf
                                        <input type="text" name = "id" value = "{{ $data->id }}" hidden>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-cogs"></i></button>    
                                    </form>
                                   
                            </td>
                            <td> <form action="/hapusBarang" method="POST">
                                @csrf
                                <input type="text" name = "id" value = "{{ $data->id }}" hidden>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>    
                            </form>
                        </td> --}}

                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection