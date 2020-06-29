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
	$this->Cell(30,10,utf8_decode('Alpix Diseño y Bordado'),0,0,'C');
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
	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//require'conecciones.php';

include'readNomina.php';
if($res->num_rows > 0){
$numeroRegistros=mysqli_num_rows($res);
$file= mysqli_fetch_assoc($res);




$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->Addpage();

$pdf->SetTextColor(5,5,5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5, utf8_decode('NÓMINA  DEL  '.$file['fechaInicio'].'    a:     '.$file['fechaFin']),0,0,'C',0);
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 260, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);




//el encabezado de la tabla del pdf
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(214,230,249);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,'No. Lista',1,0,'C',1);
$pdf->Cell(60,5,'Nombre',1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Sueldo Semanal'),1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Medios días'),1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Faltantes'),1,0,'C',1);
$pdf->Cell(28,5,'Subtotal',1,0,'C',1);
$pdf->Cell(28,5,'Prestamo',1,0,'C',1);
$pdf->Cell(28,5,'Total',1,0,'C',1);
$pdf->Cell(30,5,utf8_decode('Pago'),1,1,'C',1);

//contenido de la tabla

$res = mysqli_query($conexion,$sql);

$totalSueldo=0;
$totalFaltantes=0;
$todoSubtotal=0;
$totalPrestamos=0;
$totalnomina=0;
while ($row =mysqli_fetch_array($res)){
  	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(15,5, $row['nlista'],1,0, '',0);
	$pdf->Cell(60,5, utf8_decode($row['nombre']),1,0, '',0);
    $pdf->Cell(28,5, $row['sueldo'],1,0, 'C',0);
	$pdf->Cell(28,5, $row['meDias'],1,0, 'C',0);
	$pdf->Cell(28,5, '$'.$row['faltantes'],1,0, 'C',0);
	$pdf->Cell(28,5, '$'.$row['subtotal'],1,0, 'C',0);
	$pdf->Cell(28,5, '$'.$row['prestamo'],1,0, 'C',0);
	$pdf->Cell(28,5, $total=$row['total'],1,0, 'C',0);
	$pdf->Cell(30,5, utf8_decode($row['estado']),1,1, 'C',0);

$totalSueldo+=$row['sueldo'];
$totalFaltantes+=$row['faltantes'];
$todoSubtotal+=$row['subtotal'];
$totalPrestamos+=$row['prestamo'];
$totalnomina+=$row['total'];
}
//revisar bien que cuando haya dos o mas nominas las imprima en tablas separadas para que traiga el dato de cada una
$pdf->SetFont('Arial','B',10);
    $pdf->Cell(15,5, '',0,0, '',0);
    $pdf->Cell(60,5,'',0,0, '',0);
    $pdf->Cell(28,5,'$'.$totalSueldo,0,0, 'C',0);
	$pdf->Cell(28,5,'',0,0, 'C',0);
	$pdf->Cell(28,5, '$'.$totalFaltantes,0,0, 'C',0);
	$pdf->Cell(28,5, '$'.$todoSubtotal,0,0, 'C',0);
	$pdf->Cell(28,5, '$'.$totalPrestamos,0,0, 'C',0);
	$pdf->Cell(28,5,'$'.$totalnomina,0,0, 'C',0);
	$pdf->Cell(30,5, '',0,1, 'C',0);
    $pdf->Ln();
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,5, utf8_decode('Nómina de: '.$file['fechaInicio'].'    a:     '.$file['fechaFin']));
    $pdf->Ln();
	$pdf->Ln(5);




$pdf->SetFont('Arial','B',12);
   $pdf->Cell(20,5, utf8_decode('Costo Total de Nómina "APROBADOS" $: '.$totalnomina.'         Número Total de Empleados: '.$numeroRegistros));
    $pdf->Ln();
	$pdf->Ln(5);
}else{

$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->Addpage();
$pdf->SetTextColor(5,5,5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5, utf8_decode('NÓMINA  DEL        a:       '),0,0,'C',0);
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Line(60, $pdf->GetY() + 10, 260, $pdf->GetY() + 10,);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(30);


$pdf->SetTextColor(5,5,5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5, utf8_decode('No se encontraron datos'),0,1,'C',0);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(214,230,249);
$pdf->SetLineWidth(0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,5,'No. Lista',1,0,'C',1);
$pdf->Cell(60,5,'Nombre',1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Sueldo Semanal'),1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Medios días'),1,0,'C',1);
$pdf->Cell(28,5,utf8_decode('Faltantes'),1,0,'C',1);
$pdf->Cell(28,5,'Subtotal',1,0,'C',1);
$pdf->Cell(28,5,'Prestamo',1,0,'C',1);
$pdf->Cell(28,5,'Total',1,0,'C',1);
$pdf->Cell(30,5,utf8_decode('Pago'),1,1,'C',1);
$pdf->SetDrawColor(43,81,143);
$pdf->SetLineWidth(1);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,5, utf8_decode('Nómina de:        a:     '));
    $pdf->Ln();
	$pdf->Ln(5);




$pdf->SetFont('Arial','B',12);
   $pdf->Cell(20,5, utf8_decode('Costo Total de Nómina "APROBADOS" $:         Número Total de Empleados:      '));
    $pdf->Ln();
	$pdf->Ln(5);
$pdf->Ln(30);
}
$pdf->Output();
?>







