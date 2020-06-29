<?php
session_start();
$nombre=$_SESSION['username'];
if (!isset($nombre)) {
  header("location: login.php");
}


?>

<?php

$update = mysqli_query($conexion,"UPDATE notificaciones SET leido='1' WHERE id_not='".$_GET['id']."'"); 
?>
<script type="text/javascript">
window.location.href='abrirNotificacion.php';
</script>