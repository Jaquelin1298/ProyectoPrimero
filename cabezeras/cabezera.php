<?php
function muestracabezera($cabe)
{
  $cabezal="<div class='header'  style='background-color: #4682b4' >
	           <div class='col-md-5' >
	              <!-- Logo -->
	              <div class='logo'>
	                 <h1><a href='#'>Alpix</a></h1>
	              </div>
	           </div>
	          
	              <div class='navbar navbar-inverse' role='banner' >
	                  <nav class='collapse navbar-collapse bs-navbar-collapse navbar-right' role='navigation'>
	                    <ul class='nav navbar-nav'>
	                      <li class='dropdown'>
	                        <a href='cerrarSesion.php' class='dropdown-toggle' data-toggle='dropdown'><img src='./imgMecanicos/img_4499427c9c4c927c1673b0f5e7a3f86f.JPEG' style='width:30px;  height:30px; border-radius:15px;'>  ".$_SESSION["username"]."<b class=''> <i class='fas fa-angle-down'></i></b></a>
	                         <ul class='dropdown-menu animated fadeInUp'>
                            <li><a href='cerrarSesion.php'>Salir</a></li>
                          </ul>
	                      </li>
	                    </ul>
	                  </nav>
	          </div>
	</div>";
  return ($cabezal);
}//RGB(70, 130, 180)
//style='background-color: #4682B4'

 ?>
                    