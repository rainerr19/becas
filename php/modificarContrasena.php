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
        <?php
            include '../partes/link_head.php';
        ?>
</head>

<body class="body-Login-back" background="../assets/img/9.jpg">
    
    <div class="container pt-4">
        <div class="row pt-4">
            <div class="col-sm-4 offset-sm-1 col-4 offset-1 col-md-4 offset-md-4">
                <!-- <div class="text-center"> -->

                    <img class="img-fluid" style="max-width:300px; height:90px; " src="../assets/img/logo_blanco.png" />
                <!-- </div> -->
                    
                
            </div>
        </div>
        <div class="row justify-content-md-center pt-5 pb-1">
            
        <div class="col-md-6">

            <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Cambiar contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="procesoModificarContrasena.php" method="post">
                           
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
