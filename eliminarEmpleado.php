<?php
require "./conecciones.php";

$rut = $_REQUEST['ide'];
		$consulta1 = "DELETE FROM empleado
									
									WHERE
										ide = '$rut'";
										
		$resultado1 = mysqli_query($conexion, $consulta1);

?>
<script type="text/javascript">
	alert("El empleado ha sido Eliminado ¡EXITOSAMENTE!");
	window.location.href='rhempleados.php';
</script>

