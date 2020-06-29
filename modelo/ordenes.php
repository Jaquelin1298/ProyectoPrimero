
<?php

if (isset($_POST['ventanatallas'])) {
    ventanatallas($_POST['ventanatallas']);
}

function ventanatallas($idorden){
  $enlace = mysqli_connect("169.254.16.253", "bdavid", "1234", "sam") or die("Error " . mysqli_error($conexion));
  $conexion= $enlace;
  $output="";
  $query = "SELECT idtallas,idorden,talla,cantidad FROM tallas where idorden=$idorden;" or die("Error in the consult.." . mysqli_error($conexion));
/*$encabezadotabla="<table class='table'>
  <thead>
<tr>
  <th> idtalla</th>
  <th>Talla</th>
  <th>Cantidad</th>
</tr>
</thead>
<tbody>";*/
  $resultado = $conexion->query($query);
  while($row2 = mysqli_fetch_array($resultado))
  {
/*
    $output=$output."<tr>".
    "<td><input type='text' id='idtalla' name='idtalla[]' size=5 readonly VALUE='".$row2["idtallas"]."'></td>".
    "<td><input type='text' id='talla' name='talla[]' size=10 VALUE='".$row2["talla"]."'></td>".
    "<td><input type='text' id='cantidad' name='cantidad[]' size=20 VALUE='".$row2["cantidad"]."'></td>".
    "</tr>";*/
    $output=$output."<div>
    <input type='text' name='idtalla[]' readonly value='".$row2["idtallas"]."'/>
    <input type='text' name='talla[]' value='".$row2["talla"]."'/>
    <input type='text' name='cantidad[]' value='".$row2["cantidad"]."'/>
	<a href='javascript:void(0);' class='remove_button' title='Remove field'>
	Eliminar </a>
  </div>";
  }
//  $fintabla="</tbody></table>";
  //echo $encabezadotabla.$output.$fintabla;
  echo $output;
return ($output);
}

function cantidadproduc($idorden){
$conexion= Conectar();
$query="";
$topera=0;

$query = "SELECT sum(cantidad) as producir FROM tallas where idorden=$idorden ;" or die("Error in the consult.." . mysqli_error($conexion));
  //echo "465: ".$query;
$resultado = $conexion->query($query);
    while($row = mysqli_fetch_array($resultado)) {
        $topera=$row["producir"];
    }
      return($topera);
      }

function cant_operaciones($idpren){
$conexion= Conectar();
$query="";
$topera=0;

$query = "SELECT count(idop) as total FROM operacionesorden where idprenda=$idpren" or die("Error in the consult.." . mysqli_error($conexion));


$resultado = $conexion->query($query);
    while($row = mysqli_fetch_array($resultado)) {
        $topera=$row["total"];
    }
      return($topera);
      }

function numerodias($fechainix)
{
  $resultadox="";
  $fecha1 = new DateTime($fechainix);
  $startDate = date("Y/m/d"); //aqui la fecha actual
    $fecha2 = new DateTime($startDate);
    $resultado = $fecha1->diff($fecha2);


return($resultado->format('%R%a días'));
// if you want to check for minus
//echo ($diff->invert == 1) ? ' - ' . $diff->days .' days '  : $diff->days .' days ';
}

function costoopera($idprendaw)
{
  $conexion= Conectar();
  $costopieza="0.0";
$query = "SELECT sum(costopieza) as total FROM operacionesorden where idprenda=".$idprendaw." ;" or die("Error in the consult.." . mysqli_error($conexion));
$resultado = $conexion->query($query);
while($row2 = mysqli_fetch_array($resultado))
  {
$costopieza=$row2["total"];//10;//=$costopieza+$costo;
  }
  return $costopieza;
}

function fechasemana($feca){
$fechaComoEntero = strtotime($feca);
  $year=date("Y", $fechaComoEntero);
$month=date("m", $fechaComoEntero);
$day=date("d", $fechaComoEntero);

# Obtenemos el numero de la semana
$semana=date("W",mktime(0,0,0,$month,$day,$year));

# Obtenemos el día de la semana de la fecha dada
$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));

# el 0 equivale al domingo...
if($diaSemana==0)
    $diaSemana=7;

# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
$primerDia=date("Y-m-d",mktime(0,0,0,$month,$day-$diaSemana+1,$year));

# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
$ultimoDia=date("Y-m-d",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));

//echo "<br>Semana: ".$semana." - año: ".$year;
//echo "<br>Primer día ".$primerDia;
//echo "<br>Ultimo día ".$ultimoDia;
  return($primerDia."#".$ultimoDia);
}

function avances($idorden){
$conexion= Conectar();
$query="";
$tseccion="";
$tcantotal=0;

$query = "SELECT seccion,sum(cantidad) as total FROM registrosproduccion where idorden=$idorden group by seccion;" or die("Error in the consult.." . mysqli_error($conexion));
$resultado = $conexion->query($query);
                while($row = mysqli_fetch_array($resultado))
                  {
                  $tcantotal+=$row["total"];
                  }
  return($tcantotal);
                }

function avancesexterno($idorden){
$conexion= Conectar();
$query="";
$tseccion="";
$tcantotal=0;

$query = "SELECT seccion,sum(cantidad) as total FROM productividadexterna where idorden=$idorden group by seccion;" or die("Error in the consult.." . mysqli_error($conexion));
$resultado = $conexion->query($query);
                while($row = mysqli_fetch_array($resultado))
                  {

                  $tcantotal+=$row["total"];
                  }
  return($tcantotal);
                }
 ?>
