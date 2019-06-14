<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cambio de contraseña</title>
        
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />
        <?php
            include 'partes/link_head.php';
        ?>
    </head>

<body class="body-Login-back" background="assets/img/9.jpg">
    <div class="container  pt-4">
        <div class="row  pt-4">
            <div class="col-sm-4 offset-sm-1 col-4 offset-1 col-md-4 offset-md-4">
                
                <a href="https://becaspnc.org">
                    <img class="img-fluid" style="max-width:300px; height:90px;" src="assets/img/logo_blanco.png" />
                </a>
            </div>
        </div>
        <div class="row justify-content-center pt-5 pb-1">
                <div class="col-lg-5">
                <div class="card" style="">
                    <div class="card-header">
                        <h3 class="card-title">Cambio de contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="php/cambioContraseña.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" placeholder="correo" name="correo" type="email" autofocus required>
                                </div>
                                

                                <button class="btn btn-lg btn-success btn-block">enviar</button>
                             <br>
                                <p class="form-link"><a href="login.php">Atras</a></p>

                        </form>
                    </div>
                </div>
                </div>
                
              
        </div>
    </div>
</body>
</html>
