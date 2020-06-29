<?php

function Conectar()
{
//$enlace = mysqli_connect("localhost", "root", "Alpix88", "richi") or die("Error " . mysqli_error($conexion));
$enlace = mysqli_connect("localhost", "root", "", "maquila") or die("Error " . mysqli_error($conexion));

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Tenemos conexión exitosa a la base de datos" . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

return $enlace;
}


function disconnectDB($conexion){
    $close = mysqli_close($conexion);
        if($close){
         //   echo 'La desconexion de la base de datos se ha hecho satisfactoriamente';
        }else{
            echo 'Ha sucedido un error inexperado en la desconexion de la base de datos';
        }
    return $close;
}






//
?>
