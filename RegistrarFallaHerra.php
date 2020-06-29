<?php
include 'conecciones.php';


$rut = $_REQUEST['idHerramienta'];
		$falla=$_REQUEST['falla'];
		$consulta = "UPDATE herramienta
									SET
										falla='$falla'
									WHERE
										idHerramienta = '$rut'";
										
		$resultado = mysqli_query($conexion, $consulta);
?>
<script type="text/javascript">
	window.location.href='TodasHerramientas.php';
</script>

