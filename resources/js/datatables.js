import DataTable from 'datatables.net-dt';
// import 'datatables.net-responsive-dt';
import $ from'jquery';

// #README: https://stackoverflow.com/questions/5990386/datatables-search-box-outside-datatable


$('#search-input-users').keyup(function() {
    var table = $('#users-table').DataTable();
    table.search($(this).val()).draw();
});

// // ! tabel edit cuti
// var table = $('#table-edit-cuti').DataTable({
//     columnDefs: [
//         {
//             orderable: false,
//             targets: [1, 2]
//         },
//     ],
//     "paging":false,
// });

// $('#submit').on('click', function (e) {
//     e.preventDefault();
    
//     var data = table.$('input, select').serialize();
    
//     alert(
//         'The following data would have been submitted to the server: \n\n' +
//         data.substr(0, 120) +
//         '...'
//     );
// });

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

// #TODO: buat search custom untuk datatables
// ! Tabel Users



let statusValidasi = $('#filter-status').val();

const tableUsers = $('#tableUsers').DataTable({
    pageLength: 100,
    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'semua']],
    bLengthChange: true,
    bFilter: true,
    bInfo: true,
    processing:true,
    bServerSide: true,
    order: [[ 1, "desc" ]],
    autoWidth: false,
        ajax: {
            url : "{{route('filter.status', 'data')}}",
            type: "POST",
            data : function(d){
                d.statusValidasi = statusValidasi
                return d
            }
        },
      
    });

    $('.filter').on('change',function() {
        alert('ok');

       statusValidasi = $('#filter-status').val();
        tableUsers.ajax.reload(null,false)
    });