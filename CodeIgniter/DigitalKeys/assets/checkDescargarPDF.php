<?php
session_start();

	ob_start();

	$foto = "assets/img/logo.png";

	require('C:/xampp/htdocs/DigitalKeys/assets/fpdf/fpdf.php');
//	require('C:\xampp\htdocs\Practica2PPV/fpdf/fpdf.php');

	$pdf = new tFPDF();
//	$pdf = new FPDF();
	
	$pdf->AddPage();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',24);

//	$pdf->SetFont('Arial', 'B', 14);

	$pdf->Ln();
	$pdf->Cell(40,80,$pdf->Image("..".$foto,10,10, 100, 70));
	$pdf->Ln();
	$pdf->Cell(40, 10, "FACTURA SIMPLIFICADA");
	$pdf->SetFont('DejaVu','',14);
	$pdf->Ln();
	$pdf->Cell(40, 10, "Descripcion: ".$descripcion.".");
	$pdf->Ln();
	$pdf->Cell(40, 10,"Numero de Habitaciones: ".$numHab.".");
	$pdf->Ln();
	$pdf->Cell(40, 10,"Distancia del inmueble con el Montessori: ".$distancia.".");
	$pdf->Ln();
	$pdf->Cell(40, 10,"Este ".$inmueble." se desea ".$tipo.".");
	$pdf->Ln();
	
	$pdf->Output();
?>
