<?php

include "../conexionB-D.php";

if(isset($_GET["correo"]) || isset($_GET['val'])){
    
    $correo = $_GET['correo'];
    $token = $_GET['val'];
    $verificar = 1;
}

$verificar_cambio_contrasena = mysqli_query($conexion, "SELECT * FROM perfil WHERE correo ='$correo' AND token_contrasena ='$token' AND password_request ='$verificar'");


if (mysqli_num_rows($verificar_cambio_contrasena) >0){
   
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambiar contraseña</title>
        <link rel="icon" href="../assets/img/icono.png">
        <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
        <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <link href="../assets/css/main-style.css" rel="stylesheet" />
    </head>

    <body class="body-Login-back" background="../assets/img/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                    <img style="width:300px; height:90px; " src="../assets/img/logo_blanco.png" />
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cambiar contraseña</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="procesoModificarContrasena.php" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="contraseña nueva" name="contrasena" type="password" autofocus required>
                                        <input name="correo" type="hidden" value="<?php echo $correo; ?>" >
                                        <input name="token" type="hidden" value="<?php echo $token; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="repita la contraseña nueva" name="contrasena2" type="password" value="" required>
                                    </div>

                                    <button class="btn btn-lg btn-success btn-block">cambiar</button>
                                    <p></p>
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}else{
 echo '
    <script>
    alert ("datos invalidos");
    window.location.href = "../login.php";
    </script>';
    exit;

}
?>
