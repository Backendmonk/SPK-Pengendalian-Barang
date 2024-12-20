@extends('Template.main')

@section('judul')
    Dashboard
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



@if (session()->has('errorqty'))
<script>

    Swal.fire({
    title: "Error",
    text: "Quantity Beli Tidak Boleh Lebih Besar Dari Stok",
    icon: "error"
    });
</script>
@endif

    <br>
    <center><h1>Data Penjualan</h1>
    
            <form action="/inputPenjualanView" method="POST">
                @csrf
                        <button type ="submit" class = "btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah Penjualan</button>
                </form>
    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penjualan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <td>{{ $data->harga_barang }}</td>
                            <td>{{ $data->qty }}</td>
                            <td>{{ $data->total_bayar }}</td>
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