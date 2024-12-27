@extends('Template.main')

@section('judul')
    Input Barang
@endsection


@section('isi')


    
    <center><h1>INPUT Pembelian</h1></center>
    <BR></BR>
<form method="POST" action="/InputPenjualan" >
     @csrf

     <input type="text" hidden value ="{{ $databarang->id }}" name = "id">
    <div class="mb-3">
      <label for="kodebarang" class="form-label">Kode Barang</label>
      <input type="text" name = "kodebarang" class="form-control" id="kodebarang" aria-describedby="emailHelp" value="{{  $databarang->Kode_barang }}" readonly>
      
    </div>


    <div class="mb-3">
        <label for="namabarang" class="form-label">Nama Barang</label>
        <input type="text" required readonly name = "namabarang" class="form-control" id="namabarang" aria-describedby="emailHelp" value="{{  $databarang->nama_barang }}">
        
      </div>


      <div class="mb-3">
        <label for="hargabeli" class="form-label">Harga Jual Barang</label>
        <input type="text" readonly required name ="hargajual" class="form-control" id="hargabeli" aria-describedby="emailHelp" value="{{  $databarang->harga_jual }}">
       
        
      </div>

      <div class="mb-3">
        <label for="qtyawal" class="form-label">Stok Tersedia</label>
        <input type="text" required name = "qty" class="form-control" id="qtyawal" aria-describedby="emailHelp" readonly value="{{  $databarang->stok }}" readonly>
      </div>

      

      <div class="mb-3">
        <label for="qtytambah" class="form-label">Qty Beli</label>
        <input type="number" name="qtytambah" class="form-control" id="qtytambah" 
               placeholder="Masukkan Qty Tambah" required>
    </div>

    <div class="mb-3">
        <label for="totalharga" class="form-label">Harga Harus Dibayar</label>
        <input type="text" name="totalharga" class="form-control" id="totalharga" 
               placeholder="Total Harga" readonly>
    </div>
    @php
        $date = date('Y-m-d');
    @endphp
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" name="tanggal" class="form-control" id="tanggal Penjualan" 
             placeholder="Tanggal" value ="{{ $date }}">
  </div>


    <!-- js -->

    <script>
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const hargaBeli = document.getElementById('hargabeli');
            const qtyTambah = document.getElementById('qtytambah');
            const totalHarga = document.getElementById('totalharga');
    
            function updateTotalHarga() {
                const harga = parseFloat(hargaBeli.value) || 0;
                const qty = parseFloat(qtyTambah.value) || 0;
               const total = harga * qty; // Menghitung total harga
               totalHarga.value =formatRupiah(total)

            }
    
            // Tambahkan event listener
            qtyTambah.addEventListener('input', updateTotalHarga);
        });
    </script>
    



         <button type="submit" class="btn btn-primary">Submit</button>
    


     

  </form>

@endsection