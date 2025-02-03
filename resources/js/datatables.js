import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';
import $ from'jquery';

// #README: https://stackoverflow.com/questions/5990386/datatables-search-box-outside-datatable

// #TODO: buat search custom untuk datatables
// let table = new DataTable('#users-table', {
//     responsive: true,
//     searching:false,
// });
// let input = document.getElementById("#search-input-users");
// input.keyup(function(){
//     var table = $('#users-table').DataTable();
//     table.search($(this).val()).draw();
// });

// oTable = $('#users-table').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// $('#search-input-users').keyup(function(){
//       oTable.search($(this).val()).draw() ;
// })
// $('#users-table').DataTable()
$('#search-input-users').keyup(function() {
    var table = $('#users-table').DataTable();
    table.search($(this).val()).draw();
});

// ! tabel edit cuti
var table = $('#table-edit-cuti').DataTable({
    columnDefs: [
        {
            orderable: false,
            targets: [1, 2]
        },
    ],
    "paging":false,
});
 
$('#submit').on('click', function (e) {
    e.preventDefault();
 
    var data = table.$('input, select').serialize();
 
    alert(
        'The following data would have been submitted to the server: \n\n' +
            data.substr(0, 120) +
            '...'
    );
});

function myFunction() {
    var dots = document.getElementById("selengkapnya");
    var moreText = document.getElementById("hiddent-content");
    var btnText = document.getElementById("lihatBtn");
    alert('ok');
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less";
      moreText.style.display = "inline";
    }
  }