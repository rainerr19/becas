<?php
$id=$_REQUEST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];

$segundoApellido = $_POST["segundoApellido"];
$tipoDocumento = $_POST["tipoDocumento"];
$numeroDocumento = $_POST["numeroDocumento"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$fechaNacimiento = date("Y-m-d",strtotime(str_replace('/', '-', htmlspecialchars($fechaNacimiento))));
$genero = $_POST["genero"];

$telefono = $_POST["telefono"];

$tipoUsuario = $_POST["tipo"];


$nombre = trim($nombre);
$nombre = htmlspecialchars($nombre);

$apellido = trim($apellido);
$apellido = htmlspecialchars($apellido);

$segundoApellido = trim($segundoApellido);
$segundoApellido = htmlspecialchars($segundoApellido);

$tipoDocumento = trim($tipoDocumento);
$tipoDocumento = htmlspecialchars($tipoDocumento);

$numeroDocumento = trim($numeroDocumento);
$numeroDocumento = htmlspecialchars($numeroDocumento);

$fechaNacimiento = trim($fechaNacimiento);
$fechaNacimiento = htmlspecialchars($fechaNacimiento);

$genero = trim($genero);
$genero = htmlspecialchars($genero);

$telefono = trim($telefono);
$telefono = htmlspecialchars($telefono);

$tipoUsuario = trim($tipoUsuario);
$tipoUsuario = htmlspecialchars($tipoUsuario);

//contraseñas
$contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
$contrasena2 = $_POST["contrasena2"];
$request = 0;

$contrasena = trim($contrasena);
$contrasena = htmlspecialchars($contrasena);

$contrasena2 = trim($contrasena2);
$contrasena2 = htmlspecialchars($contrasena2);




include "../conexionB-D.php";
$consulta="SELECT * FROM perfil WHERE id_user='$id'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);


// echo $nombre.$apellido.$segundoApellido.$tipoDocumento.$numeroDocumento.$fechaNacimiento.$genero.$telefono.$tipoUsuario;

if(empty($nombre) || empty($apellido) || empty($segundoApellido) || empty($tipoDocumento) || empty($numeroDocumento) || empty($fechaNacimiento) || empty($genero)  || empty($telefono) ){
    
     echo '
    <script>
    alert ("llene todos los campos");
    window.history.go(-1);
    </script>
    ';
    exit;
    echo $nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];

$segundoApellido = $_POST["segundoApellido"];
$tipoDocumento = $_POST["tipoDocumento"];
$numeroDocumento = $_POST["numeroDocumento"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$genero = $_POST["genero"];

$telefono = $_POST["telefono"];

$tipoUsuario = $_POST["tipo"];
    
}else{

    if($_POST['contrasena'] == "" && $_POST['contrasena2'] == ""){

        $modificar = "UPDATE perfil SET nombre='$nombre', apellido='$apellido', segundoApellido='$segundoApellido', tipoDocumento='$tipoDocumento', numeroDocumento='$numeroDocumento', fechaNacimiento='$fechaNacimiento', genero='$genero', telefono='$telefono', tipoUsuario='$tipoUsuario' WHERE id_user='$id'";
    }else{

        if($_POST['contrasena'] == $_POST['contrasena2']){
        
            echo '
            <script>
            alert ("las contraseñas no coinciden");
            window.history.go(-1);
            </script>';
            exit;
            
            
        }else{
            //modifica contraseña
            $modificar = "UPDATE perfil SET nombre='$nombre', apellido='$apellido', segundoApellido='$segundoApellido', tipoDocumento='$tipoDocumento', numeroDocumento='$numeroDocumento', fechaNacimiento='$fechaNacimiento', genero='$genero', telefono='$telefono', tipoUsuario='$tipoUsuario', contrasena='$contrasena' WHERE id_user='$id'";

        }
    }

           

    
    
}


/*
$verificar_correo = mysqli_query($conexion, "SELECT * FROM perfil WHERE correo ='$correo' ");
    
if (mysqli_num_rows($verificar_correo) >0){
    echo '
    <script>
    alert ("el correo ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}
*/
$resultado = mysqli_query($conexion, $modificar);
if(!$resultado){
    echo '<script>
    alert ("Ocurrio un error...\nIntente mas tarde o contacte al area de soporte");
    window.history.go(-1);
    location.reload(true);
    </script>';
}else{
    echo '
        <script>
        alert ("usuario modificado");
        window.location.href = "../tables.php";
        </script>';
        exit;
}
mysqli_close($conexion);