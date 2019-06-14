<?php
    include "../conexionB-D.php";
    require_once '../assets/plugins/PHPMailer/PHPMailerAutoload.php';
    
    $correo=$_REQUEST['correo'];
    $estado = "Rechazado";

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM encuesta_ingreso_policia WHERE correo ='$correo' and estado='Rechazado' ");
    
    
$consulta="SELECT * FROM perfil WHERE correo='$correo'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
$row = mysqli_fetch_array($resultado);
$nombre = $row["nombre"];
    
    
     if (mysqli_num_rows($verificar_correo) >0){
        echo '
        <script>
        alert ("El usuario ya ha sido Rechazado anteriormente");
        window.location.href = "../encuestas-realizadas.php";
        </script>';
        exit;
     }else{
         
             
            
            $asunto = 'Respuesta de encuesta - BECASPNC';
            $cuerpo = "Estimado $nombre: <br/> la encuesta que ha realizado ha sido rechazada <br/>";
            $mail = new PHPMailer();
		    $mail->Host = 'mail.becaspnc.org';
		    $mail->Port = 465;
		    $mail->SMTPAuth = true;
		    $mail->Username = 'info@becaspnc.org';
		    $mail->Password = 'b1?^r(ZU-Uhi';			
		    $mail->setFrom('info@becaspnc.org', 'BECASPNC');
		    $mail->addAddress($correo, $nombre);		
		    $mail->Subject = $asunto;
		    $mail->Body    = $cuerpo;
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            if($mail->send()){
                  $insertar ="UPDATE encuesta_ingreso_policia SET estado='$estado' WHERE correo='$correo'";
         $resultado = mysqli_query($conexion, $insertar);

         if(!$resultado){
             echo '
            <script>
            alert ("Ocurrio un error, contacte al area de soporte");
            window.history.go(-1);
            </script>';
            exit;
         }else{
                echo '
                <script>
                alert ("Usuario rechazado");
                window.location.href = "../encuestas-realizadas.php";
                </script>';
                exit;
         }    
            }else{
                echo '
                <script>
                alert ("Ocurrio un error...\nIntente mas tarde o contacte al area de soporte");
                window.history.go(-1);
                </script>';
                exit;
            } 
             
             
             
         }
     
?>