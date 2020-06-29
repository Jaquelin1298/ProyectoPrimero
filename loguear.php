
<?php
require 'conecciones.php';
session_start();
$nombreMec=$_POST['nombreMec'];
$clave=$_POST['clave'];
if ($nombreMec=='Admin' && $clave=='hola') {
	$_SESSION['username'] = $nombreMec;
	header("Location: Nomina.php");
}else{


  $nombreMec = mysqli_real_escape_string($conexion,$_POST['nombreMec']);
  $nombreMec = strip_tags($_POST['nombreMec']);
  $nombreMec = trim($_POST['nombreMec']);

$clave = mysqli_real_escape_string($conexion,$_POST['clave']);
$clave = strip_tags($_POST['clave']);
$clave = md5($_POST['clave']);

	$query = mysqli_query($conexion,"SELECT * FROM mecanico WHERE nombreMec = '$nombreMec' AND clave = '$clave'");
	
	$contar = mysqli_num_rows($query);
	
	if ($contar != 0) {
	
		while($row=mysqli_fetch_array($query)) {
		
			if($nombreMec == $row['nombreMec'] && $clave == $row['clave']) 
			
			{
			//revisar si le puedo poner otro algoritmo mas seguro que md5
				$_SESSION['username'] = $nombreMec;
				
				$_SESSION['id'] = $row['ideMecanico'];

				$foto= 'imgMecanicos/'.$row['avatar'];
				
				//$_SESSION['rango'] = $row['rango'];
				
				header("Location: Cursos.php");
				
			}
			
			
		} 
		
	} else {
	  header("Location: index.php"); 
	}
	
}
?>