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
	<title>Nuevo Archivo</title>
	
   
</head>
<body>

  <script type="text/javascript">
    function fileValidation(){
    var fileInput = document.getElementById('segundo');
    var filePath = fileInput.value;
    var allowedExtensions = /(.pdf)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Solo puede cargar archivos PDF');
        fileInput.value = '';
        return false;
    }
}
     
  </script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <div class="modal-body">
              <?php $param=$_GET["id"];?>
              <h3>Nuevo archivo</h3>
<form method="post" action="./guardar_archivo.php?id=<?php echo $param; ?>" enctype='multipart/form-data'>
  

  <div class='col-md-5'>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    <div class='col-md-10'>
                                      <input class='form-control' type='hidden' name='estado' id='estado' value="1">

                                       </div>
                                  </div>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    <div class='col-md-10'>

                                      <input type='file' name='archivo' id='segundo' onchange='return fileValidation()'>
                                      </div>
                                  </div>
  <button type="submit" class="btn btn-primary" name="save">Agregar</button>
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