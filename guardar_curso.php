<?php
if(!empty($_POST)){
	include "connection.php";
	$con  = connect();
	$sql = "insert into curso (titulo,maquina,modelo,marca,observacion,estado,created_at) value (\"".$_POST["titulo"]."\",\"".$_POST["maquina"]."\",\"".$_POST["modelo"]."\",\"".$_POST["marca"]."\",\"".$_POST["observacion"]."\",\"".$_POST["estado"]."\",NOW())";
	$con->query($sql);
	$last_id = $con->insert_id;
	$archivos = get_archivos();
	foreach($archivos as $arc){
		if(isset($_POST["archivo_".$arc->id])){
		$sql = "insert into curso_archivo (curso_id,archivo_id) value (".$last_id.",".$arc->id.")";
		$con->query($sql);
		}
	}
	header("Location: Cursos.php");
}
?>
