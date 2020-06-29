<link href="css/styles.css" rel="stylesheet">
<?php
include 'conecciones.php';
// validacion de campos
//termina validacion
 
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
$jefe = $_POST["jefe"];
$contrato = $_POST["contrato"];
$fimss = $_POST["fimss"];
$sueldoImss = $_POST["sueldoImss"];
$numeroimss = $_POST["numeroimss"];
$direccion = $_POST["direccion"];
//consulta para insertar datos
$insertar = "INSERT INTO empleado (nlista, nombre, fnacimiento, sexo, telefono, fingreso, correo, sueldo, departamento, puesto, jefe, contrato, fimss, sueldoImss, numeroimss, direccion) VALUES('$nlista','$nombre','$fnacimiento','$sexo', '$telefono', '$fingreso', '$correo', '$sueldo', '$departamento', '$puesto','$jefe','$contrato', '$fimss', '$sueldoImss', '$numeroimss', '$direccion')";


//consulta para verificar si ya existe el registro
$verificarEmpleado= mysqli_query($conexion, "SELECT * FROM empleado WHERE nlista='$nlista'");
if (mysqli_num_rows($verificarEmpleado)>0) {
	echo "El usuario ya existe intente con uno NUEVO";
	exit;
}//
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
   echo'error al registrarse';
}else{
   echo 'empleado registrado exitosamente';
}

?>
<script type="text/javascript">
	alert("Empleado Registrado ¡EXITOSAMENTE!");
	window.location.href='rhempleados.php';
</script>

