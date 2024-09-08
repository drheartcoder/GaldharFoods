<?php
require('fpdf.php');
include("../dbconnect.php");

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->Rect(5, 8, 200, 28, 'D');
		
		// Logo Image
		$this->Image('MonginisLogo.jpg',20,15,20);
		
		// Font
		$this->SetFont('Times','B',20);
		
		// Title	
		$this->Text(42,20,'Galdhar Foods Pvt Ltd');
		
	}
	// Page footer
	function Footer()
	{
		//Draw Line
		//$this->Line(0,280,2010,280);
		
		// Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		
		$this->SetFont('Times','',8);	
		$this->Text(82,292,'This is Computer Generated Quotation.');	
	}
}
	//$this->Cell(80);
	$pdf = new PDF();
	$pdf->AddPage();
	
	$pdf->Rect(5, 36, 200, 250, 'D');
	
	//Header Starts
		$pdf->SetFont('Times','BU',17);
		$pdf->Text(90,43,'Sales Report');
		
		$pdf->Line(5,45,205,45);
	//Header Ends
	
	//Body Starts
		//Table Starts
			
		//Table Ends
	//Body Ends
	
	$pdf->Output();
?>