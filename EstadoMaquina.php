<?php
require 'conecciones.php';
$estado=$_POST['estado'];
$rut = $_REQUEST['rut'];
$query=mysqli_query($conexion, "UPDATE maquinash SET estado='$estado' WHERE idmaquina='$rut'");



?>

<script type="text/javascript">
window.location.href='MaquinasHerramientas.php';
</script>
