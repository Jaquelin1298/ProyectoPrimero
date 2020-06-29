<?php
include 'conecciones.php';
$nlista = $_POST["nlista"];
$nombre = $_POST["nombre"];
$fnacimiento = $_POST["fnacimiento"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$fingreso = $_POST["fingreso"];
$correo = $_POST["correo"];
$sueldo = $_POST["sueldo"];
$departamento = $_POST["departamento"];
$puesto = $_POST["puesto"];
$contrato = $_POST["contrato"];
$jefe = $_POST["jefe"];
$fimss = $_POST["fimss"];
$sueldoImss = $_POST["sueldoImss"];
$numeroimss = $_POST["numeroimss"];
$direccion = $_POST["direccion"];

$rut = $_REQUEST['ide'];
        $nlista = $_REQUEST['nlista'];
		$nombre = $_REQUEST['nombre'];
		$fnacimiento = $_REQUEST['fnacimiento'];
		$sexo = $_REQUEST['sexo'];
		$telefono = $_REQUEST['telefono'];
		$fingreso = $_REQUEST['fingreso'];
		$correo = $_REQUEST['correo'];
		$sueldo = $_REQUEST['sueldo'];
		$departamento = $_REQUEST['departamento'];
		$puesto = $_REQUEST['puesto'];
		$contrato = $_REQUEST['contrato'];
		$jefe = $_REQUEST['jefe'];
		$fimss = $_REQUEST['fimss'];
		$sueldoImss = $_REQUEST['sueldoImss'];
		$numeroimss = $_REQUEST['numeroimss'];
		$direccion = $_REQUEST['direccion'];

			
		$consulta = "UPDATE empleado
									SET
									    nlista = '$nlista',
										nombre  = '$nombre',
										fnacimiento = '$fnacimiento',
										sexo = '$sexo',
										telefono = '$telefono',
										fingreso = '$fingreso',
										correo = '$correo',
										sueldo = '$sueldo',
										departamento = '$departamento',
										puesto = '$puesto',
										contrato = '$contrato',
										jefe = '$jefe',
										fimss = '$fimss',
										sueldoImss = '$sueldoImss',
										numeroimss = '$numeroimss',
										direccion = '$direccion'
										
									WHERE
										ide = '$rut'";
										
		$resultado = mysqli_query($conexion, $consulta);
?>

<script type="text/javascript">
	window.location.href='rhempleados.php';
</script>


