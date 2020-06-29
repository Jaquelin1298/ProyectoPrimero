<?php
require'conecciones.php';
$query = mysqli_query($conexion,"truncate TABLE calculonomina");

if($query) { header("Location: observaciones.php"); }
?>