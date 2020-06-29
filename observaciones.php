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
     <meta charset="utf-8">
    <title>Nómina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">
  </head>
  <body>
    <?php
echo  muestracabezera('');
     ?>
<?php

?>
    <div class="page-content">
      <div class="row">
      <?php
echo menulateral('');
      ?>
      <div class="col-md-10">
       

      
<!--contenido de la prueba de nomina hecha-->
      <div class="content-box-large">
                  <div class="panel-heading">
                   
                  <div class="panel-options">
                  </div>

                   <center><h3>Nóminas del mes de <?php
                        setlocale(LC_TIME, "spanish");
                        echo strftime(" %B ");
                        ?></h3></center>
      
                     <form class="form-inline" action="IndexPDFNomina.php" method="post">
                        <div class="col-xs-10 col-xs-offset-3">
        <div class="form-group">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" class="form-control" name="fechaInicio" required>
        </div>
        <div class="form-group">
            <label for="fecha_final">Fecha Final:</label>
            <input type="date" class="form-control" name="fechaFinal" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="reportar">Imprimir</button>
        </div>
    </div>
                     </form>
                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

                 </div>
<div class="panel-body">
                    <div class="row">
    <div class="col-md-3">
       
                

 </div>
</div>
</div>
            
   <div class="panel-body">

    <link href="css/styles.css" rel="stylesheet">
 <table class="table table-striped">
<style>
thead {
  color: white;
}

                      <thead ><style='background:#0C0301;' ></style>    
                       <thead style='background:#0C0301;' >
                                         <tr>
                        <th></td>
                        <th>Fecha de Inicio de Semana</th>
                        <th></th>
                        <th>Fecha de Fin de Semana </th>
                        <th>Total Nomina</th>
                      </tr>
                    </thead>
                  <tbody>
   </div>
<?php 
require'conecciones.php';

$sql="SELECT *,SUM(total) as mtotal, SUM(sueldo) as tsueldo from datosnomina where month(fechaInicio)and month(fechaFin)=(select MONTH (NOW()) as mes) GROUP by fechaFin";
$res = mysqli_query($conexion,$sql);

$res = mysqli_query($conexion,$sql);
$totalNomina=0; ?>

<?php
while ($row =mysqli_fetch_array($res)){
$totalNomina+=$row['total'];

?>

<tr>
          
          <td><?php echo 'Nómina de:'?></td>
          <td><?php echo $row['fechaInicio'];?></td>
          <td><?php echo 'a:'?></td>
          <td><?php echo $row['fechaFin'];?></td>
          <td><?php echo '$'.$row['mtotal'].'';?></td>    
</tr>
<?php

}
?>

<!--termina mostrar nomina-->
     
 </center>
                   </tbody>
                   </table>   
                  </div>
                </div>
                <!-- contenido -->

              <!-- fin contenido -->

    
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
