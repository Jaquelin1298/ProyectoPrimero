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
   <?php 

include "connection.php";
?>
    <?php 
  $archivo = get_archivo($_GET["id"]);


    ?>
<!DOCTYPE html>
<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
              <h3>Selecciona un Nuevo PDF</h3>

                                <form  action='controladorModArch.php' method='post' enctype='multipart/form-data'>
                                  <div class='col-md-2'>
                                    
                                    <div class='form-group'>
                                      <input class='form-control' type='hidden' name='id' id='id' value="<?php echo $archivo->id; ?>">
                                      

                                       </div>
                                  </div>
                                   <div class='form-group'>
                                   
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    <div class='col-md-10'>

                                      <input type='file' name='archivo' id='segundo' >
                                      </div>
                                  </div>


                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='save' class='btn btn-success' id='registrarempleado' value='Registrar'>
                                                            <i class='fa fa-save'></i>
                                                            Actualizar
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>