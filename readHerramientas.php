<?php
include 'conecciones.php';

if(!isset($_POST['buscar'])){
	$_POST['buscar']= "";
	$buscar = $_POST['buscar'];
}


$buscar= $_POST['buscar'];

$SQL_READ = "SELECT he.idHerramienta, he.nombre, he.descripcion, he.foto, he.estado, mec.nombreMec, mec.ideMecanico FROM herramienta he INNER JOIN mecanico mec ON he.ideMecanico=mec.ideMecanico 
WHERE
  nombre LIKE '%".$buscar."%' AND estado=1";


$resul1 = mysqli_query($conexion,$SQL_READ);


?>

