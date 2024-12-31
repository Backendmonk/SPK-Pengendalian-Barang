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
    <center><h1>Pilih Rentang Waktu Data Penjualan</h1></center>
    <br>
    <form action="">
<div class="row">
    
    <div class="col">
        <input type="date" class = "form-control" name = "hari1">
    </div>
    Sampai
    <div class="col">
        <input type="date" class = "form-control" name = "hari2">
    </div>
  </div>
  <br>

  <button class = "btn btn-primary" type ="submit">Analisis</button>
</form>



    
@endsection