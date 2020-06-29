<?php
include_once('cabezeras/cabezera.php');
include_once('menu/lateral.php');
include_once('footer/footers.php');
include_once('modelo/ordenes.php');
include 'db/conecciones.php';
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
                  <div class="panel-title">Ordenes de Produccion</div>
                  <div class="panel-options">
                    <a href="paneladmin.php" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>

                  </div>
                </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                    <tr>
                      <th> Numero de orden</th>
                      <th> Folio </th>
                      <th>Descripcion</th>
                      <th>Producir</th>
                      <th>Avance</th>
                      <th>Fecha inicio</th>
                      <th>Fecha Entrega</th>
                      <th>Costo</th>
                      <th>Operaciones</th>
                      <th>Dias de </br> Produccion</th>
                      <th>status</th>
                      <th>externo</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $conexion= Conectar();
               // echo Conectar();
                $query="";

$conexion2= Conectar();
$query2 = "SELECT idproduccion,folio,idprenda,clave,nombre,descrip,fechaini,fechafin,encargado,fechaalta,horaalta,estatus FROM ordenesproduccion where estatus not like 'baja' AND estatus not like 'stop'" or die("Error in the consult..". mysqli_error($conexion2));

      $crealizar=0;
      $crealizada=0;
      $cexterno=0;
      $numoperaciones=0;
      $totaloperaciones=0;

      $resultado2 = $conexion2->query($query2);
  while($row2 = mysqli_fetch_array($resultado2))
    {
    $crealizar=cantidadproduc($row2["idproduccion"]);
    $crealizada=avances($row2["idproduccion"]);
    $cexterno=avancesexterno($row2["idproduccion"]);
    $costop=costoopera($row2["idprenda"]);
    $numoperaciones=cant_operaciones($row2["idprenda"]);
    $totaloperaciones=($crealizar)*($numoperaciones);
    echo "	<tr>
    <td>".$row2["idproduccion"]."</td>
    <td>".$row2["folio"]."</td>
    <td>".$row2["descrip"]."</td>
    <td> <a href='#my_modaltallas' data-toggle='modal'
     data-book-id1='".$row2['idproduccion']."'>".$crealizar."</a></td>

    <td>
    <b>".round((100-((($totaloperaciones-$crealizada-$cexterno)/$totaloperaciones)*100)),2)." % </b>
    </td>";

    echo"
    <td>".$row2["fechaini"]."</td>
    <td>".$row2["fechafin"]."</td>
    <td>".number_format($costop, 2, '.', '')."</td>
    <td>".$numoperaciones."</td>
    <td>".numerodias($row2["fechaini"])."</td>
    <td>".$row2["estatus"]."</td>


    <td>
    <div class='btn-group'>

          <button data-toggle='dropdown'>
            <span>...</span>
          </button>

          <ul class='dropdown-menu'>
            <li><a href='#my_modal' data-toggle='modal'
             data-book-id2='".$row2['idproduccion']."'
             data-book-id3='".$row2['folio']."'
             data-book-id4='".$row2['descrip']."'
             data-book-id5='".$row2['fechaini']."'
             data-book-id6='".$row2['fechafin']."'>modificar</a></li>
            <li class='divider'>-----</li>
            <li><a href='estatusorden.php?idorden=".$row2['idproduccion']."&status=activo'>Iniciar</a></li>
            <li><a href='estatusorden.php?idorden=".$row2['idproduccion']."&status=pausado'>Pausar</a></li>
            <li><a href='estatusorden.php?idorden=".$row2['idproduccion']."&status=stop'>Terminar</a></li>
            <li class='divider'>-----</li>
            <li><a href='pasosorden.php?paso=2&id=".$row2['idproduccion']."&seccion=PREPARACION'>OPERACIONES A REALIZAR</a></li>
            <li><a href='ingresarexterno.php?paso=2&idorden=".$row2['idproduccion']."'>Enviar Produccion Externa</a></li>
            <li class='divider'>-----</li>
            <li><a href=diagrama.php?idorden=".$row2['idproduccion']."&idprenda=".$row2['idproduccion']."&prenda='>Avances</a></li>
            <li><a href='#'>Costos de Operacion</a></li>
            <li><a href='ordenproduccionpdf.php?idorden=".$row2['idproduccion']."&idprenda=".$row2['idproduccion']."'>Descargar Ficha</a></li>
            <li class='divider'>-----</li>
            <li><a href='estatusorden.php?opcion=1&idorden=".$row2['idproduccion']."&status=baja'>Eliminar</a></li>
          </ul>
        </div>


    </td>
    </tr>";
    $crealizar=0;
      $crealizada=0;
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
  </body>
</html>
