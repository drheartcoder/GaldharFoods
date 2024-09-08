<?php
require('fpdf.php');
include("../dbconnect.php");

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		$this->Rect(5, 8, 200, 28, 'D');
		
		// Logo
		$this->Image('MonginisLogo.jpg',20,15,20);
		
		// Font
		$this->SetFont('Times','B',20);
		
		// Title	
		$this->Text(42,20,'Galdhar Foods Pvt Ltd');
		
		//Draw Line
		//$this->Line(0,35,2010,35);
	}
	// Page footer
	function Footer()
	{
		//Draw Line
		//$this->Line(0,280,2010,280);
		
		// Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	// Better table
//	function ImprovedTable($header, $data)
//	{
//		// Column widths
//		$w = array(40, 35, 40, 45);
//		// Header
//		for($i=0;$i<count($header);$i++)
//			$this->Cell($w[$i],7,$header[$i],1,0,'C');
//		$this->Ln();
//		// Data
//		foreach($data as $row)
//		{
//			$this->Cell($w[0],6,$row[0],'LR');
//			$this->Cell($w[1],6,$row[1],'LR');
//			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
//			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
//			$this->Ln();
//		}
//		// Closing line
//		$this->Cell(array_sum($w),0,'','T');
//	}
}
	//$this->Cell(80);
	$pdf = new PDF();
	$pdf->AddPage();
	// Set up the default page margins for your PDF
	// The parameters are margin left, margin top, margin right (units used are mm)
	//$pdf->SetMargins(0, 0, 0);
	
	// Now we use the Cell function
	//$pdf->Cell(100, 20, 'Description', 1, 0, 'C', FALSE);
	/* Parameters are as follows:
	   56 - This is the width in mm that we set our Cell
	   6 - This is the height in mm
	   'Description' - Text to display inside the Cell
	   0 - This is for the border. 1 = border and 0 = no border.
	   0 - This is the position for our next Cell/MultiCell. 0 will fit the next cell in to the right of this one and 1 will fit the next cell underneath.
	   L - This is the alignment of our Cell. L = Left, R = Right and C = Centered.
	   FALSE - This is whether or not we want our Cell to have background fill colour.
	*/
	
	// So as we learnt above for styles, we will set our border's width and colour
	//$pdf->SetDrawColor(234, 36, 227); // Hot Pink
	//$pdf->SetLineWidth(2); // We will change the line width now to 2mm
	$pdf->Rect(5, 36, 200, 250, 'D');
	//The first two parameters are setting where to begin drawing (X & Y).
	//The second two are the width & height of our rectangle.
	//D stands for draw - so this will display a rectangle with a border only.
	//If this was F it would show a solid rectangle in a block fill colour (F = Fill).
	//DF does both of these.
	
	//Header of the Page Starts
		$pdf->SetFont('Times','BU',17);
		$pdf->Text(90,43,'Quotation');
		
		$pdf->Line(5,45,205,45);
	//Header of the Page Ends
	
	//Body Of the Page Starts
		$pdf->SetFont('Times','B',12);
		$pdf->Text(10,52,'To :-');
		
		$pdf->Text(10,58,'Address :-');
		
		$pdf->Text(10,78,'Phone :-');
		
		$pdf->Line(5,81,205,81);
		
		$pdf->Rect(150, 45, 55, 36, 'D');
		
		$pdf->Text(154,56,'No :-');
		
		$pdf->Line(150,63,205,63);
		
		$pdf->Text(154,74,'Date :-');
		
		$pdf->Text(10,88,'Kind Attention :');
		
		$pdf->SetFont('Times','',10);
		
		$pdf->Text(10,94,'Dear Sir,');
		
		$pdf->Text(10,100,'We Thanks for your enquiry & have pleasure in quoting as follows. Our general Terms & Condition for sales mentioned below.');
		
		$pdf->Text(10,110,'Sr.No.');
		$pdf->Text(25,110,'Description');
		$pdf->Text(135,110,'Qty');
		$pdf->Text(155,110,'Rate');
		$pdf->Text(175,110,'Amount');
		
		//Table Starts
			//$pdf->FancyTable($header,$data);
		//Table Ends
		
	//Body Of the Page Ends
	
	//Bottom Of the page Starts
		$pdf->Line(5,220,205,220);
		
		//Left Side Block Starts
		
			//Terms & Conditions Block Starts
				$pdf->SetFont('Times','BU',14);
				$pdf->Text(10,225,'Terms & Conditions :-');
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,231,'1. Taxes :');
				
				$pdf->Text(10,236,'2. Payment :');
				
				$pdf->Text(10,241,'3. Validity :');
				
				$pdf->Text(10,246,'4. Spec. :');
				
			//Terms & Conditions Block Ends
			
			$pdf->Line(5,248,205,248);
			
			//Bank Details Block Starts
				$pdf->SetFont('Times','BU',14);
				$pdf->Text(10,253,'Our Bank Details :-');
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,259,'Bank Name :');
				
				$pdf->Text(10,264,'IFSC Code :');
				
				$pdf->Text(10,269,'Account No. :');
			//Bank Details Block Ends
			
			$pdf->Line(5,271,130,271);
			
			$pdf->Text(10,277,'VAT TIN :');
			
			$pdf->Text(70,277,'LBT NO :');
			
			$pdf->Text(10,282,'CST NO :');
			
			$pdf->Text(70,282,'CIN NO :');
			
		//Left Side Block Ends
		
		//Right Side Block Starts
			//Rectangle Define
			$pdf->Rect(130, 220, 75, 66, 'D');
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(133,225,'Value :');
			$pdf->Text(133,230,'Transport :');
			$pdf->Text(133,235,'Sub Total :');
			$pdf->Text(133,240,'VAT 12.50% :');
			$pdf->Text(133,245,'Load/Unload :');
			
			$pdf->SetFont('Times','B',12);
			
			$pdf->Text(133,253,'Total :');
			
			$pdf->Line(130,255,205,255);
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(152,284,'Authorised Signatory');
			
		//Right Side Block Ends
		
	//Bottom Of the Page Ends
	$pdf->SetFont('Times','',8);	
	$pdf->Text(82,292,'This is Computer Generated Quotation.');	
	$pdf->Output();

?>