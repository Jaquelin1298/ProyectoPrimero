<?php
include 'conecciones.php';

$nlista =$_POST["nlista"];
$nombreMec = $_POST["nombreMec"];
$direccion = $_POST["direccion"];
$fnacimiento=$_POST["fnacimiento"];
$sexo=$_POST["sexo"];
$telefono=$_POST["telefono"];
$sueldo=$_POST["sueldo"];


$rut = $_REQUEST['ideMecanico'];
		$nlista = $_REQUEST['nlista'];
	    $nombreMec = $_REQUEST['nombreMec'];
		$direccion = $_REQUEST['direccion'];
		$fnacimiento = $_REQUEST['fnacimiento'];
		$sexo = $_REQUEST['sexo'];
		$telefono =$_REQUEST['telefono'];
		$sueldo = $_REQUEST['sueldo'];


		$consulta = "UPDATE mecanico
									SET
									    nlista  = '$nlista',
										nombreMec  = '$nombreMec',
										direccion = '$direccion',
										fnacimiento = '$fnacimiento',
										sexo = '$sexo',
										telefono = '$telefono',
										sueldo = '$sueldo'
										
									WHERE
										ideMecanico= '$rut'";
										
		$resultado = mysqli_query($conexion, $consulta);
?>

<script type="text/javascript">
	window.location.href='mecanicos.php';
</script>
