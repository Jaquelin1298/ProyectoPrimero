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
    <title>Archivos</title>
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
        <?php $id=$_GET["id"];?>
                <div class="content-box-large">
                  <center><h3>Archivos PDF</h3></center>
                  <div class="panel-options">
                    <a href="javascript:void(0)" onclick="nuevo('<?php echo $id; ?>')">  <i class=" btn btn-primary glyphicon glyphicon-plus"> </i> </a>
                  <div class="panel-title"></div>
                  <div class="panel-options">



                  </div>
                </div>

<div id="divModal"></div>
  <script>
    function nuevo(id) {
      var ruta = './nuevo_archivo.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
                <?php 

include "connection.php";
 ?>





<?php

$con = connect();
$sql = "select * from archivo where estado=1";
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
      
      <th>Archivo</th>
      <th>Opciones</th>
    </thead>
    <?php foreach($data as $d):?>
    <tr>
      
      <td><?php echo $d->archivo; ?></td>

     
      <td>
                
                <a href="javascript:void(0)" onclick="eliminar('<?php echo $d->id; ?>')">  <i class="btn btn-danger glyphicon glyphicon-trash"> </i> </a>

        
         
              <a href="javascript:void(0)" onclick="modificar('<?php echo $d->id; ?>')">  <i class="btn btn-success glyphicon glyphicon-pencil"> </i> </a>
      </td>
    
    </tr>

    <?php endforeach; ?>
  </table>

<?php else:?>
  <p class="alert alert-warning">No hay datos</p>
<?php endif; ?>
<div id="divModal"></div>
  <script>
    function modificar(id) {
      var ruta = './vistaModArch.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<div id="divModal"></div>
  <script>
    function eliminar(id) {
      var ruta = './archivomodal.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>

         <?php
                $conexion= Conectar();
                $query="";

$conexion2= Conectar();
	$query2 = "select * from empleado where Estatus='activo' order by Nlista" or die("Error in the consult.." . mysqli_error($conexion));
      $crealizar=0;
      $crealizada=0;
      $cexterno=0;
      $numoperaciones=0;
      $totaloperaciones=0;

      $resultado2 = $conexion2->query($query2);
  while($row = mysqli_fetch_array($resultado2))
    {
      	$porciones = explode("#", costooperaciones($row["idprenda"]));

      echo "<tr><td>".$row["idprenda"] ."</td><td>".$row["clave"]."</td>";

    									echo "<td>".$row["descripcion"]."</td>
                      <td> ".$row["tipo"]."</td>
                      <td>".$row["descriplarga"]."</td>
                      <td> $ ".number_format($porciones[1], 2, '.', '')."</td>
    									<td> <a href='pasosbase.php?id=".$row["idprenda"] ."&seccion=INICIO'>".number_format($porciones[0], 2, '.', '')."</a></td>
    									<td>  ".conversorSegundosHoras(($porciones[2])* 60)."</td>";
                      echo "<td>CORTES:0</td>";
    									echo "<td class='hidden-480'>
                      <a href='#my_modaltallas' data-toggle='modal'
                       data-book-id1='".$row['idprenda']."'>
                       <span class='label label-sm label-warning'>MODIFICAR</span></a>
                       <span class='label label-sm label-danger'>ELIMINAR</span>
    													</td>";

    }


                ?>

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

function costooperaciones($idprenda)
								{
								$conexion= Conectar();
$query="";
$topera=0;
$tcosto=0;
$ttiempo="00:00:00";
$query = "SELECT count(operacion) as operaciones, sum(costopieza) as total, sum(tiempo) as tiemp FROM operacionesbase where idprenda=$idprenda ;" or die("Error in the consult.." . mysqli_error($conexion));
$resultado = $conexion->query($query);
								while($row = mysqli_fetch_array($resultado))
									{
									$topera=$row["operaciones"];
									$tcosto=$row["total"];
									$ttiempo=$row["tiemp"];
									}
	return($topera."#".$tcosto."#".$ttiempo);
								}

function conversorSegundosHoras($tiempo_en_segundos) {
    $horas = floor($tiempo_en_segundos / 3600);
    $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
    $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

    return $horas . ':' . $minutos . ":" . number_format($segundos,0, '.', '');
}
   ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
    jQuery(function($) {
      $('#modal_formularioalta').on('show.bs.modal', function(e) {
  //var bookId = $(e.relatedTarget).data('book-id');
        var bookId2 = $(e.relatedTarget).data('book-id2');
        var bookId3 = $(e.relatedTarget).data('book-id3');
        var bookId4 = $(e.relatedTarget).data('book-id4');
        var bookId5 = $(e.relatedTarget).data('book-id5');
        var bookId6 = $(e.relatedTarget).data('book-id6');
  //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
  $(e.currentTarget).find('input[name="ordenid"]').val(bookId2);
  		$(e.currentTarget).find('input[name="ordenfolio"]').val(bookId3);
  		$(e.currentTarget).find('input[name="ordenprenda"]').val(bookId4);
  	$(e.currentTarget).find('input[name="ordenfechaini"]').val(bookId5);
  	$(e.currentTarget).find('input[name="ordenfechafin"]').val(bookId6);

});

$('#my_modaltallas').on('show.bs.modal', function(e) {
//var bookId = $(e.relatedTarget).data('book-id');
  var bookId1 = $(e.relatedTarget).data('book-id1');

//$(e.currentTarget).find('input[name="bookId"]').val(bookId);
$(e.currentTarget).find('input[name="ordenid"]').val(bookId1);
$("#tablatallas").empty(); // LIMPIA CONTENIDO DEL DIV
$.ajax({
			url: "modelo/ordenes.php",
			type: "POST",
			data: {"ventanatallas": bookId1},
			success: function(data) {
				console.log("data = " + data);
				$("#tablatallas").append(data);
			}
		});


});



$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="idtalla[]" readonly value="NT"/><input type="text" name="talla[]" value=""/><input type="text" name="cantidad[]" readonly value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field">Eliminar</a></div>'; //New input field html


    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});




    })
  </script>
  </body>
</html>
