$.extend( true, $.fn.dataTable.defaults, {
    "searching": false
} );
$(document).ready( function () {
    $('#principal').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    } );
} );