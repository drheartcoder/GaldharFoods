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
			$EXCID = trim($allDataInSheet[$i]["A"]);
			$PRDDESC = trim($allDataInSheet[$i]["B"]);
			$CHHEAD = trim($allDataInSheet[$i]["C"]);
			$CMF = trim($allDataInSheet[$i]["D"]);
			$EXCDUTYPER = trim($allDataInSheet[$i]["E"]);
			$ADDDUTYPER = trim($allDataInSheet[$i]["F"]);
			$CESSPER = trim($allDataInSheet[$i]["G"]);
			$HSCESSPER = trim($allDataInSheet[$i]["H"]);
			$OTH1PER = trim($allDataInSheet[$i]["I"]);
			$OTH2PER = trim($allDataInSheet[$i]["J"]);
			$OTH3PER = trim($allDataInSheet[$i]["K"]);
			$OTH4PER = trim($allDataInSheet[$i]["L"]);
			$OTH5PER = trim($allDataInSheet[$i]["M"]);
			$OEXCID = trim($allDataInSheet[$i]["N"]);
			$USRCD = trim($allDataInSheet[$i]["O"]);
			$EDYN = trim($allDataInSheet[$i]["P"]);
			$AddedBy = trim($allDataInSheet[$i]["Q"]);
			$AdDt = trim($allDataInSheet[$i]["R"]);
			$EditedBy = trim($allDataInSheet[$i]["S"]);
			$EditDt = trim($allDataInSheet[$i]["T"]);
			$ApprovedBy = trim($allDataInSheet[$i]["U"]);
			$ApprDt = trim($allDataInSheet[$i]["V"]);
			$ApprYN = trim($allDataInSheet[$i]["W"]);
			
			$query = mysql_query("insert into exchead(exid, prddesc, chhead, cmf, excdutyper, adddutyper, cessper, hscessper, oth1per, oth2per, oth3per, oth4per, oth5per, oexcid, usrcd, edyn, addedby, addt, editedby, editdt, approvedby, apprdt, appryn) values('".$EXCID."', '".$PRDDESC."', '".$CHHEAD."', '".$CMF."', '".$EXCDUTYPER."', '".$ADDDUTYPER."', '".$CESSPER."', '".$HSCESSPER."', '".$OTH1PER."', '".$OTH2PER."', '".$OTH3PER."', '".$OTH4PER."', '".$OTH5PER."', '".$OEXCID."', '".$USRCD."', '".$EDYN."', '".$AddedBy."', '".$AdDt."', '".$EditedBy."', '".$EditDt."', '".$ApprovedBy."', '".$ApprDt."', '".$ApprYN."')");
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