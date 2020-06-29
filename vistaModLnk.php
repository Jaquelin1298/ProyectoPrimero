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
    $link= get_link($_GET["id"]);
    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <h3>Selecciona un Nuevo LINK</h3>

                                <form  action='controladorModLnk.php' method='post'>
                                  <div class='col-md-2'>
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    
                                      <input class='form-control' type='hidden' name='id' id='id' value="<?php echo $link->id; ?>">
                                  </div>
                                     
                                  <div class='col-md-4'>
                                    
                                      <input class='form-control' type='text' name='link' id='primero' value="<?php echo $link->link; ?>">

                                       
                                     </div>

                                  
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='save' class='btn btn-success' id='registrarempleado' value='Registrar'>
                                                            <i class='fa fa-save'></i>
                                                            Actualizar
                                                          </button>
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
