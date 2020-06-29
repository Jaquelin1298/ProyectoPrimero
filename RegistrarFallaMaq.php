<?php
include 'conecciones.php';


$rut = $_REQUEST['idmaquina'];
		$falla=$_REQUEST['falla'];
		$consulta = "UPDATE maquinash
									SET
										falla='$falla'
									WHERE
										idmaquina = '$rut'";
										
		$resultado = mysqli_query($conexion, $consulta);
?>
<script type="text/javascript">
	window.location.href='MaquinasHerramientas.php';
</script>

