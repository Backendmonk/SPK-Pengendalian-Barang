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
    <center><h1>Pilih Rentang Waktu</h1></center>
    <br>
    <form action="">
<div class="row">
    
    <div class="col">
        <select class="form-control" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">JANUARI</option>
            <option value="2">FEBRUARI</option>
            <option value="3">MARET</option>
            <option value="4">APRIL</option>
            <option value="5">MEI</option>
            <option value="6">JUNI</option>
            <option value="7">JULI</option>
            <option value="8">AGUSTUS</option>
            <option value="9">SEPTEMBER</option>
            <option value="10">OKTOBER</option>
            <option value="11">NOVEMBER</option>
            <option value="12">DESEMBER</option>
  
          </select>
    </div>
    Sampai
    <div class="col">
        <select class="form-control" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">JANUARI</option>
            <option value="2">FEBRUARI</option>
            <option value="3">MARET</option>
            <option value="4">APRIL</option>
            <option value="5">MEI</option>
            <option value="6">JUNI</option>
            <option value="7">JULI</option>
            <option value="8">AGUSTUS</option>
            <option value="9">SEPTEMBER</option>
            <option value="10">OKTOBER</option>
            <option value="11">NOVEMBER</option>
            <option value="12">DESEMBER</option>
  
          </select>
    </div>
  </div>
  <br>

  <button class = "btn btn-primary" type ="submit">Analisis</button>
</form>



    
@endsection