import DataTable from 'datatables.net-dt';
 
import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';
let table = new DataTable('#users-table',{
    responsive : true
});

$(document).ready(function () {
    $('#users-table').DataTable({
        "bJQueryUI":true,
      "bSort":false,
      "bPaginate":true,
      "sPaginationType":"full_numbers",
       "iDisplayLength": 10,
        layout: {
            bottomEnd: {
                paging: {
                    firstLast: false
                }
            }
        }
    });
})

function loadContent(url) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", url);
  xhttp.send();
  xhttp.onreadystatechange = (e) => {
    document.getElementById("demo") = xhttp.responseText;
  }
  alert('ok')
}