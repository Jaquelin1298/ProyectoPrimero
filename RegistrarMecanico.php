<?php
include 'conecciones.php';


$nlista = $_POST["nlista"];
$nombreMec = $_POST["nombreMec"];
$direccion = $_POST["direccion"];
$fnacimiento = $_POST["fnacimiento"];
$sexo = $_POST["sexo"];
$telefono = $_POST["telefono"];
$sueldo = $_POST["sueldo"];
$clave =(md5($_POST["clave"]));

$foto=$_FILES["foto"];
$foto =$_FILES['foto'];
$nombre_foto=$foto['name'];
$type       =$foto['type'];
$url_temp   =$foto['tmp_name'];

$imgMecanicos ='img_Mecanicos.png';

if ($nombre_foto !='') {

	$destino='imgMecanicos/';
	$img_nombre='img_'.md5(date('d-m-Y H:m:s'));
	$imgMecanicos =$img_nombre.'.JPEG';
	$src =$destino.$imgMecanicos;
}


$insertar = "INSERT INTO mecanico (nlista,nombreMec,direccion,fnacimiento,sexo,telefono,sueldo,avatar,clave) VALUES('$nlista','$nombreMec','$direccion','$fnacimiento','$sexo','$telefono','$sueldo','$imgMecanicos','$clave')";
if ($insertar) {
	if ($nombre_foto !='') {
		move_uploaded_file($url_temp, $src);
		
	}
	          $alert='<p class="msg_save">Producto guardado correctamente.</p>';
	
              }else{
	             $alert='<p class="msg_error">Error al guardar el producto';
     
 }



$verificarmecanico= mysqli_query($conexion, "SELECT * FROM mecanico WHERE nlista='$nlista'");
if (mysqli_num_rows($verificarmecanico)>0) {
	echo "El usuario ya existe intente con uno NUEVO";
	exit;
}


$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
   echo'error al registrarse';
}else{
   echo 'mecanico registrado exitosamente';
}

?>
<script type="text/javascript">
	alert("mecanico Registrado ¡EXITOSAMENTE!");
	window.location.href='mecanicos.php';
</script>

