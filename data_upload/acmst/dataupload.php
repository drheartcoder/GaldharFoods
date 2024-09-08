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
	$a=mysql_query("delete from acmst");
	if($a==1)
	{
		for($i=2;$i<$arrayCount+1;$i++)
		{
			$CUSTID = trim($allDataInSheet[$i]["A"]);
			$ACCD = trim($allDataInSheet[$i]["B"]);
			$GP = trim($allDataInSheet[$i]["C"]);
			$AC_HEAD = trim($allDataInSheet[$i]["D"]);
			$CUSTCD = trim($allDataInSheet[$i]["E"]);
			$CUSTNM = trim($allDataInSheet[$i]["F"]);
			$ADD1 = trim($allDataInSheet[$i]["G"]);
			$ADD2 = trim($allDataInSheet[$i]["H"]);
			$ADD3 = trim($allDataInSheet[$i]["I"]);
			$ADD4 = trim($allDataInSheet[$i]["J"]);
			$CITY = trim($allDataInSheet[$i]["K"]);
			$ECCNO = trim($allDataInSheet[$i]["L"]);
			$CERANGE = trim($allDataInSheet[$i]["M"]);
			$CEDIV = trim($allDataInSheet[$i]["N"]);
			$CECOMM = trim($allDataInSheet[$i]["O"]);
			$LSTNO = trim($allDataInSheet[$i]["P"]);
			$LSTDT = trim($allDataInSheet[$i]["Q"]);
			$CSTNO = trim($allDataInSheet[$i]["R"]);
			$CSTDT = trim($allDataInSheet[$i]["S"]);
			$PHONE = trim($allDataInSheet[$i]["T"]);
			$FAX = trim($allDataInSheet[$i]["U"]);
			$EMAIL = trim($allDataInSheet[$i]["V"]);
			$CPERSON = trim($allDataInSheet[$i]["W"]);
			$ACID = trim($allDataInSheet[$i]["X"]);
			$USRCD = trim($allDataInSheet[$i]["Y"]);
			$VENDCD = trim($allDataInSheet[$i]["Z"]);
			$GRPNAME = trim($allDataInSheet[$i]["AA"]);
			$PANNO = trim($allDataInSheet[$i]["AB"]);
			$GIRNO = trim($allDataInSheet[$i]["AC"]);
			$SRVTXNO = trim($allDataInSheet[$i]["AD"]);
			$DRGLICNO1 = trim($allDataInSheet[$i]["AE"]);
			$DRGLICEXPDT1 = trim($allDataInSheet[$i]["AF"]);
			$DRGLICNO2 = trim($allDataInSheet[$i]["AG"]);
			$DRGLICEXPDT2 = trim($allDataInSheet[$i]["AH"]);
			$PESTLICNO1 = trim($allDataInSheet[$i]["AI"]);
			$PESTLICEXPDT1 = trim($allDataInSheet[$i]["AJ"]);
			$PESTLICNO2 = trim($allDataInSheet[$i]["AK"]);
			$PESTLICEXPDT2 = trim($allDataInSheet[$i]["AL"]);
			$OP_BAL = trim($allDataInSheet[$i]["AM"]);
			$TYPE = trim($allDataInSheet[$i]["AN"]);
			$YR_CRTTL = trim($allDataInSheet[$i]["AO"]);
			$YR_DRTTL = trim($allDataInSheet[$i]["AP"]);
			$NEW_BAL = trim($allDataInSheet[$i]["AQ"]);
			$N_TYP = trim($allDataInSheet[$i]["AR"]);
			$ACTYP = trim($allDataInSheet[$i]["AS"]);
			$CRLIMIT = trim($allDataInSheet[$i]["AT"]);
			$CRDB = trim($allDataInSheet[$i]["AU"]);
			$ACCTYPECD = trim($allDataInSheet[$i]["AV"]);
			$ACCTYPE = trim($allDataInSheet[$i]["AW"]);
			$ACCTYPECD1 = trim($allDataInSheet[$i]["AX"]);
			$ACCTYPE1 = trim($allDataInSheet[$i]["AY"]);
			$ACCTYPECD2 = trim($allDataInSheet[$i]["AZ"]);
			$ACCTYPE2 = trim($allDataInSheet[$i]["BA"]);
			$ACCTYPECD3 = trim($allDataInSheet[$i]["BB"]);
			$ACCTYPE3 = trim($allDataInSheet[$i]["BC"]);
			$MTCD = trim($allDataInSheet[$i]["BD"]);
			$AREA = trim($allDataInSheet[$i]["BE"]);
			$SR = trim($allDataInSheet[$i]["BF"]);
			$LOCNCD = trim($allDataInSheet[$i]["BG"]);
			$CATEGORY = trim($allDataInSheet[$i]["BH"]);
			$CRDAYS = trim($allDataInSheet[$i]["BI"]);
			$CUSTCAT = trim($allDataInSheet[$i]["BJ"]);
			$INTAX = trim($allDataInSheet[$i]["BK"]);
			$TAXAC = trim($allDataInSheet[$i]["BL"]);
			$HOLIDAY = trim($allDataInSheet[$i]["BM"]);
			$DPYN = trim($allDataInSheet[$i]["BN"]);
			$DP = trim($allDataInSheet[$i]["BO"]);
			$CC = trim($allDataInSheet[$i]["BP"]);
			$TDSYN = trim($allDataInSheet[$i]["BQ"]);
			$TDSPER = trim($allDataInSheet[$i]["BR"]);
			$BILWBAL = trim($allDataInSheet[$i]["BS"]);
			$ACTIVEYN = trim($allDataInSheet[$i]["BT"]);
			$ACCNATURE = trim($allDataInSheet[$i]["BU"]);
			$ACCSUMYN = trim($allDataInSheet[$i]["BV"]);
			$RPTTYP = trim($allDataInSheet[$i]["BW"]);
			$SUBLEDGYN = trim($allDataInSheet[$i]["BX"]);
			$AddedBy = trim($allDataInSheet[$i]["BY"]);
			$AdDt = trim($allDataInSheet[$i]["BZ"]);
			$EditedBy = trim($allDataInSheet[$i]["CA"]);
			$EditDt = trim($allDataInSheet[$i]["CB"]);
			$ApprovedBy = trim($allDataInSheet[$i]["CC"]);
			$ApprDt = trim($allDataInSheet[$i]["CD"]);
			$ApprYN = trim($allDataInSheet[$i]["CE"]);
			$ACCTYPECD4 = trim($allDataInSheet[$i]["CF"]);
			$ACCTYPE4 = trim($allDataInSheet[$i]["CG"]);
			$MARNAME = trim($allDataInSheet[$i]["CH"]);
			$MARADDR1 = trim($allDataInSheet[$i]["CI"]);
			$MARADDR2 = trim($allDataInSheet[$i]["CJ"]);
			$MARADDR3 = trim($allDataInSheet[$i]["CK"]);
			$PHONE2 = trim($allDataInSheet[$i]["CL"]);
			$LANDMARK = trim($allDataInSheet[$i]["CM"]);
			
			$query = mysql_query("insert into acmst (custid, accd, gp, ac_head, custcd, custnm, add1, add2, add3, add4, city, eccno, cerange, cediv, cecomm, lstno, lstdt, cstno, cstdt, phone, fax, email, cperson, acid, usrcd, vendcd, grpname, panno, girno, srvtxno, drglicno1, drglicexpdt1, drglicno2, drglicexpdt2, pestlicno1, pestlicexpdt1, pestlicno2, pestlicexpdt2, op_bal, type, yr_crttl, yr_drttl, new_bal, n_typ, actyp, crlimit, crdb, acctypecd, acctype, acctypecd1, acctype1, acctypecd2, acctype2, acctypecd3, acctype3, mtcd, area, sr, locncd, category, crdays, custcat, intax, taxac, holiday, dpyn, dp, cc, tdsyn, tdsper, bilwbal, activeyn, accnature, accsumyn, rpttyp, subledgyn, addedby, addt, editedby, editdt, approvedby, apprdt, appryn, acctypecd4, acctype4, marname, maradde1, maradde2, maradde3, phone2, landmark) values('".$CUSTID."', '".$ACCD."', '".$GP."', '".$AC_HEAD."', '".$CUSTCD."', '".$CUSTNM."', '".$ADD1."', '".$ADD2."', '".$ADD3."', '".$ADD4."', '".$CITY."', '".$ECCNO."', '".$CERANGE."', '".$CEDIV."', '".$CECOMM."', '".$LSTNO."', '".$LSTDT."', '".$CSTNO."', '".$CSTDT."', '".$PHONE."', '".$FAX."', '".$EMAIL."', '".$CPERSON."', '".$ACID."', '".$USRCD."', '".$VENDCD."', '".$GRPNAME."', '".$PANNO."', '".$GIRNO."', '".$SRVTXNO."', '".$DRGLICNO1."', '".$DRGLICEXPDT1."', '".$DRGLICNO2."', '".$DRGLICEXPDT2."', '".$PESTLICNO1."', '".$PESTLICEXPDT1."', '".$PESTLICNO2."', '".$PESTLICEXPDT2."', '".$OP_BAL."', '".$TYPE."', '".$YR_CRTTL."', '".$YR_DRTTL."', '".$NEW_BAL."', '".$N_TYP."', '".$ACTYP."', '".$CRLIMIT."', '".$CRDB."', '".$ACCTYPECD."', '".$ACCTYPE."', '".$ACCTYPECD1."', '".$ACCTYPE1."',  '".$ACCTYPECD2."',  '".$ACCTYPE2."',  '".$ACCTYPECD3."',  '".$ACCTYPE3."',  '".$MTCD."',  '".$AREA."',  '".$SR."',  '".$LOCNCD."', '".$CATEGORY."',  '".$CRDAYS."',  '".$CUSTCAT."',  '".$INTAX."',  '".$TAXAC."', '".$HOLIDAY."', '".$DPYN."', '".$DP."', '".$CC."', '".$TDSYN."', '".$TDSPER."', '".$BILWBAL."', '".$ACTIVEYN."', '".$ACCNATURE."', '".$ACCSUMYN."', '".$RPTTYP."', '".$SUBLEDGYN."', '".$AddedBy."', '".$AdDt."', '".$EditedBy."',  '".$EditDt."',  '".$ApprovedBy."',  '".$ApprDt."',  '".$ApprYN."',  '".$ACCTYPECD4."',  '".$ACCTYPE4."',  '".$MARNAME."',  '".$MARADDR1."',  '".$MARADDR2."',  '".$MARADDR3."',  '".$PHONE2."',  '".$LANDMARK."');");
			if($query==1) 
			{
			} 
			else 
			{
				$error = "Y";
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