<?php
	ini_set('memory_limit', '-1');

	include ('dbconnect.php');
	
	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
	include 'PHPExcel/IOFactory.php';
	
	$fp = "gfpl_data.xls";
	
	try 
	{
		$objPHPExcel = PHPExcel_IOFactory::load($fp);
	} 
	catch(Exception $e) 
	{
		die('Error loading file "'.pathinfo($fp,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	
	$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
	$error = "N";
	//$a=mysql_query("delete from acctype");
	$a=1;
	if($a==1)
	{
		for($i=2;$i<$arrayCount+1;$i++)
		{
			$GP = trim($allDataInSheet[$i]["A"]);
			$GRPNM = trim($allDataInSheet[$i]["B"]);
			$STPER = trim($allDataInSheet[$i]["C"]);
			$ACCD = trim($allDataInSheet[$i]["D"]);
			$TAXCD = trim($allDataInSheet[$i]["E"]);
			$ACCD1 = trim($allDataInSheet[$i]["F"]);
			$TAXCD1 = trim($allDataInSheet[$i]["G"]);
			$EXMP = trim($allDataInSheet[$i]["H"]);
			$VAT = trim($allDataInSheet[$i]["I"]);
			$INCLUTAX = trim($allDataInSheet[$i]["J"]);
			$TAX = trim($allDataInSheet[$i]["K"]);
			$OTAX1 = trim($allDataInSheet[$i]["L"]);
			$OTAX2 = trim($allDataInSheet[$i]["M"]);
			$OTAX3 = trim($allDataInSheet[$i]["N"]);
			$OTAX4 = trim($allDataInSheet[$i]["O"]);
			$OTAX5 = trim($allDataInSheet[$i]["P"]);
			$OTAX6 = trim($allDataInSheet[$i]["Q"]);
			$OTAX7 = trim($allDataInSheet[$i]["R"]);
			$OTAX9 = trim($allDataInSheet[$i]["S"]);
			$OTAX10 = trim($allDataInSheet[$i]["T"]);
			$PRNDESC = trim($allDataInSheet[$i]["U"]);
			$LABPER = trim($allDataInSheet[$i]["V"]);
			$PROFITPER = trim($allDataInSheet[$i]["W"]);
			$AddedBy = trim($allDataInSheet[$i]["X"]);
			$AdDt = trim($allDataInSheet[$i]["Y"]);
			$EditedBy = trim($allDataInSheet[$i]["Z"]);
			$EditDt = trim($allDataInSheet[$i]["AA"]);
			$ApprovedBy = trim($allDataInSheet[$i]["AB"]);
			$ApprDt = trim($allDataInSheet[$i]["AC"]);
			$ApprYN = trim($allDataInSheet[$i]["AD"]);
			
			$query = mysql_query("insert into acsst(gp, grpnm, stper, accd, taxcd, accd1, taxcd1, exmp, vat, inclutax, tax, otax1, otax2, otax3, otax4, otax5, otax6, otax7, otax9, otax10, prndesc, labper, profitper, AddedBy, AdDt, EditedBy, EditDt, ApprovedBy, ApprDt, appryn) values('".$GP."', '".$GRPNM."', '".$STPER."', '".$ACCD."', '".$TAXCD."', '".$ACCD1."', '".$TAXCD1."', '".$EXMP."', '".$VAT."', '".$INCLUTAX."', '".$TAX."', '".$OTAX1."', '".$OTAX2."', '".$OTAX3."', '".$OTAX4."', '".$OTAX5."', '".$OTAX6."', '".$OTAX7."', '".$OTAX9."', '".$OTAX10."', '".$PRNDESC."', '".$LABPER."', '".$PROFITPER."', '".$AddedBy."', '".$AdDt."', '".$EditedBy."', '".$EditDt."', '".$ApprovedBy."', '".$ApprDt."', '".$ApprYN."')");
			if($query==1) 
			{
			} 
			else 
			{
				$error=="Y";
			}
		}
		if ($error=="N")
		{
			?><script>alert("Record Inserted Succssfully.....!"); location.replace("home.php");</script><?
		} 
		else 
		{
			?><script>alert("There found some error while uploading....!"); location.replace("home.php");</script><?
		}
	}
	else 
	{
		?><script>alert("Something is Wrong.....!"); location.replace("home.php");</script><?
	}
?>