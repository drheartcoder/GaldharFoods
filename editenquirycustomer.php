<?php

session_start();

if($_SESSION['name'])
{
	if(isset($_POST['btnsave']))
	{
		extract($_POST);
		
		$yvouno = "";
		include("dbconnect.php");
		$a=mysql_query("select max(VOU_NO) as vouno from eqcmast");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$yvouno = $db1['vouno'];
		}
		$xmrnno = substr($yvouno,10)+1;
		$zvouno = substr($yvouno,10);
        $xvouno = "EC01010010".str_pad($zvouno+1,6,"0",STR_PAD_LEFT);
		
		$totrow = count($xprodcode);
		for ($i = 0; $i < $totrow; $i++) 
		{
			$yprodcode = $xprodcode[$i];
			$yproddesc = $xproddesc[$i];
			$yproddescrip = $xproddescrip[$i];
			$yproddescrip1 = $xproddescrip1[$i];
			$yproddescrip2 = $xproddescrip2[$i];
			$yproddescrip3 = $xproddescrip3[$i];
			$yproduom = $xproduom[$i];
			$yprodqty = $xprodqty[$i];
			$yprodfreeqty = $xprodfreeqty[$i];
			$yprodtotalqty = $xprodtotalqty[$i];
			$yprodmrp = $xprodmrp[$i];
			$yprodrate = $xprodrate[$i];
			$yprodvalue = $xprodvalue[$i];
			$yproddisc1 = $xproddisc1[$i];
			$yproddisc2 = $xproddisc2[$i];
			$yproddiscamt = $xproddiscamt[$i];
			$yproddisc3 = $xproddisc3[$i];
			$yprodcdisc = $xprodcdisc[$i];
			$yprodpandf = $xprodpandf[$i];
			$yprodpfamt = $xprodpfamt[$i];
			$yprodexcise = $xprodexcise[$i];
			$yprodexcamt = $xprodexcamt[$i];
			$yprodcess = $xprodcess[$i];
			$yprodcessamt = $xprodcessamt[$i];
			$yprodhcess = $xprodhcess[$i];
			$yprodhcessamt = $xprodhcessamt[$i];
			$yprodfreight = $xprodfreight[$i];
			$yprodothexp = $xprodothexp[$i];
			$yprodtaxcode = $xprodtaxcode[$i];
			$yprodtax = $xprodtax[$i];
			$yprodvat = $xprodvat[$i];
			$yprodtotal = $xprodtotal[$i];
			$autosrno = $i+1;
			include("dbconnect.php");
			$b=mysql_query("insert into eqctrans(VOU_NO, VOU_DT, MRNNO, MRNDT, DOC_NO, DOC_DT, SRNO, MTCD, MT_HEAD, DESCRIP, DESCRIP1, DESCRIP2, DESCRIP3, UOM, PQTY, FQTY, QTY, MRP, RATE, VALUE, SCHAMT, DP, DISCAMT, CDP, CDISC, PFPER, PFAMT, EXPER, EXCAMT, CESSPER, CESSAMT, HCESSPER, HCESSAMT, FRTCHG, OTHEXP, F, STP, SLSTAX, AMOUNT) values('$xvouno', '$xvoudt', '$xenqno', '$xenqdt', '$xvouno', '$xvoudt', '$autosrno', '$yprodcode', '$yproddesc', '$yproddescrip', '$yproddescrip1', '$yproddescrip2', '$yproddescrip3', '$yproduom', '$yprodqty', '$yprodfreeqty', '$yprodtotalqty', '$yprodmrp', '$yprodrate', '$yprodvalue', '$yproddisc1', '$yproddisc2', '$yproddiscamt', '$yproddisc3', '$yprodcdisc', '$yprodpandf', '$yprodpfamt', '$yprodexcise', '$yprodexcamt', '$yprodcess', '$yprodcessamt', '$yprodhcess', '$yprodhcessamt', '$yprodfreight', '$yprodothexp', '$yprodtaxcode', '$yprodtax', '$yprodvat', '$yprodtotal')");
		}
		
		include("dbconnect.php");
		//$a=mysql_query("insert into eqcmast(VOU_NO, VOU_DT, ENQ_NO, ENQ_DT, AC_HEAD, xbasicper, MVALUE, xbasicgrp, xschemeper, MDP, xschemegrp, xdiscountper, MDISC, xdiscountgrp, xcashper, xcashamt, xcashgrp, MSPLDPPER, MSPLDPAMT, xspecial1grp, MSPLDPPER2, MSPLDPAMT2, xspecial2grp, xpackper, xpackamt, xpackgrp, xexciseper, xexciseamt, xexcisegrp, MCESSPER, MCESSAMT, xeducessgrp, MHCESSPER, MHCESSAMT, xsheducessgrp, xvatper, MSLSTAX, xvatgrp, xrondper, ROFF, xrondgrp, MAMOUNT, LRNO, LRDT, TRANSPORT, VEHNO, PREPDATE, PREPTIME, REMVDATE, REMVTIME, DESPID, DELVID, PYMTID, QTNKINDATTN, QTNSUBJECT, QTNREM1, QTNREM7, QTNREM2, QTNREM8, QTNREM9, QTNREM10, QTNREM3, QTNREM4, QTNREM5, QTNREM6) values('$xvouno', '$xvoudt', '$xmrnno', '$xenqdt', '$xcustname', '$xbasicper', '$xbasicamt', '$xbasicgrp', '$xschemeper', '$xschemeamt', '$xschemegrp', '$xdiscountper', '$xdiscountamt', '$xdiscountgrp', '$xcashper', '$xcashamt', '$xcashgrp', '$xspecial1per', '$xspecial1amt', '$xspecial1grp', '$xspecial2per', '$xspecial2amt', '$xspecial2grp', '$xpackper', '$xpackamt', '$xpackgrp', '$xexciseper', '$xexciseamt', '$xexcisegrp', '$xeducessper', '$xeducessamt', '$xeducessgrp', '$xsheducessper', '$xsheducessamt', '$xsheducessgrp', '$xvatper', '$xvatamt', '$xvatgrp', '$xrondper', '$xrondamt', '$xrondgrp', '$xgrandtotal', '$xlrno', '$xlrdt', '$xtransporter', '$xvehicle', '$xprepdt', '$xpreptime', '$xremovedt', '$xremovetime', '$xdespatch', '$xdeliverytype', '$xpayment1', '$xkindatt', '$xsubject', '$xpayment2', '$xexcise', '$xtaxation', '$xfreight', '$xinsurance', '$xothcharge', '$xdeliveryat', '$xdeliverydt', '$xvalidity', '$xinstruct')");
		
		$a=mysql_query("insert into eqcmast(VOU_NO, VOU_DT, ENQ_NO, ENQ_DT, AC_HEAD, MVALUE, MDP, MDISC, MCDISC, MPFAMT, MEXCAMT, MCESSAMT, MHCESSAMT, MFRTCHG, MOTHEXP, MSLSTAX, ROFF, MAMOUNT, LRNO, LRDT, TRANSPORT, VEHNO, PREPDATE, PREPTIME, REMVDATE, REMVTIME, DESPID, DELVID, PYMTID, QTNKINDATTN, QTNSUBJECT, QTNREM1, QTNREM7, QTNREM2, QTNREM8, QTNREM9, QTNREM10, QTNREM3, QTNREM4, QTNREM5, QTNREM6, MRNNO) values('$xvouno', '$xvoudt', '$xenqno', '$xenqdt', '$xcustname', '$xbasicamt', '$xschemeamt', '$xdiscountamt', '$xcashamt', '$xpackamt', '$xexciseamt', '$xeducessamt', '$xsheducessamt', '$xfreightamt', '$xothexpamt', '$xvatamt', '$xrondamt', '$xgrandtotal', '$xlrno', '$xlrdt', '$xtransporter', '$xvehicle', '$xprepdt', '$xpreptime', '$xremovedt', '$xremovetime', '$xdespatch', '$xdeliverytype', '$xpayment1', '$xkindatt', '$xsubject', '$xpayment2', '$xexcise', '$xtaxation', '$xfreight', '$xinsurance', '$xothcharge', '$xdeliveryat', '$xdeliverydt', '$xvalidity', '$xinstruct', '$xmrnno')");
		
		if($a==1)
		{
			?><script>alert("Record Inserted Succssfully.....!"); location.replace("enquirycustomer.php"); </script><?php
		}
		else
		{
			?><script>alert("Record Not Inserted.....!"); location.replace("enquirycustomer.php"); </script><?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$updel=mysql_query("delete from eqctrans where MRNNO=".$_GET['MRNNO']);
		
		$totrow = count($xprodcode);
		for ($i = 0; $i < $totrow; $i++) 
		{
			$yprodcode = $xprodcode[$i];
			$yproddesc = $xproddesc[$i];
			$yproddescrip = $xproddescrip[$i];
			$yproddescrip1 = $xproddescrip1[$i];
			$yproddescrip2 = $xproddescrip2[$i];
			$yproddescrip3 = $xproddescrip3[$i];
			$yproduom = $xproduom[$i];
			$yprodqty = $xprodqty[$i];
			$yprodfreeqty = $xprodfreeqty[$i];
			$yprodtotalqty = $xprodtotalqty[$i];
			$yprodmrp = $xprodmrp[$i];
			$yprodrate = $xprodrate[$i];
			$yprodvalue = $xprodvalue[$i];
			$yproddisc1 = $xproddisc1[$i];
			$yproddisc2 = $xproddisc2[$i];
			$yproddiscamt = $xproddiscamt[$i];
			$yproddisc3 = $xproddisc3[$i];
			$yprodcdisc = $xprodcdisc[$i];
			$yprodpandf = $xprodpandf[$i];
			$yprodpfamt = $xprodpfamt[$i];
			$yprodexcise = $xprodexcise[$i];
			$yprodexcamt = $xprodexcamt[$i];
			$yprodcess = $xprodcess[$i];
			$yprodcessamt = $xprodcessamt[$i];
			$yprodhcess = $xprodhcess[$i];
			$yprodhcessamt = $xprodhcessamt[$i];
			$yprodfreight = $xprodfreight[$i];
			$yprodothexp = $xprodothexp[$i];
			$yprodtaxcode = $xprodtaxcode[$i];
			$yprodtax = $xprodtax[$i];
			$yprodvat = $xprodvat[$i];
			$yprodtotal = $xprodtotal[$i];
			$autosrno = $i+1;
			include("dbconnect.php");
			$b=mysql_query("insert into eqctrans(VOU_NO, VOU_DT, MRNNO, MRNDT, DOC_NO, DOC_DT, SRNO, MTCD, MT_HEAD, DESCRIP, DESCRIP1, DESCRIP2, DESCRIP3, UOM, PQTY, FQTY, QTY, MRP, RATE, VALUE, SCHAMT, DP, DISCAMT, CDP, CDISC, PFPER, PFAMT, EXPER, EXCAMT, CESSPER, CESSAMT, HCESSPER, HCESSAMT, FRTCHG, OTHEXP, F, STP, SLSTAX, AMOUNT) values('$xvouno', '$xvoudt', '$xenqno', '$xenqdt', '$xvouno', '$xvoudt', '$autosrno', '$yprodcode', '$yproddesc', '$yproddescrip', '$yproddescrip1', '$yproddescrip2', '$yproddescrip3', '$yproduom', '$yprodqty', '$yprodfreeqty', '$yprodtotalqty', '$yprodmrp', '$yprodrate', '$yprodvalue', '$yproddisc1', '$yproddisc2', '$yproddiscamt', '$yproddisc3', '$yprodcdisc', '$yprodpandf', '$yprodpfamt', '$yprodexcise', '$yprodexcamt', '$yprodcess', '$yprodcessamt', '$yprodhcess', '$yprodhcessamt', '$yprodfreight', '$yprodothexp', '$yprodtaxcode', '$yprodtax', '$yprodvat', '$yprodtotal')");
			//echo "(VOU_NO, VOU_DT, MRNNO, MRNDT, DOC_NO, DOC_DT, SRNO, MTCD, MT_HEAD, DESCRIP, DESCRIP1, DESCRIP2, DESCRIP3, UOM, PQTY, FQTY, QTY, MRP, RATE, VALUE, SCHAMT, DP, DISCAMT, CDP, CDISC, PFPER, PFAMT, EXPER, EXCAMT, CESSPER, CESSAMT, HCESSPER, HCESSAMT, FRTCHG, OTHEXP, F, STP, SLSTAX, AMOUNT) values('$xvouno', '$xvoudt', '$xmrnno', '$xenqdt', '$xvouno', '$xvoudt', '$autosrno', '$yprodcode', '$yproddesc', '$yproddescrip', '$yproddescrip1', '$yproddescrip2', '$yproddescrip3', '$yproduom', '$yprodqty', '$yprodfreeqty', '$yprodtotalqty', '$yprodmrp', '$yprodrate', '$yprodvalue', '$yproddisc1', '$yproddisc2', '$yproddiscamt', '$yproddisc3', '$yprodcdisc', '$yprodpandf', '$yprodpfamt', '$yprodexcise', '$yprodexcamt', '$yprodcess', '$yprodcessamt', '$yprodhcess', '$yprodhcessamt', '$yprodfreight', '$yprodothexp', '$yprodtaxcode', '$yprodtax', '$yprodvat', '$yprodtotal')";

			//$b=mysql_query("update eqctrans set VOU_NO='$xvouno', VOU_DT='$xvoudt', MRNNO='$xenqno', MRNDT='$xenqdt', DOC_NO='$xvouno', DOC_DT='$xvoudt', SRNO='$autosrno', MTCD='$yprodcode', MT_HEAD='$yproddesc', DESCRIP='$yproddescrip', DESCRIP1='$yproddescrip1', DESCRIP2='$yproddescrip2', DESCRIP3='$yproddescrip3', UOM='$yproduom', PQTY='$yprodqty', FQTY='$yprodfreeqty', QTY='$yprodtotalqty', MRP='$yprodmrp', RATE='$yprodrate', VALUE='$yprodvalue', SCHAMT='$yproddisc1', DP='$yproddisc2', DISCAMT='$yproddiscamt', CDP='$yproddisc3', CDISC='$yprodcdisc', PFPER='$yprodpandf', PFAMT='$yprodpfamt', EXPER='$yprodexcise', EXCAMT='$yprodexcamt', CESSPER='$yprodcess', CESSAMT='$yprodcessamt', HCESSPER='$yprodhcess', HCESSAMT='$yprodhcessamt', FRTCHG='$yprodfreight', OTHEXP='$yprodothexp', F='$yprodtaxcode', STP='$yprodtax', SLSTAX='$yprodvat', AMOUNT='$yprodtotal' where SRNO=$autosrno and MRNNO=".$_GET['MRNNO']);
		}

		include("dbconnect.php");
		//$a=mysql_query("update eqcmast set VOU_NO='$xvouno', VOU_DT='$xvoudt', ENQ_NO='$xenqno', ENQ_DT='$xenqdt', AC_HEAD='$xcustname', xbasicper='$xbasicper', MVALUE='$xbasicamt', xbasicgrp='$xbasicgrp', xschemeper='$xschemeper', MDP='$xschemeamt', xschemegrp='$xschemegrp', xdiscountper='$xdiscountper', MDISC='$xdiscountamt', xdiscountgrp='$xdiscountgrp', xcashper='$xcashper', xcashamt='$xcashamt', xcashgrp='$xcashgrp', MSPLDPPER='$xspecial1per', MSPLDPAMT='$xspecial1amt', xspecial1grp='$xspecial1grp', MSPLDPPER2='$xspecial2per', MSPLDPAMT2='$xspecial2amt', xspecial2grp='$xspecial2grp', xpackper='$xpackper', xpackamt='$xpackamt', xpackgrp='$xpackgrp', xexciseper='$xexciseper', xexciseamt='$xexciseamt', xexcisegrp='$xexcisegrp', MCESSPER='$xeducessper', MCESSAMT='$xeducessamt', xeducessgrp='$xeducessgrp', MHCESSPER='$xsheducessper', MHCESSAMT='$xsheducessamt', xsheducessgrp='$xsheducessgrp', xvatper='$xvatper', MSLSTAX='$xvatamt', xvatgrp='$xvatgrp', xrondper='$xrondper', ROFF='$xrondamt', xrondgrp='$xrondgrp', MAMOUNT='$xgrandtotal', LRNO='$xlrno', LRDT='$xlrdt', TRANSPORT='$xtransporter', VEHNO='$xvehicle', PREPDATE='$xprepdt', PREPTIME='$xpreptime', REMVDATE='$xremovedt', REMVTIME='$xremovetime', DESPID='$xdespatch', DELVID='$xdeliverytype', PYMTID='$xpayment1', QTNKINDATTN='$xkindatt', QTNSUBJECT='$xsubject', QTNREM1='$xpayment2', QTNREM7='$xexcise', QTNREM2='$xtaxation', QTNREM8='$xfreight', QTNREM9='$xinsurance', QTNREM10='$xothcharge', QTNREM3='$xdeliveryat', QTNREM4='$xdeliverydt', QTNREM5='$xvalidity', QTNREM6='$xinstruct' where MRNNO=".$_GET['MRNNO']);
		$a=mysql_query("update eqcmast set VOU_NO='$xvouno', VOU_DT='$xvoudt', ENQ_NO='$xenqno', ENQ_DT='$xenqdt', AC_HEAD='$xcustname', MVALUE='$xbasicamt', MDP='$xschemeamt', MDISC='$xdiscountamt', MCDISC='$xcashamt', MPFAMT='$xpackamt', MEXCAMT='$xexciseamt', MCESSAMT='$xeducessamt', MHCESSAMT='$xsheducessamt', MFRTCHG='$xfreightamt', MOTHEXP='$xothexpamt', MSLSTAX='$xvatamt', ROFF='$xrondamt', MAMOUNT='$xgrandtotal', LRNO='$xlrno', LRDT='$xlrdt', TRANSPORT='$xtransporter', VEHNO='$xvehicle', PREPDATE='$xprepdt', PREPTIME='$xpreptime', REMVDATE='$xremovedt', REMVTIME='$xremovetime', DESPID='$xdespatch', DELVID='$xdeliverytype', PYMTID='$xpayment1', QTNKINDATTN='$xkindatt', QTNSUBJECT='$xsubject', QTNREM1='$xpayment2', QTNREM7='$xexcise', QTNREM2='$xtaxation', QTNREM8='$xfreight', QTNREM9='$xinsurance', QTNREM10='$xothcharge', QTNREM3='$xdeliveryat', QTNREM4='$xdeliverydt', QTNREM5='$xvalidity', QTNREM6='$xinstruct' where MRNNO=".$_GET['MRNNO']);

		if($a==1)
		{
			?><script>alert("Record Updated Succssfully.....!"); location.replace("enquirycustomer.php");</script><?php
		}
		else
		{
			?><script>alert("Record Not Updated.....!"); location.replace("enquirycustomer.php");</script><?php
		}
	}
	else if(isset($_POST['btnback']))
	{
		header('location: enquirycustomer.php');
	}
?>

<html>
	<head>
		
		<?php include 'bootstrapres.php'; ?>
				
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<!-- Included  for  Tab -->
		<script src="js/tabcontent.js" type="text/javascript"></script>
    	<link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
		
		<!-- Included  for  Date Picker  -->
		<link rel="stylesheet" type="text/css" media="all" href="js/jsDatePick_ltr.min.css" />
		<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
		
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		$(document).ready(function()
		{
		  $("button.").click(function()
		  {
			$("span").toggle();
		  });
		});
		</script>-->		
		
		<!-- Scripts Starts -->
		<script type="text/javascript">
			
			<!-- Funcrion for Date Picker  -->
			function date()
			{
				new JsDatePick(
				{
					useMode:2,
					target:"xvoudt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"xenqdt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"xlrdt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"xprepdt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"xremovedt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
			};
			
			<!-- Funcrion called when onchage combo box of Tax Code  -->
			function getstval(tableID,thisObject)
			{
				var table=document.getElementById(tableID);
				var rowCount=table.rows.length;
				var cl=thisObject.parentNode;
				var curRow = cl.parentNode.rowIndex;
				var row=table.rows[curRow];
				
				var elem = row.cells[30].childNodes[0].value;
				<?php
					include("dbconnect.php");
					$e=mysql_query("select * from acsst");
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
						?>
						if(elem == "<?php echo $gp; ?>")
						{
							row.cells[31].childNodes[0].value = "<?php echo $stper; ?>";
						}
						<?php
					}
				?> 
			}
			
			function getprodname(tableID,thisObject)
			{
				var table=document.getElementById(tableID);
				var rowCount=table.rows.length;
				var cl=thisObject.parentNode;
				var curRow = cl.parentNode.rowIndex;
				var row=table.rows[curRow];
				
				var elem2 = row.cells[3].childNodes[0].value;
//				alert(elem2);				
				<?php
					include("dbconnect.php");
					$e=mysql_query("select mt_head,mtcd from matmst");
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
						?>
						if(elem == "<?php echo $gp; ?>")
						{
							row.cells[1].childNodes[0].value = "<?php echo $mtcd; ?>";
						}
						<?php
					}
				?> 
			}
						
			function getprodnameOld(tableID,thisObject)
			{
				var table=document.getElementById(tableID);
				var rowCount=table.rows.length;
				var cl=thisObject.parentNode;
				var curRow = cl.parentNode.rowIndex;
				var row=table.rows[curRow];
				
				var elem1 = row.cells[3].childNodes[0].value;
				var elemmtcd = "";
				<?php
					$xyz = '"+eleml+"'; 
					include("dbconnect.php");
					$e=mysql_query("select * from matmst where mt_head='$xyz'");
					$xmtcd = "";
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
						$xmtcd = $db1['mtcd'];
					}
				?>
				alert(<?php echo $xyz; ?>);
//				//if(elem1 == "< ?php echo $mt_head; ?>")
////				{
//					//document.getElementById("xproddescrip["+nos+"]").value = "< ?php echo $mt_head; ?>";
//					row.cells[2].childNodes[0].value = "< ?php echo $mtcd; ?>";
//				//}
//				< ?php
//					}
//				?> 
			}
			function getDemo(tableID)
			{
				try
				{
					var cl=thisObject.parentNode;
					alert(cl+' : '+cl.nodeName);

					var table=document.getElementById(tableID);
					var rowCount=table.rows.length;
					for(var i=0;i<rowCount;i++)
					{
						var row=table.rows[i];
						var txtpqty=row.cells[9].childNodes[0].value;
						alert(txtpqty);
					}
				}
				catch(e)
				{
					alert(e);
				}	
			}
			function getSumNew(tableID,thisObject)
			{
				try
				{
					var table=document.getElementById(tableID);
					var rowCount=table.rows.length;
					var cl=thisObject.parentNode;
					var curRow = cl.parentNode.rowIndex;
					var row=table.rows[curRow];
					
					var pqty = row.cells[9].childNodes[0].value;
					var fqty = row.cells[10].childNodes[0].value;
					var rate = row.cells[13].childNodes[0].value;
					var disc1 = row.cells[15].childNodes[0].value;
					var disc2 = row.cells[16].childNodes[0].value;
					var disc3 = row.cells[18].childNodes[0].value;
					var pandf = row.cells[20].childNodes[0].value;
					var excise = row.cells[22].childNodes[0].value;
					var cess = row.cells[24].childNodes[0].value;
					var hcess = row.cells[26].childNodes[0].value;
					var freight = row.cells[28].childNodes[0].value;
					var othexp = row.cells[29].childNodes[0].value;
					var tax = row.cells[31].childNodes[0].value;
					
					var tqty = Number(pqty)+Number(fqty);
					var val = Number(pqty)*Number(rate);
					var discamt = (Number(val)-Number(disc1))*(Number(disc2)/100);
					var cdisc = (Number(val)-Number(disc1)-Number(discamt))*(Number(disc3)/100);
					var pfamt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc))*(Number(pandf)/100);
					var examt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt))*(Number(excise)/100);
					var cessamt = Number(examt)*(Number(cess)/100);
					var hcessamt = Number(examt)*(Number(hcess)/100);
					var vat = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp))*(Number(tax)/100);
					var total = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp)+Number(vat));
					
					row.cells[11].childNodes[0].value = tqty.toFixed(2);
					row.cells[14].childNodes[0].value = val.toFixed(2);
					row.cells[17].childNodes[0].value = discamt.toFixed(2);
					row.cells[19].childNodes[0].value = cdisc.toFixed(2);
					row.cells[21].childNodes[0].value = pfamt.toFixed(2);
					row.cells[23].childNodes[0].value = examt.toFixed(2);
					row.cells[25].childNodes[0].value = cessamt.toFixed(2);
					row.cells[27].childNodes[0].value = hcessamt.toFixed(2);
					//row.cells[28].childNodes[0].value = freight.toFixed(2);
					//row.cells[29].childNodes[0].value = othexp.toFixed(2);
					row.cells[32].childNodes[0].value = vat.toFixed(2);
					row.cells[33].childNodes[0].value = total.toFixed(2);
					
					var valtotal = 0;
					var schtotal = 0;
					var disctotal = 0;
					var cdisctotal = 0;
					var pandftotal = 0;
					var exctotal = 0;
					var cesstotal = 0;
					var hcesstotal = 0;
					var freighttotal = 0;
					var othexptotal = 0;
					var vattotal = 0;

					for(var i=1; i<rowCount; i++)
					{
						var rowNew=table.rows[i];
						
						var curVal = Number(rowNew.cells[14].childNodes[0].value);
						var curSch = Number(rowNew.cells[15].childNodes[0].value);
						var curDisc = Number(rowNew.cells[17].childNodes[0].value);
						var curCdisc = Number(rowNew.cells[19].childNodes[0].value);
						var curPandf = Number(rowNew.cells[21].childNodes[0].value);
						var curExc = Number(rowNew.cells[23].childNodes[0].value);
						var curCess = Number(rowNew.cells[25].childNodes[0].value);
						var curHcess = Number(rowNew.cells[27].childNodes[0].value);
						var curFre = Number(rowNew.cells[28].childNodes[0].value);
						var curOth = Number(rowNew.cells[29].childNodes[0].value);
						var curVat = Number(rowNew.cells[32].childNodes[0].value);
						
						valtotal = valtotal + curVal;
						schtotal = schtotal + curSch;
						disctotal = disctotal + curDisc;
						cdisctotal = cdisctotal + curCdisc;
						pandftotal = pandftotal + curPandf;
						exctotal = exctotal + curExc;
						cesstotal = cesstotal + curCess;
						hcesstotal = hcesstotal + curHcess;
						freighttotal = freighttotal + curFre;
						othexptotal = othexptotal + curOth;
						vattotal = vattotal + curVat;
					}
					document.getElementById("xbasicamt").value = valtotal.toFixed(2);
					document.getElementById("xschemeamt").value = schtotal.toFixed(2);
					document.getElementById("xdiscountamt").value = disctotal.toFixed(2);
					document.getElementById("xcashamt").value = cdisctotal.toFixed(2);
					document.getElementById("xpackamt").value = pandftotal.toFixed(2);
					document.getElementById("xexciseamt").value = exctotal.toFixed(2);
					document.getElementById("xeducessamt").value = cesstotal.toFixed(2);
					document.getElementById("xsheducessamt").value = hcesstotal.toFixed(2);
					document.getElementById("xfreightamt").value = freighttotal.toFixed(2);
					document.getElementById("xothexpamt").value = othexptotal.toFixed(2);
					document.getElementById("xvatamt").value = vattotal.toFixed(2);
					
					var grandtotal = valtotal - schtotal - disctotal - cdisctotal + pandftotal + exctotal + cesstotal + hcesstotal + freighttotal + othexptotal + vattotal;
					var grandRoundTotal =  Math.round(grandtotal);
					var roff = grandRoundTotal-grandtotal;
					
					document.getElementById("xrondamt").value = roff.toFixed(2);
					document.getElementById("xgrandtotal").value = grandRoundTotal.toFixed(2);
					
					//alert(cl+' : '+cl.rowIndex);
//					for(var i=0;i<rowCount;i++)
//					{
//						var row=table.rows[i];
//						var txtpqty=row.cells[9].childNodes[0].value;
//					}
				}
				catch(e)
				{
					alert(e);
				}	
			}
			function getSumOld2(xx)
			{
				var nm  = xx.name;
			    var pos1 = nm.lastIndexOf("[")+1;				
			    var pos2 = nm.lastIndexOf("]")+1;								
				var nos = nm.substr(pos1,pos2-pos1-1);
				alert(nm);
				var pqty = document.getElementById("xprodqty["+nos+"]").value;
				var fqty = document.getElementById("xprodfreeqty["+nos+"]").value;
				var rate = document.getElementById("xprodrate["+nos+"]").value;
				var disc1 = document.getElementById("xproddisc1["+nos+"]").value;
				var disc2 = document.getElementById("xproddisc2["+nos+"]").value;
				var disc3 = document.getElementById("xproddisc3["+nos+"]").value;
				var pandf = document.getElementById("xprodpandf["+nos+"]").value;
				var excise = document.getElementById("xprodexcise["+nos+"]").value;
				var cess = document.getElementById("xprodcess["+nos+"]").value;
				var hcess = document.getElementById("xprodhcess["+nos+"]").value;
				var freight = document.getElementById("xprodfreight["+nos+"]").value;
				var othexp = document.getElementById("xprodothexp["+nos+"]").value;
				var tax = document.getElementById("xprodtax["+nos+"]").value;
				
				var tqty = Number(pqty)+Number(fqty);
				var val = Number(pqty)*Number(rate);
				var discamt = (Number(val)-Number(disc1))*(Number(disc2)/100);
				var cdisc = (Number(val)-Number(disc1)-Number(discamt))*(Number(disc3)/100);
				var pfamt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc))*(Number(pandf)/100);
				var examt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt))*(Number(excise)/100);
				var cessamt = Number(examt)*(Number(cess)/100);
				var hcessamt = Number(examt)*(Number(hcess)/100);
				var vat = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp))*(Number(tax)/100);
				var total = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp)+Number(tax));
				
				document.getElementById("xprodtotalqty["+nos+"]").value = tqty;
				document.getElementById("xprodvalue["+nos+"]").value = val;
				document.getElementById("xproddiscamt["+nos+"]").value = discamt;
				document.getElementById("xprodcdisc["+nos+"]").value = cdisc;
				document.getElementById("xprodpfamt["+nos+"]").value = pfamt;
				document.getElementById("xprodexcamt["+nos+"]").value = examt;
				document.getElementById("xprodcessamt["+nos+"]").value = cessamt;
				document.getElementById("xprodhcessamt["+nos+"]").value = hcessamt;
				document.getElementById("xprodvat["+nos+"]").value = vat;
				document.getElementById("xprodtotal["+nos+"]").value = total;
				
			}			
			<!-- Funcrion called when onchage of Object  -->
			function getSumOld()
			{
				var pqty = document.getElementById("xprodqty").value;
				var fqty = document.getElementById("xprodfreeqty").value;
				var rate = document.getElementById("xprodrate").value;
				var disc1 = document.getElementById("xproddisc1").value;
				var disc2 = document.getElementById("xproddisc2").value;
				var disc3 = document.getElementById("xproddisc3").value;
				var pandf = document.getElementById("xprodpandf").value;
				var excise = document.getElementById("xprodexcise").value;
				var cess = document.getElementById("xprodcess").value;
				var hcess = document.getElementById("xprodhcess").value;
				var freight = document.getElementById("xprodfreight").value;
				var othexp = document.getElementById("xprodothexp").value;
				var tax = document.getElementById("xprodtax").value;
				
				var tqty = Number(pqty)+Number(fqty);
				var val = Number(pqty)*Number(rate);
				var discamt = (Number(val)-Number(disc1))*(Number(disc2)/100);
				var cdisc = (Number(val)-Number(disc1)-Number(discamt))*(Number(disc3)/100);
				var pfamt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc))*(Number(pandf)/100);
				var examt = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt))*(Number(excise)/100);
				var cessamt = Number(examt)*(Number(cess)/100);
				var hcessamt = Number(examt)*(Number(hcess)/100);
				var vat = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp))*(Number(tax)/100);
				var total = (Number(val)-Number(disc1)-Number(discamt)-Number(cdisc)+Number(pfamt)+Number(examt)+Number(cessamt)+Number(hcessamt)+Number(freight)+Number(othexp)+Number(tax));
																																
				document.getElementById("xprodtotalqty").value = tqty;
				document.getElementById("xprodvalue").value = val;
				document.getElementById("xproddiscamt").value = discamt;
				document.getElementById("xprodcdisc").value = cdisc;
				document.getElementById("xprodpfamt").value = pfamt;
				document.getElementById("xprodexcamt").value = examt;
				document.getElementById("xprodcessamt").value = cessamt;
				document.getElementById("xprodhcessamt").value = hcessamt;
				document.getElementById("xprodvat").value = vat;
				document.getElementById("xprodtotal").value = total;
			}
						
			<!-- Funcrion called For Product Detail Additiion Creates Gird Format -->
			<!-- Grid/Table Starts -->
			function addRow(tableID)
			{
				var addrow = document.getElementById("xaddrow").value;
				for (var ii = 1; ii <= addrow; ii++)
				{
					var table=document.getElementById(tableID);
					var rowCount=table.rows.length;
					var row=table.insertRow(rowCount);
					var colCount=table.rows[1].cells.length;
				
					for(var i=0;i<colCount;i++)
					{
						var newcell=row.insertCell(i);
						newcell.innerHTML=table.rows[1].cells[i].innerHTML;
						switch(newcell.childNodes[0].type)
						{
							case"text":newcell.childNodes[0].value="";
							break;
							case"checkbox":newcell.childNodes[0].checked=false;
							break;
							case"select-one":newcell.childNodes[0].selectedIndex=0;
							break;
						}
					}
				}
			}
			function deleteRow(tableID)
			{
				try
				{
					var table=document.getElementById(tableID);
					var rowCount=table.rows.length;
					for(var i=0;i<rowCount;i++)
					{
						var row=table.rows[i];
						var chkbox=row.cells[0].childNodes[0];
						if(null!=chkbox&&true==chkbox.checked)
						{
							if(rowCount<=2)
							{
								alert("Cannot delete all the rows.");
								break;
							}
							table.deleteRow(i);
							rowCount--;
							i--;
						}
					}
				}
				catch(e)
				{
					alert(e);
				}
			}
			<!-- Grid/Table Ends -->
			
		</script>
		<!-- Scripts End -->

		<!-- Style Sheet Defination  Starts-->
		<style>
		select
		{
			height:30px;
			margin-bottom:10px;
		}
		input[type='text'] 
		{
			height:30px;
			vertical-align:middle;
		}
		#tbl1 input[type='text'] 
		{
			width:80px;
			height:30px;
			vertical-align:middle;
		}
		#tbl2 input[type='text'] 
		{
			width:350px;
			height:30px;
			vertical-align:middle;
		}
		#tbl2 td
		{
			padding-left:25px;
			padding-right:15px;
		}
		button
		{
			border:1px solid #999999;
			font-size:13px;
			font-family:Arial;
			padding: 2px 7px 2px 6px;
			color: #080808;
			background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f5f5), to(#dfdddd));
		}
		button:hover
		{
			border:1px solid #666666;
			color:#000000;
		}
		</style>

		<!-- Style Sheet Ends here -->

	</head>
	
	<body>
		<!-- Main DIV Starts Here -->
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			<?php include 'menu.php'; ?>
			<br>

			<!-- Form Starts -->

			<form method="post">

			    <!--Centers ALl Contenrs of the form Starts-->
				<center>
			  	<?php
				     $xFldSHow = "YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";
					
					if(isset($_GET['MRNNO']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from eqcmast where MRNNO=".$_GET['MRNNO']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
							$customername = $AC_HEAD;
						}
					}
				?>
				<!--Tab Starts div-->				
				<div>
					<!--Tab Menu Starts-->	
							<ul class="tabs" data-persist="false">
								<li><a href="#voucher">Voucher Details</a></li>
								<li><a href="#add">Additional Levies</a></li>
								<li><a href="#other">Other Information</a></li>
								<li><a href="#enqinfo">Enquiry/Quotation Info</a></li>
							</ul>
				  <!--Tab Menu Ends-->		
				  
				  <!--Tab Contents Starts-->
				  <div class="tabcontent">
				
					    <!--Scroll DIV Starts-->
						<div style="height:560px; overflow-y:scroll">
						
  <!--1st Tab Starts-->	<div id="voucher" >
									
									<table align="center" cellpadding="5" >
										<tr>
											<td>Voucher No : </td>
											<td>
												<input type="text" name="xvouno" value="<?php echo $VOU_NO; ?>" />&nbsp;&nbsp; 
												Date : <input type="text" id="xvoudt" name="xvoudt" value="<?php echo $VOU_DT; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;"/>
											</td>
										</tr>
										<tr>
											<td>Enquiry No : </td>
											<td>
												<input type="text" name="xenqno" value="<?php echo $MRNNO; ?>" />&nbsp;&nbsp; 
												Date : <input type="text" id="xenqdt" name="xenqdt" value="<?php echo $ENQ_DT; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;"/>
											</td>
										</tr>
										<tr>
											<td>Customer Name : </td>
											<td>
												<select id="xcustname" name="xcustname" value="<?php echo $AC_HEAD; ?>" style="width:360px;">
												<?php
													include('dbconnect.php');
													$sql = "SELECT * FROM acmst where custcd LIKE 'DB%' Order By ac_head";
													$rs = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rs))
													{
														if($customername == $row["ac_head"])
														{
															echo "<option selected value='".$row["ac_head"]."'>".$row["ac_head"]."</option>";
														}
														else
														{
															echo "<option value='".$row["ac_head"]."'>".$row["ac_head"]."</option>";
														}
													}
													mysql_free_result($rs);
												?>
											  	</select>&nbsp;
											</td>
										</tr>
									</table>
									<!--<a href="editproddescrip.php" class="iframe" style="float:left; margin-left:10%;">Add New Product</a>-->
										
									<span style="float:left; margin-left:10%;">
										Add New Products :
										<input type="text" name="xaddrow" id="xaddrow" style="width:50px; height:25px; vertical-align:top;" />
										<input type="button" value="Add" onClick="addRow('dataTable')">
										<input type="button" value="Delete" onClick="deleteRow('dataTable')">
									</span>
									<span style="float:left; margin-left:17%;">Product Description</span>
										
									<div style="overflow:auto; width:80%; max-height:270px;">
									
										<!--<div style="width:4085px">-->
										<table id="dataTable" align="left" id="tablehead" border="1" cellspacing="0" cellpadding="5" align="center" >
											<tr bgcolor="grey" align="center" style="color:white;">
												<td></td>
												<td>Sr.No</td>
												<td>Product Code</td>
												<td>Product Description</td>
												<td>Description</td>
												<td>Description 1</td>
												<td>Description 2</td>
												<td>Description 3</td>
												<td>UOM</td>
												<td>Qty</td>
												<td>Free Qty</td>
												<td>Total Qty</td>
												<td>MRP</td>
												<td>Rate</td>
												<td>Value</td>
												<td>Disc 1 %</td>
												<td>Disc 2 %</td>
												<td>Discamt</td>
												<td>Disc 3 %</td>
												<td>cdisc</td>
												<td>P and F</td>
												<td>P and F Amount</td>
												<td>Excise</td>
												<td>Excise Amount</td>
												<td>CESS</td>
												<td>CESS Amount</td>
												<td>HCESS</td>
												<td>HCESS Amount</td>
												<td>Freight</td>
												<td>Oth Exp</td>
												<td>Tax Code</td>
												<td>Tax</td>
												<td>VAT</td>
												<td>Total</td>
											</tr>
<!-- paste here-->

										<?php
											if(isset($_GET['MRNNO']))
											{
												extract($_GET);
												include("dbconnect.php");
												$e=mysql_query("select * from eqctrans where MRNNO=".$_GET['MRNNO']." Order By SRNO");
												while($db1=mysql_fetch_array($e))
												{
													extract($db1);
													$productcode = $MTCD;
													$productdescrip = $MT_HEAD;
													$productuom = $UOM;
													$producttaxcode = $F;
													?>
											<tr>
												<td><input type="checkbox" name="chk"></td>
												<td><input type="text" readonly id="xprodsrno" name="xprodsrno[]" value="<?php echo $SRNO; ?>" style="width:60px; cursor:default; text-align:right;" /></td>
												<!--<td><input type="text" id="xprodcode" name="xprodcode[]" value="< ?php echo $MTCD; ?>" style="width:100px; cursor:default; text-align:right;" /></td>-->
												<td><select id="xprodcode" name="xprodcode[]" onChange="javascript:getprodname('dataTable',this);" style="width:120px;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$sql = "SELECT mtcd FROM matmst Order By mt_head";
													$rs = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rs))
													{
														if($productcode == $row["mtcd"])
														{
															echo "<option selected value='".$row["mtcd"]."'>".$row["mtcd"]."</option>";
														}
														else
														{
															echo "<option value='".$row["mtcd"]."'>".$row["mtcd"]."</option>";
														}
													}
													mysql_free_result($rs);
													?></select></td>
												<td><select id="xproddesc" name="xproddesc[]" onChange="javascript:getprodname('dataTable',this);" style="width:360px;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$sql = "SELECT * FROM matmst Order By mt_head";
													$rs = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rs))
													{
														if($productdescrip == $row["mt_head"])
														{
															echo "<option selected value='".$row["mt_head"]."'>".$row["mt_head"]."</option>";
														}
														else
														{
															echo "<option value='".$row["mt_head"]."'>".$row["mt_head"]."</option>";
														}
													}
													mysql_free_result($rs);
													?>
													</select></td>
												<td><input type="text" id="xproddescrip" name="xproddescrip[]" value="<?php echo $DESCRIP; ?>" style="width:100px;" /></td>
												
												<td><input type="text" id="xproddescrip1" name="xproddescrip1[]" value="<?php echo $DESCRIP1; ?>" style="width:100px;" /></td>
												<td><input type="text" id="xproddescrip2" name="xproddescrip2[]" value="<?php echo $DESCRIP2; ?>" style="width:100px;" /></td>
												<td><input type="text" id="xproddescrip3" name="xproddescrip3[]" value="<?php echo $DESCRIP3; ?>" style="width:100px;" /></td>
												<td><select id="xproduom" name="xproduom[]" style="width:auto;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$sql = "SELECT uom FROM uom Order By uom";
													$rs = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rs))
													{
														if($productuom == $row["uom"])
														{
															echo "<option selected value='".$row["uom"]."'>".$row["uom"]."</option>";
														}
														else
														{
															echo "<option value='".$row["uom"]."'>".$row["uom"]."</option>";
														}
													}
													mysql_free_result($rs);
													?></select></td>
												<td><input type="text" id="xprodqty" name="xprodqty[]" value="<?php echo $PQTY; ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodfreeqty" name="xprodfreeqty[]" value="<?php echo $FQTY; ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodtotalqty" name="xprodtotalqty[]" value="<?php echo $QTY; ?>" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodmrp" name="xprodmrp[]" value="<?php echo number_format($MRP,2); ?>" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodrate" name="xprodrate[]" value="<?php echo number_format($RATE,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodvalue" name="xprodvalue[]" value="<?php echo number_format($VALUE,2); ?>"  style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xproddisc1" name="xproddisc1[]" value="<?php echo number_format($SCHAMT,2); ?>" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xproddisc2" name="xproddisc2[]" value="<?php echo number_format($DP,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xproddiscamt" name="xproddiscamt[]" value="<?php echo number_format($DISCAMT,2); ?>" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xproddisc3" name="xproddisc3[]" value="<?php echo number_format($CDP,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodcdisc" name="xprodcdisc[]" value="<?php echo number_format($CDISC,2); ?>" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodpandf" name="xprodpandf[]" value="<?php echo number_format($PFPER,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodpfamt" name="xprodpfamt[]" value="<?php echo number_format($PFAMT,2); ?>" style="width:150px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodexcise" name="xprodexcise[]" value="<?php echo number_format($EXPER,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodexcamt" name="xprodexcamt[]" value="<?php echo number_format($EXCAMT,2); ?>" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodcess" name="xprodcess[]" value="<?php echo number_format($CESSPER,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodcessamt" name="xprodcessamt[]" value="<?php echo number_format($CESSAMT,2); ?>" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodhcess" name="xprodhcess[]" value="<?php echo number_format($HCESSPER,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodhcessamt" name="xprodhcessamt[]" value="<?php echo number_format($HCESSAMT,2); ?>" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodfreight" name="xprodfreight[]" value="<?php echo number_format($FRTCHG,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodothexp" name="xprodothexp[]" value="<?php echo number_format($OTHEXP,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><select id="xprodtaxcode" name="xprodtaxcode[]" onBlur="javascript:getSumNew('dataTable',this);" onChange="javascript:getstval('dataTable',this);" style="width:67.5px;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$sql = "SELECT gp FROM acsst Order By gp";
													$rs = mysql_query($sql) or die(mysql_error());
													while($row = mysql_fetch_array($rs))
													{
														if($producttaxcode == $row["gp"])
														{
															echo "<option selected value='".$row["gp"]."'>".$row["gp"]."</option>";
														}
														else
														{
															echo "<option value='".$row["gp"]."'>".$row["gp"]."</option>";
														}
													}
													mysql_free_result($rs);
													?></select></td>
												<td><input type="text" readonly id="xprodtax" name="xprodtax[]" value="<?php echo $STP; ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodvat" name="xprodvat[]" value="<?php echo number_format($SLSTAX,2); ?>" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodtotal" name="xprodtotal[]" value="<?php echo number_format($AMOUNT,2); ?>" style="width:100px; text-align:right;" /></td>
											</tr>
											<?php
												}
											}
											else
											{
											?>
											<tr>
												<td><input type="checkbox" name="chk"></td>
												<td><input type="text" readonly id="xprodsrno" name="xprodsrno[]" style="width:60px; cursor:default; text-align:right;" /></td>
												<td><select id="xprodcode" name="xprodcode[]" onChange="javascript:getprodname('dataTable',this);" style="width:120px;">
													<option value="--">--</option><?php 
													include("dbconnect.php");
													$mq = mysql_query("SELECT mtcd FROM matmst Order By mt_head") or die(mysql_error());
													while($mfa = mysql_fetch_array($mq))
													{echo "<option value=".$mfa["mtcd"].">".$mfa["mtcd"]."</option>";}
												 ?></select></td>
												<td><select id="xproddesc" name="xproddesc[]" style="width:360px;">
													<option value="--">--</option><?php 
													include("dbconnect.php");
													$mq = mysql_query("SELECT mt_head FROM matmst Order By mt_head") or die(mysql_error());
													while($mfa = mysql_fetch_array($mq))
													{echo "<option value=".$mfa["mt_head"].">".$mfa["mt_head"]."</option>";}
												 ?></select></td>
												<td><input type="text" id="xproddescrip" name="xproddescrip[]" style="width:100px;" /></td>
												
												<td><input type="text" id="xproddescrip1" name="xproddescrip1[]" style="width:100px;" /></td>
												<td><input type="text" id="xproddescrip2" name="xproddescrip2[]" style="width:100px;" /></td>
												<td><input type="text" id="xproddescrip3" name="xproddescrip3[]" style="width:100px;" /></td>
												<td><select id="xproduom" name="xproduom[]" style="width:auto;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$mq = mysql_query("SELECT * FROM uom Order By uom") or die(mysql_error());
													while($mfa = mysql_fetch_array($mq))
													{echo "<option value=".$mfa["uom"].">".$mfa["uom"]."</option>";}
												?></select></td>
												<td><input type="text" id="xprodqty" name="xprodqty[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodfreeqty" name="xprodfreeqty[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodtotalqty" name="xprodtotalqty[]" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodmrp" name="xprodmrp[]" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodrate" name="xprodrate[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodvalue" name="xprodvalue[]" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xproddisc1" name="xproddisc1[]" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xproddisc2" name="xproddisc2[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xproddiscamt" name="xproddiscamt[]" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xproddisc3" name="xproddisc3[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodcdisc" name="xprodcdisc[]" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodpandf" name="xprodpandf[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodpfamt" name="xprodpfamt[]" style="width:150px; cursor:default;" /></td>
												<td><input type="text" id="xprodexcise" name="xprodexcise[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodexcamt" name="xprodexcamt[]" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodcess" name="xprodcess[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodcessamt" name="xprodcessamt[]" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodhcess" name="xprodhcess[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" readonly id="xprodhcessamt" name="xprodhcessamt[]" style="width:140px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodfreight" name="xprodfreight[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodothexp" name="xprodothexp[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><select id="xprodtaxcode" name="xprodtaxcode[]" onBlur="javascript:getSumNew('dataTable',this);" onChange="javascript:getstval('dataTable',this);" style="width:67.5px;">
													<option value="--">--</option><?php
													include("dbconnect.php");
													$mq = mysql_query("SELECT gp FROM acsst Order By gp") or die(mysql_error());
													while($mfa = mysql_fetch_array($mq))
													{echo "<option value=".$mfa["gp"].">".$mfa["gp"]."</option>";}
												?></select></td>
												<td><input type="text" readonly id="xprodtax" name="xprodtax[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; cursor:default; text-align:right;" /></td>
												<td><input type="text" id="xprodvat" name="xprodvat[]" onBlur="javascript:getSumNew('dataTable',this);" style="width:100px; text-align:right;" /></td>
												<td><input type="text" id="xprodtotal" name="xprodtotal[]" style="width:100px; text-align:right;" /></td>
											</tr>
											<?php
											}
										?>
										</table>
									</div>
									<br>
									
									<table align="center" cellpadding="5" >
										<tr>
											<td width="130px">Remark : </td><td colspan="2"><input type="text" name="xremark" style="width:360px;" /></td>
										</tr>
									</table>
	<!--1st Tab Ends-->	</div>
										
										<?php
											if(isset($_GET['MRNNO']))
											{
												extract($_GET);
												include("dbconnect.php");
												$e=mysql_query("select * from eqcmast where MRNNO=".$_GET['MRNNO']);
												while($db1=mysql_fetch_array($e))
												{
													extract($db1);
												}
											}
										?>
										
	<!--2nd Tab Starts--><div id="add">
									<table id="tbl1" align="center">
										<tr style="font-size:18px;">
											<td width="200px">Description</td>
											<td>%</td>
											<td>Amount</td>
											<td>Grp</td>
										</tr>
										<tr>
											<td>Basic Value : </td>
											<td><input type="text" id="xbasicper" name="xbasicper" value="<?php echo $xbasicper; ?>" /></td>
											<td><input type="text" id="xbasicamt" name="xbasicamt" value="<?php echo number_format($MVALUE,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xbasicgrp" name="xbasicgrp" value="<?php echo $xbasicgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Scheme : </td>
											<td><input type="text" id="xschemeper" name="xschemeper" value="<?php echo $xschemeper; ?>" /></td>
											<td><input type="text" id="xschemeamt" name="xschemeamt" value="<?php echo number_format($MDP,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xschemegrp" name="xschemegrp" value="<?php echo $xschemegrp; ?>" /></td>
										</tr>
										<tr>
											<td>Discount 1 : </td>
											<td><input type="text" id="xdiscountper" name="xdiscountper" value="<?php echo $xdiscountper; ?>" /></td>
											<td><input type="text" id="xdiscountamt" name="xdiscountamt" value="<?php echo number_format($MDISC,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xdiscountgrp" name="xdiscountgrp" value="<?php echo $xdiscountgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Cash Discount : </td>
											<td><input type="text" id="xcashper" name="xcashper" value="<?php echo $xcashper; ?>" /></td>
											<td><input type="text" id="xcashamt" name="xcashamt" value="<?php echo number_format($MCDISC,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xcashgrp" name="xcashgrp" value="<?php echo $xcashgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Special Discount 1 : </td>
											<td><input type="text" id="xspecial1per" name="xspecial1per" value="<?php echo $xspecial1per; ?>" /></td>
											<td><input type="text" id="xspecial1amt" name="xspecial1amt" value="<?php echo number_format($xspecial1amt,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xspecial1grp" name="xspecial1grp" value="<?php echo $xspecial1grp; ?>" /></td>
										</tr>
										<tr>
											<td>Special Discount 2 : </td>
											<td><input type="text" id="xspecial2per" name="xspecial2per" value="<?php echo $xspecial2per; ?>" /></td>
											<td><input type="text" id="xspecial2amt" name="xspecial2amt" value="<?php echo number_format($xspecial2amt,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xspecial2grp" name="xspecial2grp" value="<?php echo $xspecial2grp; ?>" /></td>
										</tr>
										<tr>
											<td>Packing and Forwarding : </td>
											<td><input type="text" id="xpackper" name="xpackper" value="<?php echo $xpackper; ?>" /></td>
											<td><input type="text" id="xpackamt" name="xpackamt" value="<?php echo number_format($MPFAMT,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xpackgrp" name="xpackgrp" value="<?php echo $xpackgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Excise Duty : </td>
											<td><input type="text" id="xexciseper" name="xexciseper" value="<?php echo $xexciseper; ?>" /></td>
											<td><input type="text" id="xexciseamt" name="xexciseamt" value="<?php echo number_format($MEXCAMT,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xexcisegrp" name="xexcisegrp" value="<?php echo $xexcisegrp; ?>" /></td>
										</tr>
										<tr>
											<td>Education Cess : </td>
											<td><input type="text" id="xeducessper" name="xeducessper" value="<?php echo $xeducessper; ?>" /></td>
											<td><input type="text" id="xeducessamt" name="xeducessamt" value="<?php echo number_format($MCESSAMT,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xeducessgrp" name="xeducessgrp" value="<?php echo $xeducessgrp; ?>" /></td>
										</tr>
										<tr>
											<td>SH Edu. Cess : </td>
											<td><input type="text" id="xsheducessper" name="xsheducessper" value="<?php echo $xsheducessper; ?>" /></td>
											<td><input type="text" id="xsheducessamt" name="xsheducessamt" value="<?php echo number_format($MHCESSAMT,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xsheducessgrp" name="xsheducessgrp" value="<?php echo $xsheducessgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Freight : </td>
											<td><input type="text" id="xfreightper" name="xfreightper" value="<?php echo $xfreightper; ?>" /></td>
											<td><input type="text" id="xfreightamt" name="xfreightamt" value="<?php echo number_format($MFRTCHG,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xfreightgrp" name="xfreightgrp" value="<?php echo $xfreightgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Oth Exp : </td>
											<td><input type="text" id="xothexpper" name="xothexpper" value="<?php echo $xothexpper; ?>" /></td>
											<td><input type="text" id="xothexpamt" name="xothexpamt" value="<?php echo number_format($MOTHEXP,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xothexpgrp" name="xothexpgrp" value="<?php echo $xothexpgrp; ?>" /></td>
										</tr>
										<tr>
											<td>VAT/CST : </td>
											<td><input type="text" id="xvatper" name="xvatper" value="<?php echo $xvatper; ?>" /></td>
											<td><input type="text" id="xvatamt" name="xvatamt" value="<?php echo number_format($MSLSTAX,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xvatgrp" name="xvatgrp" value="<?php echo $xvatgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Ronding Off : </td>
											<td><input type="text" id="xrondper" name="xrondper" value="<?php echo $xrondper; ?>" /></td>
											<td><input type="text" id="xrondamt" name="xrondamt" value="<?php echo number_format($ROFF,2); ?>" style="width:150px; text-align:right;" /></td>
											<td><input type="text" id="xrondgrp" name="xrondgrp" value="<?php echo $xrondgrp; ?>" /></td>
										</tr>
										<tr style="font-size:18px;">
											<td>Grand Total : </td>
											<td></td>
											<td><input type="text" id="xgrandtotal" name="xgrandtotal" value="<?php echo number_format($MAMOUNT,2); ?>" style="width:150px; text-align:right;" /></td>
											<td></td>
										</tr>
									</table>
	<!--2nd Tab Ends-->	</div>
	
	<!--3rd Tab Starts--><div id="other">
									<table id="tbl" align="center" cellpadding="5" >
										<tr>
											<td>LR No : </td>
											<td colspan="2"><input type="text" name="xlrno" value="<?php echo $LRNO; ?>" style="width:260px;" /></td>
											<td><input type="text" id="xlrdt" name="xlrdt" value="<?php echo $LRDT; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;" /></td>
										</tr>
										<tr>
											<td>Transporter : </td><td colspan="3"><input type="text" name="xtransporter" value="<?php echo $TRANSPORT; ?>" style="width:400px;" /></td>
										</tr>
										<tr>
											<td>Vehicle No : </td><td colspan="2"><input type="text" name="xvehicle" value="<?php echo $VEHNO; ?>" style="width:260px;" /></td>
										</tr>
										<tr>
											<td>Prep. Date : </td><td><input type="text" id="xprepdt" name="xprepdt" value="<?php echo $PREPDATE; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;" /></td>
											<td>Prep. Time : </td>
											<td>
												<input type="text" id="xpreptime" name="xpreptime" class="timepicker" value="<?php echo $PREPTIME; ?>" style="width:100px;" />
											</td>
										</tr>
										<tr>
											<td>Removal Date : </td><td><input type="text" id="xremovedt" name="xremovedt" value="<?php echo $REMVDATE; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;" /></td>
											<td>Removal Time : </td>
											<td>
												<input type="text" id="xremovetime" name="xremovetime" class="timepicker" value="<?php echo $REMVTIME; ?>" style="width:100px;" />
											</td>
										</tr>
										<tr>
											<td>Despatch Mode : </td>
											<td colspan="3">
												<select name="xdespatch" value="<?php echo $DESPID; ?>" style="width:400px;">
													<option>--</option>
													<option value="By Air">By Air</option>
													<option value="By Courier">By Courier</option>
													<option value="By Rail">By Rail</option>
													<option value="By Road">By Road</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Delivery Type : </td>
											<td colspan="3">
												<select name="xdeliverytype" value="<?php echo $DELVID; ?>" style="width:400px;">
													<option>--</option>
													<option value="Counter Delivery">Counter Delivery</option>
													<option value="Door Delivery">Door Delivery</option>
													<option value="Godown Delivery">Godown Delivery</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>Payment Term : </td>
											<td colspan="3">
												<select name="xpayment1" value="<?php echo $PYMTID; ?>" style="width:400px;">
													<option>--</option>
													<option value="15 Days">15 Days</option>
													<option value="45 Days">45 Days</option>
													<option value="60 Days">60 Days</option>
												</select>
											</td>
										</tr>
									</table>
	<!--3rd Tab Ends-->	</div>
	
	<!--4th Tab Starts--><div id="enqinfo">
									<table id="tbl2" align="center" >
										<tr>
											<td>Kind Attention : </td><td><input type="text" name="xkindatt" value="<?php echo $QTNKINDATTN; ?>" /></td>
										</tr>
										<tr>
											<td>Subject : </td><td><input type="text" name="xsubject" value="<?php echo $QTNSUBJECT; ?>" /></td>
										</tr>
										<tr>
											<td>Payment Terms : </td><td><input type="text" name="xpayment2" value="<?php echo $QTNREM1; ?>" /></td>
										</tr>
										<tr>
											<td>Excise Duty : </td><td><input type="text" name="xexcise" value="<?php echo $QTNREM7; ?>" /></td>
										</tr>
										<tr>
											<td>Taxation (VAT/CST) : </td><td><input type="text" name="xtaxation" value="<?php echo $QTNREM2; ?>" /></td>
										</tr>
										<tr>
											<td>Freight : </td><td><input type="text" name="xfreight" value="<?php echo $QTNREM8; ?>" /></td>
										</tr>
										<tr>
											<td>Insurance : </td><td><input type="text" name="xinsurance" value="<?php echo $QTNREM9; ?>" /></td>
										</tr>
										<tr>
											<td>Other Charges : </td><td><input type="text" name="xothcharge" value="<?php echo $QTNREM10; ?>" /></td>
										</tr>
										<tr>
											<td>Delivery At : </td><td><input type="text" name="xdeliveryat" value="<?php echo $QTNREM3; ?>" /></td>
										</tr>
										<tr>
											<td>Transporter : </td><td><input type="text" name="xtransport" value="<?php echo $TRANSPORT; ?>" /></td>
										</tr>
										<tr>
											<td>Delivery Date : </td><td><input type="text" name="xdeliverydt" value="<?php echo $QTNREM4; ?>" /></td>
										</tr>
										<tr>
											<td>Validity : </td><td><input type="text" name="xvalidity" value="<?php echo $QTNREM5; ?>" /></td>
										</tr>
										<tr>
											<td>Special Instructions : </td><td><input type="text" name="xinstruct" value="<?php echo $QTNREM6; ?>" /></td>
										</tr>
									</table>
	<!--4th Tab Ends-->	</div>
	
								<?php
								if(isset($_GET['MRNNO']))
								{
									?>
									<input type="submit" value="Update" name="btnupd" />
									<?php
								}
								else
								{
									?>
									<input type="submit" value="Save" name="btnsave" />
									<?php
								}
								?>
								&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnback" value="Back" />
	<!--Tab Contents Ends--></div>
	
				  </div>
					<!--Tab Ends div-->

				</div>
			    <!--Scroll DIV Ends-->
			</center>
		    <!--Centers ALl Contenrs of the form Ends-->

			</form>
			<!-- Form Starts -->
		</div>
		<!-- Main DIV Ends Here -->
	</body>
	
	<?php include 'footer.php'; ?>
	
</html>
<?php
}
else
{
	header('location: index.php');
}
?>

<!--				</table>
				</div>
				<table id="dataTable" border="1" cellspacing="0" cellpadding="5" align="center" >
												< ?Php
												if(substr($xFldShow,6,1)=="Y")
												{
													echo"<td width='144px'>Description 1</td>";
												}
												?>
												< ?php
												if(substr($xFldShow,6,1)=="Y")
												{
													echo"<td><input type='text' id='xproddescrip1' name='xproddescrip1[]' value=' echo $DESCRIP1;' style='width:100px' /></td>";
												}
												?>
												
												< ?Php
												if(substr($xFldShow,6,1)=="Y")
												{
													echo"<td><input type='text' id='xproddescrip1' name='xproddescrip1[]' style='width:100px;' /></td>";
												}
												?>
-->