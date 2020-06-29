<?php $idmaquina=$_GET["idmaquina"];?>
  <?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM maquinash WHERE idmaquina = '$idmaquina'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));

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
              <form class='form-horizontal' action='RegistrarFallaMaq.php' method='post'>

                                <fieldset>
                                  <legend>Registrar Falla</legend>
                                    <div class='form-group'>
                                    <div class='col-md-10'>
                                      <input type='hidden' class='form-control' name='idmaquina' value="<?php echo $idmaquina;?>" readonly>
                                    </div>
                                    </div>

                                    <div class='form-group'>
                                      
                                    <label class='col-md-2 control-label' for='text-field'>observaciones/Fallas</label>
                                    <div class='col-md-10'>
                                      <input type="text" name="falla" class="form-control" value="<?php echo $fila['falla']; ?>">
                                     
                                    </div>
                                    </div>
                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary btn-xs' type='submit' name='save' class='btn btn-success' id='registrarfallaherramienta' value='Registrar'>
                                                            <i class='fa fa-save'></i>
                                                            Guardar
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