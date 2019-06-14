<?php 
//$root_path = $_SERVER['DOCUMENT_ROOT'].'/funledEncuestas/';
$root_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/becas/";
//<?php echo($root_url);?
//
?>
   
<head>
    <link rel="icon" href="<?php echo($root_url);?>assets/img/icono.png">
    <link href="<?php echo($root_url);?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo($root_url);?>assets/css/w3.css" rel="stylesheet" />
    <link href="<?php echo($root_url);?>assets/css/topbutton.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- <link href="<?php echo($root_url);?>assets/css/simple-sidebar.css" rel="stylesheet" /> -->
</head>
