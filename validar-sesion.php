<?php

$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];


include "conexionB-D.php";
$consulta="SELECT * FROM perfil WHERE correo='$correo'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);


if(empty($correo)){

    echo '
    <script>
    alert ("Por favor ingrese su correo.");
    window.history.go(-1);
    </script>
    ';
    exit;
    
}else{
    
    if(empty($contrasena)){
        
       echo '
        <script>
        alert ("Por favor ingrese su contraseña");
        window.history.go(-1);
        </script>
        ';
        exit;
        
    }else{
        if($filas>0){
            
        if (password_verify($_POST['contrasena'], $row['contrasena']) or /*$_POST['contrasena'] == $row['contrasena']*/ $_POST['contrasena'] == $row['numeroDocumento']) {
            
            if($row['tipoUsuario']==1){//ADMINISTRADOR
                
                session_start();
                $_SESSION['validacion'] = 1;//ADMINISTRADOR
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['segundoApellido'] = $row['segundoApellido'];
                $_SESSION['tipoDocumento'] = $row['tipoDocumento'];
                $_SESSION['numeroDocumento'] = $row['numeroDocumento'];
                $_SESSION['fechaNacimiento'] = $row['fechaNacimiento'];
                $_SESSION['genero'] = $row['genero'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['avatar'] = $row['avatar'];

                header("location:index.php");    
                exit;
                
            }else{
                
            if($row['tipoUsuario']==0){//USUARIO
                
                session_start();   
                $_SESSION['validacion'] = 2;//USUARIO
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['segundoApellido'] = $row['segundoApellido'];
                $_SESSION['tipoDocumento'] = $row['tipoDocumento'];
                $_SESSION['numeroDocumento'] = $row['numeroDocumento'];
                $_SESSION['fechaNacimiento'] = $row['fechaNacimiento'];
                $_SESSION['genero'] = $row['genero'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['avatar'] = $row['avatar'];
                header("location:usuario.php");
                exit;
            }else{
                
            if($row['tipoUsuario']==2){//NO ACTIVADA
                echo '
            <script>
            alert ("su cuenta aún no ha sido activada, revise su correo en la bandeja de correos no deseados o spam");
            window.history.go(-1);
            </script>';
            exit;
            }else{
                
                 if($row['tipoUsuario']==3){//
                 echo '
                    <script>
                    alert ("cambio de contraseña");
                    window.history.go(-1);
                    </script>';
                exit;
                
            }else{
                echo '
            <script>
            alert ("error");
            window.history.go(-1);
            </script>';
            exit;
            }
            }
            }
            }
        }else{

            echo '
            <script>
            alert ("Los datos son incorrectos.");
            window.location.href = "login.php";
            </script>';
            exit;
            
        }
        }else{
            echo '
            <script>
            alert ("Los datos son incorrectos.");
            window.location.href = "login.php";
            </script>';
            exit;
        }
    }
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
