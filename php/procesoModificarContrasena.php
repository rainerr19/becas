<?php
include "../conexionB-D.php";

$contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
$contrasena2 = $_POST["contrasena2"];
$correo = $_POST["correo"];
$token = $_POST["token"];
$request = 0;

$contrasena = trim($contrasena);
$contrasena = htmlspecialchars($contrasena);

$contrasena2 = trim($contrasena2);
$contrasena2 = htmlspecialchars($contrasena2);


if($contrasena=="" || $contrasena2==""){
    
    echo '
    <script>
    alert ("llene todos los campos");
    window.history.go(-1);
    </script>
    ';
    exit;
    
}else{
    if($_POST['contrasena'] == $_POST['contrasena2']){
        
        $modificar_contrasena = "UPDATE perfil SET token_contrasena='', password_request='$request', contrasena='$contrasena' WHERE correo='$correo' AND token_contrasena='$token'";
        $resultado = mysqli_query($conexion, $modificar_contrasena);
        
        if(!$resultado){
            echo '<script>
            alert ("Ocurrio un error...\nIntente mas tarde o contacte al area de soporte");
            window.history.go(-1);
            location.reload(true);
            </script>';
           exit;
        }else{
            echo '
            <script>
            alert ("contraseña modificada");
            window.location.href = "../login.php";
            </script>';
           exit;
        }
    }else{
        echo '
        <script>
        alert ("las contraseñas no coinciden");
        window.history.go(-1);
        </script>';
        exit;
        }
    
    
}
mysqli_close($conexion);