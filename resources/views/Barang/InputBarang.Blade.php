@extends('Template.main')

@section('judul')
    Input Barang
@endsection


@section('isi')


    
    <center><h1>INPUT BARANG</h1></center>
    <BR></BR>
<form method="POST" action="/BarangAdd" >
     @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
      <input type="text" name = "kodebarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
        <input type="text" name = "namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Harga Beli Barang</label>
        <input type="text" name ="hargabeli" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Harga Jual</label>
        <input type="text" name = "hargajual" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Qty Awal</label>
        <input type="text" name = "qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection