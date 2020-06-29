<?php
session_start();
$nombre=$_SESSION['username'];
if (!isset($nombre)) {
  header("location: index.php"); 
}
if ($_SESSION['username'] =='Admin') {
header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Asignar</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <?php error_reporting (0);?>
<?php 

include "connection.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

<?php

  $curso = get_curso($_GET["id"]);
  $curso_archivos = get_curso_archivo($_GET["id"]);
  
?>
<form method="post" action="./actualizar_link.php">
<input type="hidden" name="id" value="<?php echo $curso->id; ?>">
  
<input type="hidden" name="estado" id="estado" value="1">

 <div class="form-group">
    <label for="title"></label>
    <input type="hidden" id="titulo" class="form-control" value="<?php echo $curso->titulo; ?>" name="titulo" >
  </div>
   <div class="form-group">
    <label for="title"></label>
    <input type="hidden" id="maquina" class="form-control" value="<?php echo $curso->maquina; ?>" name="maquina" >
  </div>
   <div class="form-group">
    <label for="title"></label>
    <input type="hidden" id="modelo" class="form-control" value="<?php echo $curso->modelo; ?>" name="modelo" >
  </div>
   <div class="form-group">
    <label for="title"></label>
    <input type="hidden" id="marca" class="form-control" value="<?php echo $curso->marca; ?>" name="marca" >
  </div>
  <div class="form-group">
    <label for="observacion" type="hidden"></label>
   
    <input type="hidden" id="observacion" class="form-control" value="<?php echo $curso->observacion; ?>" name="observacion" >
  </div>
   <div class="form-group">
    <label for="title"></label>
    <input type="hidden" id="estado" class="form-control" value="<?php echo $curso->estado; ?>" name="estado" >
  </div>
 
                  


                 
  <div class="form-group">
    

      

   
      <h3>Seleccionar Link</h3>
      <label for="description">Link</label>
    <a href="Link.php?id=<?php echo $_GET["id"];?>" class="btn btn-warning btn-sm">Ver Lista</a>
<?php
  $curso = get_curso($_GET["id"]);
  $curso_links = get_curso_link($_GET["id"]);
?>
<form method="post" action="./actualizar_curso.php">
<input type="hidden" name="id" value="<?php echo $curso->id; ?>">
  <input type="hidden" name="estado" id="estado" value="1">

  <div class="form-group">

<?php
$links = get_links();
?>
<?php if(count($links)>0):?>

    <?php foreach($links as $d):
    $encontrado = false;
foreach($curso_links as $ca){
  if($ca->link_id==$d->id){
    $encontrado = true;
    break;
  }
}
    ?>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="link_<?php echo $d->id; ?>" <?php if($encontrado){ echo "checked"; }?>> <?php echo $d->link; ?>
    </label>
  </div>
<?php endforeach; ?>
<?php endif; ?>
  </div>

  <button type="submit" class="btn btn-primary btn-sm">Asignar</button>
</form>
</div>
    </div>
  </div>
</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>