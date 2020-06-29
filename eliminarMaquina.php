<?php
require "./conecciones.php";

$rut = $_REQUEST['idmaquina'];
		$consulta1 = "DELETE FROM maquinash
									
									WHERE
										idmaquina = '$rut'";
										
		$resultado1 = mysqli_query($conexion, $consulta1);

?>
<script type="text/javascript">
	window.location.href='MaquinasHerramientas.php';
</script>

