<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<style type="text/css">
  @import url(http://fonts.googleapis.com/css?family=Open+Sans);
 
html,body{
  color:white;
  font-family:'Opens Sans',helvetica;  
  height:100%;
  width:100%;
  margin: 0px;
}
 
.portada{
   background: url(./images/fon.jpg) no-repeat fixed center;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   height: 100%;
   width: 100% ;
   text-align: center;
 
}
.text{
  margin: 30px 0px 30px 0px;  
  padding: 10px;
  background: rgba(0,0,0,0.5);
  display: inline-block;
}
</style>

<html lang="es">
<meta charset="UTF-8"/>
 
<head>
  </head>
<body>
<div class="portada">
    <div class="text">
      <h1> div con imagen de fondo responsive</h1> 
      <h3>Imagen adaptada a todas las resoluciones de pantalla</h3>
    </div>
</div>
  </body>
  </html>
</body>
</html>

<div class='header'>
             <div class='col-md-5'>
                <!-- Logo -->
                <div class='logo'>
                   <h1><a href='#'>Alpix</a></h1>
                </div>
             </div>
            
                <div class='navbar navbar-inverse' role='banner'>
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
  </div>