<?php
include 'conecciones.php';



//print_r($_POST);
//exit;


if (isset($_POST['save'])) {
if (!empty($_FILES['archivo']['name'])) {



$nombre =$_FILES['archivo']['name'];
	$tipo =$_FILES['archivo']['type'];
	$tamaño =$_FILES['archivo']['size'];
	$ruta =$_FILES['archivo']['tmp_name'];
	$destino = "archivosPDF/".$nombre;

        $id = $_REQUEST['id'];
		

  
if($nombre !=""){
		if (copy($ruta, $destino)) {

		$consulta = "UPDATE archivo
									SET
									   
										archivo = '$nombre'
							
										
									WHERE
										id= '$id'";
										

										
		$resultado = mysqli_query($conexion, $consulta);
		if ($resultado) {
				echo "si se guardo";
			}
		}else{
			echo "error";
		}
	}
}
}


header("Location: Archivos.php");

?>
