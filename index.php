<?php
    session_start();
    error_reporting(0);
    if($_SESSION['validacion']==1){     
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesion</title>
        <?php
            include 'partes/link_head.php';
        ?>

    </head>

<?php
    
    include 'partes/menu_top.php';
    
?>
<body  style="background-color: #2a2a2a">

<div class="container-fluid"> 
    
        <div class="col-md-8 offset-md-2 pt-4">

            <div class="card border-info mb-2">
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">

                    <h2>Encuestas Disponibles</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-light">
                        <thead>
                            <!-- <th colspan="3">Acción</th> -->
                            <th>Tipo de encuesta</th>
                            <th colspan="2">Acción</th>
                        </thead>
                        <tr>
                            <td>Registro para Policía 2018</td>
                            <td><a type="button" class="btn btn-primary" href="Encuesta/encuesta-responsive.php"><label>Revisar</label></a></td>
                            <td><a type="button" class="btn btn-info" href="Encuesta/encuestas-realizadas.php"><label>Ver encuestas realizadas</label></a></td>
                            
                        </tr>
                        <tr>
                            <td>Encuesta para recién ingresado</td>
                            <td><a type="button" class="btn btn-primary" href="encuesta2/encuesta.php"><label>Revisar</label></a></td>
                            <td><a type="button" class="btn btn-info" href="encuesta2/encuestas-realizadas.php"><label>Ver encuestas realizadas</label></a></td>
                            
                        </tr>
                        </table>               
                    </div>   
                </div>        
            </div>
        </div>

    </div>    
   
</div>
    
</body>
<?php
    include 'partes/footer.php';
    
?>
</html>
<?php
    }else{
        header("location:login.php");
    }
            
?>