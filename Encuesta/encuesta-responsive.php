<?php
    session_start();
    error_reporting(0);


    if($_SESSION['validacion'] == 2 || $_SESSION['validacion'] == 1){        
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Encuesta - Fundacion leones educando</title>
        <link href="../assets/css/style.css" rel="stylesheet" />
        <link href="../assets/css/main-style.css" rel="stylesheet" />

        <?php
            include '../partes/link_head.php';
        ?>
    </head>

<body class="body_encuesta">
<?php

include '../partes/menu_top.php';

?>
    <div class="contenido">     

        <form action="envio-encuesta1.php" class="form-encuesta" method="post">
            <h2 class="form-titulo">ENCUESTA PARA RECIÉN INGRESADOS A LA POLÍCIA NACIONAL</h2>
            <div class="contenedor-encuesta">

                <div class="div-encuesta-top">

                    <h4 class="input-encuesta">1.Apellido</h4>
                    <h4 class="input-encuesta">2.Nombre</h4>

                    <input type="text" class="input-encuesta" placeholder="Apellido" name="apellido" id="apellido" value="<?php echo $_SESSION['apellido']; echo" "; echo $_SESSION['segundoApellido']; ?>" disabled>
                    <input type="text" class="input-encuesta" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" disabled>

                    <h4 class="input-encuesta">3.Documento</h4>
                    <h4 class="input-encuesta">4.Escuela de policia</h4>
                    <input type="text" class="input-encuesta" placeholder="Documento" name="documento" id="documento"
                    
                    <?php if(!empty($_SESSION['numeroDocumento'])){
                    echo "value='";
                    echo $_SESSION['numeroDocumento'];
                    echo "'";
                    echo "disabled";
                    } ?>
                        
                            
                    required>
                    <input type="text" class="input-encuesta" placeholder="Escuela de policia" name="escuela" id="escuela" required>

                    <h4 class="input-encuesta">5. Municipio</h4>
                    <h4 class="input-encuesta">6. Barrio o Ranchería</h4>
                    <input type="text" placeholder="Municipio" class="input-encuesta" name="preg_1" id="preg_1" required>
                    <input type="text" placeholder="Barrio o Ranchería" class="input-encuesta" id="preg_2" name="preg_2"required>

                    <h4 class="input-encuesta2">7. Sexo</h4>
                    <h4 class="input-encuesta2">8. Estrato</h4>
                    <div class="input-encuesta2">
                        <input type="radio" value="M" name="preg_3" id="preg_3"> <label>M </label>&nbsp;
                        <input type="radio" value="F" name="preg_3" id="preg_3"> <label>F </label>&nbsp;
                    </div>

                    <div class="input-encuesta2">
                        <input type="radio" value="1" name="preg_4" id="preg_4"> <label>1 </label>&nbsp;
                        <input type="radio" value="2" name="preg_4" id="preg_4"> <label>2 </label>&nbsp;
                        <input type="radio" value="3" name="preg_4" id="preg_4"> <label>3 </label>&nbsp;
                        <input type="radio" value="rural" name="preg_4" id="preg_4"> <label>RURAL </label>&nbsp;
                    </div>

                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>9.Composición Familiar: cantidad de personas en las siguientes edades que hay en su familia:</h4>
                    <table class="table-encuesta" border="1px">
                        <tr>
                            <th><label>Edades de los miembros de la familia</label></th>
                            <th><label>Cantidad de personas</label></th>
                        </tr>
                        <tr>
                            <th><label>0 a 5 años</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_1" name="preg_5_opc_1" required></th>
                        </tr>
                        <tr>
                            <th><label>6-13 años</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_2" name="preg_5_opc_2" required></th>
                        </tr>
                        <tr>
                            <th><label>14-17 años</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_3" name="preg_5_opc_3" required></th>
                        </tr>
                        <tr>
                            <th><label>18-26 años</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_4" name="preg_5_opc_4" required></th>
                        </tr>
                        <tr>
                            <th><label>27-59 años</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_5" name="preg_5_opc_5" required></th>
                        </tr>
                        <tr>
                            <th><label>60 años o más</label></th>
                            <th><input style="text-align:center;" type="text" class="input-tablas" placeholder="Ingrese el numero aquí" id="preg_5_opc_6" name="preg_5_opc_6" required></th>
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>10.¿Número de personas que trabajan en la familia? </h4><input type="text" name="preg_6" placeholder="Ingrese el numero aquí">
                </div>
                <p></p>
                <div class="div-encuesta">

                    <h4>11. ¿Cómo percibe usted la participación de miembros de su comunidad en el programa de formación de la Policía Nacional?</h4> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="A"><label> A. No lo conocía</label> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="B"><label> B. Mejor paga</label> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="C"><label> C. No es bien visto</label> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="D"><label> D. Es necesario</label> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="E"><label> E. Buena oportunidad <br></label> <br>
                    <input type="radio" name="preg_7" id="preg_7" value="Otro"><label> F. ¿Otra?, Cual? </label><input type="text" name="preg_7_otro" id="preg_7_otro" placeholder="¿Otra?, Cual?"><br>

                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>12. ¿Qué percepción hay en su comunidad de la presencia de los siguientes actores?</h4><br>

                    <table border="1px" class="table-encuesta">
                        <tr>
                            <th><label>Actores</label></th>
                            <th><label>Opciones</label></th>
                        </tr>

                        <tr>
                            <th><label>Gobierno</label></th>
                            <th>
                                <select name="preg_8_opc_1" id="preg_8_opc_1" required>
                                    <option></option>
                                    <option value="nada">Nada beneficiosa</option>
                                    <option value="poco">Poco beneficiosa</option>
                                    <option value="indiferente">Indiferente</option>
                                    <option value="beneficiosa">Beneficiosa</option>
                                    <option value="muy beneficiosa">Muy beneficiosa</option>
                                </select>
                            </th>

                        </tr>
                        <tr>
                            <th><label>Policía Nacional</label></th>
                            <th>
                                <select name="preg_8_opc_2" id="preg_8_opc_2" required>
                                    <option></option>
                                    <option value="nada">Nada beneficiosa</option>
                                    <option value="poco">Poco beneficiosa</option>
                                    <option value="indiferente">Indiferente</option>
                                    <option value="beneficiosa">Beneficiosa</option>
                                    <option value="muy beneficiosa">Muy beneficiosa</option>
                                </select>                            
                            </th>                        
                        </tr>
                        <tr>
                            <th><label>Ejercito</label></th>
                            <th>
                                <select name="preg_8_opc_3" id="preg_8_opc_3" required>
                                    <option></option>
                                    <option value="nada">Nada beneficiosa</option>
                                    <option value="poco">Poco beneficiosa</option>
                                    <option value="indiferente">Indiferente</option>
                                    <option value="beneficiosa">Beneficiosa</option>
                                    <option value="muy beneficiosa">Muy beneficiosa</option>
                                </select>   
                            </th>
                            
                        </tr>
                        <tr>
                            <th><label>Organizaciones al margen <br> de la ley</label></th>
                            <th>
                                <select name="preg_8_opc_4" id="preg_8_opc_4" required>
                                    <option></option>
                                    <option value="Nada beneficiosa">Nada beneficiosa</option>
                                    <option value="Poco beneficiosa">Poco beneficiosa</option>
                                    <option value="Indiferente">Indiferente</option>
                                    <option value="Beneficiosa">Beneficiosa</option>
                                    <option value="Muy beneficiosa">Muy beneficiosa</option>
                                </select>   
                            </th>
                       
                        </tr>
                        <tr>
                            <th><label>Grupos ilegales <br> armados</label></th>
                            <th>
                                <select name="preg_8_opc_5" id="preg_8_opc_5" required>
                                    <option></option>
                                    <option value="nada">Nada beneficiosa</option>
                                    <option value="poco">Poco beneficiosa</option>
                                    <option value="indiferente">Indiferente</option>
                                    <option value="beneficiosa">Beneficiosa</option>
                                    <option value="muy beneficiosa">Muy beneficiosa</option>
                                </select>   
                            </th>
                    
                        </tr>
                        <tr>
                            <th><label>Pandillas</label></th>
                            <th>
                                <select name="preg_8_opc_6" id="preg_8_opc_6" required>
                                    <option></option>
                                    <option value="nada">Nada beneficiosa</option>
                                    <option value="poco">Poco beneficiosa</option>
                                    <option value="indiferente">Indiferente</option>
                                    <option value="beneficiosa">Beneficiosa</option>
                                    <option value="muy beneficiosa">Muy beneficiosa</option>
                                </select>   
                            </th>
                       
                        </tr>
                        <tr>
                            <th><label>¿Otra?, cual?</label></th>
                            <th colspan="5"><input type="text" name="preg_8_opc_7" id="preg_8_opc_7" value="" class="input-tablas" placeholder="¿Otra?, cual?"></th>
                        </tr>

                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>13. ¿Por qué razón los jóvenes de su comunidad entrarían a ser parte de grupos ilegales?:</h4><br>
                    <input type="radio" name="preg_9" id="preg_9" value="A"><label> A. Influencia de amigos </label> <br>
                    <input type="radio" name="preg_9" id="preg_9" value="B"><label> B. Mejor paga </label> <br>
                    <input type="radio" name="preg_9" id="preg_9" value="C"><label> C. Dinero facil </label> <br>
                    <input type="radio" name="preg_9" id="preg_9" value="D"><label> D. No hay oportunidades de trabajo </label> <br>
                    <input type="radio" name="preg_9" id="preg_9" value="E"><label> E. Presión de los grupos ilegales </label> <br>
                    <input type="radio" name="preg_9" id="preg_9" value="Otro"><label> F. ¿otra?, cual?: </label><input type="text" name="preg_9_otro" id="preg_9_otro" placeholder="¿otra?, cual?">
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>14. ¿Que lo motivó a participar en la Policía Nacional?:</h4><br>
                    <input type="radio" name="preg_10" id="preg_10" value="A"><label> A. Gusto </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="B"><label> B. Dinero </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="C"><label> C. Poder </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="D"><label> D. Disciplina </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="E"><label> E. Única opción </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="F"><label> F. Servir </label> <br>
                    <input type="radio" name="preg_10" id="preg_10" value="Otro"><label> G. ¿Otra?, Cual?: </label><input type="text" name="preg_10_otro" id="preg_10_otro" placeholder="¿Otra?, Cual?">
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>15. ¿Qué tan dificil es en su comunidad encontrar la presencia de los siguientes actores?:</h4> <br>
                    <table border="1px" class="table-encuesta">
                        <tr>
                            <th><label>Actores </label></th>
                            <th><label>Opciones</label></th>                            
                        </tr>

                        <tr>
                            <th><label>Gobierno</label></th>
                            <th>
                                <select name="preg_11_opc_1" id="preg_11_opc_1" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th><label>Policía Nacional</label></th>
                            <th>
                                <select name="preg_11_opc_2" id="preg_11_opc_2" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>                            
                        </tr>
                        <tr>
                            <th><label>Ejercito</label></th>
                            <th>
                                <select name="preg_11_opc_3" id="preg_11_opc_3" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>          
                        </tr>
                        <tr>
                            <th><label>Organizaciones al margen <br> de la ley</label></th>
                            <th>
                                <select name="preg_11_opc_4" id="preg_11_opc_4" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>          
                        </tr>
                        <tr>
                            <th><label>Grupos ilegales armados</label></th>
                            <th>
                                <select name="preg_11_opc_5" id="preg_11_opc_5" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>          
                        </tr>
                        <tr>
                            <th><label>Pandillas</label></th>
                            <th>
                                <select name="preg_11_opc_6" id="preg_11_opc_6" required>
                                    <option></option>
                                    <option value="Muy dificil">Muy dificil</option>
                                    <option value="Algo dificil">Algo dificil</option>
                                    <option value="No se">No se</option>
                                    <option value="Algo facil">Algo facil</option>
                                    <option value="Muy facil">Muy facil</option>
                                </select>
                            </th>          
                        </tr>
                        <tr>
                            <th><label> ¿Otros?, Cuáles?</label></th>
                            <th colspan="5"><input type="text" name="preg_11_opc_7" id="preg_11_opc_7" class="input-tablas" placeholder="¿Otros?, Cuáles?"></th>
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>16. ¿A través de qué medio de comunicación recibió información sobre el programa de becas de la Policía Nacional?:</h4> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="A"> <label> A. Ninguno </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="B"> <label> B. TV </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="C"> <label> C. Radio </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="D"> <label> D. Internet  </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="E"> <label> E. Celular </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="F"> <label> F. prensa </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="G"> <label> G. revistas </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="H"> <label> H. Volantes </label> <br>
                    <input type="radio" name="preg_12" id="preg_12" value="Otro"> I. ¿Otro?, Cual? <input type="text" name="preg_12_otro" id="preg_12_otro" placeholder="¿Otro?, Cual?"> <br>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>17. ¿Qué tan importante es para Ud. Los siguientes servicios al entra a la Policía?:</h4> <br>
                    <table border="1px" class="table-encuesta">
                        <tr>
                            <th><label> servicios</label></th>
                            <th><label> Grado de importancia</label></th>
                        </tr>                        
                        <tr>
                            <th><label> Variedad de trabajo</label></th>
                            
                            <th>
                                <select name="preg_13_opc_1" id="preg_13_opc_1" required>
                                    <option></option>
                                    <option value="Sin importancia">Sin importancia</option>
                                    <option value="Casi sin importancia">Casi sin importancia</option>
                                    <option value="Sin opinion">Sin opinion</option>
                                    <option value="Algo importante">Algo importante</option>
                                    <option value="Absolutamente importante">Absolutamente importante</option>
                                </select>   
                            </th>                            
                            
                        </tr>
                        <tr>
                            <th><label> Recibir buena atención al entrar</label></th>
                            <th>
                                <select name="preg_13_opc_2" id="preg_13_opc_2" required>
                                    <option></option>
                                    <option value="Sin importancia">Sin importancia</option>
                                    <option value="Casi sin importancia">Casi sin importancia</option>
                                    <option value="Sin opinion">Sin opinion</option>
                                    <option value="Algo importante">Algo importante</option>
                                    <option value="Absolutamente importante">Absolutamente importante</option>
                                </select>   
                            </th>       
                        </tr>
                        <tr>
                            <th><label>Consideración en su Comunidad</label></th>
                            <th>
                                <select name="preg_13_opc_3" id="preg_13_opc_3" required>
                                    <option></option>
                                    <option value="Sin importancia">Sin importancia</option>
                                    <option value="Casi sin importancia">Casi sin importancia</option>
                                    <option value="Sin opinion">Sin opinion</option>
                                    <option value="Algo importante">Algo importante</option>
                                    <option value="Absolutamente importante">Absolutamente importante</option>
                                </select>   
                            </th>       
                        </tr>
                        <tr>
                            <th><label>Conocimiento y explicación clara <br> por parte del personal</label></th>
                            <th>
                                <select name="preg_13_opc_4" id="preg_13_opc_4" required>
                                    <option></option>
                                    <option value="Sin importancia">Sin importancia</option>
                                    <option value="Casi sin importancia">Casi sin importancia</option>
                                    <option value="Sin opinion">Sin opinion</option>
                                    <option value="Algo importante">Algo importante</option>
                                    <option value="Absolutamente importante">Absolutamente importante</option>
                                </select>   
                            </th>       
                        </tr>
                        <tr>
                            <th><label>¿Otros?, cual?:</label></th>
                            <th colspan="5"><input type="text" name="preg_13_opc_5" id="preg_13_opc_5" class="input-tablas" placeholder="¿Otro?, cual?"></th>
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>18. ¿Cómo Valora los siguientes atributos de la Policía Nacional ahora que hace parte de ella?:</h4> <br>

                    <table border="1px" class="table-encuesta">
                        <tr>
                            <th><label>Atributo </label></th>
                            <th><label>Valoración </label></th>
                        </tr>
                        <tr>
                            <th> <label> Relación de Calidad  </label></th>
                            <th>
                                <select name="preg_14_opc_1" id="preg_14_opc_1" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th> <label> Orientación hacia la Satisfacción <br> del Cliente </label></th>
                            <th>
                                <select name="preg_14_opc_2" id="preg_14_opc_2" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th> <label> Servicio de respuestas <br> a solicitudes </label></th>
                            <th>
                                <select name="preg_14_opc_3" id="preg_14_opc_3" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th> <label> Difusión de programas <br> y proyectos sociales </label></th>
                            <th>
                                <select name="preg_14_opc_4" id="preg_14_opc_4" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th> <label> Profesionalidad </label></th>
                            <th>
                                <select name="preg_14_opc_5" id="preg_14_opc_5" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th> <label> Bien Organizada </label></th>
                            <th>
                                <select name="preg_14_opc_6" id="preg_14_opc_6" required>
                                    <option></option>
                                    <option value="Muy bajo">Muy bajo</option>
                                    <option value="Bajo">Bajo</option>
                                    <option value="Alto">Alto</option>
                                    <option value="Muy alto">Muy alto</option>
                                </select>   
                            </th>    
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>19. ¿Qué percepción tienen en su comunidad y/o Familia sobre su ingreso al programa de Formación de la Policía Nacional?:</h4> <br>
                    <table class="table-encuesta">
                        <tr>
                            <th> <label>Ninguno:</label> <input type="radio" name="preg_15" id="preg_15" value="Ninguno"><br></th>
                            <th> <label>Malo: </label> <input type="radio" name="preg_15" id="preg_15" value="Malo"><br></th>
                            <th> <label>Regular: </label> <input type="radio" name="preg_15" id="preg_15" value="Regular"><br></th>
                            <th> <label>Bueno: </label> <input type="radio" name="preg_15" id="preg_15" value="Bueno"><br></th>
                            <th> <label>Excelente: </label> <input type="radio" name="preg_15" id="preg_15" value="Exelente"><br></th>
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>20. ¿Saben en su comunidad y/o familia que usted está becado por la embajada de los Estados Unidos?:</h4> <br>
                    <input type="radio" name="preg_16" id="preg_16" value="A"> <label> A. No lo conocían </label> <br>
                    <input type="radio" name="preg_16" id="preg_16" value="B"> <label> B. No creían </label> <br>
                    <input type="radio" name="preg_16" id="preg_16" value="C"> <label> C. No es bien visto </label> <br>
                    <input type="radio" name="preg_16" id="preg_16" value="D"> <label> D. Es necesario </label> <br>
                    <input type="radio" name="preg_16" id="preg_16" value="E"> <label> E. Plenamente conocido </label> <br>


                </div>
                <P></P>
                <div class="div-encuesta">
                    <h4>21. ¿Cómo lo califica usted El programa de becas de la embajada de los E.E.U.U?:</h4> <br>
                    <input type="radio" name="preg_17" id="preg_17" value="A"> <label> A. Indiferente: </label> <br>
                    <input type="radio" name="preg_17" id="preg_17" value="B"> <label> B. Malo: </label> <br>
                    <input type="radio" name="preg_17" id="preg_17" value="C"> <label> C. Regular: </label> <br>
                    <input type="radio" name="preg_17" id="preg_17" value="D"> <label> D. Bueno: </label> <br>
                    <input type="radio" name="preg_17" id="preg_17" value="E"> <label> E. Excelente: </label> <br>

                </div>
                <P></P>
                <div class="div-encuesta">
                    <h4>22. Usted le gustaría al momento de terminar esta fase</h4> <br>
                    <input type="radio" name="preg_18" id="preg_18" value="A"> <label> A. no continuar  </label> <br>
                    <input type="radio" name="preg_18" id="preg_18" value="B"> <label> B. continuar  </label> <br>
                    <input type="radio" name="preg_18" id="preg_18" value="C"> <label> C. estudiar otra cosa  </label ><br>     
           <input type="radio" name="preg_18" id="preg_18" value="D"> <label> D. buscar otra opción en las fuerzas militares  </label> <br>

                </div>
                <P></P>
                <div class="div-encuesta">
                    <h4>23. ¿Cuál de las siguientes opciones era la más importante para usted?:</h4>
                    <table border="1px" class="table-encuesta">
                        <tr>
                            <th>Actores</th>
                            <th>Valoración</th>                            
                        </tr>

                        <tr>
                            <th>Armada Nacional</th>
                            <th>
                                <select name="preg_19_opc_1" id="preg_19_opc_1" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>Policía Nacional</th>
                            <th>
                                <select name="preg_19_opc_2" id="preg_19_opc_2" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>Ejercito</th>
                            <th>
                                <select name="preg_19_opc_3" id="preg_19_opc_3" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>Organizaciones al margen de la ley</th>
                            <th>
                                <select name="preg_19_opc_4" id="preg_19_opc_4" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>Grupos ilegales armados</th>
                            <th>
                                <select name="preg_19_opc_5" id="preg_19_opc_5" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>Pandillas</th>
                            <th>
                                <select name="preg_19_opc_6" id="preg_19_opc_6" required>
                                    <option></option>
                                    <option value="Nada importante">Nada importante</option>
                                    <option value="Algo">Algo</option>
                                    <option value="No se">No se</option>
                                    <option value="Muy importante">Muy importante</option>
                                </select>   
                            </th>    
                        </tr>
                        <tr>
                            <th>¿Otros?, Cuáles?</th>
                            <th colspan="5"><input type="text" name="preg_19_opc_7" id="preg_19_opc_7" value="" class="input-tablas" placeholder="¿Otros?, Cuáles?"></th>
                        </tr>
                    </table>
                </div>
                <p></p>
                <div class="div-encuesta">
                    <h4>24. ¿A qué personas le ha recomendado o recomendaría pertenecer a la Policía Nacional?:</h4> <br>
                    <input type="radio" name="preg_20" id="preg_20" value="A"><label>  A. Familiares </label> <br>
                    <input type="radio" name="preg_20" id="preg_20" value="B"><label>  B. Amigos </label> <br>
                    <input type="radio" name="preg_20" id="preg_20" value="Otro"><label>   C. ¿Otros?, cuales? </label><input type="text" name="preg_20_otro" id="preg_20_otro" value="" placeholder="¿Otros?, Cuáles?"> <br>

                </div>
                <p></p>
            </div>
            <div style="text-align: center; padding:25px;" class="div-encuesta-top">
                <input type="submit" class="submit-encuesta">
                <input type="reset" class="submit-encuesta2" value="limpiar">

            </div>
        </form>
        </div>
     
        <?php
        include '../partes/footer.php';

        ?>
    </body>

</html>
<?php
  }else{
      header("location:../login.php");
  }
?>
