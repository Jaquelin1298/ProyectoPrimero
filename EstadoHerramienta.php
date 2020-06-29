<?php
require 'conecciones.php';
$estado=$_POST['estado'];
$rut = $_REQUEST['rut'];
$query=mysqli_query($conexion, "UPDATE herramienta SET estado='$estado' WHERE idHerramienta='$rut'");



?>

<script type="text/javascript">
window.location.href='TodasHerramientas.php';
</script>
