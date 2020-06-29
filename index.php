<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar Sesion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>


  </head>
  <body class="login-bg" style='background:url(./images/bg.jpg) no-repeat fixed center #4682b4'>
  	<div class="header" >
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Alpix</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container" >
		<div class="row" >
			<div class="col-md-4 col-md-offset-4" >
				<div class="login-wrapper" >
			        <div class="box" style="margin: 230px 0px 230px 0px;  
  							padding: 90px;
  							background: rgba(0,0,0,0.5);
  							display: inline-block;">
										           
			            	<form action="loguear.php" method="POST">
			                <h6 style="color: white">ALPIX</h6>
			                <i class="fas fa-file-pdf fa-1x text-gray-300"></i><input class="form-control" name="nombreMec" type="text" placeholder="Ingresa Nombre ">
			                <input class="form-control" type="password" placeholder="Ingresar password" name="clave">
			                <button type="submit" class="btn btn-primary signup">Iniciar Sesión</button>
			                </form>
			            
			        </div>

			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
