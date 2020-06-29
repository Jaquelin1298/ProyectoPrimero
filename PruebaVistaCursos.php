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
include 'conecciones.php';
include 'db/conecciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
    <title>Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="css/forms.css" rel="stylesheet">
  </head>
  <body>
    <style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Open+Sans);
 

.portada{
   background-color: #F9FAE5;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   height: 70px;
   width: auto;
   text-align: center;
 
}
.text{
  margin: 30px 0px 30px 0px;  
  padding: 15px;
  background: rgba(238, 90, 30,0.5);
  display: inline-block;
}
</style>
    <?php
    require_once 'cabezeras/cabezeraMec.php';
     ?>

    <div class="page-content" >
      <div class="row" >
      <?php
echo menulateral('');
      ?>
      <div class="col-md-10" >

        <div class="row" >
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php 

include "connection.php";
 ?>

<?php
include 'conecciones.php';
$id = $_GET["id"];
$con = connect();

$sql = "SELECT * FROM curso WHERE id='$id'  AND estado=1";
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

    <?php foreach($data as $d):?>

              <!-- contenido -->

                <!-- contenido -->
                
             <div class="content-box-large" style='background-color: #FFFFD8'>
                  <div class="panel-heading">
                  <div class="panel-options">
                     
      <a href="./nuevo_comentario.php?id=<?php  echo $d->id?>" class='btn btn-primary   far fa-comments ' > </a>

                  </div>
             
<?php 
echo '<center><h1>'.$d->maquina.'</h1></center>';
     
        $arcvs = get_curso_archivo($d->id);
        echo '<div><h3>Contenido de curso </h3></div>';
        echo '<div><h5>Archivos PDF </h5></div>';
        echo '<div class="row">';
        if(count($arcvs)>0){
          
          foreach($arcvs as $ca){
            $a = get_archivo($ca->archivo_id);
            
            echo '<div class=".col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow"><div class="text">
                        <i class="fas fa-file-pdf fa-1x text-gray-300"></i><a class="btn btn-link btn-xs" href="archivosPDF/'.$a->archivo.'">'.$a->archivo.'</a>
                      
                    </div>
                   
                   </div>
                  </div>';

          }

        }
        echo '</div></div>';
        ?>
           <a href="javascript:void(0)" onclick="asignar('<?php echo $d->id; ?>')">  <i class="btn btn-primary  glyphicon glyphicon-plus"> </i> </a>
     <?php 
        $lnk = get_curso_link($d->id);
        echo '<div><h5>Link</h5></div>';

        if(count($lnk)>0){
          foreach($lnk as $ca){
            $l= get_link($ca->link_id);
            
            echo '<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 shadow"><div class="text">
                    <i class="fas fa-paperclip fa-1x text-gray-300"></i><a class="btn btn-link btn-xs" href="'.$l->link.'">'.$l->link.'</a>';
            echo '</div></div>';
            echo '</div>';
          }
        }
?>
          
          <a href="javascript:void(0)" onclick="asignarl('<?php echo $d->id; ?>')">  <i class="btn btn-primary  glyphicon glyphicon-plus"> </i> </a>
    
    <?php endforeach; ?>
  


<?php else:?>
  <p class="alert alert-warning">No se encontraron Resultados</p>
<?php endif; ?>
<div id="divModal"></div>
  <script>
    function asignar(id) {
      var ruta = './asignar.php?id=' + id;
        $.get(ruta, function (data) {
            $('#divModal').html(data);
            $('#myModal').modal('show');
        });
    }
  </script>
  <div id="divModal"></div>
  <script>
    function asignarl(id) {
      var ruta = './asiglink.php?id=' + id;
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
