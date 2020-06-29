<?php
require "./conecciones.php";

$rut = $_REQUEST['ideMecanico'];
		$consulta1 = "DELETE FROM mecanico
									
									WHERE
										ideMecanico = '$rut'";
										
		$resultado1 = mysqli_query($conexion, $consulta1);

?>
<script type="text/javascript">
	alert("El mecanico ha sido eliminado ¡EXITOSAMENTE!");
	window.location.href='mecanicos.php';
</script>

