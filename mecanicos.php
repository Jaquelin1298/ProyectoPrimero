<?php
session_start();
$_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header("location: index.php");
  }
  if ($_SESSION['username'] !='Admin') {
  header("location: index.php");
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
    <title>Mecánicos</title>
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

    <div class="page-content">
      <div class="row">
      <?php
echo menulateral('');
      ?>
      <div class="col-md-10">
       
        <?php

        echo "<div class='modal' id='modal_formularioalta'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='modal-title'>Resgistro de Mecánicos</h4>
              </div>
              <div class='modal-body'>




                              <div class='panel-body'>

                                <form class='form-horizontal' action='RegistrarMecanico.php' method='post' enctype='multipart/form-data'>

                                <fieldset>
                                  <legend>Datos Generales</legend>

                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='idCurso' name='idCurso'>

                                    <label class='col-md-2 control-label' for='text-field'>No.Empleado</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Número de Empleado' type='text' id='nlista' name='nlista' required>
                                    </div>
                                    </div>
                                     <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Nombre y Apellidos' type='text' id='nombreMec' name='nombreMec' required>
                                    </div>
                                  </div>

                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Dirección</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Calle Número Colonia Ciudad' type='text' id='direccion' name='direccion' required>
                                    </div>
                                    </div>
                                  
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fecha de Nacimiento</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Default Text Field' type='date' id='fnacimiento' name='fnacimiento' required>
                                    </div>
                                  </div>

                                    <div class='form-group'>
                                      <label class='col-md-2 control-label'>Sexo</label>
                                      <div class='col-sm-offset-2 col-sm-10'>
                                              <p>
                                   <select id='sexo' name='sexo' class='field select medium' tabindex='17' required>
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

                                     <div class='form-group'>
                                      <label class='col-md-2 control-label' for='text-field'>Selecciona Foto</label>
    
                                       <div class='photo'>
                                          
                                               
                                                <span class='delPhoto notBlock'></span>
                                                
                                                <div class='col-md-10'>
                                               
                                                <input type='file' name='foto' id='foto'  >
                                            
                                                <div id='form_alert'></div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Clave</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='************' type='password' id='clave' name='clave' required>
                                    </div>
                                  </div>

                                   
                                  

                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-primary' type='submit' name='save' class='btn btn-success' id='registrarmecanico' value='Registrar'>
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

      <div class="row">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


              <!-- contenido -->

                <!-- contenido -->
                 <div class="content-box-large">
                  
            <!-- contenido busqueda -->
            <div class="panel-body">
            <center><h2>Mecánicos</h2></center>
            <div class="panel-heading">
                  <div class="panel-options">
                    <a href="#modal_formularioalta" data-toggle='modal' data-rel="collapse"><i class="btn btn-primary  fas fa-user-plus"> </i></a>
                    

                  </div>
                </div>
            </div>


  <!-- contenido busqueda -->
   
<script type="text/javascript"> 
  $(document).ready(function(){
  $("#buscar").keyup(function(){
  var value = $(this).val();
   $("#reportar").val(value);
   $("#verherra").value(value);
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
           <form action="IndexPDFMec.php" method="POST" class="form_search" >
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
        <form action="mecanicos.php" method="POST" class="form_search" >
                  <input type="text" placeholder="Ingrese el nombre " name="buscar" id="buscar" value="<?php echo $Nombre; ?>" class="form-control"></div> 
                      <button class='btn btn-primary btn-xl' type='submit' name='enviados' class='btn btn-success' value='submit'> 
                        <i class='fas fa-search'></i>
                      </button>
                  </form>
                </script>


</div>
</div>

 <table class="table table-striped">
<style>
thead {
  color: white;
}

                      <thead ><style='background:#4682b4;' ></style>    
                       <thead style='background:#4682b4;' >
                      <tr>
                        <th>No.Lista</th>
                        <th>Nombre Completo</th>
                        <th>Dirección</th>
                        <th>Fecha de nacimiento</th>
                        <th>Sexo</th>
                        <th>Teléfono</th>
                        <th>Sueldo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                       <th>Detalle de Herramientas</th>
                      </tr>
                    </thead>
                  <tbody>
<?php

include 'readMecanico.php';
      while($fila = mysqli_fetch_array($resul1)){


?>
       <tr>
          <?php $rut = $fila['ideMecanico']; ?>
          <td><?php echo $fila['nlista'];  ?></td>
          <td><?php echo $fila['nombreMec']; ?></td>
          <td><?php echo $fila['direccion'];?></td>
          <td><?php echo $fila['fnacimiento'];?></td>
          <td><?php echo $fila['sexo'];?></td>
          <td><?php echo $fila['telefono'];?></td>
          <td><?php echo $fila['sueldo'];?></td>
          <td >
           <a href="javascript:void(0)" onclick="modificar('<?php echo $fila['ideMecanico']; ?>')">  <i class="btn btn-success  glyphicon glyphicon-pencil"> </i> </a> 
          </td>
          <td>
              <a href="javascript:void(0)" onclick="mostarDetalles('<?php echo $fila['ideMecanico']; ?>')">  <i class=" btn btn-danger glyphicon glyphicon-trash"> </i> </a>
          
          </td>
          <td>
            <?php
$enviado = false;
$Nombre=NULL;
if (isset($_POST["enviados"])) {
  $Nombre=$_POST["buscar"];
}

?>
            <form action="indexPDFmecHerra.php?rut=<?php echo $rut; ?>" method="POST" class="form_search" >
              <input  type="hidden"   name="buscar" id="verherra" value="<?php echo $Nombre; ?>" > 
                <button class='btn btn-info' type='submit' name='enviados' class='btn btn-success' value='submit'>
                  <i class='fas fa-eye'></i>
              </button>
            </form>
          </td>
        
         </tr>

<?php

}

?>
<div id="divModal"></div>
  <script>
    function modificar(ideMecanico) {
      var ruta = './VistaModificarMecanico.php?ideMecanico=' + ideMecanico;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<div id="divModal"></div>
  <script>
    function mostarDetalles(ideMecanico) {
      var ruta = './mecanicomodal.php?ideMecanico=' + ideMecanico;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
              </tbody>
                        </table>
   


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
