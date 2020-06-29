<?php

function connect(){
	return new mysqli("localhost","root","","maquila");
}
//archivo
function get_archivos(){
	$con = connect();
	$sql = "select * from archivo where estado=1";
	$query  =$con->query($sql);
	$data =  array();
	if($query){
		while($r = $query->fetch_object()){
			$data[] = $r;
		}
	}
	return $data;
}

function get_curso_archivo($id){
	$con = connect();
	$sql = "select * from curso_archivo where curso_id=".$id;
	$query  =$con->query($sql);
	$data =  array();
	if($query){
		while($r = $query->fetch_object()){
			$data[] = $r;
		}
	}
	return $data;
}

function get_archivo($id){
	$con = connect();
	$sql = "select * from archivo where id=".$id;
	$query  =$con->query($sql);
	$data =  null;
	if($query){
		while($r = $query->fetch_object()){
			$data = $r;
			break;
		}
	}
	return $data;
}


//link
function get_links(){
	$con = connect();
	$sql = "select * from link where estado =1";
	$query  =$con->query($sql);
	$data =  array();
	if($query){
		while($r = $query->fetch_object()){
			$data[] = $r;
		}
	}
	return $data;
}

function get_curso_link($id){
	$con = connect();
	$sql = "select * from curso_link where curso_id=".$id;
	$query  =$con->query($sql);
	$data =  array();
	if($query){
		while($r = $query->fetch_object()){
			$data[] = $r;
		}
	}
	return $data;
}

function get_link($id){
	$con = connect();
	$sql = "select * from link where id=".$id;
	$query  =$con->query($sql);
	$data =  null;
	if($query){
		while($r = $query->fetch_object()){
			$data = $r;
			break;
		}
	}
	return $data;
}

//

function get_curso($id){
	$con = connect();
	$sql = "select * from curso where id=".$id;
	$query  =$con->query($sql);
	$data =  null;
	if($query){
		while($r = $query->fetch_object()){
			$data = $r;
			break;
		}
	}
	return $data;
}
?>