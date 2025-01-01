$(document).ready(function() {
  $('#dataTable').DataTable({
      "dom": 'Bfrtip', // Tambahkan tombol di atas tabel
      "buttons": [
          {
              extend: 'print',
              text: 'Print Data', // Label tombol print
              exportOptions: {
                  modifier: {
                      page: 'all' // Cetak seluruh data, bukan hanya halaman aktif
                  }
              }
          }
      ]
  });


  $('#dataTableSec').DataTable({
    "dom": 'Bfrtip', // Tambahkan tombol di atas tabel
    "buttons": [
        {
            extend: 'print',
            text: 'Print Data', // Label tombol print
            exportOptions: {
                modifier: {
                    page: 'all' // Cetak seluruh data, bukan hanya halaman aktif
                }
            }
        }
    ]
});

$('#dataTableth').DataTable({
  "dom": 'Bfrtip', // Tambahkan tombol di atas tabel
  "buttons": [
      {
          extend: 'print',
          text: 'Print Data', // Label tombol print
          exportOptions: {
              modifier: {
                  page: 'all' // Cetak seluruh data, bukan hanya halaman aktif
              }
          }
      }
  ]
});




});




