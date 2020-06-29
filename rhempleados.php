<?php
session_start();
$_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header("location: login.php");
  }
  if ($_SESSION['username'] !='Admin') {
  header("location: login.php");
}
?>
<?php
include_once('cabezeras/cabezera.php');
include_once('menu/lateral.php');
include_once('footer/footers.php');
include_once('modelo/ordenes.php');
include 'conecciones.php';
include 'db/conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
    <title>Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    

  </head>
  <body>
    <?php
echo  muestracabezera('');
     ?>
<?php

?>
    <div class="page-content">
      <div class="row" >
      <?php
echo menulateral('');
      ?>
      <div class="col-md-10" >
        <?php

        echo "<div class='modal' id='modal_formularioalta'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='modal-title'>Resgistro de Personal</h4>
              </div>
              <div class='modal-body'>




                              <div class='panel-body'>

                                <form class='form-horizontal' action='RegistrarEmpleado.php' method='post'>

                                <fieldset>
                                  <legend>Datos Generales</legend>

                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='ide' name='ide'>
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Nombre y Apellidos' type='text' id='nombre' name='nombre' required>
                                        
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fcha de Nacimiento</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Default Text Field' type='date' id='fnacimiento' name='fnacimiento' required>
                                    </div>
                                  </div>

                                    <div class='form-group'>
                                      <label class='col-md-2 control-label'>Sexo</label>
                                      <div class='col-sm-offset-2 col-sm-10'>
                                              <p>
                                   <select id='sexo' name='sexo'  tabindex='17' class='form-control' required>
          <option value='sexo' selected='selected' disabled>
              Sexo
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
                                      <input class='form-control' placeholder='Calle Número Colonia Ciudad' type='text' id='direccion' name='direccion' required>
                                    </div>
                                    </div>
                                  
                                  </fieldset>

                                  <fieldset>
                                    <legend>Contacto</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Teléfono</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='ingrese sólo números' type='number' id='telefono' name='telefono' required>
                                    </div>
                                    </div>
                                    <div class='form-group'>
                                      <label class='col-md-2 control-label' for='text-field'>Correo Electrónico</label>
                                      <div class='col-md-10'>
                                        <input class='form-control' placeholder='nombre@gmail.com' type='email' id='correo' name='correo' required>
                                      </div>
                                  </div>
                                  </fieldset>

                                  <fieldset>
                                    <legend>Nómina</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Número de Empleado</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='0' type='number' id='nlista' name='nlista' required>
                                    </div>
                                    </div>
                                    <div class='form-group'>
                                    <div class='row'>
                                      <div class='col-sm-12'>
                                      <label class='col-md-2 control-label' for='text-field'>Sueldo</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='sueldo' name='sueldo' required>
                                          <span class='input-group-addon'>.00</span>
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                   <div class='form-group'>
                                     <label class='col-md-2 control-label' for='text-field'>Fecha de Ingreso</label>
                                     <div class='col-md-10'>
                                       <input class='form-control' placeholder='2020-01-01' type='date' id='fingreso' name='fingreso' required>
                                     </div>
                                  </div>


                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Tipo de Contrato</label>
                                    <div class='col-md-10'>
                                     <p>
                                   <select id='contrato' name='contrato' class='form-control' tabindex='17' required>
          <option value='contrato' selected='selected' disabled>
              Contrato
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
          <option value='Elegir' selected='selected' disabled>
              Puesto
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
           <option value='Elegir' selected='selected' disabled>
               Área
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
                                   <input class='form-control' placeholder='Jefe Inmediato' type='text' id='jefe' name='jefe' required>
                                 </div>
                              </div>
                                  </fieldset>

                                  <fieldset>
                                    <legend>Seguro Social</legend>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Número de Seguro Social</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='00000' type='number' id='numeroimss' name='numeroimss' required>
                                    </div>
                                    </div>
                                     <div class='form-group'>
                                    <div class='row'>
                                      <div class='col-sm-12'>
                                      <label class='col-md-2 control-label' for='text-field'>Sueldo del Seguro Social</label>
                                        <div class='input-group'>
                                          <span class='input-group-addon'>$</span>
                                          <input class='form-control' id='appendprepend' type='number' id='sueldoImss' name='sueldoImss' required>
                                          <span class='input-group-addon'>.00</span>
                                        </div>
                                      </div>
                                    </div>
                                    </div>


                                 <div class='form-group'>
                                   <label class='col-md-2 control-label' for='text-field'>Fecha de alta en el IMSS</label>
                                   <div class='col-md-10'>
                                     <input class='form-control' placeholder='Default Text Field' type='date' id='fimss' name='fimss' required>
                                   </div>
                                </div>
                                  </fieldset>
                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='submit' class='btn btn-success' value='submit'>
                                                            <i class='fa fa-save'></i>
                                                            Registrar
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>

                              </form>

                        </div>




              </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
            </div>
            </div>
            </div>
            </div>";

            echo "<div class='modal' id='my_modaltallas'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                    <h4 class='modal-title'>TALLAS ASIGNADAS A LA ORDEN DE PRODUCCION</h4>
                  </div>
                  <div class='modal-body'>
                    <form action='modelo/operaciones_orden.php?opcion=2' method='post'>
                      <label>ORDEN ID: <input type='text' size='10' name='ordenid' id='ordenid' readonly value=''/></label></BR>
                      <div>
                          <a href='javascript:void(0);' class='add_button' title='Add field'>Agregar Talla</a>
                      </div>
                      <div id='tablatallas' class='field_wrapper'>

                      </div>
                      <button type='submit'>GUARDAR CAMBIOS</button>
                    </form>
                  </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                </div>

                </div>
                </div>
                </div>";
        ?>

        <div class="row" >
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


              <!-- contenido -->

                <!-- contenido -->
                 <div class="content-box-large">
                  
            <!-- contenido busqueda -->
            <div class="panel-body">
            <center><h2>Empleados</h2></center>
            <div class="panel-heading">
                  <div class="panel-options">
                    <a href="#modal_formularioalta" data-toggle='modal' data-rel="collapse"><i class="btn btn-primary  fas fa-user-plus"> </i></a>
                    

                  </div>
                </div>
            </div>

               
   
<script type="text/javascript"> 
  $(document).ready(function(){
  $("#buscar").keyup(function(){
  var value = $(this).val();
   $("#reportar").val(value);
});
});
</script>

<?php
$enviado = false;
$Nombre=NULL;
if (isset($_POST["enviados"])) {
  $Nombre=$_POST["buscar"];
}

?>
<div class="panel-body">
                    <div class="row">
    <div class="col-md-3">
           <form action="indexPDFEMP.php" method="POST" class="form_search" >
            <input  type="hidden"   name="buscar" id="reportar" value="<?php echo $Nombre; ?>" > 
                <button class='btn btn-primary' type='submit' name='enviados' class='btn btn-success' value='submit'>
                  Generar
                  <i class='fas fa-file-pdf'></i>
              </button>
                  </form>
              
 </div>
</div>
</div>

<?php
$enviado = false;
$Nombre=NULL;
if (isset($_POST["enviados"])) {
  $Nombre=$_POST["buscar"];
}

?>
<div class="panel-body">
  <div class="row">
    <div class="col-md-2">
        <form action="rhempleados.php" method="POST" class="form_search" >
          <input type="text" placeholder="Ingrese el nombre " name="buscar" id="buscar" value="<?php echo $Nombre; ?>" class="form-control"></div> 
            <button class='btn btn-primary btn-xl' type='submit' name='enviados' class='btn btn-success' value='submit'>
              <i class='fas fa-search'></i>
            </button> 
        </form>
  </div>
</div>
            
   <div class="panel-body">

    <link href="css/styles.css" rel="stylesheet">
 <table class="table table-striped">
<style>
thead {
  color: white;
}

                      <thead ><style='background:#4682b4;' ></style>    
                       <thead style='background:#4682b4;' >
                      <tr>
                        <th>Número de empleado</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Sexo</th>
                        <th>Teléfono</th>
                        <th>Fecha de Ingreso</th>
                        <th>Email</th>
                        <th>Sueldo</th>
                        <th>Departamento</th>
                        <th>Puesto</th>
                        <th>Contrato</th>
                        <th>Jefe</th>
                        <th>Fecha de alta en IMSS</th>
                        <th>Sueldo Imss</th>
                        <th>NSS</th>
                        <th>Dirección</th>
                        <th>Opciones</th>
                        <th></th>
                      </tr>
                    </thead>
                  <tbody>
   </div>


<?php 
include 'readEmpleado.php';

  while ($row =mysqli_fetch_array($resul1)){

?>
    
<tr>      <?php $rut = $row['ide']; ?>
          <td><?php echo $row['nlista'];  ?></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['fnacimiento'];?></td>
          <td><?php echo $row['sexo'];?></td>
          <td><?php echo $row['telefono'];?></td>
          <td><?php echo $row['fingreso'];?></td>
          <td><?php echo $row['correo'];?></td>
          <td><?php echo $row['sueldo'];?></td>
          <td><?php echo $row['departamento'];?></td>
          <td><?php echo $row['puesto'];?></td>
          <td><?php echo $row['contrato'];?></td>
          <td><?php echo $row['jefe'];?></td>
          <td><?php echo $row['fimss'];?></td>
          <td><?php echo $row['sueldoImss'];?></td>
          <td><?php echo $row['numeroimss'];?></td>
          <td><?php echo $row['direccion'];?></td>
          <td ><!--<button class="btn btn-success  glyphicon glyphicon-pencil" type="button" onClick="window.location='VistaModificarEmpleado.php?rut=<?php //echo $rut; ?>';"></button>-->
            <a href="javascript:void(0)" onclick="modificar('<?php echo $row['ide']; ?>')">  <i class="btn btn-success  glyphicon glyphicon-pencil"> </i> </a>
          </td>
          <td>
            <a href="javascript:void(0)" onclick="mostarDetalles('<?php echo $row['ide']; ?>')">  <i class=" btn btn-danger glyphicon glyphicon-trash"> </i> </a>
          </td>
        </tr>
<?php
  }
?>
<div id="divModal"></div>
  <script>
    function modificar(ide) {
      var ruta = './VistaModificarEmpleado.php?ide=' + ide;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<div id="divModal"></div>
  <script>
    function mostarDetalles(ide) {
      var ruta = './empleadomodal.php?ide=' + ide;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
                      <table class="table">
              </tbody>
                        </table>
                  </div>
                </div>
                <!-- contenido -->
              <!-- fin contenido -->
        </div>
      </div>
    </div>
    </div>

  <?php
echo piedepagina('');
   ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
