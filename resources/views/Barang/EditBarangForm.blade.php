@extends('Template.main')

@section('judul')
    Input Barang
@endsection


@section('isi')


    
    <center><h1>INPUT BARANG</h1></center>
    <BR></BR>
<form method="POST" action="/UpdateBarang" >
     @csrf

     <input type="text" hidden value ="{{ $databarang->id }}" name = "id">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Kode Barang</label>
      <input type="text" name = "kodebarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $databarang->Kode_barang }}" readonly>
      
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
        <input type="text" name = "namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $databarang->nama_barang }}">
        
      </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Harga Beli Barang</label>
        <input type="text" name ="hargabeli" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $databarang->harga_beli }}">
        <small>Harga Beli Akan mempengaruhi harga Beli produk selanjutnya</small>
        
      </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Harga Jual</label>
        <input type="text" name = "hargajual" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  $databarang->harga_jual }}">
        <small>Harga Jual Akan mempengaruhi harga Jual produk selanjutnya</small>
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Qty Awal</label>
        <input type="text" name = "qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{  $databarang->Kode_barang }}" readonly>
        <small>Qty tidak bisa diubah manual</small>
        
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>

@endsection