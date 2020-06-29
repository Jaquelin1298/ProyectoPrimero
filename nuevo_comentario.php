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
include 'conecciones.php';?>

<!doctype html>
<html lang="es-ES">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Comentarios</title>
 <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
  <?php
require_once 'cabezeras/cabezeraMec.php';
     ?>
  <div class="container">
  <div class="row">
    <div class="col-md-10">


<div id="L">
<br>

  <div id="container">
      <ul id="comments">
                <a href="PruebaVistaCursos.php?id=<?php echo $_GET["id"];?>" class="btn btn-primary    glyphicon glyphicon-arrow-left">  </a>

      <form name="form1" method="post" action="">
  
  <center>
    <h3><label for="textarea"><?php echo '  '.$nombre.':  '; ?></label></h3>
    <p>
      <textarea name="comentario" cols="65" rows="3" id="textarea" class="form-control"><?php if(isset($_GET['nomMec'])) { ?>@<?php echo $_GET['nomMec']; ?><?php } ?> </textarea>
    </p>
    <p>
      <input type="submit" <?php if (isset($_GET['idCom'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?>value="Comentar" class="btn btn-primary">
    </p>
  </center>
</form>
<?php

$param= $_GET["id"];
if(isset($_POST['comentar'])) {
    $query = mysqli_query($conexion,"INSERT INTO comentarios (comentario,mecanico,fecha,id) value ('".$_POST['comentario']."','".$_SESSION['id']."',NOW(),'".$_GET['id']."')");  
        if($query) { header("Location: nuevo_comentario.php?id=$param"); }

  }
  if(isset($_POST['reply'])) {
 //print_r($_GET);
//exit;
 
    $query = mysqli_query($conexion,"INSERT INTO comentarios (comentario,mecanico,fecha,reply,id) value ('".$_POST['comentario']."','".$_SESSION['id']."',NOW(),'".$_GET['idCom']."','".$_GET['id']."')");  
    $noti=mysqli_query($conexion, "INSERT INTO notificaciones (user1,user2,tipo,leido,fecha,idCom,id)  VALUES ('".$_SESSION['id']."','".$_GET['meca']."','respondio','0',NOW(),'".$_GET['idCom']."','".$_GET['id']."')");

    if($query) { header("Location: nuevo_comentario.php?id=$param"); }
 
}

?>




        <?php

        $comentarios = mysqli_query($conexion,"SELECT Com.idCom, Com.comentario,Com.fecha,Com.id,Com.reply,Com.mecanico, Cur.id, Cur.titulo FROM comentarios Com INNER JOIN curso Cur ON Com.id=Cur.id WHERE Com.id='".$_GET['id']."' AND  reply = 0 ORDER BY idCom DESC");
    while($row=mysqli_fetch_array($comentarios)) {
      
      $mecanico = mysqli_query($conexion,"SELECT * FROM mecanico WHERE ideMecanico ='".$row['mecanico']."'");
      $meca = mysqli_fetch_array($mecanico);
        if ($meca['avatar'] != 'img_Mecanicos.png') {
      $avatar = 'imgMecanicos/'.$meca['avatar'];
    }else{
      $avatar ='imgMecanicos/'.$meca['avatar'];
    }

    ?>
        
          <li class="cmmnt">
              <div class="avatar">
                <img src="<?php echo $avatar; ?>" height="55" width="55">
                </div>
                <div class="cmmnt-content">
                  <header>
                    <a href="#" class="userlink"><?php echo $meca['nombreMec']; ?></a> - <span class="pubdate"><?php echo $row['fecha']; ?></span>
                    </header>
                    <p>
                    <?php echo $row['comentario'];  ?>
                    </p>
                    <span>
                    <a href="nuevo_comentario.php?meca=<?php echo $meca['ideMecanico']; ?>&idCom=<?php echo $row['idCom']; ?>&id=<?php echo $_GET['id']; ?>&nomMec=<?php echo $meca['nombreMec'];?>">
                    Responder
                    </a>
                    </span>
                </div>
                
                <?php
        $contar = mysqli_num_rows(mysqli_query($conexion," SELECT Com.idCom, Com.comentario,Com.fecha,Com.id,Com.reply,Com.mecanico, Cur.id, Cur.titulo FROM comentarios Com INNER JOIN curso Cur ON Com.id=Cur.id WHERE Com.id='".$_GET['id']."' AND reply = '".$row['idCom']."'"));
        
        if($contar != '0') {
          
          $reply = mysqli_query($conexion,"SELECT Com.idCom, Com.comentario,Com.fecha,Com.id,Com.reply,Com.mecanico, Cur.id, Cur.titulo FROM comentarios Com INNER JOIN curso Cur ON Com.id=Cur.id WHERE Com.id='".$_GET['id']."' AND reply = '".$row['idCom']."' ORDER BY idCom DESC");
          while($rep=mysqli_fetch_array($reply)) {
            
          $mecanico2 = mysqli_query($conexion,"SELECT * FROM mecanico WHERE ideMecanico = '".$rep['mecanico']."'");
          $mec2 = mysqli_fetch_array($mecanico2);
            if ($mec2['avatar'] != 'img_Mecanicos.png') {
      $avatar = 'imgMecanicos/'.$mec2['avatar'];
    }else{
      $avatar ='imgMecanicos/'.$mec2['avatar'];
    }
          
        ?>
                
                <ul class="replies">
                  <li class="cmmnt">
                      <div class="avatar">
                <img src="<?php echo $avatar; ?>" height="55" width="55">
                </div>
                  <div class="cmmnt-content">
                        <header>
                        <a href="#" class="userlink"><?php echo $mec2['nombreMec']; ?></a> - <span class="pubdate"><?php echo $rep['fecha']; ?></span>
                        </header>
                        <p>
                        <?php echo $rep['comentario']; ?>
                        </p>
                    </div>
                    
                    </li>
                </ul>
                
                <?php } } } ?>
                
                
            </li>        
        
        </ul>
    </div>

  </div>
</div>
</div>
       
         <a class="btn btn-primary" href="nuevo_comentario.php?id=<?php echo $_GET["id"];?>">
    <i class="fas fa-angle-up"></i>
</a>
        
        

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