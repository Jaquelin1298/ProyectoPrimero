<?php
include 'conecciones.php';

if(!isset($_POST['buscar'])){
	$_POST['buscar']= "";
	$buscar = $_POST['buscar'];
}


$buscar= $_POST['buscar'];

$SQL_READ = "SELECT ma.idmaquina,ma.nombre, ma.marca, ma.modelo, ma.nserie, ma.codigo, ma.fadquisicion, ma.costo, ma.foto, ma.estado,  mec.nombreMec, mec.ideMecanico 
FROM maquinash ma 
INNER JOIN mecanico mec 
ON ma.ideMecanico=mec.ideMecanico WHERE nombre LIKE '%".$buscar."%' AND estado =1";


$resul1 = mysqli_query($conexion,$SQL_READ);


?>