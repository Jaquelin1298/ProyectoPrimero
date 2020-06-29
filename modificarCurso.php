<?php
if(!empty($_POST)){
	include "connection.php";
	$con  = connect();
	$sql = "update curso set titulo=\"".$_POST["titulo"]."\",maquina=\"".$_POST["maquina"]."\",modelo=\"".$_POST["modelo"]."\",marca=\"".$_POST["marca"]."\",observacion=\"".$_POST["observacion"]."\",estado=\"".$_POST["estado"]."\" where id=$_POST[id]";
	$con->query($sql);
	$last_id = $con->insert_id;

	header("Location: Cursos.php");
}

?>