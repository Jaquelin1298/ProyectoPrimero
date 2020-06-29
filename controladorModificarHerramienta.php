<?php
include 'conecciones.php';
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$estado='1';
$rut = $_REQUEST['idHerramienta'];
		$consulta = "UPDATE herramienta
									SET
										nombre  = '$nombre',
										descripcion = '$descripcion'
										
									WHERE
										idHerramienta = '$rut'";
		$resultado = mysqli_query($conexion, $consulta);
?>
<script type="text/javascript">
	window.location.href='TodasHerramientas.php';
</script>


