<?php
    include "conexionB-D.php";
    session_start();
    error_reporting(0);

    if($_SESSION['validacion'] == 2){        
?>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <?php
            include 'partes/link_head.php';
        ?>
    </head>

<body style="background-color: #2a2a2a">
<?php
 
 include 'partes/menu_top.php';  
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1 pt-4">                 
        
            <div class="card border-info mb-2">
        
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">

                    <h2>Encuestas Disponibles</h2>
            
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Encuestas Disponibles</th>
                                    <th>Estado</th>
                                  
                                </tr>
                            </thead>
                            <tr>

                            <?php
                                $correo1 = $_SESSION['correo'];
                                $resultado = "SELECT * FROM perfil WHERE correo = '$correo1'";
                                $ejecutar = mysqli_query($conexion,$resultado);
                                $perfil = mysqli_fetch_array($ejecutar);
                                //03-05-2019 //
                            if(strtotime("01-05-2019") < strtotime($perfil["fechaIngreso"])){
                                echo '<td>Encuesta para recién ingresado a la Policía Nacional</td>';
                                    // var_dump("entro");
                                $resultado = "SELECT * FROM encuesta_ingreso_2019 WHERE correo = '$correo1'";
                                $ejecutar = mysqli_query($conexion,$resultado);
                                $lista = mysqli_fetch_array($ejecutar);
                                    
                                if ($lista["estado"] == 'Realizado') {
                                echo ('<td style="color:green"><i style="color:green" class="far fa-check-circle"></i> &nbsp; Encuesta enviada</td>');
                                } else {
                                    echo ('<td><a type="button" class="btn btn-success" href="encuesta2/encuesta.php">Encuesta disponible</a></td>');
                                    # code...
                                }
            
                                }else{        
                                $resultado = "SELECT * FROM encuesta_ingreso_policia WHERE correo = '$correo1'";
                                $ejecutar = mysqli_query($conexion,$resultado);
                                $lista = mysqli_fetch_array($ejecutar);
                                echo '<td>Registro para Policía<td>';
                                if($lista["Estado"]=="Aceptado"){
                                    echo '<td style="color:green">Aceptado</td>';
                                }else{
                                    if($lista["Estado"]=="Rechazado"){
                                        echo '<td style="color:red">Rechazado</td>';
                                    }else{
                                        if($lista["Estado"]=="En espera"){
                                            echo '
                                            <td style="color:green"><i style="color:green" class="far fa-check-circle"></i> &nbsp; Encuesta enviada</td>';
                                        }else{
                                            echo '<td style="color:red"> Encuesta nunca realizada</td>';
                                            // echo '<a href="Encuesta/encuesta-responsive.php"><input type="button" class="input-envio" value="Realizar encuesta"></a>';
                                        }
                                    }
                                }
                            }//endif
                            ?> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'partes/footer.php';

?>
</body>

</html>

    <?php
  }else{
      header("location:login.php");
  }
?>
