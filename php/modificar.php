<?php
session_start();
error_reporting(0);

if($_SESSION['validacion'] == 1){
    
include "../conexionB-D.php";
$resultado = "SELECT * from perfil";
$ejecutar = mysqli_query($conexion,$resultado);
$lista = mysqli_fetch_array($ejecutar);
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Editar Registro</title>
    <link rel="icon" href="../assets/img/icono.png">
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        
        <?php
            include '../partes/link_head.php';
        ?>

</head>
<?php

include '../partes/menu_top.php';

include "../conexionB-D.php";
$id=$_REQUEST['id'];
$sql="SELECT * from perfil WHERE id_user='$id'";
$resultado=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($resultado);
?>  
    
<body style="background-color: #2a2a2a">
<button onclick="topFunction()" id="btn-top" title="vuelve al comienzo">Subir</button>     
    <div class="container-fluid"> 
        <div class="col-md-8 offset-md-2 pt-5">

            <div class="card border-info mb-2">
                
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    <h2>Edición de usuario</h2>
                </div>
               <div class="card-body">
                   <form method="POST" action="modificar_proceso.php">
                        <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?php echo $mostrar['id_user'];?>">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label-lg">Nombres</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Nombre" id="nombre" 
                                name="nombre" value="<?php echo $mostrar['nombre']; ?>" >
                        </div>    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="apellido" class="col-form-label-lg">Apellido</label>
                            
                                <input type="text" class="form-control form-control-lg" placeholder="Apellido" id="apellido" 
                                    name="apellido" value="<?php echo $mostrar['apellido']; ?>" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="segundoapellido" class="col-form-label-lg">Segundo Apellido</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Segundo Apellido" id="segundoApellido" 
                                    name="segundoApellido" value="<?php echo $mostrar['segundoApellido']; ?>" required>
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            
                                <select class="form-control form-control-lg" name="tipoDocumento" id="tipoDocumento" required>
                                    
                                    <option value="">Seleccione</option>
                                    <option value="Cedula de Ciudadanía" <?php echo(($mostrar['tipoDocumento']=="Cedula de Ciudadanía")?'selected':'')?>>Cedula de Ciudadanía</option>
                                    <option value="Tarjeta de Identidad" <?php echo(($mostrar['tipoDocumento']=="Tarjeta de Identidad")?'selected':'')?>>Tarjeta de Identidad</option>
                                    <option value="Cedula de Extranjería" <?php echo(($mostrar['tipoDocumento']=="Cedula de Extranjería")?'selected':'')?>>Cedula de Extranjería</option>
                                    <option value="Documento Nacional de Identificación" <?php echo(($mostrar['tipoDocumento']=="Documento Nacional de Identificación")?'selected':'')?>>Documento Nacional de Identificación</option>
    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control form-control-lg" placeholder="Numero de Documento" id="numeroDocumento" 
                                name="numeroDocumento"  value="<?php echo $mostrar['numeroDocumento']; ?>" required>
                                
                            </div>
                        </div>      
                            
                        <div class="form-group">
                            
                            <label for="genero" class="col-form-label-lg">Genero</label>
                            <select class="form-control form-control-lg" name="genero" id="genero" required>
                                <option value="">Seleccione</option>
                                
                                <option value="Femenino" <?php echo(($mostrar['genero']=="Femenino")?'selected':'')?>>Femenino</option>
                                <option value="Masculino" <?php echo(($mostrar['genero']=="Masculino")?'selected':'')?>>Masculino</option>
                                
                            </select>
                        
                        </div>    
                        <div class="form-group">
                            <label for="telefono" class="col-form-label-lg">Teléfono</label>
                            <input type="number" class="form-control form-control-lg" placeholder="Teléfono" id="telefono" 
                                name="telefono"  min="1000000" max="4000000000"
                                value=<?php echo $mostrar['telefono']; ?> >
                        </div>        
                            
                        <div class="form-group">
                            <label for="fechaNacimiento" class="col-form-label-lg">Fecha de nacimiento</label>
                            <input type="date" class="form-control form-control-lg" id="fechaNacimiento" name="fechaNacimiento" 
                            value="<?php echo date("Y-m-d",strtotime(str_replace('/', '-', htmlspecialchars($mostrar['fechaNacimiento'])))); ?>">
                                
                                
                        </div>
                        <label for="fechaNacimiento" class="col-form-label-lg">Cambio de contraseña</label>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-lg" placeholder="contraseña nueva" name="contrasena" type="password">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-lg" placeholder="repita la contraseña nueva" name="contrasena2" type="password" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="col-form-label-lg">Seleccione un privilegio</label>
                    
                            <select id="tipo" name="tipo" class="form-control form-control-lg" required>
                                <option value="0" <?php echo((!$mostrar['tipoUsuario'])?:'selected')?>>Usuario</option>  
                                <option value="1" <?php echo((!$mostrar['tipoUsuario'])?:'selected')?>>Admin</option>
                                
                            </select>
                                    
                        </div>
                        <button type="submit" value="editar datos" class="btn btn-success btn-block btn-lg">
                        <i class="fas fa-user-edit fa-1x"></i> Editar datos
                        </button>
                                    
                       
               
                   </form>
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
      header("location:login.php");
  }
?>