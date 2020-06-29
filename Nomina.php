<?php
session_start();
$_SESSION['username'];
if (!isset($_SESSION['username'])) {
  header("location: index.php");
  }
  if ($_SESSION['username'] !='Admin') {
  header("location: index.php");
}
?><?php
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
        <title>Empleados</title>
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
  <div class="col-md-10">
                <!-- contenido -->
               <div class="content-box-large">
              <div class="panel-heading">
                <center><h3>Calcular Nómina</h3></center>
                  <div class="panel-options">
                    <button class="btn btn-success" type="button" onClick="window.location='observaciones.php';">Ver Nóminas </button>
                  </div>
              </div><br>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <style type="text/css">
                    thead {
                      color: white;
                      background:#4682b4;
                    }
                  </style> 
                    <tr>
                        
                        <th>Numero de Lista</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                        <th>Medios Dias</th>
                        <th>Prestamo</th>
                        <th>Pago</td>
                        <th>Calcular</td>
                      </tr>
                    </thead>
                  <tbody>
                    <?php error_reporting (0);?>
                    <?php
                    $sql = "SELECT * from empleado ";
                    $res= mysqli_query($conexion,$sql);
                    $numeroRegistros=mysqli_num_rows($res);
                      for ($i=0; $i <$numeroRegistros; $i++) { 
                        while ($row =mysqli_fetch_array($res)){
                    ?>
                      <tr>
                        <form  action="RegistrarDatosNomina.php?ide=<?php echo $row['ide']; ?>" method="post" >  
                          <input  type='hidden' size=20 style="width:80px" name='ide' value="<?php echo $row['ide'];?>" class="form-control" readonly >
                          <td><input type="text" size=20 style="width:80px" name="nlista" value="<?php echo $row['nlista'];?>" class="form-control"readonly></td>
                          <td><input  type="text" size=20 style="width:200px" name="nombre" value="<?php echo $row['nombre'];?>" class="form-control"readonly></td>
                          <td><input  type="text" size=20 style="width:80px" name="sueldo" value="<?php echo $row['sueldo'];?>" class="form-control"readonly></td>
                          <td>
                            <select class ="form-control" name='meDias'required>
                              <option >Medios días</option>
                              <option value="1" >1</option>
                              <option value="2" >2</option>
                              <option value="3" >3</option>
                              <option value="4" >4</option>
                              <option value="5" >5</option>
                              <option value="6" >6</option>
                              <option value="7" >7</option>
                              <option value="8" >8</option>
                              <option value="9" >9</option>
                              <option value="10" >10</option>
                              <option value="11" >11</option>
                              <option value="12" >12</option>
                            </select>
                          </td>
                          <td><input type='number' size=20 style="width:80px" name='prestamo' value="0" class="form-control" required></td>
                          <td> 
                            <select class ="form-control" name='estado'required>
                              <option value=" disabled selected readonly">Pago</option>
                              <option value="Aprobado" >Aprobado</option>
                              <option value="Sin Aprobar" >Sin Aprobar</option>
                            </select>
                          </td>
                          <td><input type="submit" name="unoporuno" value="Calcular" class="btn btn-primary btn-xs"></td>
                        </form>
                   <?php
                      }
                    }
                    ?>
                    </tr>

                    <?php error_reporting (0);?>
                    <?php
                    $sql = "SELECT * from mecanico where tipo ='' ";
                    $res= mysqli_query($conexion,$sql);
                    $numeroRegistros=mysqli_num_rows($res);
                      for ($i=0; $i <$numeroRegistros; $i++) { 
                        while ($fila =mysqli_fetch_array($res)){
                    ?>
                    <tr>
                    <form  action="RegistrarDatosNomina.php?ide=<?php echo $fila['ideMecanico']; ?>" method="post" >  
                          <input  type='hidden' size=20 style="width:80px" name='ide' value="<?php echo $fila['ideMecanico'];?>" class="form-control" readonly >
                          <td><input type="text" size=20 style="width:80px" name="nlista" value="<?php echo $fila['nlista'];?>" class="form-control" readonly></td>
                          <td><input  type="text" size=20 style="width:200px" name="nombre" value="<?php echo $fila['nombreMec'];?>" class="form-control" readonly></td>
                          <td><input  type="text" size=20 style="width:80px" name="sueldo" value="<?php echo $fila['sueldo'];?>" class="form-control" readonly></td>
                          <td size=20 style="width:140px">
                            <select class ="form-control" name='meDias'required>
                              <option >Medios días</option>
                              <option value="1" >1</option>
                              <option value="2" >2</option>
                              <option value="3" >3</option>
                              <option value="4" >4</option>
                              <option value="5" >5</option>
                              <option value="6" >6</option>
                              <option value="7" >7</option>
                              <option value="8" >8</option>
                              <option value="9" >9</option>
                              <option value="10" >10</option>
                              <option value="11" >11</option>
                              <option value="12" >12</option>
                            </select>
                          </td>
                          <td><input type='number' size=20 style="width:80px" name='prestamo' value="0" class="form-control" required></td>
                          <td size=20 style="width:120px"> 
                            <select class ="form-control" name='estado'required>
                              <option value=" disabled selected readonly">Pago</option>
                              <option value="Aprobado" >Aprobado</option>
                              <option value="Sin Aprobar" >Sin Aprobar</option>
                            </select>
                          </td>
                          <td><input type="submit" name="unoporuno" value="Calcular" class="btn btn-primary btn-xs"></td>
                        </form>
                        <?php
                      }
                    }
                    ?>
                    </tr>
                  </tbody>
              </table>
        </div>
      </div>
            <center><h3>Nómina</h3></center>
          <!--Inicia mostrar nomina-->
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table ">
            <thead>
              <style type="text/css">
                thead {
                  color: white;
                  background:#4682b4;
                }
              </style> 
              <tr> 
                <th>Numero de Lista</th>
                <th>Nombre</th>
                <th>Sueldo</th>
                <th>Medios Dias</th>
                <th>Faltantes</th>
                <th>SubTotal</th>
                <th>Prestamo</th>
                <th>Total</td>
                <th>Pago</td>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php error_reporting (0);?>
            <?php 
              $sql = "SELECT emp.ide, emp.nlista, emp.nombre, emp.sueldo, dn.idcalculo, dn.meDias, dn.faltantes, dn.subtotal, dn.prestamo, dn.total, dn.estado, dn.ide FROM empleado emp INNER JOIN calculonomina dn ON emp.ide=dn.ide where estado ='Aprobado' ";
              $res= mysqli_query($conexion,$sql);
              $numeroRegistros=mysqli_num_rows($res);
                for ($i=0; $i <$numeroRegistros; $i++) { 
                  while ($row =mysqli_fetch_array($res)){
            ?>
            <tr>
              <form  action="ejemploNomina.php" method="post" >
                <input  type='hidden' size=20 style="width:80px" name='ide[]' value="<?php echo $row['ide'];?>" class="form-control" readonly >
                <td><input type="text" size=20 style="width:80px" name="nlista[]" value="<?php echo $row['nlista'];?>" class="form-control" readonly></td>
                <td><input  type="text" size=20 style="width:200px" name="nombre[]" value="<?php echo $row['nombre'];?>"class="form-control"  readonly></td>
                <td><input  type="text" size=20 style="width:80px" name="sueldo[]" value="<?php echo $row['sueldo'];?>" class="form-control"  readonly></td>
                <td><input type='number' size=20 style="width:80px" name='meDias[]' value="<?php echo $row['meDias'];?>"class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='faltantes[]'value="<?php echo $row['faltantes'];?>"class="form-control" ></td>
                <td><input type='number' size=20 style="width:80px" name='subtotal[]' value="<?php echo $row['subtotal'];?>" class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='prestamo[]'value="<?php echo $row['prestamo'];?>" class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='total[]' value="<?php echo $row['total'];?>" class="form-control"></td>
                <td><input type='text' name='estado[]' value="<?php echo $row['estado'];?>"  class="form-control"></td>
                <td>
                  <button class="btn btn-danger  glyphicon glyphicon-trash" type="button" onClick="window.location='eliminarDatoNomina.php?ide=<?php echo $row['ide']; ?>';">  
                  </button>
                </td>   
                <?php
                  }
                }
                ?>
                <?php error_reporting (0);?>
            <?php 
              $sql = "SELECT mec.ideMecanico, mec.nlista, mec.nombreMec, mec.sueldo, dn.idcalculo, dn.meDias, dn.faltantes, dn.subtotal, dn.prestamo, dn.total, dn.estado, dn.ide FROM mecanico mec INNER JOIN calculonomina dn ON mec.ideMecanico=dn.ide where estado ='Aprobado' ";
              $res= mysqli_query($conexion,$sql);
              $numeroRegistros=mysqli_num_rows($res);
                for ($i=0; $i <$numeroRegistros; $i++) { 
                  while ($row =mysqli_fetch_array($res)){
            ?>
            <tr>
              <input  type='hidden' size=20 style="width:80px" name='ide[]' value="<?php echo $row['ideMecanico'];?>" class="form-control" readonly >
                <td><input type="text" size=20 style="width:80px" name="nlista[]" value="<?php echo $row['nlista'];?>" class="form-control" readonly></td>
                <td><input  type="text" size=20 style="width:200px" name="nombre[]" value="<?php echo $row['nombreMec'];?>"class="form-control"  readonly></td>
                <td><input  type="text" size=20 style="width:80px" name="sueldo[]" value="<?php echo $row['sueldo'];?>" class="form-control"  readonly></td>
                <td><input type='number' size=20 style="width:80px" name='meDias[]' value="<?php echo $row['meDias'];?>"class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='faltantes[]'value="<?php echo $row['faltantes'];?>"class="form-control" ></td>
                <td><input type='number' size=20 style="width:80px" name='subtotal[]' value="<?php echo $row['subtotal'];?>" class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='prestamo[]'value="<?php echo $row['prestamo'];?>" class="form-control"></td>
                <td><input type='number' size=20 style="width:80px" name='total[]' value="<?php echo $row['total'];?>" class="form-control"></td>
                <td><input type='text' name='estado[]' value="<?php echo $row['estado'];?>"  class="form-control"></td>
                <td>
                  <button class="btn btn-danger  glyphicon glyphicon-trash" type="button" onClick="window.location='eliminarDatoNomina.php?ide=<?php echo $row['ide']; ?>';">  
                  </button>
                </td>  
            </tr>
            <?php
                  }
                }
                ?>
                <div class='col-md-2'>
                <label>Semana de :</label><br><input type='date'  name='fechaInicio' class="form-control" ><br>
                </div>
                <div class='col-md-2'>
                <label> A:</label><br><input type='date'  name='fechaFin'class="form-control" ><br>
                </div>
              </tbody>
          </table>
          <center><input type="submit"  value="Guardar Nómina" class="btn btn-primary"></center>
            </form> 
        </tr>
       </div>
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
