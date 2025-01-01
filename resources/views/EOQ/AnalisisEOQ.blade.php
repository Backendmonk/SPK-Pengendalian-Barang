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



@if (session()->has('ErrorBesar'))
<script>

    Swal.fire({
    title: "Error",
    text: "Waktu ke dua Tidak Boleh Lebih Kecil",
    icon: "warning"
    });
</script>
@endif


@if (session()->has('ErrorKosong'))
<script>

    Swal.fire({
    title: "Error!",
    text: "Salah Satu Waktu Kosong",
    icon: "warning"
    });
</script>
@endif
    <center><h1>Pilih Rentang Waktu Data Penjualan</h1></center>
    <br>
    <form action="/analisis" method="post">
        @csrf
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