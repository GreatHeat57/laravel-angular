jQuery(document).ready(function (){

    // $('#tbl-feed-list').DataTable();

    var table = $('#tbl-category-list').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "stateSave": true,
        "columns": [
            { "width": "1%", className: "text-left", "searchable": false },
            { "width": "10%", className: "text-center" },
            { "width": "41%", className: "text-left" },
            { "width": "41%", className: "text-left" },
            { "width": "7%", className: "text-center", "orderable": false, "searchable": false },
        ], "rowCallback": function (row, data) {
            $('td:eq(0)', row).html(row._DT_RowIndex + 1);
        }
    });
    $('#tbl-category-list').show();
    table.on('draw', function () {
        OverLayer($('#tbl-category-list'), 'break');
    });

    function delCategory(id, delTr) {
        OverLayer($('#tbl-category-list'), 'draw');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: '/category-config/' + id,
            success: function (data) {
                OverLayer($('#tbl-category-list'), 'break');
                table.row(delTr).remove().draw('page');
            }, error: function (e) {
                OverLayer($('#tbl-category-list'), 'break');
            }, type: 'DELETE', dataType: 'json'
        });
    }
    $('#tbl-category-list').on('click', 'a.del-category', function () {
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
        });
        // if (!confirm('Do you really delete it?')) return;
        // $('#form-del-act').attr('action', '/category-config/' + $(this).attr('data-id'));
        // OverLayer($('#tbl-category-list'), 'draw');
        // $('#form-del-act').submit();
    });
    $('#tbl-category-list').on('click', 'a.edit-category', function () {
        $('#form-edit-act').attr('action', '/category-config/' + $(this).attr('data-id') + '/edit');
        OverLayer($('#tbl-category-list'), 'draw');
        $('#form-edit-act').submit();
    });
    $('#a-refresh-tbl').click(function () {
        OverLayer($('#tbl-category-list'), 'draw');
        table.draw();
    });

    document.cookie = "key1 = value1; key2 = value2";
});