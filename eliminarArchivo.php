<?php
if(isset($_GET["id"])){
	include "connection.php";
	$con  = connect();
	
	$sql = "update archivo set estado=0 where id=".$_GET["id"];
	$con->query($sql);
	header("Location:Archivos.php");
}
?>





