<?php
session_start(); 
require('../model/Operario.php');
$Empleado = new Empleado();

switch ($_REQUEST['empleado']) {

    case 'RegistrarEmpleado':
        if (isset($_POST['nlista'],$_POST['nombre'],$_POST['fnacimiento'],,$_POST['sexo'],$_POST['telefono'],$_POST['fingreso'],$_POST['correo'],$_POST['sueldo'],$_POST['departamento'],$_POST['puesto'],$_POST['contrato'],$_POST['jefe'],$_POST['fimss'],$_POST['sueldoImss'],,$_POST['numeroimss'],$_POST['direccion']) && !empty($_POST['nlista']) && !empty($_POST['nombre']) && !empty($_POST['fnacimiento'])&& !empty($_POST['sexo']&& !empty($_POST['telefono'])&& !empty($_POST['fingreso'])&& !empty($_POST['correo'])&& !empty($_POST['sueldo'])&& !empty($_POST['departamento'])&& !empty($_POST['puesto'])&& !empty($_POST['contrato'])&& !empty($_POST['jefe'])&& !empty($_POST['fimss'])&& !empty($_POST['sueldoImsso'])&& !empty($_POST['numeroimss']&& !empty($_POST['direccion'])))) {
            $nlista = $_POST['nlista'];
            $nombre = $_POST['nombre'];
            $fnacimiento = $_POST['fnacimiento'];
            $sexo = $_POST['sexo'];
            $telefono = $_POST['telefono'];
            $fingreso = $_POST['fingreso'];
            $correo = $_POST['correo'];
            $sueldo = $_POST['sueldo'];
            $departamento = $_POST['departamento'];
            $puesto = $_POST['puesto'];
            $contrato = $_POST['contrato'];
            $jefe = $_POST['jefe'];
            $fimss = $_POST['fimss'];
            $sueldoImss = $_POST['sueldoImss'];
            $numeroimss = $_POST['numeroimss'];
            $direccion = $_POST['direccion'];
            if ($Empleado->RegistrarEmpleado($nlista,$nombre,$fnacimiento,$sexo,$telefono,$fingreso,$correo,$sueldo,$departamento,$puesto,$contrato,$jefe,$fimss,$sueldoImss,$numeroimss,$direccion)) {
                $reponse= "success";
            }else{
                $reponse="failed";
            }
        }else{
            $reponse="requerid";
        }
        echo $reponse;
    break;

    case 'ListarEmpleado':
        $datos = $Empleado->ListarEmpleado();
        echo json_encode($datos);
     break;

  
}
?>