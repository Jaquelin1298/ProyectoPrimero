<?php $ideMecanico=$_GET["ideMecanico"];?>
  <?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM mecanico WHERE ideMecanico = '$ideMecanico'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));

    ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class='modal-title'>Modificar datos de <?php echo $fila["nombreMec"];?></h4>
            </div>
            <div class="modal-body">
             <form class='form-horizontal' action='controladorModificarMecanico.php' method='post'>

                                <fieldset>
                                  <legend>Datos Generales</legend>
                                 
                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='ideMecanico' name='ideMecanico' value="<?php echo $ideMecanico;?>" readonly>
                                  <div class='form-group'>

                                    <label class='col-md-2 control-label' for='text-field'>Número de Empleado</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='0' type='number' id='nlista' name='nlista' value="<?php echo $fila['nlista'];?>">
                                    </div>
                                    </div>
                                     <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Nombre y Apellidos' type='text' id='nombreMec' name='nombreMec' value="<?php echo $fila['nombreMec'];?>">
                                    </div>
                                  </div>
                                   <legend>Direccion</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Calle Número Colonia Ciudad</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text' id='direccion' name='direccion' value="<?php echo $fila['direccion'];?>">
                                    </div>
                                    </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fcha de Nacimiento</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Default Text Field' type='date' id='fnacimiento' name='fnacimiento' value="<?php echo $fila['fnacimiento'];?>">
                                    </div>
                                  </div>

                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Sexo</label>
                                    <div class='col-sm-offset-2 col-sm-10'>
                                     <p>
                                   <select id='sexo' name='sexo' class='form-control'  required > 
          <option value="<?php echo $fila['sexo'];?>" selected='selected'>
                <?php echo $fila['sexo'];?>
          </option>
          <option value='Masculino' >
              Masculino
          </option>
          <option value='Femenino' >
              Femenino
          </option>

          </select>
                                 </p>     
                                    </div>
                                    </div>
                                  </fieldset>

                                  <fieldset>
                                    <legend>Contacto</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Teléfono</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='number' id='telefono' name='telefono' value="<?php echo $fila['telefono'];?>">
                                    </div>
                                    </div>
                                    
                                    
                                      <label class='col-md-2 control-label' for='text-field'>Sueldo</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='sueldo' name='sueldo' value="<?php echo $fila['sueldo'];?>">
                                          <span class='input-group-addon'>.00</span>
                                        </div>
                                      
                                 
                                  </fieldset>

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