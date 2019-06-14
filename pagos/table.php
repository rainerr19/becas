<?php
session_start();
error_reporting(0);

if($_SESSION['validacion'] == 1){
       ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de pagos</title>
    <?php
        include '../partes/link_head.php';
    ?>
    <!-- ----------------------------data tables--------------- -->
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />    
</head>
    <?php

    include '../partes/menu_top.php';

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
                        <table class="table table-bordered table-sm display" id="tablePagos">
                            <thead>
                                <tr>
                                   <th>Id </th> 

                                   <th> Nombres/Apellidos </th>  	
                                   <th> Cedula </th>  
                                   <th> Escuela</th> 
                                   <th> Grupo nombre</th> 
                                   <th> Genero</th> 
                                   <th> Pagos de equipos</th> 
                                   <th> Pagos de matriculas</th>  	
                                   <th> Pagos Marzo</th> 
                                   <th> Pago Abril</th> 
                                   <th> Pago Mayo </th> 
                                   <th> Total consignado</th> 
                                </tr>
                            </thead>
                            
                        </table>
                       
                                
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php
    include '../partes/footer.php';

    ?>
    <script src="../assets/js/dataTablePagos.config.js"></script>

</body>
</html>
                
    <?php
  }else{
      header("location:../login.php");
  }
?>
