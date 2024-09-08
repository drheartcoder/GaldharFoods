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
			$ACCSRNO = trim($allDataInSheet[$i]["A"]);
			$ACCTYPECD = trim($allDataInSheet[$i]["B"]);
			$ACCTYPE = trim($allDataInSheet[$i]["C"]);
			$RPTTYP = trim($allDataInSheet[$i]["D"]);
			$ACCTYPECD1 = trim($allDataInSheet[$i]["E"]);
			$ACCTYPE1 = trim($allDataInSheet[$i]["F"]);
			$ACCTYPECD2 = trim($allDataInSheet[$i]["G"]);
			$ACCTYPE2 = trim($allDataInSheet[$i]["H"]);
			$ACCTYPECD3 = trim($allDataInSheet[$i]["I"]);
			$ACCTYPE3 = trim($allDataInSheet[$i]["J"]);
			$ACCTYPECD4 = trim($allDataInSheet[$i]["K"]);
			$ACCTYPE4 = trim($allDataInSheet[$i]["L"]);
			$ACCNATURE = trim($allDataInSheet[$i]["M"]);
			$ACCPRFX = trim($allDataInSheet[$i]["N"]);
			$ACCSUMYN = trim($allDataInSheet[$i]["O"]);
			$DBAMOUNT = trim($allDataInSheet[$i]["P"]);
			$CRAMOUNT = trim($allDataInSheet[$i]["Q"]);
			
			$query = mysql_query("insert into acctype(accsrno, acctypecd, acctype, rpttyp, acctypecd1, acctype1, acctypecd2, acctype2, acctypecd3, acctype3, acctypecd4, acctype4, accnature, accprfx, accsumyn, dbamount, cramount) values('".$ACCSRNO."', '".$ACCTYPECD."', '".$ACCTYPE."', '".$RPTTYP."', '".$ACCTYPECD1."', '".$ACCTYPE1."', '".$ACCTYPECD2."', '".$ACCTYPE2."', '".$ACCTYPECD3."', '".$ACCTYPE3."', '".$ACCTYPECD4."', '".$ACCTYPE4."', '".$ACCNATURE."', '".$ACCPRFX."', '".$ACCSUMYN."', '".$DBAMOUNT."', '".$CRAMOUNT."')");
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