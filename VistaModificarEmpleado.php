<?php $ide=$_GET["ide"];?>
  <?php 
require "./conecciones.php";
  $consulta = "SELECT * FROM empleado WHERE ide = '$ide'";
  $fila = mysqli_fetch_array(mysqli_query($conexion,$consulta));

    ?>
<div class='modal' id='myModal'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='modal-title'>Modificar datos de <?php echo $fila["nombre"];?></h4>
              </div>
              <div class='modal-body'>
                                <form class='form-horizontal' action='controladorModificarEmpleado.php' method='post'>

                                <fieldset>
                                  <legend>Datos Generales</legend>

                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='ide' name='ide' value="<?php echo $ide;?>" readonly>
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text'  name='nombre' value="<?php echo $fila['nombre'];?>">
                                        
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fcha de Nacimiento</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='date' id='fnacimiento' name='fnacimiento' value="<?php echo $fila['fnacimiento'];?>">
                                    </div>
                                  </div>

                                    <div class='form-group'>
                                      <label class='col-md-2 control-label'>Sexo</label>
                                      <div class='col-sm-offset-2 col-sm-10'>
                                              <p>
                                   <select id='sexo' name='sexo'  tabindex='17' class='form-control' required>
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
                                    <legend>Dirección</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Calle</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='text' id='direccion' name='direccion' value="<?php echo $fila['direccion'];?>" >
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
                                    <div class='form-group'>
                                      <label class='col-md-2 control-label' for='text-field'>Correo Electrónico</label>
                                      <div class='col-md-10'>
                                        <input class='form-control'  type='email' id='correo' name='correo' value="<?php echo $fila['correo'];?>">
                                      </div>
                                  </div>
                                  </fieldset>

                                  <fieldset>
                                    <legend>Nómina</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Número de Empleado</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='number' id='nlista' name='nlista' value="<?php echo $fila['nlista'];?>">
                                    </div>
                                    </div>
                                    <div class='form-group'>
                                    <div class='row'>
                                      <div class='col-sm-12'>
                                      <label class='col-md-2 control-label' for='text-field'>Sueldo</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='sueldo' name='sueldo' value="<?php echo $fila['sueldo'];?>">
                                          <span class='input-group-addon'>.00</span>
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                   <div class='form-group'>
                                     <label class='col-md-2 control-label' for='text-field'>Fecha de Ingreso</label>
                                     <div class='col-md-10'>
                                        <input class='form-control'  type='date' id='fingreso' name='fingreso' value="<?php echo $fila['fingreso'];?>">
                                     </div>
                                  </div>


                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Tipo de Contrato</label>
                                    <div class='col-md-10'>
                                     <p>
                                   <select id='contrato' name='contrato' class='form-control' tabindex='17' required>
          <option value="<?php echo $fila['contrato'];?>" selected='selected'>
              <?php echo $fila['contrato'];?>
          </option>
          <option value='indefinido' >
              Indefinido
          </option>
          <option value='90 dias' >
              90 Dias
          </option>
          <option value='otro' >
              Otro
          </option>
          </select>
                                 </p>  
                                    </div>
                                 </div>

                                 <div class='form-group'>
                                   <label class='col-md-2 control-label' for='text-field'>Puesto</label>
                                   <div class='col-md-10'>
                                   <p>
                                   <select id='puesto' name='puesto' class='form-control' tabindex='17' required>
          <option value="<?php echo $fila['puesto'];?>" selected='selected'>
              <?php echo $fila['puesto'];?>
          </option>
          <option value='Manual' >
              Manual
          </option>
          <option value='Revisadora' >
              Revisadora
          </option>
          <option value='Planchadora' >
              Planchadora
          </option>
          <option value='Operario' >
              Operario
          </option>
          <option value='Encargado de Produccion' >
              Encargado de Producción
          </option>
          <option value='Calidad' >
              Calidad
          </option>
          <option value='Mesa de bordado' >
              Mesa de bordado
          </option>
          <option value='Bordador' >
              Bordador
          </option>
          <option value='Limpieza' >
              Limpieza
          </option>
          <option value='Cortador' >
              Cortador
          </option>
          <option value='Tendedor' >
              Tendedor
          </option>
          <option value='Auxiliar General' >
              Auxiliar General
          </option>
          <option value='Mecanico' >
              Mecánico
          </option>
          <option value='Auxiliar de Produccion' >
              Auxiliar de Producción
          </option>
          <option value='Encargado General' >

             Encargado General

          </option>

      </select>

                                   </p>
                                   </div>
                                </div>


         <div class='form-group'>
         <label class='col-md-2 control-label' for='text-field'>Área o Departamento</label>
         <div class='col-md-10'>
         <p>
         <select id='departamento' name='departamento' class='form-control' tabindex='16' required>
           <option value="<?php echo $fila['departamento'];?>" selected='selected'>
               <?php echo $fila['departamento'];?>
           </option>
           <option value='Produccion' >
               Producción
           </option>
           <option value='Bordado' >
               Bordado
           </option>
           <option value='Mesa de Corte' >
               Mesa de Corte
           </option>
           <option value='Revisado final' >
               Revisado final
           </option>

       </select>

                                  </p>
                                  </div>
                               </div>




                               <div class='form-group'>
                                 <label class='col-md-2 control-label' for='text-field'>Jefe Inmediato</label>
                                 <div class='col-md-10'>
                                   <input class='form-control' placeholder='Default Text Field' type='text' id='jefe' name='jefe' value="<?php echo $fila['jefe'];?>">
                                 </div>
                              </div>
                                  </fieldset>

                                  <fieldset>
                                    <legend>Seguro Social</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Número de Seguro Social</label>
                                    <div class='col-md-10'>
                                      <input class='form-control'  type='number' id='numeroimss' name='numeroimss' value="<?php echo $fila['numeroimss'];?>">
                                    </div>
                                    </div>
                                     <div class='form-group'>
                                    <div class='row'>
                                      <div class='col-sm-12'>
                                      <label class='col-md-2 control-label' for='text-field'>Sueldo del Seguro Social</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='sueldo' name='sueldoImss' value="<?php echo $fila['sueldoImss'];?>">
                                          <span class='input-group-addon'>.00</span>
                                        </div>
                                      </div>
                                    </div>
                                    </div>


                                 <div class='form-group'>
                                   <label class='col-md-2 control-label' for='text-field'>Fecha de alta en el IMSS</label>
                                   <div class='col-md-10'>
                                     <input class='form-control' placeholder='Default Text Field' type='date' id='fimss' name='fimss' value="<?php echo $fila['fimss'];?>">
                                   </div>
                                </div>
                                  </fieldset>
                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='submit' class='btn btn-success' value='submit'>
                                                            <i class='fa fa-save'></i>
                                                            Actualizar
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>

                              </form>
              </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
            </div>
            </div>
            </div>
            </div>