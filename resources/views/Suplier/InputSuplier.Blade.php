@extends('Template.main')

@section('judul')
    Input Suplier
@endsection


@section('isi')


    
    <center><h1>INPUT Suplier</h1></center>
    <BR></BR>
<form method="POST" action="/SuplierAdd" >
     @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Suplier</label>
        <input type="text" required name = "namasup" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>


    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection