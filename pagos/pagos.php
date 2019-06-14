<?php
    session_start();
    error_reporting(0);
    
    if($_SESSION['validacion'] == 1){
    
    $documento = $_SESSION['numeroDocumento'];
    $documento = str_replace('.',' ',$documento);
    $documento = trim($documento);
    $documento = htmlspecialchars($documento);
    
    include "../conexionB-D.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <?php
            include '../partes/link_head.php';
    ?>
    </head>

<body style="background-color: #2a2a2a">
    <?php
        include '../partes/menu_top.php';   
    ?>
    <div class="container-fluid">     
        <div class="col-md-8 offset-md-2 pt-5">
            <div class="card border-info mb-2">
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    <h2>Consulta de pagos</h2>
                    
                </div>
                <div class="card-body">

                    <!-- <form action="<?php echo $documento; ?>" class="form-encuesta"> -->
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">

                            <?php
    
                                if($documento==""){
                                    echo ' <h3>Su perfil NO cuenta con Documento. </h3><br>';
                                }else{
                                    // $documento
                                    $sql="SELECT * from pagos_becarios WHERE cedula='$documento'";
                                    $resultado=mysqli_query($conexion,$sql);
                                    $mostrar=mysqli_fetch_array($resultado);
                                    $filas=mysqli_num_rows($resultado);
                                    if ($filas>0){
                                        echo "
                                        <thead>
                                            <tr>
                                                <th> Nombres/Apellidos </th>  	
                                                <th> Cedula </th>  
                                                <th> Escuela</th> 
                                                <th> Grupo nombre</th> 
                                                <th> Genero</th> 
                                                <th> Pagos de equipos</th> 
                                                <th> Pagos de matriculas</th>  	
                                                <th> Pagos Marzo</th> 
                                                <th> Pago Abril</th> 
                                                <th> Pago Mayo </th> 
                                                <th> Total consignado</th> 
                                            </tr>
                                        </thead>";
                                        while($mostrar=mysqli_fetch_array($resultado)){
                                        /*for($i=0; $i<$filas; $i++){*/
                                            
                                        echo "
                                            <tr>
                                                <th>".$mostrar['nombres']." </th>  	
                                                <th>".$mostrar['cedula']."  </th>  
                                                <th>".$mostrar['escuela']." </th> 
                                                <th>".$mostrar['grupo_nombre']." </th> 
                                                <th>".$mostrar['sexo']."</th> 
                                                <th>".$mostrar['pagos_equipos']."</th> 
                                                <th>".$mostrar['pagos_matriculas']."</th>  	
                                                <th>".$mostrar['pagos_bono_marzo']."</th> 
                                                <th>".$mostrar['pago_bono_abril']."</th> 
                                                <th>".$mostrar['pago_bono_mayo']." </th> 
                                                <th>".$mostrar['total_consignado']." </th> 
                                            </tr>
                                        ";
                                        }
                                        mysqli_close($conexion);
                                    }else{
                                        echo '<h3>No se registran pagos. </h3>
                                        <h4>Numero de documento: '.$documento.' </h4>';   
                                    }
                                }
                            ?>            
                                
                            </table>
                        </div>                        
                         
                    </div>        
                    <!-- </form> -->
                </div>
        
            </div>
        </div>
    </div>
    <?php
    
    include '../partes/footer.php';
    
    ?>
</body>

</html>
<?php
    }else{
        header("location:../login.php");
    }
            
?>