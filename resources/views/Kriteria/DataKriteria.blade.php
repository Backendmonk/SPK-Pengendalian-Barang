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


@if (session()->has('ktada'))
<script>

    Swal.fire({
    title: "Error",
    text: "Hapus Kriteria Saat Ini",
    icon: "error"
    });
</script>
@endif

    <br>
    <center><h1>Data Kriteria</h1>
    
            <form action="/inputKriteriaView" method="POST">
                @csrf
                        <button type ="submit" class = "btn btn-primary"><i class="fa fa-book" aria-hidden="true"></i> Tambah Kriteria</button>
                </form>
    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th>Biaya Simpan</th>
                        <th>Biaya Pesan</th>
                        <th>Waktu Tunggu</th>
                        <th>Kebutuhan Pengaman</th>
                        {{-- <th colspan="2">Tools</th> --}}
                        
                    </tr>
                </thead>

                

                
                <tbody>

                    @foreach ($datakriteria as $data)
                    <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->biaya_simpan}}</td>
                            <td>{{ $data->biaya_pesan}}</td>
                            <td>{{ $data->waktu_tunggu}}</td>
                            <td>{{ $data->kebutuhan_pengaman}}</td>
                           
                            <td> <form action="/hapusKriteria" method="POST">
                                @csrf
                                <input type="text" name = "id" value = "{{ $data->id }}" hidden>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>    
                            </form>
                        </td> 

                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
    </div>
</div>




    
@endsection