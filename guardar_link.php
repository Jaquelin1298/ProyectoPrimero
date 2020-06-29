<?php
if(!empty($_POST)){
	include "connection.php";
	$con  = connect();
	$sql = "insert into link (link,estado) value (\"".$_POST["link"]."\",\"".$_POST["estado"]."\")";
	$con->query($sql);
	$param=$_GET["id"];
	header("Location: PruebaVistaCursos.php?id=$param");
}
?>
