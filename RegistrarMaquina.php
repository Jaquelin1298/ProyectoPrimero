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
$ideMecanico= $_POST["meca"];


$foto=$_FILES["foto"];
$foto =$_FILES['foto'];
$nombre_foto=$foto['name'];
$type       =$foto['type'];
$url_temp   =$foto['tmp_name'];

$imgMaquina='img_Maquina.png';

if ($nombre_foto !='') {

	$destino='img/uploads/maquina/';
	$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
	$imgMaquina =$img_nombre.'.JPEG';
	$src =$destino.$imgMaquina;
}

$insertar = "INSERT INTO maquinash (nombre, marca, modelo, nserie, codigo, fadquisicion, costo, foto,ideMecanico,estado) VALUES('$nombre','$marca', '$modelo', '$nserie', '$codigo','$fadquisicion','$costo','$imgMaquina','$ideMecanico',$estado)";



$verificarMaquina= mysqli_query($conexion, "SELECT * FROM maquinash WHERE modelo='$modelo'");
if (mysqli_num_rows($verificarMaquina)>0) {
	echo "La Maquina ya existe intente con una NUEVA";
	exit;
}



if ($insertar) {
	if ($nombre_foto !='') {
		move_uploaded_file($url_temp, $src);
		
	}
	          $alert='<p class="msg_save">Maquina guardada correctamente.</p>';
	
              }else{
	             $alert='<p class="msg_error">Error al guardar la Maquina';
     
 }





$resultado = mysqli_query($conexion, $insertar);

?>
<script type="text/javascript">
	alert("Maquina Registrada ¡EXITOSAMENTE!");
	window.location.href='MaquinasHerramientas.php';
</script>

