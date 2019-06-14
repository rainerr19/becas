$(document).ready(function() {
    
    $("#table_id").DataTable({
        
        "processing": true,
        "serverSide": true,
        "ajax":{
            url:"dataUser.php",
            type:"post"
            
        },"columns": [
            { "orderable": true, "targets": 0 },
            { "orderable": true, "targets": 1 },
            { "orderable": true, "targets": 2 },
            { "orderable": true, "targets": 3},
            { "orderable": true, "targets": 4 },
            { "orderable": false, "targets": 5 } ,
            { "orderable": true, "targets": 6 } ,
            { "orderable": false, "targets": 7 },
            { "orderable": false, "targets": 8 }         
            ],
        
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $("#del_user").click(function() {
        var id     = $(this).val(); 
        console.log( "Deleting... val= "+id );
        $.ajax({
            url: 'php/eliminar.php?id=2',
            data: "id="+ id,
            type: 'DELETE',
            success:function(data) {
                console.log( data ); 
                if(data=='eliminado'){

                    alert ("usuario eliminado");
                    window.history.go(-1);
                    
                }else{
                    alert ("ocurrio un error");
                    window.history.go(-1);
                }
              },
            error: function (error) {
                console.log(arguments);
                alert(" Can't delite because: " + error);
            },
          });
      });
});
function del(id) {
    $('#modal_delite').modal('show');
    $("#del_user").val(id);
}


