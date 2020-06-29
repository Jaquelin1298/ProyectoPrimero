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
	<title>Link</title>

   
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
                <h1>Link</h1>
      <?php $param=$_GET["id"];?>

<form method="post" action="./guardar_link.php?id=<?php echo $param; ?>">
  
                                      <input class='form-control' type='text' name='link' id='primero' placeholder='link...'>
                                  
                                      <input class='form-control' type='hidden' name='estado' id='estado' value="1">

                                      


    
  <button type="submit" class="btn btn-primary">Agregar</button>

</form>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>