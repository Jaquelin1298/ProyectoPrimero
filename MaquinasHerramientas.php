#4682b4<?php
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
include 'db/conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Máquinas Herramientas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

          <?php
include 'conecciones.php';
$consulta = "SELECT DISTINCT ideMecanico, nombreMec FROM mecanico where tipo=''";
      $resultado = mysqli_query($conexion, $consulta);
      $option="";
      while($fila = mysqli_fetch_array($resultado)){
      $option.="<option value=\"$fila[ideMecanico]\">$fila[nombreMec] </option>";
      
      }

?>
      <div class="col-md-10">
        <?php

        echo "<div class='modal' id='modal_formularioalta'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                <h4 class='modal-title'>Registro de Máquinas Herramientas</h4>
              </div>
              <div class='modal-body'>




                              <div class='panel-body'>

                                <form class='form-horizontal' action='RegistrarMaquina.php' method='post' enctype='multipart/form-data'>

                                <fieldset>
                                  <legend>Datos Generales</legend>
                                  <div class='form-group'>
                                  <input type='hidden' class='form-control' id='idmaquina' name='idmaquina'>
                                   <div class='form-group'>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'></label>
                                    <div class='col-md-10'>
                                      <input class='form-control' type='hidden' value=1 readonly>
                                    </div>
                                  </div>
                                     <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Nombre</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Nombre' type='text' id='nombre' name='nombre' required>
                                    </div>
                                  </div>
                                    <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Marca</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Marca' type='text' id='marca' name='marca' required>
                                    </div>
                                  </div>
                                     <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Modelo</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Modelo' type='text' id='modelo' name='modelo' required>
                                    </div>
                                  </div>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>No. Serie</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='No. Serie' type='text' id='nserie' name='nserie' required>
                                    </div>
                                  </div>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Código</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Código' type='text' id='codigo' name='codigo' required>
                                    </div>
                                  </div>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Fecha de Adquisición</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Nombre' type='date' id='fadquisicion' name='fadquisicion' required>
                                    </div>
                                  </div>
                                   <div class='form-group'>
                                    <label class='col-md-2 control-label' for='text-field'>Costo</label>
                                    <div class='col-md-10'>
                                      <input class='form-control' placeholder='Costo' type='text' id='costo' name='costo' required>
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
                                    <label class='col-md-2 control-label' for='text-field'>Selecciona mecánico a que se asignará</label>
                                    <div class='col-md-10'>
                                   <select class='form-control' name ='meca' required>
                                      <option value='_'>selecciona</option>
                                      $option; 
                                   </select>
                                   </div>
                                    </div>
                                  
                                      

                                       



                                  </fieldset>
                                  <div class='form-actions'>
                                                      <div class='row'>
                                                        <div class='col-md-12'>
                                                          <button class='btn btn-default' type='submit'>
                                                            Cancelar
                                                          </button>
                                                          <button class='btn btn-primary' type='submit'>
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
            <center><h2>Inventario de Máquinas Herramientas</h2></center>
            <div class="panel-heading">
                  <div class="panel-options">
                    <a href="#modal_formularioalta" data-toggle='modal' data-rel="collapse"><i class="btn btn-primary  fas fa-tools"> +</i></a>
                    

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
           <form action="indexPDFMAQ.php" method="POST" class="form_search" >
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
        <form action="MaquinasHerramientas.php" method="POST" class="form_search" >
                  <input type="text" placeholder="Ingrese el nombre " name="buscar" id="buscar" value="<?php echo $Nombre; ?>" class="form-control"> </div>

                      <button class='btn btn-primary btn-xl' type='submit' name='enviados' class='btn btn-success' value='submit'>
              <i class='fas fa-search'></i>
            </button> 
                  </form>

 </div>
</div>
        

        
                  <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table">
                     <style>
thead {
  color: white;
}

                      <thead ><style='background:#4682b4;' ></style>    
                       <thead style='background:#4682b4;' >
                      <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>No. Serie</th>
                        <th>Código</th>
                        <th>Fecha de Adquisición</th>
                        <th>Mecánico a Cargo</th>
                        <th>Foto</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Estado</th>
                        <th>Detalles</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                  <tbody>
<?php 


include 'readMaquina.php';

  while ($row =mysqli_fetch_array($resul1)){
    //Foto
    if ($row['foto'] != 'img_Maquina.png') {
      $foto = 'img/uploads/maquina/'.$row['foto'];
    }else{
      $foto ='img/'.$row['foto'];
    }
   //foto
    //Estado
    if ($row['estado']==1) {
      $texto="Activo";
    }elseif ($row['estado']==2) {
      $texto="Reparación";
    }else{
      $texto="Inactivo";
    }

    //estado

?>

<tr>
 <?php $rut=$row["idmaquina"];?> 
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['marca'];?></td>
          <td><?php echo $row['modelo'];?> </td>
          <td><?php echo $row['nserie'];?> </td>
          <td><?php echo $row['codigo'];?> </td>
          <td><?php echo $row['fadquisicion'];?> </td>
          <td><?php echo $row['nombreMec'];?> </td>

          <td class="img_herraAct"><img  src="<?php echo $foto; ?>"  alt="imagen" onClick="this.style.height = 'auto'; this.style.width = '600px';" ondblclick="this.style.height = 'auto'; this.style.width = '60px';"/> 
            <a href="javascript:void(0)" onclick="cambiar('<?php echo $row['idmaquina']; ?>')">cambiar</a>
          </td>
          <td>
          <a href="javascript:void(0)" onclick="modificar('<?php echo $row['idmaquina']; ?>')">  <i class="btn btn-success  glyphicon glyphicon-pencil"> </i> </a>
        </td>
          <td>
          <a href="javascript:void(0)" onclick="eliminar('<?php echo $row['idmaquina']; ?>')">  <i class="btn btn-danger glyphicon glyphicon-trash"> </i> </a>
          </td>
           <td>
 
      <form action="EstadoMaquina.php?rut=<?php echo $rut; ?>" method="POST">    
         <select class="form-control" name="estado" >

          <option value="" disabled selected><?php echo $texto;?></option>
          
           <option value="0" >Inactivo</option>
           <option value="2" >Reparación</option>
         </select>
         <input name="enviados" class="btn btn-info btn-xs" type="submit" value="Cambiar">
              </form>
          </td>
          <td></td>
          <td></td>
        </tr>
<?php
}
?>

<div id="divModal"></div>
  <script>
    function modificar(idmaquina) {
      var ruta = './VistaModificarMaquina.php?idmaquina=' + idmaquina;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
  <div id="divModal"></div>
  <script>
    function eliminar(idmaquina) {
      var ruta = './maquinamodal.php?idmaquina=' + idmaquina;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
  <div id="divModal"></div>
  <script>
    function cambiar(idmaquina) {
      var ruta = './VisModFotMaqHerra.php?idmaquina=' + idmaquina;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<!--Fin de Contenido de la tabla Activos-->

<!--Contenido de la tabla Inactivos-->
<?php
$consulta = "SELECT ma.idmaquina,ma.nombre, ma.marca, ma.modelo, ma.nserie, ma.codigo, ma.fadquisicion, ma.costo, ma.foto, ma.falla, ma.estado,  mec.nombreMec, mec.ideMecanico 
FROM maquinash ma 
INNER JOIN mecanico mec 
ON ma.ideMecanico=mec.ideMecanico WHERE
  nombre LIKE '%".$buscar."%' AND estado=0";
      $resultado = mysqli_query($conexion, $consulta);
      while ($row =mysqli_fetch_array($resultado)){
      if ($row['foto'] != 'img_Maquina.png') {
      $foto = 'img/uploads/maquina/'.$row['foto'];
    }else{
      $foto ='img/'.$row['foto'];
    }
   //foto
    //Estado
    if ($row['estado']==1) {
      $texto="Activo";
    }elseif ($row['estado']==2) {
      $texto="Reparación";
    }else{
      $texto="Inactivo";
    }

    //estado


?>
<tr class="deshabilitados">
  <?php $rut=$row["idmaquina"];?> 
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['marca'];?></td>
          <td><?php echo $row['modelo'];?> </td>
          <td><?php echo $row['nserie'];?> </td>
          <td><?php echo $row['codigo'];?> </td>
          <td><?php echo $row['fadquisicion'];?> </td>
          <td><?php echo $row['nombreMec'];?> </td>

            <td class="img_herraAct"><img  src="<?php echo $foto; ?>"  alt="imagen" onClick="this.style.height = 'auto'; this.style.width = '600px';" ondblclick="this.style.height = 'auto'; this.style.width = '60px'; " /> 
            </td>
          <td class="not-active" ><button class="btn btn-success  glyphicon glyphicon-pencil" id="modificar" type="button" onClick="window.location='VistaModificarMaquina.php?rut=<?php echo $rut; ?>';" disabled >
            
          </button></td>
          <td>
              <button  type="button" class=" btn btn-danger glyphicon glyphicon-trash" id="eliminar" onclick="preguntar(<?php echo $row['idmaquina'];?>)" disabled>  </button>
          
          </td>
           <td>


             <form action="EstadoMaquina.php?rut=<?php echo $rut; ?>" method="POST">    
         <select class="form-control" name="estado" onchange="estado_Botones(this.value)">

          <option value="" disabled selected><?php echo $texto; //trae el estado?></option>
 
           <option value="1" >Activo</option>
          
           <option value="2" >Reparación</option>
           

         </select>
         <input name="enviados" class="btn btn-info btn-xs" type="submit" value="Cambiar">
              </form>
          </td>
            <td><?php echo $row['falla']; ?></td>
           <td>
            <a href="javascript:void(0)" onclick="observacion('<?php echo $row['idmaquina']; ?>')">  <i class="btn btn-info  glyphicon glyphicon-plus"> </i> </a>
          </td>
        </tr>
<?php

}
?>
<div id="divModal"></div>
  <script>
    function observacion(idmaquina) {
      var ruta = './vistaDesMaquina.php?idmaquina=' + idmaquina;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
<!--Fin de Contenido de la tabla Inactivos-->

<!--Contenido de la tabla Reparacion-->
<?php
$consulta = "SELECT ma.idmaquina,ma.nombre, ma.marca, ma.modelo, ma.nserie, ma.codigo, ma.fadquisicion, ma.costo, ma.foto, ma.falla, ma.estado,  mec.nombreMec, mec.ideMecanico 
FROM maquinash ma 
INNER JOIN mecanico mec 
ON ma.ideMecanico=mec.ideMecanico WHERE
  nombre LIKE '%".$buscar."%' AND estado=2";
      $resultado = mysqli_query($conexion, $consulta);
      while ($row =mysqli_fetch_array($resultado)){
      if ($row['foto'] != 'img_Maquina.png') {
      $foto = 'img/uploads/maquina/'.$row['foto'];
    }else{
      $foto ='img/'.$row['foto'];
    }
   //foto
    //Estado
    if ($row['estado']==1) {
      $texto="Activo";
    }elseif ($row['estado']==2) {
      $texto="Reparación";
    }else{
      $texto="Inactivo";
    }

    //estado


?>
<tr class="deshabilitados">
   <?php $rut=$row["idmaquina"];?> 
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['marca'];?></td>
          <td><?php echo $row['modelo'];?> </td>
          <td><?php echo $row['nserie'];?> </td>
          <td><?php echo $row['codigo'];?> </td>
          <td><?php echo $row['fadquisicion'];?> </td>
          <td><?php echo $row['nombreMec'];?> </td>

            <td class="img_herraAct"><img  src="<?php echo $foto; ?>"  alt="imagen" onClick="this.style.height = 'auto'; this.style.width = '600px';" ondblclick="this.style.height = 'auto'; this.style.width = '60px';"/> 
            </td>
          <td class="not-active" ><button class="btn btn-success  glyphicon glyphicon-pencil" id="modificar" type="button" onClick="window.location='VistaModificarMaquina.php?rut=<?php echo $rut; ?>';" disabled >
            
          </button></td>
          <td>
              <button  type="button" class=" btn btn-danger glyphicon glyphicon-trash" id="eliminar" onclick="preguntar(<?php echo $row['idmaquina'];?>)" disabled>  </button>
          
          </td>
           <td>


             <form action="EstadoMaquina.php?rut=<?php echo $rut; ?>" method="POST">    
         <select class="form-control" name="estado" onchange="estado_Botones(this.value)">

          <option value="" disabled selected><?php echo $texto; //trae el estado?></option>
 
           <option value="1" >Activo</option>
           <option value="0" >Inactivo</option>
          
           

         </select>
         <input name="enviados" class="btn btn-info btn-xs" type="submit" value="Cambiar">
              </form>
                                      
                
          
          </td>
             <td><?php echo $row['falla']; ?></td>
             <td>
           <a href="javascript:void(0)" onclick="observacion('<?php echo $row['idmaquina']; ?>')">  <i class="btn btn-info  glyphicon glyphicon-plus"> </i> </a>
          </td>
         
          
        </tr>


<?php

}
?>
</tbody>
</table>
</div>
<!--Fin Contenido de la tabla Reparacion-->
              </tbody>
                        </table>
                  </div>
                </div>
                <!-- contenido -->s
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
