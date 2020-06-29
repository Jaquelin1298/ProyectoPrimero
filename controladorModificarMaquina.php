<?php
include 'conecciones.php';
$nombre = $_POST["nombre"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$nserie = $_POST["nserie"];
$codigo = $_POST["codigo"];
$fadquisicion = $_POST["fadquisicion"];
$costo = $_POST["costo"];
$estado='1';


$rut = $_REQUEST['idmaquina'];
		

			
		$consulta = "UPDATE maquinash
									SET
										nombre  = '$nombre',
										marca = '$marca',
										modelo = '$modelo',
										nserie = '$nserie',
										codigo = '$codigo',
										fadquisicion = '$fadquisicion',
										costo = '$costo'
										
									WHERE
										idmaquina = '$rut'";
										

		$resultado = mysqli_query($conexion, $consulta);
?>
<script type="text/javascript">
	window.location.href='MaquinasHerramientas.php';
</script>


