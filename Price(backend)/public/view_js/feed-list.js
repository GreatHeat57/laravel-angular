jQuery(document).ready(function (){
    
    // var pageNum = GetCookie('feedPage');
    // if (pageNum == "") SetCookie('feedPage', 0, 10);
    var table = $('#tbl-feed-list').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "stateSave": true,
        "columns": [
            { "width": "1%", className: "text-left", "searchable": false },
            { "width": "15%", className: "text-center" },
            { "width": "60%", className: "text-left" },
            { "width": "5%", className: "text-center" },
            { "width": "3%", className: "text-center" },
            { "width": "3%", className: "text-center" },
            { "width": "8%", className: "text-center" },
            { "width": "8%", className: "text-center", "orderable": false, "searchable": false },
        ], "rowCallback": function (row, data) {
            $('td:eq(0)', row).html(row._DT_RowIndex+1);
        }, "drawCallback": function (settings) {
            // alert('DataTables has redrawn the table');
        }
    });
    
    function Setpage() {
        if (!setPageFlage) {
            setPageFlage = true;
            $('#tbl-feed-list').page(Number(pageNum)).draw('page');
            SetCookie('feedPage', "", 10);
        }
        SetCookie('feedPage', table.page(), 10);
    }
    
    var setPageFlage = false;
    // Setpage();
    $('#tbl-feed-list').show();
    table.on('draw', function () {
        // alert();
        // if (!setPageFlage) {
        //     setPageFlage = true;
        //     table.page(Number(pageNum)).draw('page');
        //     SetCookie('feedPage', "", 10);
        // }
        // SetCookie('feedPage', table.page(), 10);
        OverLayer($('#tbl-feed-list'), 'break');
    });
    
    function delCategory(id, delTr) {
        OverLayer($('#tbl-feed-list'), 'draw');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: '/feed-config/' + id,
            success: function (data) {
                OverLayer($('#tbl-feed-list'), 'break');
                table.row(delTr).remove().draw('page');

            }, error: function (e) {
                OverLayer($('#tbl-feed-list'), 'break');
            }, type: 'DELETE', dataType: 'json', timeout: 1000000
        });
    }

    $('#tbl-feed-list').on('click', 'a.del-feed', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var delTr = $(this).parents('tr');
                delCategory($(this).attr('data-id'), delTr);
            }
        })
    });
    $('#tbl-feed-list').on('click', 'a.edit-feed', function () {
        $('#form-edit-act').attr('action', '/feed-config/' + $(this).attr('data-id') + '/edit');
        OverLayer($('#tbl-feed-list'), 'draw');
        $('#form-edit-act').submit();
    });
    $('#a-refresh-tbl').click(function () {
        OverLayer($('#tbl-feed-list'), 'draw');
        table.ajax.reload(null, false);
    });

});