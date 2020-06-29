<?php
include 'conecciones.php';

$fechaIni=$_POST['fechaInicio'];
$fechafi=$_POST['fechaFinal'];

$sql="SELECT * FROM datosnomina WHERE fechaInicio= '{$fechaIni}' AND fechaFin='{$fechafi}'";
$res = mysqli_query($conexion,$sql);
?>