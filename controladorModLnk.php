<?php
if(!empty($_POST)){
	include "connection.php";
	$con  = connect();
	$sql = "update link set link=\"".$_POST["link"]."\" where id=$_POST[id]";
	$con->query($sql);
	$last_id = $con->insert_id;

	header("Location: Link.php");
}

?>