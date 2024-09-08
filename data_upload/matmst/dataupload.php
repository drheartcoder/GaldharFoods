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
	$a=mysql_query("delete from matmst");
	if($a==1)
	{
		for($i=2;$i<$arrayCount+1;$i++)
		{
			$ItemId = trim($allDataInSheet[$i]["A"]);
			$ItmCd = trim($allDataInSheet[$i]["B"]);
			$ItmType = trim($allDataInSheet[$i]["C"]);
			$Gp = trim($allDataInSheet[$i]["D"]);
			$Grp = trim($allDataInSheet[$i]["E"]);
			$GrpName = trim($allDataInSheet[$i]["F"]);
			$Grp1 = trim($allDataInSheet[$i]["G"]);
			$Grp2 = trim($allDataInSheet[$i]["H"]);
			$Grp3 = trim($allDataInSheet[$i]["I"]);
			$Grp4 = trim($allDataInSheet[$i]["J"]);
			$Grp5 = trim($allDataInSheet[$i]["K"]);
			$Grp6 = trim($allDataInSheet[$i]["L"]);
			$AccdLink = trim($allDataInSheet[$i]["M"]);
			$Accd = trim($allDataInSheet[$i]["N"]);
			$SCd = trim($allDataInSheet[$i]["O"]);
			$PCd = trim($allDataInSheet[$i]["P"]);
			$Mtcd = trim($allDataInSheet[$i]["Q"]);
			$Mt_head = trim($allDataInSheet[$i]["R"]);
			$Uom = trim($allDataInSheet[$i]["S"]);
			$IdMark = trim($allDataInSheet[$i]["T"]);
			$Speci = trim($allDataInSheet[$i]["U"]);
			$Partno = trim($allDataInSheet[$i]["V"]);
			$Partno2 = trim($allDataInSheet[$i]["W"]);
			$Location = trim($allDataInSheet[$i]["X"]);
			$Op_Qty = trim($allDataInSheet[$i]["Y"]);
			$Recd_QTy = trim($allDataInSheet[$i]["Z"]);
			$Issu_QTy = trim($allDataInSheet[$i]["AA"]);
			$Clo_QTy = trim($allDataInSheet[$i]["AB"]);
			$Op_Rate = trim($allDataInSheet[$i]["AC"]);
			$Op_value = trim($allDataInSheet[$i]["AD"]);
			$Recd_val = trim($allDataInSheet[$i]["AE"]);
			$Issu_val = trim($allDataInSheet[$i]["AF"]);
			$Clo_value = trim($allDataInSheet[$i]["AG"]);
			$StkForDays = trim($allDataInSheet[$i]["AH"]);
			$Min_lvl = trim($allDataInSheet[$i]["AI"]);
			$Max_lvl = trim($allDataInSheet[$i]["AJ"]);
			$Stk_YN = trim($allDataInSheet[$i]["AK"]);
			$P_Rate = trim($allDataInSheet[$i]["AL"]);
			$PRateL = trim($allDataInSheet[$i]["AM"]);
			$Rate = trim($allDataInSheet[$i]["AN"]);
			$Rate2 = trim($allDataInSheet[$i]["AO"]);
			$Rate3 = trim($allDataInSheet[$i]["AP"]);
			$Rate4 = trim($allDataInSheet[$i]["AQ"]);
			$MRate = trim($allDataInSheet[$i]["AR"]);
			$Mrp = trim($allDataInSheet[$i]["AS"]);
			$LOQty = trim($allDataInSheet[$i]["AT"]);
			$LPQty = trim($allDataInSheet[$i]["AU"]);
			$LIQty = trim($allDataInSheet[$i]["AV"]);
			$LCQty = trim($allDataInSheet[$i]["AW"]);
			$QtyInBox = trim($allDataInSheet[$i]["AX"]);
			$InBox = trim($allDataInSheet[$i]["AY"]);
			$excid = trim($allDataInSheet[$i]["AZ"]);
			$ChapNo = trim($allDataInSheet[$i]["BA"]);
			$Value = trim($allDataInSheet[$i]["BB"]);
			$Tag = trim($allDataInSheet[$i]["BC"]);
			$Locn = trim($allDataInSheet[$i]["BD"]);
			$Cf = trim($allDataInSheet[$i]["BE"]);
			$Rg23A_IOp = trim($allDataInSheet[$i]["BF"]);
			$Rg23C_IOp = trim($allDataInSheet[$i]["BG"]);
			$Rg1_Op = trim($allDataInSheet[$i]["BH"]);
			$Rg23A_ICl = trim($allDataInSheet[$i]["BI"]);
			$Rg23C_ICl = trim($allDataInSheet[$i]["BJ"]);
			$Rg1_cl = trim($allDataInSheet[$i]["BK"]);
			$Rg23A_Ref = trim($allDataInSheet[$i]["BL"]);
			$Rg23C_Ref = trim($allDataInSheet[$i]["BM"]);
			$Rg1_Ref = trim($allDataInSheet[$i]["BN"]);
			$Op_date = trim($allDataInSheet[$i]["BO"]);
			$Cr_Date = trim($allDataInSheet[$i]["BP"]);
			$F = trim($allDataInSheet[$i]["BQ"]);
			$Stper = trim($allDataInSheet[$i]["BR"]);
			$Exmp = trim($allDataInSheet[$i]["BS"]);
			$Locncd = trim($allDataInSheet[$i]["BT"]);
			$net_wt = trim($allDataInSheet[$i]["BU"]);
			$cut_wt = trim($allDataInSheet[$i]["BV"]);
			$gros_wt = trim($allDataInSheet[$i]["BW"]);
			$Wt = trim($allDataInSheet[$i]["BX"]);
			$WtUnit = trim($allDataInSheet[$i]["BY"]);
			$RtPerWt = trim($allDataInSheet[$i]["BZ"]);
			$SubDesc = trim($allDataInSheet[$i]["CA"]);
			$PrnDesc = trim($allDataInSheet[$i]["CB"]);
			$mfgdt = trim($allDataInSheet[$i]["CC"]);
			$cmfgdt = trim($allDataInSheet[$i]["CD"]);
			$ExpDt = trim($allDataInSheet[$i]["CE"]);
			$CExpDt = trim($allDataInSheet[$i]["CF"]);
			$DiscCat = trim($allDataInSheet[$i]["CG"]);
			$DiscPer = trim($allDataInSheet[$i]["CH"]);
			$DiscPer2 = trim($allDataInSheet[$i]["CI"]);
			$RtPer = trim($allDataInSheet[$i]["CJ"]);
			$BoxRt = trim($allDataInSheet[$i]["CK"]);
			$Dm = trim($allDataInSheet[$i]["CL"]);
			$Rm = trim($allDataInSheet[$i]["CM"]);
			$ProfitRatio1 = trim($allDataInSheet[$i]["CN"]);
			$ProfitRatio2 = trim($allDataInSheet[$i]["CO"]);
			$ProfitRatio3 = trim($allDataInSheet[$i]["CP"]);
			$ProfitRatio4 = trim($allDataInSheet[$i]["CQ"]);
			$ProfitRatio5 = trim($allDataInSheet[$i]["CR"]);
			$ActiveYN = trim($allDataInSheet[$i]["CS"]);
			$ManualRate = trim($allDataInSheet[$i]["CT"]);
			$l = trim($allDataInSheet[$i]["CU"]);
			$w = trim($allDataInSheet[$i]["CV"]);
			$h = trim($allDataInSheet[$i]["CW"]);
			$royaltyper = trim($allDataInSheet[$i]["CX"]);
			$batchno = trim($allDataInSheet[$i]["CY"]);
			$lotno = trim($allDataInSheet[$i]["CZ"]);
			$size = trim($allDataInSheet[$i]["DA"]);
			$sizeid = trim($allDataInSheet[$i]["DB"]);
			$vou_no = trim($allDataInSheet[$i]["DC"]);
			$AddedBy = trim($allDataInSheet[$i]["DD"]);
			$AdDt = trim($allDataInSheet[$i]["DE"]);
			$EditedBy = trim($allDataInSheet[$i]["DF"]);
			$EditDt = trim($allDataInSheet[$i]["DG"]);
			$ApprovedBy = trim($allDataInSheet[$i]["DH"]);
			$ApprDt = trim($allDataInSheet[$i]["DI"]);
			$ApprYN = trim($allDataInSheet[$i]["DJ"]);
			$itemdesc = trim($allDataInSheet[$i]["DK"]);
			$itemdesc2 = trim($allDataInSheet[$i]["DL"]);
			$itemdesc3 = trim($allDataInSheet[$i]["DM"]);
			$SIZECD = trim($allDataInSheet[$i]["DN"]);
			$COLORCD = trim($allDataInSheet[$i]["DO"]);
			$DESGCD = trim($allDataInSheet[$i]["DP"]);
			$COLOR = trim($allDataInSheet[$i]["DQ"]);
			$DESGNO = trim($allDataInSheet[$i]["DR"]);
			$PUR_RET = trim($allDataInSheet[$i]["DS"]);
			$STK_TRF = trim($allDataInSheet[$i]["DT"]);
			$STK_RET = trim($allDataInSheet[$i]["DU"]);
			
			$query = mysql_query("insert into matmst (itemid, itmcd, itmtype, gp, grp, grpname, grp1, grp2, grp3, grp4, grp5, grp6, accdlink, accd, scd, pcd, mtcd, mt_head, uom, idmark, speci, partno, partno2, location, op_qty, recd_qty, issu_qty, clo_qty, op_rate, op_value, recd_val, issu_val, clo_value, stkfordays, min_lvl, max_lvl, stk_yn, p_rate, pratel, rate, rate2, rate3, rate4, mrate, mrp, loqty, lpqty, liqty, lcqty, qtyinbox, inbox, excid, chapno, value, tag, locn, cf, rg23a_iop, rg23c_iop, rg1_op, rg23a_ici, rg23c_ici, rg1_cl, rg23a_ref, rg23c_ref, rg1_ref, op_date, cr_date, f, stper, exmp, locncd, net_wt, cut_wt, gros_wt, wt, wtunit, rtperwt, subdesc, prndesc, mfgdt, cmfgdt, expdt, cexpdt, disccat, discper, discper2, rtper, boxrt, dm, rm, profitratio1, profitratio2, profitratio3, profitratio4, profitratio5, activeyn, manualrate, i, w, h, royaltyper, batchno, lotno, size, sizeid, vou_no, addedby, addt, editedby, editdt, approvedby, apprdt, appryn, itemdesc, itemdesc2, itemdesc3, sizecd, colorcd, desgcd, color, desgno, pur_ret, stk_trf, stk_ref) values('".$ItemId."', '".$ItmCd."', '".$ItmType."', '".$Gp."', '".$Grp."', '".$GrpName."', '".$Grp1."', '".$Grp2."', '".$Grp3."', '".$Grp4."', '".$Grp5."', '".$Grp6."', '".$AccdLink."', '".$Accd."', '".$SCd."', '".$PCd."', '".$Mtcd."', '".$Mt_head."', '".$Uom."', '".$IdMark."', '".$Speci."', '".$Partno."', '".$Partno2."', '".$Location."', '".$Op_Qty."', '".$Recd_Qty."', '".$Issu_Qty."', '".$Clo_Qty."', '".$Op_Rate."', '".$Op_value."', '".$Recd_val."', '".$Issu_val."', '".$Clo_value."', '".$StkForDays."', '".$Min_lvl."', '".$Max_lvl."', '".$Stk_YN."', '".$P_Rate."', '".$PRateL."', '".$Rate."', '".$Rate2."', '".$Rate3."', '".$Rate4."', '".$MRate."', '".$Mrp."', '".$LOQty."', '".$LPQty."', '".$LIQty."', '".$LCQty."', '".$QtyInBox."', '".$InBox."', '".$excid."', '".$ChapNo."', '".$Value."', '".$Tag."', '".$Locn."', '".$Cf."', '".$Rg23A_IOp."', '".$Rg23C_IOp."', '".$Rg1_Op."', '".$Rg23A_ICl."', '".$Rg23C_ICl."', '".$Rg1_cl."', '".$Rg23A_Ref."', '".$Rg23C_Ref."', '".$Rg1_Ref."', '".$Op_date."', '".$Cr_Date."', '".$F."', '".$Stper."', '".$Exmp."', '".$Locncd."', '".$net_wt."', '".$cut_wt."', '".$gros_wt."', '".$Wt."', '".$WtUnit."', '".$RtPerWt."', '".$SubDesc."', '".$PrnDesc."', '".$mfgdt."', '".$cmfgdt."', '".$ExpDt."', '".$CExpDt."', '".$DiscCat."', '".$DiscPer."', '".$DiscPer2."', '".$RtPer."', '".$BoxRt."', '".$Dm."', '".$Rm."', '".$ProfitRatio1."', '".$ProfitRatio2."', '".$ProfitRatio3."', '".$ProfitRatio4."', '".$ProfitRatio5."', '".$ActiveYN."', '".$ManualRate."', '".$l."', '".$w."', '".$h."', '".$royaltyper."', '".$batchno."', '".$lotno."', '".$size."', '".$sizeid."', '".$vou_no."', '".$AddedBy."', '".$AdDt."', '".$EditedBy."', '".$EditDt."', '".$ApprovedBy."', '".$ApprDt."', '".$ApprYN."', '".$itemdesc."', '".$itemdesc2."', '".$itemdesc3."', '".$SIZECD."', '".$COLORCD."', '".$DESGCD."', '".$COLOR."', '".$DESGNO."', '".$PUR_RET."', '".$STK_TRF."', '".$STK_RET."');");
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