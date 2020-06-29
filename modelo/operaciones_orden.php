<?php
include '../db/conecciones.php';
$opcion=$_GET['opcion'];

switch ($opcion) {
  case 1:{

    $ordenid=$_POST['ordenid'];
    $ordenfolio=$_POST['ordenfolio'];
    $ordenprenda=$_POST['ordenprenda'];
    $ordenfechaini=$_POST['ordenfechaini'];
    $ordenfechafin=$_POST['ordenfechafin'];

    $sql = "update ordenesproduccion set folio='$ordenfolio', descrip='$ordenprenda',fechaini='$ordenfechaini',fechafin='$ordenfechafin' where idproduccion=$ordenid";
    $myArray = ejecutarquery($sql);
    header('Location: ../paneladmin.php');
  };break;
  case 2:{
    $ordenid=$_POST['ordenid'];
        $original=consultalla($ordenid); //obetemos el array original de TALLAS
        $idtalla=$_POST["idtalla"]; // array id con las modificaciones
        $tallas=$_POST["talla"];// array talla con las modificaciones
        $cantidad=$_POST["cantidad"];// array cantidad con las modificaciones

        foreach ( $original as $como ) {
            echo "idp=".$como."<br/>";
            if(buscaeliminados($idtalla,$como)) // buscamos que tallas NO se van a eliminar
            {
              echo "No Eliminar:".$como;
              if(buscanuevos($idtalla,$como))
              {
              echo "es una talla nueva";
              }else{
                echo "solo actualizamos datos";
              }
            }
            else {
              {
                echo " Eliminar".$como."<br/>";
                $sql = "delete from  richi.tallas  where idorden=$ordenid";
                echo $sql;
              }
            }
          }


      /*  foreach ( $_POST["idtalla"] as $como ) {
		        echo "idp=".$como."<br/>";
            buscacambios($arraymodi,$idbuscar)
          }*/


  };break;
  case 3:{

  };break;
  case 4:{

  };break;
  case 5:{

  };break;
  case 6:{

  };break;

}

function buscaeliminados($arraymodi,$idbuscar)
{
  $resultado=false;
  foreach ( $arraymodi as $at ) {
      if($at==$idbuscar)
      {
echo "si se encuentra:".$at."<br/>";
        $resultado=true;
      }
      else {
        if($at=="NT")
        {
          echo "es nuevo".$at."<br/>";
          $resultado=true;
        }
      }
    }

  return($resultado);
}

function buscanuevos($arraymodi,$idbuscar)
{
  $resultado=false;
  foreach ( $arraymodi as $at ) {

      if (strcmp ($at , "NT" ) == 0){
        echo $at."== NT";
    $resultado=true;
       }

    }




  return($resultado);
}

function consultatallas($idorden){
  $conexion= Conectar();
  $output="";
  $query = "SELECT idtallas,idorden,talla,cantidad FROM tallas where idorden=$idorden;" or die("Error in the consult.." . mysqli_error($conexion));
  $resultado = $conexion->query($query);
  while($row2 = mysqli_fetch_array($resultado))
  {
    $costopieza=$row2["total"];//10;//=$costopieza+$costo;
    $output+='<tr>'.
    '<td>'.$row2["idtallas"].'</td>'.
    '<td>'.$row2["idorden"].'</td>'.
    '<td>'.$row2["talla"].'</td>'.
    '<td>'.$row2["cantidad"].'</td>'.
    '</tr>';
  }
return ($output);
}

function consultalla($idorden){ // obtenemos consulta original para actualizar los campos
  $conexion= Conectar();
  $output=array();
  $query = "SELECT idtallas,idorden,talla,cantidad FROM tallas where idorden=$idorden;" or die("Error in the consult.." . mysqli_error($conexion));
  $resultado = $conexion->query($query);
  $i=0;
  while($row2 = mysqli_fetch_array($resultado))
  {
    $output[$i]=''.$row2["idtallas"];
    $i++;
  }
return ($output);
}


function ejecutarquery ($sql){
    //Creamos la conexión con la función anterior
    $conexion = Conectar();
    mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa
    disconnectDB($conexion); //desconectamos la base de datos

}

 ?>
