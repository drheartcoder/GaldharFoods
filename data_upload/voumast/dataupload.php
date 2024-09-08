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
	$a=mysql_query("delete from voumast");
	//$a=1;
	if($a==1)
	{
		for($i=2;$i<$arrayCount+1;$i++)
		{
			$VOU_SRNO = trim($allDataInSheet[$i]["A"]);
			$VOU_PRF = trim($allDataInSheet[$i]["B"]);
			$VOU_TYPECD = trim($allDataInSheet[$i]["C"]);
			$VOU_ACCESS = trim($allDataInSheet[$i]["D"]);
			$VOU_TYPEDESC = trim($allDataInSheet[$i]["E"]);
			$VOU_PRNPRFX = trim($allDataInSheet[$i]["F"]);
			$VOU_RPTNAME = trim($allDataInSheet[$i]["G"]);
			$VOU_PRNDW = trim($allDataInSheet[$i]["H"]);
			$VOU_STARTNO = trim($allDataInSheet[$i]["I"]);
			$VOU_GRIDID = trim($allDataInSheet[$i]["J"]);
			$VOU_ADDLEVSHOW = trim($allDataInSheet[$i]["K"]);
			$VOU_STOCKUPDT = trim($allDataInSheet[$i]["L"]);
			$VOU_ACCPOST = trim($allDataInSheet[$i]["M"]);
			$VOU_MSTTBL = trim($allDataInSheet[$i]["N"]);
			$VOU_TRNTBL = trim($allDataInSheet[$i]["O"]);
			$VOU_OTHINFOSHOW = trim($allDataInSheet[$i]["P"]);
			$VOU_ACCINFOSHOW = trim($allDataInSheet[$i]["Q"]);
			$VOU_QTNINFOSHOW = trim($allDataInSheet[$i]["R"]);
			$Vou_OthExp = trim($allDataInSheet[$i]["S"]);
			$VOU_PARAM1 = trim($allDataInSheet[$i]["T"]);
			$VOU_PARAM2 = trim($allDataInSheet[$i]["U"]);
			$VOU_PARAM3 = trim($allDataInSheet[$i]["V"]);
			$VOU_PARAM4 = trim($allDataInSheet[$i]["W"]);
			$VOU_PARAM1HEAD = trim($allDataInSheet[$i]["X"]);
			$VOU_PARAM2HEAD = trim($allDataInSheet[$i]["Y"]);
			$VOU_Back_color = trim($allDataInSheet[$i]["Z"]);
			$VOU_Button_color = trim($allDataInSheet[$i]["AA"]);
			$VOU_ACCPOSTTYPE = trim($allDataInSheet[$i]["AB"]);
			$VOU_STKPOSTTYPE = trim($allDataInSheet[$i]["AC"]);
			$VOU_BACKLINK = trim($allDataInSheet[$i]["AD"]);
			$VOU_BACKREFFLD = trim($allDataInSheet[$i]["AE"]);
			$VOU_BACKMSTTBL = trim($allDataInSheet[$i]["AF"]);
			$VOU_BACKTRNTBL = trim($allDataInSheet[$i]["AG"]);
			$VOU_AccFindStr = trim($allDataInSheet[$i]["AH"]);
			$VOU_ItmFindStr = trim($allDataInSheet[$i]["AI"]);
			$VOU_AccdPost = trim($allDataInSheet[$i]["AJ"]);
			$VOU_Show = trim($allDataInSheet[$i]["AK"]);
			$VOU_Autoapprv = trim($allDataInSheet[$i]["AL"]);
			$VOUPRFX = trim($allDataInSheet[$i]["AM"]);
			
			$query = mysql_query("insert into voumast(srno, vou_catg, vou_type, vou_name, vou_prf, acpost, vou_msttbl, vou_trntbl) values('".$SRNO."', '".$VOU_CATG."', '".$VOU_TYPE."', '".$VOU_NAME."', '".$VOU_PRF."', '".$ACPOST."', '".$VOU_MSTTBL."', '".$VOU_TRNTBL."')");
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