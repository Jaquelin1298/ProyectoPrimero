<?php
include_once('cabezeras/cabezera.php');
include_once('menu/lateral.php');
include_once('footer/footers.php');
include_once('modelo/ordenes.php');
include 'conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

  </head>
  <body>
    <?php
    $idprenda=$_GET["id"];
    $seccioncon=$_GET["seccion"];
    $tareadiaria=0;
    $tareasemanal=0;
    $suledoopera=0;
    $costopieza=0;
     ?>
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

        echo "<div class='modal' id='my_modal'>
  				<div class='modal-dialog'>
  					<div class='modal-content'>
  						<div class='modal-header'>
  							<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
   							<h4 class='modal-title'>DATOS DE ORDEN</h4>
  						</div>
  						<div class='modal-body'>
  							<form action='modelo/operaciones_orden.php?opcion=1' method='post'>
  								<label>ORDEN ID: <input type='text' size='10' name='ordenid' id='ordenid' readonly value=''/></label></BR>
   								<label>FOLIO: <input type='text' size='20' name='ordenfolio' id='ordenfolio'  value=''/></label></BR>
   								<label>PRENDA: <input type='text' size='50' name='ordenprenda' id='ordenprenda'  value=''/></label></BR>
   								<label>FECHA INICIO: <input type='date' size='35' name='ordenfechaini' id='ordenfechaini' value=''/></label>
  								<label>FECHA FIN: <input type='date' size='35' name='ordenfechafin' id='ordenfechafin' value=''/></label>
                  <BR/>
   								<button type='submit'>GUARDAR</button>
  							</form>
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

			  			<!-- contenido -->

                <!-- contenido -->
                <div class="content-box-large">
                  <div class="panel-heading">
                  <div class="panel-title">Operaciones Bases para Ordenes de Produccion</div>
                  <div class="panel-options">
                    <button class="btn btn-success">GUARDAR CAMBIOS</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'PREPARACION')">PREPARACION</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'DELANTERO')">DELANTERO</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'ESPALDA')">ESPALDA</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'MANGA')">MANGAS</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'ENSAMBLE')">ENSAMBLE</button>
                    <button class="btn btn-primary" onclick="redireccionar(1,'TERMINADO')">TERMINADO</button>
                  </div>
                </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
  												<tr>
  													<th class="center">id</th>
  													<th class="hidden-580">OPERACION</th>
  													<th class="hidden-380">MAQUINA</th>
  													<th class="hidden-380">SECCION</th>
  													<th class="hidden-280">COSTO</th>
  													<th class="hidden-280">TAREA DIARIA</th>
  													<th class="hidden-280">SUELDO DIARIO</th>
  													<th class="hidden-280">CANTIDAD POR <BR/> PRENDA</th>
  													<th class="hidden-480">UNIDAD</th>
  													<th>operaciones</th>
  												</tr>
  											</thead>
                  <tbody>
                <?php
                $conexion= Conectar();
                $query="";

$conexion2= Conectar();
$query2 = "Select * from operacionesbase where idprenda=".$idprenda." and seccion='".$seccioncon."' order by seccion,idoperacion" or die("Error in the consult.." . mysqli_error($conexion2));

      $crealizar=0;
      $crealizada=0;
      $cexterno=0;
      $numoperaciones=0;
      $totaloperaciones=0;

      $resultado2 = $conexion2->query($query2);
  while($row2 = mysqli_fetch_array($resultado2))
    {


        echo "<tr><td><input type='text' id='operacion' name='idoperacion[]' size=5 readonly  VALUE='".$row2["idoperacion"]."'></td>";
    										echo "<td><input type='text' id='operacion' name='operacion[]' size=30 VALUE='".$row2["operacion"]."'></td>";
    	   									echo "<td>".$row2["maquina"]." </td>";
    		   								echo "<td>".$row2["seccion"]."</td>";
    										echo "<td><input type='text' id='costo' name='costo[]' size=10 VALUE='".$row2["costopieza"]."'></td>";
    										echo "<td><input type='text' id='tdiaria' name='tdiaria[]' size=10 VALUE='".$row2["tareadaria"]."'></td>";
    										echo "<td><input type='text' id='sopera' name='sopera[]' size=10 VALUE='".number_format( (($row2["sueldooperacion"])/(6)),2, '.', '')."'></td>";
    										echo "<td><input type='text' id='piezas' name='piezas[]' size=10 VALUE='".$row2["numpiezas"]."'></td>";
    										echo "<td>";


    													if($row2["pares"]=="si")
    														{
    													echo "	<div class='col-xs-3'>
    													<label>PARES
    														<input name='pares[]' id='pares' class='ace ace-switch ace-switch-2' type='checkbox' value='".$row2["idoperacion"]."' checked />
    														<span class='lbl'></span>
    													</label>
    												</div>";
    													}
    													else
    													{
    														echo "	<div class='col-xs-3'>
    													<label>PARES
    														<input name='pares[]' id='pares' class='ace ace-switch ace-switch-2' type='checkbox' value='".$row2["idoperacion"]."'  />
    														<span class='lbl'></span>
    													</label>
    												</div>";

    													}
    													echo "</td>";
    							echo "<td>
    														<div class='hidden-sm hidden-xs btn-group'>
    															<button class='btn btn-xs btn-danger'>
    															<a href='agregarpasosbase.php?opcion=2&idoperacion=".$row2["idoperacion"]."&idprenda=".$row2["idprenda"]."&seccion=".$row2["seccion"]."' class='tooltip-info' data-rel='tooltip' title='View'>
    																<i class='ace-icon fa fa-trash-o bigger-120'></i>
    																ELIMINAR
    																</a>
    															</button>



    														</div>

    														<div class='hidden-md hidden-lg'>
    															<div class='inline pos-rel'>
    																<button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown' data-position='auto'>
    																	<i class='ace-icon fa fa-cog icon-only bigger-110'></i>
    																</button>

    																<ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>
    																	<li>
    																		<a href='agregarpasos.php?opcion=2&idoperacion=".$row2["idoperacion"]."&idprenda=".$row2["idprenda"]."&seccion=".$row2["seccion"]."'  class='tooltip-error' data-rel='tooltip' title='Delete'>
    																			<span class='red'>
    																				<i class='ace-icon fa fa-trash-o bigger-120'></i>
    																			</span>
    																			ELIMINA
    																		</a>
    																	</li>


    																</ul>
    															</div>
    														</div>
    													</td> </tr>";

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
      $('#my_modal').on('show.bs.modal', function(e) {
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
  <script>

  function redireccionar(idprenda,area) {
    var idprenda;
    var area;
    switch (area) {
      case "PREPARACION":{window.location.replace("pasosbase.php?id=1&seccion=PREPARACION");};break;
      case "DELANTERO":{window.location.replace("pasosbase.php?id=1&seccion=DELANTERO");};break;
      case "ESPALDA":{window.location.replace("pasosbase.php?id=1&seccion=ESPALDA");};break;
      case "MANGA":{window.location.replace("pasosbase.php?id=1&seccion=MANGA");};break;
      case "ENSAMBLE":{window.location.replace("pasosbase.php?id=1&seccion=ENSAMBLE");};break;
      case "TERMINADO":{window.location.replace("pasosbase.php?id=1&seccion=TERMINADO");};break;

    }

  }

  </script>
  </body>
</html>
