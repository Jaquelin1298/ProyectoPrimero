<?php
require "./conecciones.php";

$rut = $_REQUEST['idHerramienta'];
		$consulta1 = "DELETE FROM herramienta
									
									WHERE
										idHerramienta = '$rut'";
										
		$resultado1 = mysqli_query($conexion, $consulta1);

?>
<script type="text/javascript">
	alert("La herramienta ha sido Eliminada ¡EXITOSAMENTE!");
	window.location.href='TodasHerramientas.php';
</script>

