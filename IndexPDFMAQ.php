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
include'readMaquina.php';

$buscar= $_POST['buscar'];
//pasar todo lo de esta parte al pdf de prueba y componer los estilos
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetFillColor(96,141,195);
$pdf->SetFont('Arial','B',15);


$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,5, utf8_decode('REPORTE DE MÁQUINAS'),0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);


//el encabezado de la tabla del pdf
$pdf->SetFillColor(43,81,143);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(60,5, utf8_decode('Máquina'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Marca'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Modelo'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('No.Serie'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Codigo'),1,0,'C',1);
$pdf->Cell(25,5, utf8_decode('Fecha Adquisición'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Costo'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Estado'),1,0,'C',1);
$pdf->Cell(15,5, utf8_decode('Detalle'),1,1,'C',1);






//contenido de las herramientas
	$SQL_READ = "SELECT * FROM maquinash WHERE nombre LIKE '%".$buscar."%' AND estado=1  ";


	$resul1 = mysqli_query($conexion,$SQL_READ);


//cambiar el color de la tabla

while($row=mysqli_fetch_array($resul1)){
	  if ($row['estado']==1) {
      $texto="Buen estado";
    }elseif ($row['estado']==2) {
      $texto="Reparación";
    }else{
      $texto="Inactivo";
    }
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','I',7);
	$pdf->Cell(30,30, $pdf->Image('./img/uploads/maquina/'.$row['foto'], $pdf->GetX()+1, $pdf->GetY()+3, 30),1,0, 'C',0);
	$pdf->Cell(30,35, utf8_decode($row['nombre']),1,0, 'C',0);
	$pdf->Cell(15,35, utf8_decode($row['marca']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['modelo']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['nserie']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['codigo']), 1,0,'C',0);
	$pdf->Cell(25,35, utf8_decode($row['fadquisicion']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['costo']), 1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($texto),1,0,'C',0);
	$pdf->Cell(15,35, utf8_decode($row['falla']),1,1,'C',0);

	


	


}
$pdf->Ln(30);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(5,5,5);
$pdf->Cell(0,35, utf8_decode('Nombre y Firma'),0,0,'C');
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 150, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);


$pdf->Output();
?>











