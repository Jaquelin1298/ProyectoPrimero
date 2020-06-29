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
	$this->Cell(30,10,'',0,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
include 'readEmpleado.php';





$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();

$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,5, 'REPORTE DE EMPLEADOS',0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);


//el encabezado de la tabla del pdf
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetFillColor(43,81,143);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,5,'No.',1,0,'C',1);
$pdf->Cell(40,5,'Nombre',1,0,'C',1);
$pdf->Cell(20,5,'Fecha',1,0,'C',1);
$pdf->Cell(20,5,utf8_decode('Teléfono'),1,0,'C',1);
$pdf->Cell(30,5,'Email',1,0,'C',1);
$pdf->Cell(15,5,'$',1,0,'C',1);
$pdf->Cell(60,5,utf8_decode('Dirección'),1,1,'C',1);

//contenido de la tabla

	
$SQL_READ = "SELECT * FROM empleado WHERE nlista LIKE '%".$buscar."%'  OR   nombre LIKE '%".$buscar."%'  ";


$resul1 = mysqli_query($conexion,$SQL_READ);


  while ($row =mysqli_fetch_array($resul1)){
  	$pdf->SetTextColor(43,81,143);
	$pdf->Cell(10,5, $row['nlista'],1,0, 'C',0);
	$pdf->Cell(40,5, utf8_decode($row['nombre']),1,0, 'C',0);
	$pdf->Cell(20,5, $row['fnacimiento'],1,0, 'C',0);
	$pdf->Cell(20,5, $row['telefono'],1,0, 'C',0);
	$pdf->Cell(30,5, utf8_decode($row['correo']),1,0, 'C',0);
	$pdf->Cell(15,5, $row['sueldo'],1,0, 'C',0);
	$pdf->Cell(60,5, utf8_decode($row['direccion']),1,1, 'C',0);
	


}
$pdf->Output();
?>











