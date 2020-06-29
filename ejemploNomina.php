<?php
session_start();
$_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header("location: index.php");
  }
  if ($_SESSION['username'] !='Admin') {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nómina</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>

<?php
require'conecciones.php';

$ide=$_POST['ide'];
$nlista=$_POST['nlista'];
$nombre=$_POST['nombre'];
$sueldo=$_POST['sueldo'];
$meDias=$_POST['meDias'];
$faltantes=$_POST['faltantes'];
$subtotal=$_POST['subtotal'];
$prestamo=$_POST['prestamo'];
$total=$_POST['total'];
$estado=$_POST['estado'];
$fechaInicio=$_POST['fechaInicio'];
$fechaFin=$_POST['fechaFin'];


if (empty($fechaInicio)) {
	 echo "<script> swal({
   title: '¡ERROR!',
   text: 'Es obligatorio ingresar Fecha de Inicio y Fin de Semana',
   type: 'error',

 });  
 </script>";
 
}elseif (empty($fechaFin)) {
	 echo "<script> swal({
   title: '¡ERROR!',
   text: 'Es obligatorio ingresar Fecha de Inicio y Fin de Semana',
   type: 'error',

 }); 
 </script>";
}else{
$verificar= mysqli_query($conexion, "SELECT * FROM datosnomina WHERE fechaInicio='$fechaInicio' AND fechaFin='$fechaFin' AND nlista='22'");
if (mysqli_num_rows($verificar)>0) {?>
	<script type="text/javascript">
		alert("El Empleado ya fue ingresado en esta Nómina");
		window.location.href='Nomina.php';
</script>
<?php }else{
 $cadena="INSERT INTO datosnomina (meDias, nlista, nombre, sueldo,faltantes,subtotal,prestamo,total, estado,fechaInicio,fechaFin) VALUES ";

for ($i=0; $i < count($meDias); $i++) { 
  $cadena.="('".$meDias[$i]."','".$nlista[$i]."','".$nombre[$i]."','".$sueldo[$i]."','".$faltantes[$i]."','".$subtotal[$i]."','".$prestamo[$i]."','".$total[$i]."','".$estado[$i]."','".$fechaInicio."','".$fechaFin."'),";
}
$cadena_final=substr($cadena, 0, -1);
$cadena_final.=";";

if($conexion->query($cadena_final)){
  header("Location: truncate.php");
}
else{
  echo 'error al registar';
}
$conexion->close();
//echo json_encode(array('cadena'=> $cadena));
}
}
?>
</body>
</html>
<script>
function redireccionar(){window.location="Nomina.php";}
setTimeout ("redireccionar()", 1500);
</script>