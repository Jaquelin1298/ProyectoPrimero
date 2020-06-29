<?php $idmaquina=$_GET["idmaquina"];?>
  <?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM maquinash WHERE idmaquina = '$idmaquina'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));
  $foto = 'img/uploads/maquina/'.$fila['foto'];

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
              <form class='form-horizontal' action='controladorModFotMaqHerra.php' method='post' enctype='multipart/form-data'>

                                <fieldset>
                                  <legend>Datos de Herramientas</legend>
                                   <div class='form-group'>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='hidden'  name='idmaquina'  value="<?php echo $idmaquina;?>" readonly>
                                    </div>
                                    </div>

                                 
                                  
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Foto Actual</label>
                                    <div class='col-md-10'>
                                     <img src="<?php echo $foto; ?>" height="150" width="auto" > 
                                    </div>
                                  </div>

                                    
                                    <div class='form-group'>
                                      <label class='col-md-2 control-label' for='text-field'>Selecciona Foto</label>
    
                                       <div class='photo'>
                                          
                                               
                                                <span class='delPhoto notBlock'></span>
                                                
                                               
                                                <input type='file' name='foto' id='foto'  >
                                            
                                                <div id='form_alert'></div>
                                        
                                        </div>

                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='save' class='btn btn-success' id='modificarherramienta' value='Registrar'>
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