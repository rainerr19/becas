<?php

    session_start();
    error_reporting(0);
    // require_once( dirname( __FILE__ ) . '/admin.php' );

                include "../conexionB-D.php";
                $id = $_REQUEST['id'];
                $sql = "SELECT * from encuesta_ingreso_2019 WHERE id='$id'";
                $resultado = mysqli_query($conexion,$sql);
                $mostrar = mysqli_fetch_array($resultado);
   if($_SESSION['validacion'] == 1){
?>

<html lang="es">
    <head>
        <link href="../assets/css/style.css" rel="stylesheet" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Revisión de encuesta - Fundacion leones educando</title>
        <?php
            include '../partes/link_head.php';
        ?>
</head>

<body style="background-color: #2a2a2a">


<?php
 
 include '../partes/menu_top.php';  
?>
<div class="container-fluid">  
<button onclick="topFunction()" id="btn-top" title="vuelve al comienzo">Subir</button> 
    <div class="col-md-10 offset-md-1 pt-3">

        <div class="card border-info mb-2">
            <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    <h2>Revisión de encuesta</h2>
            </div>
            <div class="card-body">
                
                <div class="container">
                    <div class="container table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>Fecha de envio:</th>
                                <th> <h4><?php echo $mostrar['fecha']; ?></h4></th>
                            </tr>
                            <tr>
                                
                                <th>Nombre: </th>
                                <th><h4><?php echo $mostrar['nombre']; ?></h4></th>
                            </tr>
                            <tr>
                                    
                                <th>Apellido: </th>
                                <th><h4><?php echo $mostrar['apellido']; ?></h4></th>
                            </tr>
                            <tr>
                               
                                <th> Documento: </th>
                                <th><h4><?php echo $mostrar['documento']; ?></h4></th>
                            </tr>
                            <tr> 
                                <th> Correo: </th>
                                <th><h4><?php echo $mostrar['correo']; ?></h4></th>
                            </tr>
                            <tr> 
                                <th>Departamento: </th>
                                <th><h4><?php echo $mostrar['departamento']; ?></h4></th>
                            </tr>
                            <tr>
                                
                                <th>Municipio: </th>
                                <th><h4><?php echo $mostrar['municipio']; ?></h4></th>
                            </tr>
                            <tr>
                                
                                <th>Barrio o Ranchería: </th>
                                <th><h4><?php echo $mostrar['barrio']; ?></h4></th>
                            </tr>
                            <tr>
                                
                                <th>Sexo:</th>
                                <th><h4><?php echo $mostrar['sexo']; ?></h4></th>
                            </tr>
                            <tr>
                                
                                <th>Estrato: </th>
                                <th><h4><?php echo $mostrar['estrato']; ?></h4></th>
                            </tr>   
                        </table>
                    </div>
                    <div class="div-encuesta">
                        <h4>1. ¿En qué programa de formación se encuentra?:</h4>
                        <p class="font-weight-bold"><i><?php echo($mostrar['preg_1']);?>.</i></p>
                    </div>
                    
               

                    <h4>2. ¿Qué percepción tenías antes de estar en el programa de los siguientes actores?</h4>
                    <div class="container table-responsive">
                        
                        <?php 
                        function pregunta2($valor)
                        {
                            echo('<p class="font-weight-bold"><i>'.$valor.'</i></p>');
                        }
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                    <th><label>Actores</label></th>
                                    <th><label>Nivel de percepción</label></th>
                            </thead>
                            <tr>
                                <td><label>Gobierno</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_1'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Policía nacional</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_2'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ejército</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_3'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Organizaciones al margen de la ley</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_4'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Grupos ilegales armados</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_5'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Pandillas</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_6'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Otros:</label>
                                    <i><?php echo($mostrar['preg_2_otra'])
                                    ?></i></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_2_7'])
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="div-encuesta">
                        <h4>3.	¿Por qué razón los jóvenes de su comunidad entrarían a ser parte de grupos ilegales?</h4>
                        <br>
                        <?php
                           if ($mostrar['preg_3']== 'otra') {
                             
                                    echo ('<p class="font-weight-bold">Otra: <i>');
                                    echo ($mostrar['preg_3_otra']);
                                    echo('.</i></p>');
                               
                            }else{
                                echo '<p class="font-weight-bold"><i>'.$mostrar['preg_3'].'</i></p>';
                            }
                        ?>
                    </div>
                    <div class="div-encuesta">
                        <h4>4.	¿Qué lo motivo a participar en la Policía Nacional?</h4>
                        <br>
                        <?php
                           if ($mostrar['preg_4']== 'otra') {
                               echo ('<p class="font-weight-bold">Otra: <i>');
                               echo ($mostrar['preg_4_otra']);
                               echo('.</i></p>');
                            }else{
                                echo '<p class="font-weight-bold"><i>'.$mostrar['preg_4'].'</i></p>';
                            }
                        ?>
                    </div>

                    <hr>
                    
                    <h4>5.	¿Qué tan fácil es en su comunidad encontrar la presencia de los siguientes actores?:</h4>
                    <div class="container table-responsive">
                        
                        <?php 
                        function pregunta5($valor)
                        {
                            echo('<p class="font-weight-bold"><i>'.$valor.'</i></p>');
                        }
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                    <th><label>Actores</label></th>
                                    <th><label>Presencia</label></th>
                            </thead>
                            <tr>
                                <td><label>Gobierno</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_1'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Policía nacional</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_2'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Ejército</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_3'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Organizaciones al margen de la ley</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_4'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Grupos ilegales armados</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_5'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Pandillas</label></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_6'])
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Otros:</label>
                                    <i><?php echo($mostrar['preg_5_7_otra'])
                                    ?></i></td>
                                <td><?php 
                                    pregunta2($mostrar['preg_5_7'])
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="div-encuesta">
                        <h4>6.	¿Qué percepción tienen en su comunidad y/o familia sobre su ingreso al programa de Formación de la Policía Nacional?</h4>
                        <p class="font-weight-bold"><i><?php echo($mostrar['preg_6']);?>.</i></p>
                    </div>
                    <div class="div-encuesta">
                        <h4>7.	¿Saben en su comunidad y/o familia que usted está becado por la embajada de los Estados Unidos?</h4>
                        <p class="font-weight-bold"><i><?php echo($mostrar['preg_7']);?>.</i></p>
                    </div>
                </div>
         
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