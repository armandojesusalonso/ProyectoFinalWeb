<?php 
session_start();
  if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
  }else{

      if($_SESSION['usuario']=="ok"){
        $nombreUsuario=$_SESSION["nombreUsuario"];

      }

  }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>



  </head>
  <body>
    
    <?php  $url="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>

    <nav class="navbar navbar-expand navbar-dark  bg-dark pt-3">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#"> <h5>Administrador "La Casa Del Libro"</h5> <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link " href="<?php echo $url;?>/administrador/inicio.php"><h6>inicio</h6></a>
           
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php"><h6>Libros</h6></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php"><h6>Cerrar</h6></a>

            <a class="nav-item nav-link" href="<?php echo $url;?>"><h6>Ver sitio web</h6></a>
        </div>
    </nav>
  <div class="container">
  <br/>
          <div class="row">