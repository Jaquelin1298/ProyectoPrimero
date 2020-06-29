<?php
include 'conecciones.php';

//print_r($_FILES);
//exit;



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

$rut = $_REQUEST['idHerramienta'];
		
			
		$consulta = "UPDATE herramienta
									SET
										
										foto='$imgHerramienta'
									WHERE
										idHerramienta = '$rut'";
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
	alert("Herramienta Modificada ¡EXITOSAMENTE!");
	window.location.href='TodasHerramientas.php';
</script>
