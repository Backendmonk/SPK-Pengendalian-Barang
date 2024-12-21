@extends('Template.main')

@section('judul')
    Input Suplier
@endsection


@section('isi')


    
    <center><h1>INPUT Kriteria</h1></center>
    <BR></BR>
<form method="POST" action="/KriteriaAdd" >
     @csrf

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Biaya Simpan</label>
        <input type="number"     required name = "bsimpan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Biaya Pesan</label>
        <input type="number" required name = "pesan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Waktu Tunggu</label>
        <input type="number" required name = "waktu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kebutuhan Pengamanan</label>
        <input type="number" required name = "pengamanan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>


    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection