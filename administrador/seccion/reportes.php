<?php 
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:../index.php");
}else{

    if($_SESSION['usuario']=="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];

    }

}
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
<?php 


include("../config/bd.php");

$sentenciaSQL= $conexion->prepare("SELECT * FROM libros ");
$sentenciaSQL->execute();
$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
 <h1> Reporte de libros </h1>
 <table class="table table-bordered" id="tabla" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
             
            </tr>
        </thead>
        <tbody>
        <?php  foreach($listaLibros as $libro) { ?>
            <tr>
                <td><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['nombre']; ?></td>
                <td>
                
                <img class="" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/sitioweb/img/<?php echo $libro['imagen']; ?>" width="100" alt="" srcset="">

                
                
                </td>

               
            </tr>
           <?php } ?>
        </tbody>
    </table>

</body>
</html>
<?php 

$html=ob_get_clean();
//echo $html;


require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions(); 
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
//$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));

?>
