<?php
    session_start();
    error_reporting(0);
    

    if($_SESSION['validacion']==1||$_SESSION['validacion']==2){
        
?>
<!DOCTYPE html>
<html>
   
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Perfil de usuario</title>
    <?php
        include 'partes/link_head.php';
    ?>
    
    </head>
    
    
    <?php
        include 'partes/menu_top.php';  
    ?>
<body style="background-color: #2a2a2a">           

    <div class="container-fluid">  
        <div class="col-md-8 offset-md-2 pt-3">

            <div class="card border-info mb-2">
                <div class="card-header text-white border-info mb-3" style="background-color: #022606">
   
                    <h1>Perfil de usuario</h1>
                </div>
                <div class="card-body">
                    <div class="jumbotron jumbotron-fluid pt-2">
                        
                        <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">

                                <h1><?php echo $_SESSION['nombre'];?> <?php echo $_SESSION['apellido']." ".$_SESSION['segundoApellido'];?></h1>
                            </div>
                        </div>
                        <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    
                                    <img class="img-thumbnail" src="assets/img_perfil/<?php echo $_SESSION['avatar'];?>">
                                </div>
                                
                                <div class="col-md-9">
                                    <h4><?php echo $_SESSION['correo'];?></h4>
                                    <h4><?php echo $_SESSION['telefono'];?></h4>
                                    
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><h4>Fecha de nacimiento:</h4></li>
                                        <li class="list-inline-item"> <?php echo $_SESSION['fechaNacimiento'];?></li>
                                   </ul>
                                    
                                   <ul class="list-inline">
                                        <li class="list-inline-item"><h4><?php echo $_SESSION['tipoDocumento'];?>:</h4></li>
                                        <li class="list-inline-item"><?php echo $_SESSION['numeroDocumento'];?></li>
                                   </ul>
                       
                                </div>                
                            </div>
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