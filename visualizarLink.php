<?php

include 'conecciones.php';
  $rut = $_REQUEST['rut'];
$SQL_READ = "SELECT * FROM curso WHERE idCurso='$rut'";


$resul1 = mysqli_query($conexion,$SQL_READ);

      if($fila = mysqli_fetch_array($resul1)){
	if ($fila['link']=="") {
		?>
		<script type="text/javascript">
			alert('No se adjuntó URL Revise el PDF');
			window.location.href='Cursos.php';
		</script>
		<?php
	}else{
		echo ' <a class="btn btn-primary" href="'.$fila['link'].'">

<script type="text/javascript">
	window.location.href="'.$fila['link'].'";
</script>


		</a>';

	}
}

?>
