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
include'readHerramientas.php';

$buscar= $_POST['buscar'];
//pasar todo lo de esta parte al pdf de prueba y componer los estilos
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetFillColor(96,141,195);
$pdf->SetFont('Arial','B',15);


$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,5, utf8_decode('REPORTE DE HERRAMIENTAS'),0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(2);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);


//el encabezado de la tabla del pdf
$pdf->SetFillColor(43,81,143);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5, utf8_decode('Herramienta'),1,0,'C',1);
$pdf->Cell(50,5, utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(40,5, utf8_decode('Responsable'),1,1,'C',1);




//contenido de las herramientas
	$SQL_READ = "SELECT he.idHerramienta, he.nombre, he.descripcion, he.foto, he.estado, mec.nombreMec, mec.ideMecanico FROM herramienta he INNER JOIN mecanico mec ON he.ideMecanico=mec.ideMecanico 
WHERE
  nombre LIKE '%".$buscar."%' AND estado=1";

	$resul1 = mysqli_query($conexion,$SQL_READ);


//cambiar el color de la tabla

while($row=mysqli_fetch_array($resul1)){
	$pdf->SetTextColor(43,81,143);
	$pdf->Cell(50,30, $pdf->Image('./img/uploads/'.$row['foto'], $pdf->GetX()+10, $pdf->GetY()+3, 30),1,0, 'C',0);
	$pdf->Cell(50,30, utf8_decode($row['nombre']),1,0, 'C',0);
	$pdf->Cell(50,30, utf8_decode($row['descripcion']), 1,0,'C',0);
	$pdf->Cell(40,30, utf8_decode($row['nombreMec']), 1,1,'C',0);
}
$pdf->Ln(30);
$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,35, utf8_decode('Nombre y Firma'),0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);

$pdf->Output();
?>











