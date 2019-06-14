<?php
    session_start();
    session_destroy();
?>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesion</title>
        <?php
            include 'partes/link_head.php';
        ?>
</head>

<body background="assets/img/9.jpg">

    <div class="container pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 offset-sm-1 col-4 offset-1 col-md-4 offset-md-4">
                <!-- <div class="text-center"> -->

                    <img class="img-fluid" style="max-width:300px; height:90px; " src="assets/img/logo_blanco.png" />
                <!-- </div> -->
                    
                
            </div>
        </div>
        
        <div class="row justify-content-md-center pt-5 pb-1">
            <div class="col-md-7 offset-md-2">

            <div class="card text-center" style="max-width: 25rem;">
            <div class="card-header">
                <h5 class="card-title">Inicio de sesión</h5>
            </div>
            <div class="card-body">
                <form role="form" action="validar-sesion.php" method="post">
                    
                            <h5 style="color:green;margin: auto;padding-bottom: 10px;"> Ingresa con tu correo institucional y tu número de documento.</h5> 
                        
                    
                        <div class="form-group">
                            <input class="form-control" placeholder="correo" name="correo" type="email" autofocus required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="contraseña" name="contrasena" type="password" value="" required>
                        </div>

                        <button class="btn btn-lg btn-success btn-block">iniciar</button>
                        <br>
                        <a class="text-info" href="recuperar.php">¿se te olvidó tu contraseña?</a><br>
                        <a class="text-info" href="http://www.becaspnc.org">volver</a>
                
                </form>
            </div>
        </div>
        

    </div>
  
<?php
    include 'partes/footer.php';
?>
</body>
</html>
