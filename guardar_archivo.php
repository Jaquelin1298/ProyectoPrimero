<?php
if(!empty($_POST)){
  include "connection.php";
  if(isset($_POST['save'])){
  $con  = connect();
  if (!empty($_FILES['archivo']['name'])) {
    $nombre =$_FILES['archivo']['name'];
  $tipo =$_FILES['archivo']['type'];
  $tamaño =$_FILES['archivo']['size'];
  $ruta =$_FILES['archivo']['tmp_name'];
  $destino = "archivosPDF/".$nombre;
    
    if ($nombre !="") {
      if (copy($ruta, $destino)) {
          $sql = "insert into archivo (archivo,estado) value (\"".$nombre."\",\"".$_POST["estado"]."\")";
            $con->query($sql);


      }
    }
    
  }
}
 $param=$_GET["id"];
  header("Location: PruebaVistaCursos.php?id=$param");
}
?>

