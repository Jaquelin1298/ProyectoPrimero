<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- sweet alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>
<?php
require "./conecciones.php";

$ide = $_REQUEST['ide'];
		$consulta1 = "DELETE FROM calculonomina WHERE ide = '$ide'";									
		$resultado1 = mysqli_query($conexion, $consulta1);
		if($resultado1) {  echo "<script> swal({
   title: '¡Éxito!',
   text: 'El empleado ha sido eliminado',
   type: 'success',
 }); window.location.href='Nomina.php';
 </script>";
			
 }
?>

</body>
</html>
<script>
function redireccionar(){window.location="Nomina.php";}
setTimeout ("redireccionar()", 1500);
</script>