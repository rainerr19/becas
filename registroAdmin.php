<?php
    session_start();
    error_reporting(0);
    

    if($_SESSION['validacion']==1){
        
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro admin</title>
        <link rel="icon" href="assets/img/icono.png">
        <!-- <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" /> -->
          
        <?php
            include 'partes/link_head.php';
        ?>
    </head>


        <?php
        include 'partes/menu_top.php';

?>
<body style="background-color: #2a2a2a">
<button onclick="topFunction()" id="btn-top" title="vuelve al comienzo">Subir</button>
    <div class="container-fluid">
        <div class="col-md-8 offset-md-2 pt-5">

            <div class="card border-info mb-2">
                
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
                    
                    <h1>Crea una cuenta</h1>
                </div>
                <div class="card-body">
                <form class="form-register" method="post" enctype="multipart/form-data" action="registro.php">

                    <div class="form-group">
                        <label for="nombre" class="col-form-label-lg">Nombres</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Nombre" id="nombre" 
                            name="nombre" required>
                    </div>    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <label for="apellido" class="col-form-label-lg">Apellido</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Apellido" id="apellido" 
                                name="apellido" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="segundoapellido" class="col-form-label-lg">Segundo Apellido</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Segundo Apellido" id="segundoApellido" 
                                name="segundoApellido" required>
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipoDocumento" class="col-form-label-lg">Tipo de documento</label>
                            <select class="form-control form-control-lg" name="tipoDocumento" id="tipoDocumento" required>
                                
                                <option value="">Seleccione</option>
                                <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Cedula de Extranjería">Cedula de Extranjería</option>
                                <option value="Documento Nacional de Identificación">Documento Nacional de Identificación</option>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numeroDocumento" class="col-form-label-lg">Numero de documento</label>
                            <input type="number" class="form-control form-control-lg" placeholder="Numero de Documento" id="numeroDocumento" 
                            name="numeroDocumento" required>
                            
                        </div>
                    </div>      
                            
                    <div class="form-group">
                        
                        <label for="genero" class="col-form-label-lg">Genero</label>
                        <select class="form-control form-control-lg" name="genero" id="genero" required>
                            <option value="">Seleccione</option>
                            
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            
                        </select>
                        
                    </div>    
                    <div class="form-group">
                        <label for="telefono" class="col-form-label-lg">Teléfono</label>
                        <input type="number" class="form-control form-control-lg" placeholder="Teléfono" id="telefono" 
                            name="telefono"  min="1000000" max="4000000000" required>
                    </div>        
                        
                    <div class="form-group">
                        <label for="fechaNacimiento" class="col-form-label-lg">Fecha de nacimiento</label>
                        <input type="date" class="form-control form-control-lg" id="fechaNacimiento"
                            name="fechaNacimiento" required>
                            
                            
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-form-label-lg">Correo</label>
                
                        <input type="email" placeholder="Correo" class="form-control form-control-lg"
                        name="correo"  required>
                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contrasena" class="col-form-label-lg">Contraseña</label>
                            <input type="password" class="form-control form-control-lg" 
                                placeholder="Contraseña" id="contrasena" name="contrasena" required>
                        
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contrasena2" class="col-form-label-lg">Repita la contraseña</label>
                            <input type="password" class="form-control form-control-lg"
                                placeholder="Repita la contraseña" id="contrasena2" name="contrasena2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagen" class="col-form-label-lg">Foto de perfil:(opcional)</label>
                        <div class="custom-file">
                            <!-- <label class="custom-file-label" for="imagen">Imagen</label> -->
                            <input type="file" class="form-control-file" name="imagen"
                                id="imagen" accept=".jpg, .png" size="30">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="submit" value="Crear cuenta" class="btn btn-success btn-block btn-lg">
                
                    </div>
        
                        <p class="text-center">¿ya tienes una cuenta? <a class="text-info"href="login.php">Ingresa aquí!</a></p>
                </form>

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
