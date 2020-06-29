<?php
include 'conecciones.php';
//print_r($_FILES);
//exit;


if(!isset($_POST['buscar'])){
	$_POST['buscar']= "";
	$buscar = $_POST['buscar'];
}


$buscar= $_POST['buscar'];


$SQL_READ = "SELECT * FROM mecanico WHERE tipo='' AND (nlista LIKE '%".$buscar."%'  OR nombreMec LIKE '%".$buscar."%') "; 
$resul1 = mysqli_query($conexion,$SQL_READ);


?>