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
			$GP1 = trim($allDataInSheet[$i]["A"]);
			$GRPNM1 = trim($allDataInSheet[$i]["B"]);
			$TYPE = trim($allDataInSheet[$i]["C"]);
			$royaltyper = trim($allDataInSheet[$i]["D"]);
			
			$query = mysql_query("insert into itmgrp1(gp1, grpnm1, type, royaltyper) values('".$GP1."', '".$GRPNM1."', '".$TYPE."', '".$royaltyper."')");
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