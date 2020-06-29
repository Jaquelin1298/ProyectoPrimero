                      
<?php

	include 'conecciones.php';
                          //print_r($_SESSION);
                          //exit;

$nombre=$_SESSION['username'];
                                 $mecanico = mysqli_query($conexion,"SELECT * FROM mecanico WHERE nombreMec ='".$nombre."'");
                                 $meca = mysqli_fetch_array($mecanico);
                                 if ($meca['avatar'] != 'img_Mecanicos.png') {
                                               $avatar = 'imgMecanicos/'.$meca['avatar'];
                                             }else{
                                                   $avatar ='imgMecanicos/'.$meca['avatar'];
                                            }
                                            ?>
<div class='header' style='background-color: #4682b4'>
	     
	        
	           <div class='col-md-5'>
	              <!-- Logo -->
	              <div class='logo'>
	                 <h1><a href='#'>Alpix</a></h1>
	              </div>
	           </div>
	          	<?php 
	          	$notificaciones=mysqli_query($conexion,"SELECT * FROM notificaciones WHERE  user2 ='".$_SESSION['id']."' AND leido ='0' ORDER BY id_not desc");
          		$cuantas=mysqli_num_rows($notificaciones);?>
                   <div class="panel-heading">
                   	<div class="panel-options">

	                  <nav class='collapse navbar-collapse bs-navbar-collapse navbar-right' role='navigation'>
	                   
	                      <li class='dropdown'>
	                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><img src='<?php echo $avatar; ?>'style='width:30px;  height:30px; border-radius:15px;'>  </a><label style="color: white;"><?php echo $_SESSION["username"]; ?> <i class='fas fa-angle-down' style="color: white;"></i></label>
	                        <ul class='dropdown-menu animated fadeInUp'>
                            <li><a href='cerrarSesion.php'>Salir</a></li>
                        </ul>
	                      </li>
	                    
	                  </nav>
	              </div>
	           <div class="panel-options">
	          		<li class="dropdown notifications-menu" >
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              				<span class="btn btn-danger  glyphicon glyphicon-bell" ><?php echo $cuantas; ?></span>
            					<ul class="dropdown-menu">
              		<li >
                	<ul class="list-group-item ">
                  <?php
                  while ($no=mysqli_fetch_array($notificaciones)) { 
                  $mecs= mysqli_query($conexion, "SELECT * FROM  mecanico WHERE ideMecanico= '".$no['user1']."' ");
                  $me=mysqli_fetch_array($mecs);
                  ?>
                  <li class="list-group">
                    <a href="abrirNotificacion.php?idCom=<?php echo $no['idCom']; ?>&id=<?php echo $no['id']; ?>" class="list-group-item ">
                      <i class="far fa-comment"></i> <?php echo $me['nombreMec']; ?>    <?php echo $no['tipo']; ?> a tu comentario </a>
                  </li>
              <?php } ?>
                </ul>
              </li>
            </ul>
          </li>
	           </div>
	   </div>	
	    </div>
	</div>

  