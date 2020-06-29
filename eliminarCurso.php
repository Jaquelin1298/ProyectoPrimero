<?php
if(isset($_GET["id"])){
	include "connection.php";
	$con  = connect();
	$sql = "delete from curso_archivo where curso_id=".$_GET["id"];
	$con->query($sql);
	$sql = "delete from curso_link where curso_id=".$_GET["id"];
	$con->query($sql);
	$sql = "update curso set estado=0 where id=".$_GET["id"];
	$con->query($sql);
	header("Location:Cursos.php");
}
?>
