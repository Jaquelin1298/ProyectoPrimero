<?php
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('fpdf/img/logo.png',5,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(70);
	// T�tulo
	$this->Cell(30,10,utf8_decode(''),0,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','B',8);

	// N�mero de p�gina
	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require'conecciones.php';
//print_r($_FILES);
//exit;

$buscar= $_POST['buscar'];
//pasar todo lo de esta parte al pdf de prueba y componer los estilos
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetFillColor(96,141,195);
$pdf->SetFont('Arial','B',15);


$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,5, utf8_decode('REPORTE DE HERRAMIENTAS ASIGNADAS'),0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(40, $pdf->GetY() + 10, 170, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);

//me trae los datos del mecanico
$rut = $_REQUEST['rut'];

$query="SELECT * FROM mecanico WHERE nombreMec LIKE '%".$buscar."%' AND  ideMecanico='$rut'";
$res = mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_array($res)) {
	
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,5, utf8_decode('Nombre: '.$fila['nombreMec']));
	$pdf->Ln();
	$pdf->Cell(20,5, utf8_decode('Dirección: '.$fila['direccion']));
	$pdf->Ln();
	$pdf->Cell(20,5, 'Tel: '.$fila['telefono']);
	
	$pdf->Ln(5);
	
}

//el encabezado de la tabla de herramientas

$pdf->SetFillColor(43,81,143);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,'Foto',1,0,'C',1);
$pdf->Cell(50,5,'Herramienta',1,0,'C',1);
$pdf->Cell(80,5, utf8_decode('Descripción'),1,1,'C',1);




//contenido de las herramientas
$rut = $_REQUEST['rut'];
	$SQL_READ = "SELECT mec.ideMecanico, he.idHerramienta, he.nombre, he.descripcion, he.foto from mecanico mec INNER JOIN herramienta he ON mec.ideMecanico=he.ideMecanico WHERE mec.ideMecanico='$rut' AND estado=1";

	$resul1 = mysqli_query($conexion,$SQL_READ);

while($row=mysqli_fetch_array($resul1)){
	$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','I',10);
	$pdf->Cell(60,30, $pdf->Image('./img/uploads/'.$row['foto'], $pdf->GetX()+10, $pdf->GetY()+3, 30),1,0, 'C',0);
	$pdf->Cell(50,30, utf8_decode($row['nombre']),1,0, 'C',0);
	$pdf->Cell(80,30, utf8_decode($row['descripcion']), 1,1,'C',0);

}



//el encabezado de la tabla de maquinas
$pdf->SetFillColor(43,81,143);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(70,5, utf8_decode('Máquina'),1,0,'C',1);
$pdf->Cell(20,5, utf8_decode('Marca'),1,0,'C',1);
$pdf->Cell(20,5, utf8_decode('Modelo'),1,0,'C',1);
$pdf->Cell(20,5, utf8_decode('No.Serie'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Codigo'),1,0,'C',1);
$pdf->Cell(30,5, utf8_decode('Fecha Adquisición'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Costo'),1,1,'C',1);

//contenido de maquinas Herramientas
$rut = $_REQUEST['rut'];
$maquina = "SELECT ma.idmaquina,ma.nombre, ma.marca, ma.modelo, ma.nserie, ma.codigo, ma.fadquisicion, ma.costo, ma.foto, ma.estado,  mec.nombreMec, mec.ideMecanico 
FROM maquinash ma 
INNER JOIN mecanico mec 
ON ma.ideMecanico=mec.ideMecanico WHERE mec.ideMecanico='$rut' AND estado=1";

	$resultado = mysqli_query($conexion,$maquina);

while($row=mysqli_fetch_array($resultado)){
$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','I',7);
	$pdf->Cell(30,30, $pdf->Image('./img/uploads/maquina/'.$row['foto'], $pdf->GetX()+1, $pdf->GetY()+3, 30),1,0, 'C',0);
	$pdf->Cell(40,35, utf8_decode($row['nombre']),1,0, 'C',0);
	$pdf->Cell(20,35, utf8_decode($row['marca']), 1,0,'C',0);
	$pdf->Cell(20,35, utf8_decode($row['modelo']), 1,0,'C',0);
	$pdf->Cell(20,35, utf8_decode($row['nserie']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['codigo']), 1,0,'C',0);
	$pdf->Cell(30,35, utf8_decode($row['fadquisicion']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['costo']), 1,1,'C',0);
	
	}

$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(5,5,5);
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->Ln(10);
$pdf->Cell(0,5, 'Nombre y Firma',0,0,'C');
$pdf->Ln(20);



$pdf->Output();
?>











