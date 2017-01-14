var table = $('#data_table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "<?=$ajax?>",
    "rowReorder": true,
    "searching": false,
    "sPaginationType": "full_numbers",
        "oLanguage": {
            "sLengthMenu": "Отображено _MENU_ записей на страницу",
            "sSearch": "Поиск:",
            "sZeroRecords": "Ничего не найдено - извините",
            "sInfo": "Показано с _START_ по _END_ из _TOTAL_ записей",
            "sInfoEmpty": "Показано с 0 по 0 из 0 записей",
            "sInfoFiltered": "(filtered from _MAX_ total records)",
            "oPaginate": {
                "sFirst": "Первая",
                "sLast":"Посл.",
                "sNext":"След.",
                "sPrevious":"Пред."
    }
},

    "columns":JSON.parse('<?=$columns?>') ,

    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $(nRow).attr('id', aData.id );

            urlUpdate = "<?=$urlUpdate?>".replace("idItem", aData.id);
            $('td:eq(1)', nRow).html( '<a href = ' + urlUpdate +'>'+aData.title+'</a>' );
    }

});
table.on( 'row-reordered', function ( e, diff, edit ) {

    var result = {};
    for ( var i=0, ien=diff.length ; i<ien ; i++ )
    {
        result[diff[i].node.id] = diff[i].newPosition;
    }
    $.ajax({
        url: "<?=$ajax?>",
        global: false,
        type: "POST",
        data: result,
        dataType: "json"
    });
    return false;
} );