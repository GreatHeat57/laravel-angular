jQuery(document).ready(function (){
    var table;
    var importedCount = 0; var idsAry = Array();
    var loadHtml = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
    var loadDoneHtml = '<i class="fas fa-check text-primary" style="font-size: 1.6rem;"></i>';
    var loadErrorHtml = '<i class="fas fa-times text-red" style="font-size: 1.6rem;"></i>';
    function makeDtable() {
        table = $('#tbl-feed-list').DataTable({
            "paging": true,
            // "lengthMenu": [[2, 10, 50, -1], [2, 10, 50, "All"]],
            "searching": false,
            "ordering": false,
            "pageLength": 10,
            "lengthChange": false,
            "info": true,
            "autoWidth": false,
            "stateSave": false,
            "columns": [
                { className: "text-right", "searchable": false },
                { className: "text-center" },
                { className: "text-center" },
                { className: "text-center" },
                { className: "text-center" },
                { className: "text-center" },
                { "width": "10%", className: "text-center", "orderable": false, "searchable": false },
                { className: "text-center"},
            ], "rowCallback": function (row, data) {
                $('td:eq(0)', row).html(row._DT_RowIndex+1);
            }, "drawCallback": function (settings) {
                // alert('DataTables has redrawn the table');
            }
        });
    }

    $('#tbl-feed-list tbody tr').each(function (i, ele) {
        var id = $(ele).children('td').eq(6).attr('data-id');
        idsAry[i] = id;
        if ((i+1) == $('#tbl-feed-list tbody tr').length) makeDtable();
    });
    
    $('#tbl-feed-list').show();

    function importFeed(id) {
        if (!$('#tbl-feed-list tr[data-index="' + importedCount + '"] td').eq(7).children('div').children('input').prop('checked')) {
            if (importedCount < (idsAry.length - 1)) {
                importedCount++;
                importFeed(idsAry[importedCount]);
                if (Math.ceil(importedCount / table.page.len()) > table.page()) $('#tbl-feed-list_next').click();
            } else {
                $('#btn-import-feed').removeClass('disabled');
            }
            return;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: '/importing-feeds',
            beforeSend: function() {
                $('#tbl-feed-list td[data-id="' + id + '"]').html(loadHtml);
            },
            data: {
                'id' : id
            }, success: function (data) {
                $('#tbl-feed-list td[data-id="' + id + '"]').html(loadDoneHtml+data['res']);
                if (importedCount < (idsAry.length-1)) {
                    importedCount ++;
                    importFeed(idsAry[importedCount]);
                    if (Math.ceil(importedCount / table.page.len()) > table.page()) $('#tbl-feed-list_next').click();
                } else {
                    $('#btn-import-feed').removeClass('disabled');
                }
            }, error: function (e) {
                $('#tbl-feed-list td[data-id="' + id + '"]').html(loadErrorHtml);
                $('#btn-import-feed').removeClass('disabled');
            }, type: 'get', dataType: 'json', timeout: 1000000
        });
    }

    function loadFeedConfig() {
        $('#btn-import-feed').addClass('disabled');
        importedCount = 0;
        importFeed(idsAry[importedCount]);
    }

    $('#btn-import-feed').click(function () { 
        if( $(this).hasClass('disabled')) return;
        loadFeedConfig();
    });

    $('#active_state_all').click(function(){
        if($(this).hasClass('checked')) {
            $('#tbl-feed-list tbody input[type="checkbox"]').prop('checked', false);
            $(this).removeClass('checked');
        }
        else {
            $('#tbl-feed-list tbody input[type="checkbox"]').prop('checked', true);
            $(this).addClass('checked');
        }
    });

});