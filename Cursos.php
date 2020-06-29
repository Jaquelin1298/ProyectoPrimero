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
include_once('cabezeras/cabezeraMec.php');
include_once('menu/lateralMec.php');
include_once('footer/footers.php');
include_once('modelo/ordenes.php');
include 'db/conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>



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
                                    <label class='col-md-2 control-label' for='text-field'></label>
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

		  	

			  			<!-- contenido -->

                <!-- contenido -->
               <div class="content-box-large">

                   <div class="panel-heading">
                   <center><h3>Cursos</h3></center>
          <?php include 'conecciones.php'; ?>
          </li></h3>
         <div class="panel-options">
                    <a href="#modal_formularioalta" data-toggle='modal' data-rel="collapse"><i class="btn btn-primary  fas fa-edit"> + </i></a>

                  </div>
          
                 
<div class="panel-body">
                    <div class="row">
    <div class="col-md-2">
           <form action="Cursos.php" method="POST" class="form_search" >
            <input  type="text"   name="buscar" id="buscar" placeholder="Busca aqui..." class="form-control"></div>
                <button class='btn btn-primary btn-xl' type='submit' name='enviados' class='btn btn-success' value='submit'>
              <i class='fas fa-search'></i>
            </button> 
                  </form>
              

</div>
</div>
</a>

                <?php 
include "connection.php";
 ?>

<?php
//busqueda
include 'conecciones.php';

if(!isset($_POST['buscar'])){
  $_POST['buscar']= "";
  $buscar = $_POST['buscar'];
}

$buscar= $_POST['buscar'];
//
$con = connect();

$sql = "SELECT * FROM curso WHERE (marca LIKE '%".$buscar."%'  OR modelo LIKE '%".$buscar."%' OR observacion LIKE '%".$buscar."%') AND estado=1";

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

  <div  class="panel-body">
    <div class="table-responsive">
      <table class="table">
<style>
thead {
  color: white;
}

                      <thead ><style='background:#4682b4;' ></style>    
                       <thead style='background:#4682b4;' >
      <th>Id</th>
      <th>Titulo</th>
      <th>Maquina</th>
      <th>Modelo</th>
      <th>Marca</th>
      <th>Observacion</th>
      <th>Editar</th>
      <th>Eliminar</th>
      <th>Contenido</th>
      
    </thead>
    <?php foreach($data as $d):?>
    <tr>
      <td><?php echo $d->id; ?></td>
      <td><?php echo $d->titulo; ?></td>
      <td><?php echo $d->maquina; ?></td>
      <td><?php echo $d->modelo; ?></td>
      <td><?php echo $d->marca; ?></td>
      <td><?php echo $d->observacion; ?></td>
    
      <td>
        <!--<a href="vistamodificarCurso.php?id=<?php //echo $d->id?>" class='btn btn-success  glyphicon glyphicon-pencil' > </a>-->
        <a href="javascript:void(0)" onclick="modificar('<?php echo $d->id; ?>')">  <i class="btn btn-success  glyphicon glyphicon-pencil"> </i> </a>
      </td>
      <td>
        <a href="javascript:void(0)" onclick="eliminar('<?php echo $d->id; ?>')">  <i class="btn btn-danger glyphicon glyphicon-trash"> </i> </a>
</td>
<td><a href="PruebaVistaCursos.php?id=<?php echo $d->id; ?>" class='btn btn-primary glyphicon glyphicon-list-alt' > </a></td>
    </tr>

    <?php endforeach; ?>
  </table>

<?php else:?>
  <p class="alert alert-warning">No se encontraron Resultados</p>
<?php endif; ?>


<div id="divModal"></div>
  <script>
    function eliminar(id) {
      var ruta = './cursomodal.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>

  <div id="divModal"></div>
  <script>
    function modificar(id) {
      var ruta = './vistaModificarCurso.php?id=' + id;
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
