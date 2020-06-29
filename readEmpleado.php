<?php
include 'conecciones.php';

if(!isset($_POST['buscar'])){
	$_POST['buscar']= "";
	$buscar = $_POST['buscar'];
}

$buscar= $_POST['buscar'];
//$_SESSION['buscar']= $buscar;
//echo $_SESSION['buscar'];




$SQL_READ = "SELECT * FROM empleado WHERE nlista LIKE '%".$buscar."%'  OR   nombre LIKE '%".$buscar."%'  ";


$resul1 = mysqli_query($conexion,$SQL_READ);



?>