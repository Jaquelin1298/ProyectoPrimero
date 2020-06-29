<?php $idHerramienta=$_GET["idHerramienta"];?>
  <?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM herramienta WHERE idHerramienta = '$idHerramienta'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));

    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Modificar datos de <?php echo $fila['nombre'];?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form class='form-horizontal' action='controladorModificarHerramienta.php' method='post' enctype='multipart/form-data'>

                                
                                  <legend>Datos de Herramienta</legend>

                                   
                                  
                                  <input type='hidden' class='form-control' id='idHerramienta' name='idHerramienta' value="<?php echo $idHerramienta;?>" readonly>
                                  <div class='form-group'>

                                 
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' type='text'  name='nombre' id='nombre' value="<?php echo $fila['nombre'];?>">
                                    </div>
                                  </div>
                                   
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Descripción</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text'  name='descripcion' id="descripcion" value="<?php echo $fila['descripcion'];?>">
                                    </div>
                                    </div>
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
              
            
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>