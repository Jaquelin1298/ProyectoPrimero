<?php
require 'conecciones.php';
//print_r($_POST);
//exit;
$meDias = $_POST["meDias"];
if ($meDias>12) {?>
	<script type="text/javascript">
		alert('La semana sólo tiene 12 medios días');
		window.location.href='Nomina.php';
	</script>
	
<?php }else{
$sueldo = $_REQUEST['sueldo'];
$ide = $_REQUEST['ide'];
$estado = $_POST["estado"];
$prestamo = $_POST["prestamo"];

    $s=$sueldo/12;
	$t=$s*$meDias;
	$m=$sueldo-$t;
	
//poner la variable $m en lugar de $faltantes

    $s=$sueldo/12;
	$t=$s*$meDias;
   
//poner la variable $t en lugar de $subtotal
    $p=$t-$prestamo;
    
//poner la variable $p en lugar de total


//poner una consulta que verifique si existe un usuario ya existe
if ($estado !='Aprobado') {?>
	<script type="text/javascript">
		window.location.href='Nomina.php';
</script>
<?php }else{
$insertar = "INSERT INTO calculonomina (meDias,faltantes, subtotal, prestamo, total, estado,ide) VALUES('$meDias','$m','$t','$prestamo','$p','$estado','$ide')";


$verificar= mysqli_query($conexion, "SELECT * FROM calculonomina WHERE ide='$ide'");
if (mysqli_num_rows($verificar)>0) {?>
	
	<script type="text/javascript">
		alert('Ya realizó el cálculo de este Empleado');
		window.location.href='Nomina.php';
</script>
	
<?php
exit; }

$resultado = mysqli_query($conexion, $insertar);

}
}
?>
<script type="text/javascript">
		window.location.href='Nomina.php';
</script>
