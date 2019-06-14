<?php
include "../conexionB-D.php";
require_once '../PHPMailer/PHPMailerAutoload.php';

$correo = $_POST["correo"];
$correo = trim($correo);
$correo = htmlspecialchars($correo);
$gen = md5(uniqid(mt_rand(), false));
    
    
if($correo==""){
    echo '<script>
    alert ("llene todos los campos");
    window.history.go(-1);
    location.reload(true);
    </script>';
    exit;
}

$consulta="SELECT * FROM perfil WHERE correo='$correo'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$nombre = $row["nombre"];
    
if($filas>0){
    
    
    $url='http://becaspnc.org/blackboard/php/modificarContrasena.php?correo='.$correo.'&val='.$gen;
    
    $asunto = 'Recuperar contraseña - BECASPNC';
    $cuerpo = "Estimado $nombre: <br /> <br />Se ha solicitado un reinicio de contraseña, entra al siguiente link para continuar con el proceso <a href='$url'> recuperar contraseña </a>";
        
        require_once '../assets/plugins/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
		$mail->SMTPAuth = true;
		$mail->IsSMTP(); 
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
        $request = 1;
        $modificar = "UPDATE perfil SET token_contrasena='$gen', password_request='$request' WHERE correo='$correo'";
        $resultado = mysqli_query($conexion, $modificar);  
        
        if(!$resultado){
            echo '<script>
            alert ("Ocurrio un error...\nIntente mas tarde o contacte al area de soporte");
            window.history.go(-1);
            location.reload(true);
            </script>';
            exit;
        }else{
    echo '<script>
    alert ("Se ha enviado un link a su correo para recuperar su contraseña");
    window.location.href = "../login.php";
    </script>';
        exit;
        }
    }else{
    echo '<script>
    alert ("ocurrio un error, contacte al area de soporte");
    window.history.go(-1);
    location.reload(true);
    </script>';
        exit;
    }
    
    
    
    
    
    
}else{
    echo '<script>
            alert ("el correo no está registrado");
            window.location.href = "../login.php";
            </script>';
            exit;
}


?>