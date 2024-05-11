function filterGlobal () {
    $('#advanced_table').DataTable().search(
        $('#global_filter').val()
    ).draw();
}
function filterColumn ( i ) {
    $('#advanced_table').DataTable().column( i ).search(
        $('#col'+i+'_filter').val()
    ).draw();
}

$(document).ready(function() {
    $('#table').DataTable({
        responsive: false,
        select: true,
        'columnDefs': [{
            'type': "num",
            'targets': 0,
        }],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json"
        }
    });
    
   $(document).ready(function(){
        $('#table1').DataTable({
            responsive: false,
            select: true,
            'columnDefs': [{
                'type': "num",
                'targets': 0,
            }],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json"
            }
            })
        });
    
    $('#data_table tbody').on( 'click', 'tr', function() {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $("#advanced_table").DataTable({
        responsive: false,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });
    $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).attr('data-column') );
    });
});

