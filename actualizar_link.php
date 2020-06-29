<?php
if(!empty($_POST)){
	include "connection.php";
	$id=$_POST["id"];
	$con  = connect();
	$sql = "update curso set titulo=\"".$_POST["titulo"]."\",maquina=\"".$_POST["maquina"]."\",modelo=\"".$_POST["modelo"]."\",marca=\"".$_POST["marca"]."\",observacion=\"".$_POST["observacion"]."\",estado=\"".$_POST["estado"]."\" where id=$_POST[id]";
		$con->query($sql);
	$last_id = $con->insert_id;

/*
	$sql = "delete from curso_archivo where curso_id=".$_POST["id"];
	$con->query($sql);*/

	$sql1 = "delete from curso_link where curso_id=".$_POST["id"];
	$con->query($sql1);





	$archivos = get_archivos();
/*
	
	
	foreach($archivos as $arc){
		if(isset($_POST["archivo_".$arc->id])){
		$sql = "insert into curso_archivo (curso_id,archivo_id) value (".$_POST["id"].",".$arc->id.")";
		$con->query($sql);
		}
	}*/
	$links= get_links();
	foreach($links as $lnk){
		if(isset($_POST["link_".$lnk->id])){
		$sql = "insert into curso_link (curso_id,link_id) value (".$_POST["id"].",".$lnk->id.")";
		$con->query($sql);
		}
	}
	header("Location: PruebaVistaCursos.php?id=$id");
}

?>