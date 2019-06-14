<?php
// 

include "../conexionB-D.php";

$resultado = "SELECT * FROM encuesta_ingreso_2019";
// $resultado = "SELECT * FROM encuesta_ingreso_policia";
$ejecutar = mysqli_query($conexion,$resultado);
$lista = mysqli_fetch_array($ejecutar);


session_start();
error_reporting(0);   

if($_SESSION['validacion']==1){
 
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Encuestas realizadas</title>
        <?php
            include '../partes/link_head.php';
        ?>    
    </head>

<body style="background-color: #2a2a2a">


<?php
 
 include '../partes/menu_top.php';  
?>

    <div class="container-fluid">   
        <div class="col-md-10 offset-md-1 pt-3">
            <div class="card border-info mb-2">
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                        <h2>Encuestas realizadas</h2>
                    
                </div>
                <div class="card-body">
                    <div class="container table-responsive">
                        <!--  -->
                        
                        <table class="table table-bordered display" id="table_id">
                            <thead>
                            <tr>
                                <th class="id-tablas">id</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Correo</th>
                                <th>Fecha</th>
                                <th>Revisar</th>
                                <!-- <th>Estado</th> -->
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                        for($i=0; $i<$lista; $i++){
                            echo "<tr>";
                            
                                echo "<td>";
                                    echo $lista['id'];
                                echo "</td>";
                                
                                echo "<td>";
                                    echo $lista['apellido'];
                                echo "</td>";
                            
                                echo "<td>";
                                    echo $lista['nombre'];
                                echo "</td>";
                            
                                echo "<td>";
                                    echo $lista['documento'];
                                echo "</td>";
                            
                                echo "<td>";
                                    echo $lista['correo'];
                                echo "</td>";
                            
                                echo "<td>";
                                    echo $lista['fecha'];
                                echo "</td>";
                            
                                echo "<td>";
                                    $id_en = $lista['id'];
                                    echo "<a type='button' href='show.php?id=";
                                    echo "$id_en";
                                    echo "'class='btn btn-primary'>Revisar encuesta</a> ";
                                    
                                echo "</td>"; 
                            echo "</tr>";
                            
                            
                            $lista = mysqli_fetch_array($ejecutar);
    
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <?php
    include '../partes/footer.php';

    ?>
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable({
            "processing": true,
            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        } );
    </script>
</body>

</html>
<?php
  }else{
      header("location:../login.php");
  }
?>
