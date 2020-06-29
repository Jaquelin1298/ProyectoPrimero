<?php

include 'conecciones.php';
  $id = $_REQUEST['id'];
$SQL_READ = "SELECT * FROM archivo WHERE id='$id'";


$resul1 = mysqli_query($conexion,$SQL_READ);

      if($d = mysqli_fetch_array($resul1)){
	if ($d['archivo']=="") {
		?>
		<script type="text/javascript">
			alert('No se adjunto PDF Revise el URL');
			window.location.href='Cursos.php';
		</script>
		<?php
	}else{
		header('content-type: application/pdf');
		readfile('archivosPDF/'.$d['archivo']);
	}
}
?>