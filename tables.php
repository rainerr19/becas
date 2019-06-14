<?php
session_start();
error_reporting(0);

// include "conexionB-D.php";
// $resultado = "SELECT * from perfil";
// $ejecutar = mysqli_query($conexion,$resultado);
// $lista = mysqli_fetch_array($ejecutar);

if($_SESSION['validacion'] == 1){
       ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los usuarios</title>
    <link rel="icon" href="assets/img/icono.png">
  
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/w3.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- ----------------------------data tables--------------- -->
    <link href="assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/> -->
    
</head>
    <?php

    include 'partes/menu_top.php';

    ?>
<body style="background-color: #2a2a2a">

    <div class="container-fluid">
        <div class="row">

        
        <div class="col-md-12 pt-4">                 
            <div class="card border-info mb-2">
            <div class="card-header text-white border-info mb-3" style="background-color: #022606">

                <h2>Lista de usuarios</h2>
           
            </div>
                
                <div class="card-body">
                    <div class="table-responsive">  
                        <table class="table table-bordered table-sm display" id="table_id">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <!-- <th>Becario/Encuesta</th> -->
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Tipo usuario</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            
                        </table>
                       
                                
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php
    include 'partes/footer.php';

    ?>
    <script src="assets/js/dataTableUser.config.js"></script>

                

    </body>
<div class="modal fade" id="modal_delite" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Eliminar usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
            <button id="del_user" type="button" class="btn btn-danger"> Si </button>
            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </html>
    <?php
  }else{
      header("location:login.php");
  }
?>
