<?php
include 'conecciones.php';



$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$estado='1';
$ideMecanico =$_POST["meca"];


$foto=$_FILES["foto"];
$foto =$_FILES['foto'];
$nombre_foto=$foto['name'];
$type       =$foto['type'];
$url_temp   =$foto['tmp_name'];

$imgHerramienta='img_Herramienta.png';

if ($nombre_foto !='') {

	$destino='img/uploads/';
	$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
	$imgHerramienta =$img_nombre.'.JPEG';
	$src =$destino.$imgHerramienta;
}

$insertar = "INSERT INTO herramienta (nombre, descripcion, foto,ideMecanico,estado) VALUES('$nombre','$descripcion','$imgHerramienta','$ideMecanico',$estado)";



$verificarHerramienta= mysqli_query($conexion, "SELECT * FROM herramienta WHERE nombre='$nombre' AND descripcion='$descripcion'");
if (mysqli_num_rows($verificarHerramienta)>0) {
	echo "El usuario ya existe intente con uno NUEVO";
	exit;
}



if ($insertar) {
	if ($nombre_foto !='') {
		move_uploaded_file($url_temp, $src);
		
	}
	          $alert='<p class="msg_save">Producto guardado correctamente.</p>';
	
              }else{
	             $alert='<p class="msg_error">Error al guardar el producto';
     
 }





$resultado = mysqli_query($conexion, $insertar);

?>
<script type="text/javascript">
	alert("Herramienta Registrada ¡EXITOSAMENTE!");
	window.location.href='TodasHerramientas.php';
</script>

