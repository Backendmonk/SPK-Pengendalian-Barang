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

    <br>
    <center><h1>Data Suplier</h1>
    
            <form action="/inputSupView" method="POST">
                @csrf
                        <button type ="submit" class = "btn btn-primary"><i class="fa fa-truck" aria-hidden="true"></i> Tambah Suplier</button>
                </form>
    </center>

                
    <br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Suplier</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Suplier</th>
                        
                        <th colspan="2">Tools</th>
                        
                    </tr>
                </thead>

                

                
                <tbody>

                    @foreach ($datasup as $data)
                    <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nama_suplier}}</td>
                            
                            <td>

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
                        </td>

                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
    </div>
</div>




    
@endsection