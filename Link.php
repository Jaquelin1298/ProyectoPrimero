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
include_once('cabezeras/cabezera.php');
include_once('menu/lateralMec.php');
include_once('footer/footers.php');
include_once('modelo/ordenes.php');
include 'db/conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  </head>
  <body>
  	<?php
require_once 'cabezeras/cabezeraMec.php';
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
   							<h4 class='modal-title'>Resgistro de Personal</h4>
  						</div>
  						<div class='modal-body'>




              			  				<div class='panel-body'>

              			  					<form class='form-horizontal' action='guardar_curso.php' method='post'>

              									<fieldset>
              										<legend>Datos Generales</legend>
                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='id' name='id'>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    <div class='col-md-10'>
                                      <input class='form-control' type='hidden' value=1 readonly>
                                    </div>
                                  </div>

                                  <div class='form-group'>
              											<label class='col-md-2 control-label' for='text-field'>Titulo</label>
              											<div class='col-md-10'>
              												<input class='form-control' placeholder='Titulo' type='text' name='titulo' id='titulo' required>
              											</div>
              										</div>

                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Máquina</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Máquina' type='text' name='maquina' id='maquina' required>
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Modelo</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Modelo' type='text' name='modelo' id='modelo' required>
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Marca</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Marca' type='text' name='marca' id='marca' required>
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Observaciones</label>
                                    <div class='col-md-10'>
                                    <textarea class='form-control'  name='observacion' id='observacion' required></textarea>
                                     
                                    </div>
                                  </div>
                                  <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Estado</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Estado' value='1' type='hidden' name='estado' id='estado'>
                                    </div>
                                  </div>







                                  </fieldset>

                                  <div class='form-actions'>
                                  										<div class='row'>
                                  											<div class='col-md-12'>
                                  												<button class='btn btn-default' type='submit'>
                                  													Cancel
                                  												</button>
                                  												<button class='btn btn-primary' type='submit'>
                                  													<i class='fa fa-save'></i>
                                  													Guardar
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
<?php $id=$_GET["id"];?>
                <!-- contenido -->
                <div class="content-box-large">
                 <center><h3>Link</h3></center>
                  <div class="panel-heading">
                 <a href="javascript:void(0)" onclick="nuevoli('<?php echo $id; ?>')">  <i class=" btn btn-primary glyphicon glyphicon-plus"> </i> </a>
                  <div class="panel-options">


                  </div>
                </div>
                
<div id="divModal"></div>
  <script>
    function nuevoli(id) {
      var ruta = './nuevo_link.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>

                <?php 

include "connection.php";
 ?>

<!--Contenido de Link-->


<?php

$con = connect();
$sql = "select * from link where estado =1 ";
$query  =$con->query($sql);
$data =  array();
if($query){
  while($r = $query->fetch_object()){
    $data[] = $r;
  }
}
?>
<br><br>
<?php if(count($data)>0):?>
 <table class="table table-striped">
<style>
thead {
  color: white;
}

                      <thead ><style='background:#4682b4;' ></style>    
                       <thead style='background:#4682b4;' >
      <th>Id</th>
      <th>Link</th>
      <th>Opciones</th>
    </thead>
    <?php foreach($data as $d):?>
    <tr>
      <td><?php echo $d->id; ?></td>
      <td><?php echo $d->link; ?></td>
      <td>
        <a href="javascript:void(0)" onclick="eliminar('<?php echo $d->id; ?>')">  <i class="btn btn-danger glyphicon glyphicon-trash"> </i> </a>
        <a href="javascript:void(0)" onclick="modificar('<?php echo $d->id; ?>')">  <i class="btn btn-success  glyphicon glyphicon-pencil"> </i> </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

<?php else:?>
  <p class="alert alert-warning">No hay datos</p>
<?php endif; ?>
                  
<div id="divModal"></div>
  <script>
    function eliminar(id) {
      var ruta = './linkmodal.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
  <div id="divModal"></div>
  <script>
    function modificar(id) {
      var ruta = './vistaModLnk.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<!--termina cont-->

              </tbody>
                        </table>
</div>
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
