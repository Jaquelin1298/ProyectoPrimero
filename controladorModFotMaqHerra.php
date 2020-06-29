<?php
include 'conecciones.php';
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
$rut = $_REQUEST['idmaquina'];
		$consulta = "UPDATE maquinash
									SET
										
										foto='$imgMaquina'
									WHERE
										idmaquina = '$rut'";
										if ($consulta) {
	if ($nombre_foto !='') {
		move_uploaded_file($url_temp, $src);
		
	}
	          $alert='<p class="msg_save">Producto modificado correctamente.</p>';
	
              }else{
	             $alert='<p class="msg_error">Error al modificar el producto';
     
 }





		$resultado = mysqli_query($conexion, $consulta);




?>

<script type="text/javascript">
	window.location.href='MaquinasHerramientas.php';
</script>
