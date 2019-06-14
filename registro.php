<?php
$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/becas/";
include "conexionB-D.php";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$segundoApellido = $_POST["segundoApellido"];
$tipoDocumento = $_POST["tipoDocumento"];
$numeroDocumento = $_POST["numeroDocumento"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$genero = $_POST["genero"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
$contrasena2 = $_POST["contrasena2"];
$tipoUsuario = "2";
//imagen

$formatos=array('.png','.jpg','.jpeg');

$foto = $_FILES["imagen"]["name"];    
$ruta = $_FILES["imagen"]["tmp_name"];
// $root_url
$destino = "assets/fotos_perfil/".$foto;
$fotoFinal = $genFoto.$foto;
$dir = substr($foto,strrpos($foto,"."));
if(in_array($dir,$formatos)){
    if($destino == "assets/fotos_perfil/"){
        $destino = "assets/fotos_perfil/no_avatar.jpg";
    }else{
        $genFoto = md5(uniqid(mt_rand(), false));
        $destino = "assets/fotos_perfil/".$fotoFinal;
        copy($ruta,$destino);
    }
}else{
    echo '<script>
            alert ("Formato de archovo NO valido.");
            window.history.go(-1);
            </script>';
            exit;
}

$gen = md5(uniqid(mt_rand(), false));

$fecha = date("d-m-Y H:i:s");//Y-m-d H:i:s fechas en DB
$fechaNacimiento=date("Y-m-d",strtotime(str_replace('/', '-', htmlspecialchars($fechaNacimiento))));

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

$correo = mb_strtolower($correo,'UTF-8');
$correo = trim($correo);
$correo = htmlspecialchars($correo);

$contrasena = trim($contrasena);
$contrasena = htmlspecialchars($contrasena);

$tipoUsuario = trim($tipoUsuario);
$tipoUsuario = htmlspecialchars($tipoUsuario);

//$contrasena = password_hash($contrasena);

if(empty($nombre) || empty($apellido) || empty($telefono) || $contrasena=="" || $contrasena2==""){
    
     echo '
    <script>
    alert ("llene todos los campos");
    window.history.go(-1);
    </script>
    ';
    exit;
    
}else{
     if (!is_numeric($telefono)){
           echo '
            <script>
            alert ("el telefono no es valido, solo puede contener numeros");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{
           if (is_numeric($nombre)){
           echo '
            <script>
            alert ("el nombre no es valido, no puede contener numeros");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{
        if (is_numeric($apellido)){
           echo '
            <script>
            alert ("el apellido no es valido, no puede contener numeros");
            window.history.go(-1);
            </script>
            ';
            exit;
     }else{
   
    if($_POST['contrasena'] == $_POST['contrasena2']){
        //verificar correo repetido
$verificar_correo = mysqli_query($conexion, "SELECT * FROM perfil WHERE correo ='$correo' ");
    
if (mysqli_num_rows($verificar_correo) >0){
    echo '
    <script>
    alert ("el correo ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}else{
        
    $url='http://becaspnc.org/blackboard/php/activar.php?correo='.$correo.'&val='.$gen;
    
    $asunto = 'Activar Cuenta - BECASPNC';
    $cuerpo = "Estimado $nombre: <br/> Para continuar con el proceso de registro entre al siguiente link <a href='$url'> Activar cuenta </a>";
        
        require_once 'assets/plugins/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
		$mail->SMTPAuth = true;
		$mail->Host = 'mail.becaspnc.org';
		$mail->Port = 25;
		$mail->Username = 'info@becaspnc.org';
		$mail->Password = 'b1?^r(ZU-Uhi';		
		$mail->setFrom('info@becaspnc.org', 'BECASPNC');
		$mail->addAddress($correo, $nombre);		
		$mail->Subject = $asunto;
		$mail->Body    = $cuerpo;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';

    if($mail->send()){
        
         $insertar = "INSERT INTO perfil(token, nombre, apellido, segundoApellido, tipoDocumento, numeroDocumento, fechaNacimiento, genero, telefono, correo, contrasena, tipoUsuario, avatar, fechaIngreso) VALUES ('$gen', '$nombre', '$apellido', '$segundoApellido', '$tipoDocumento', '$numeroDocumento', '$fechaNacimiento', '$genero', '$telefono', '$correo', '$contrasena', '$tipoUsuario', '$destino', '$fotoFinal', '$fecha')";

    echo '<script>
    alert ("Se ha enviado un link a su correo para confirmar sus datos, revise la bandeja de correos no deseados o spam");
    window.location.href = "login.php";
    </script>';
        
    }else{
    echo '<script>
    alert ("ocurrio un error, contacte al area de soporte");
    window.history.go(-1);
    location.reload(true);
    </script>';
        exit;
    }
}
        
}else{
        echo '
        <script>
        alert ("las contrase���as no coinciden");
        window.history.go(-1);
        </script>';
        exit;
    }

}
}
}
}



$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
    echo '<script>
    alert ("error");
    window.history.go(-1);
    location.reload(true);
    </script>';
    exit;
}else{
    echo '<script>
    alert ("registro exitoso");
    window.history.go(-1);
    location.reload(true);
    </script>';
    exit;
}
mysqli_close($conexion);
