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
                <h4 class="modal-title" id="myModalLabel">Modificar datos de <?php echo $fila['nombre'];?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form class='form-horizontal' action='controladorModificarMaquina.php' method='post' enctype='multipart/form-data'>

                                <fieldset>
                                  <legend>Datos de Máquina Herramienta</legend>
                                   <div class='form-group'>
                                  <input type='hidden' class='form-control' id='idmaquina' name='idmaquina' value="<?php echo $idmaquina;?>" readonly>
                                  <div class='form-group'>

                                 
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' type='text'  name='nombre' id='nombre' value="<?php echo $fila['nombre'];?>">
                                    </div>
                                  </div>
                                   
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Marca</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text'  name='marca' id="marca" value="<?php echo $fila['marca'];?>">
                                    </div>
                                    </div>
                                        <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Modelo</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text'  name='modelo' id="modelo" value="<?php echo $fila['modelo'];?>">
                                    </div>
                                    </div>
                                        <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>No. Serie</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='number'  name='nserie' id="nserie" value="<?php echo $fila['nserie'];?>">
                                    </div>
                                    </div>
                                        <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Código</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='number'  name='codigo' id="codigo" value="<?php echo $fila['codigo'];?>">
                                    </div>
                                    </div>
                                    
                                        <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fecha de Adqusición</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='date'  name='fadquisicion' id="fadquisicion" value="<?php echo $fila['fadquisicion'];?>">
                                    </div>
                                    </div>
                                      <div class='form-group'>
                                    
                                      <div class='col-sm-12'>
                                      <label class='col-md-2 control-label' for='text-field'>Costo</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='costo' name='costo' value="<?php echo $fila['costo'];?>">
                                          <span class='input-group-addon'>.00</span>
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>