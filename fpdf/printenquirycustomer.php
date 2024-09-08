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
		$this->SetFont('Times','',8);	
		$this->Text(82,292,'This is Computer Generated Quotation.');
		
		//Draw Line
		//$this->Line(0,280,2010,280);
		
		// Page number
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}
	//$this->Cell(80);
	$pdf = new PDF();
	$pdf->AddPage();
	
	if(isset($_GET['MRNNO']))
	{
		extract($_GET);
		include("../dbconnect.php");
		$e=mysql_query("select * from eqcmast where MRNNO=".$_GET['MRNNO']);
		while($db1=mysql_fetch_array($e))
		{
			extract($db1);
		}
	}
	
	$pdf->Rect(5, 36, 200, 250, 'D');
	
	//Header Starts
		$pdf->SetFont('Times','BU',17);
		$pdf->Text(90,43,'Quotation');
		
		$pdf->Line(5,45,205,45);
	//Header Ends
	
	//Body Starts
	
	$bankname = 'AXIS Bank Ltd, Nashik'; 
	$ifsccode = 'UTIB0000115';
	$accountno = '912030036415530';
	$compVAT = '27420298671-V';
	$compCST = '27420298671-C';
	$compLBT = 'NSH-602402';
	$compCIN = 'U7499MH2002PTC13828';
	
		//Left Block Starts
			$pdf->SetFont('Times','B',12);
			$pdf->Text(10,52,'To :-');
			$pdf->Text(22,52,$AC_HEAD);
			
			$pdf->SetFont('Times','B',12);
			$pdf->Text(10,58,'Address :-');
			
			$pdf->SetFont('Times','B',12);
			$pdf->Text(10,78,'Phone :-');
		//Left Block Ends
			
		$pdf->Line(5,81,205,81);
		
		$pdf->Rect(150, 45, 55, 36, 'D');
		
		//Right Block Starts
			$pdf->SetFont('Times','B',12);
			$pdf->Text(154,56,'No :-');
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(166,56,$VOU_NO);
			
			$pdf->Line(150,63,205,63);
			
			$pdf->SetFont('Times','B',12);
			$pdf->Text(154,74,'Date :-');
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(170,74,$VOU_DT);
		//Right Block Ends
		
		$pdf->SetFont('Times','B',12);
		$pdf->Text(10,88,'Kind Attention :');
		
		$pdf->SetFont('Times','B',12);
		$pdf->Text(45,88,$AC_HEAD);
		
		$pdf->SetFont('Times','',10);
		
		$pdf->Text(10,94,'Dear Sir,');
		
		$pdf->Text(10,100,'We Thanks for your enquiry & have pleasure in quoting as follows. Our general Terms & Conditions for sales mentioned below.');
		
		//Table Starts
			$pdf->Line(5,105,205,105);
			
				$pdf->SetFont('Times','B',10);
				
				$pdf->Text(10,108.5,'Sr.No.');
				$pdf->Line(22,105,22,220);
				
				$pdf->Text(25,108.5,'Description');
				$pdf->Line(135,105,135,220);
				
				$pdf->Text(140,108.5,'Qty');
				$pdf->Line(155,105,155,220);
				
				$pdf->Text(160,108.5,'Rate');
				$pdf->Line(175,105,175,220);
				
				$pdf->Text(180,108.5,'Amount');
			
			$pdf->Line(5,110,205,110);
			
			$pdf->SetFont('Times','',10);
			if(isset($_GET['MRNNO']))
			{
				$yRow = 114;
				$yLine = 115.5;
				extract($_GET);
				include("../dbconnect.php");
				$e=mysql_query("select * from eqctrans where MRNNO=".$_GET['MRNNO']." Order By SRNO");
				while($db1=mysql_fetch_array($e))
				{
					extract($db1);
					
					$pdf->Text(10,$yRow,$SRNO);
					$pdf->Text(25,$yRow,$MT_HEAD);
					$pdf->Text(140,$yRow,$QTY);
					$pdf->Text(160,$yRow,number_format($RATE,2));
					$pdf->Text(180,$yRow,number_format($VALUE,2));
					
					//$pdf->Line(5,$yLine,205,$yLine);
					
					$yRow=$yRow+5;
					//$yLine=$yLine+5;
				}
			}
			
			//$oTable->initialize( array( 20, 30, 50 ) );
//			$aHeader = array(
//				array( 'TEXT' => 'Header #1' ),
//				array( 'TEXT' => 'Header #2' ),
//				array( 'TEXT' => 'Header #3' ),
//			);
//			//add the header row
//			$oTable->addHeader( $aHeader );
//			for ( $j = 1; $j < 3; $j++ )
//			{
//				$aRow = array();
//				$aRow[ 0 ][ 'TEXT' ] = "Line $j";
//				$aRow[ 1 ][ 'TEXT' ] = "Lorem ipsum dolor sit amet...";
//				$aRow[ 2 ][ 'TEXT' ] = "<p>Simple text\n<b>Bold text</b></p>";
//			
//				//add the data row
//				$oTable->addRow( $aRow );
//			}
//			//close the table
//			$oTable->close();
			
		//Table Ends
		
	//Body Ends
	
	//Bottom Starts
		$pdf->Line(5,220,205,220);
		
		if(isset($_GET['MRNNO']))
		{
			extract($_GET);
			include("../dbconnect.php");
			$e=mysql_query("select * from eqcmast where MRNNO=".$_GET['MRNNO']);
			while($db1=mysql_fetch_array($e))
			{
				extract($db1);
			}
		}
		
		//Left Side Block Starts
		
			//Terms & Conditions Block Starts
				$pdf->SetFont('Times','BU',14);
				$pdf->Text(10,225,'Terms & Conditions :-');
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,231,'1. Taxes :');
				$pdf->SetFont('Times','',10);
				$pdf->Text(40,231,$QTNREM2);
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,236,'2. Payment :');
				$pdf->SetFont('Times','',10);
				$pdf->Text(40,236,$QTNREM1);
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,241,'3. Validity :');
				$pdf->SetFont('Times','',10);
				$pdf->Text(40,241,$QTNREM5);
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,246,'4. Spec. :');
				$pdf->SetFont('Times','',10);
				$pdf->Text(40,246,'');
				
			//Terms & Conditions Block Ends
			
			$pdf->Line(5,248,205,248);
			
			//Bank Details Block Starts
				$pdf->SetFont('Times','BU',14);
				$pdf->Text(10,253,'Our Bank Details :-');
				
				$pdf->SetFont('Times','B',12);
				$pdf->Text(10,259,'Bank Name :');
				$pdf->Text(40,259,$bankname);
				
				$pdf->Text(10,264,'IFSC Code :');
				$pdf->Text(40,264,$ifsccode);
				
				$pdf->Text(10,269,'Account No. :');
				$pdf->Text(40,269,$accountno);
			//Bank Details Block Ends
			
			$pdf->Line(5,271,130,271);
			
			$pdf->SetFont('Times','B',12);
			$pdf->Text(10,277,'VAT TIN :');
			$pdf->SetFont('Times','',10);
			$pdf->Text(32,277,$compVAT);

			$pdf->SetFont('Times','B',12);
			$pdf->Text(10,282,'CST NO :');
			$pdf->SetFont('Times','',10);
			$pdf->Text(32,282,$compCST);
			
			$pdf->SetFont('Times','B',12);
			$pdf->Text(65,277,'LBT NO :');
			$pdf->SetFont('Times','',10);
			$pdf->Text(85,277,$compLBT);
						
			$pdf->SetFont('Times','B',12);
			$pdf->Text(65,282,'CIN NO :');
			$pdf->SetFont('Times','',10);
			$pdf->Text(85,282,$compCIN);
			
		//Left Side Block Ends
		
		//$subTotal = $MVALUE + $MPFAMT;
		//$Total = $subTotal + $MSLSTAX ;
		
		//Right Side Block Starts
			//Rectangle Define
			$pdf->Rect(130, 220, 75, 66, 'D');
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(133,224,'Value : '.number_format($MVALUE,2));
			$pdf->Text(133,228,'Scheme : '.number_format($MDP,2));
			$pdf->Text(133,232,'Discount 1  : '.number_format($MDISC,2));
			$pdf->Text(133,236,'Cash Discount : '.number_format($MCDISC,2));
			$pdf->Text(133,240,'P & F : '.number_format($MPFAMT,2));
			$pdf->Text(133,244,'Excise Duty : '.number_format($MEXCAMT,2));
			$pdf->Text(168,224,'Education Cess : '.number_format($MCESSAMT,2));
			$pdf->Text(168,228,'SH Edu. Cess : '.number_format($MHCESSAMT,2));
			$pdf->Text(168,232,'Freight : '.number_format($MFRTCHG,2));
			$pdf->Text(168,236,'Oth Exp : '.number_format($MOTHEXP,2));
			$pdf->Text(168,240,'VAT/CST : '.number_format($MSLSTAX,2));
			$pdf->Text(168,244,'Ronding Off : '.number_format($ROFF,2));
			
			//$Total = $MVALUE - $MDP - $MDISC - $MCDISC + $MPFAMT + $MEXCAMT + $MCESSAMT + $MHCESSAMT + $MFRTCHG + $MOTHEXP + $MSLSTAX + $ROFF;
			
			$pdf->Text(150,247.5,'Grand Total : Rs '.number_format($MAMOUNT,2));
			
//			$pdf->SetFont('Times','',10);
//			$pdf->Text(133,224,'Value :');
//			$pdf->Text(170,224,$MVALUE);
//			
//			$pdf->Text(133,228,'Transport :');
//			$pdf->Text(170,228,$MPFAMT);
//			
//			$pdf->Line(130,230,205,230);
//			
//			$pdf->Text(133,234,'Sub Total :');
//			$pdf->Text(170,234,$subTotal);
//						
//			$pdf->Text(133,238,'VAT 12.50% :');
//			$pdf->Text(170,238,$MSLSTAX);
//			
//			$pdf->Line(130,240,205,240);
//			
//			$pdf->SetFont('Times','B',12);
//			$pdf->Text(133,245.5,'Total :');
//			$pdf->Text(170,245.5,$Total);
			
			//$pdf->Text(133,245,'Load/UnLoad :');
			
			$pdf->SetFont('Times','',10);
			$pdf->Text(152,284,'Authorised Signatory');
			
		//Right Side Block Ends
	//Bottom Ends
		
	$pdf->Output();

?>