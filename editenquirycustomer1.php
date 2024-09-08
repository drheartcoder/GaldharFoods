<?php

session_start();

if($_SESSION['name'])
{
?>

<?php

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
        $xvouno = "EC01010010".str_pad($yvouno+1,6,"0",STR_PAD_LEFT);
		echo $xvouno;   

//		include("dbconnect.php");
//		$a=mysql_query("insert into eqcmast(VOU_NO, VOU_DT, ENQ_NO, ENQ_DT, AC_HEAD, xbasicper, xbasicamt, xbasicgrp, xschemeper, xschemeamt, xschemegrp, xdiscountper, xdiscountamt, xdiscountgrp, xcashper, xcashamt, xcashgrp, xspecial1per, xspecial1amt, xspecial1grp, xspecial2per, xspecial2amt, xspecial2grp, xpackper, xpackamt, xpackgrp, xexciseper, xexciseamt, xexcisegrp, xeducessper, xeducessamt, xeducessgrp, xsheducessper, xsheducessamt, xsheducessgrp, xvatper, xvatamt, xvatgrp, xrondper, xrondamt, xrondgrp, xgrandtotal, LRNO, LRDT, TRANSPORT, VEHNO, PREPDATE, PREPTIME, REMVDATE, REMVTIME, DESPID, DELVID, PYMTID, QTNKINDATTN, QTNSUBJECT, QTNREM1, QTNREM7, QTNREM2, QTNREM8, QTNREM9, QTNREM10, QTNREM3, QTNREM4, QTNREM5, QTNREM6) values('$xvouno', '$xvoudt', '$xenqno', '$xenqdt', '$xcustname', '$xbasicper', '$xbasicamt', '$xbasicgrp', '$xschemeper', '$xschemeamt', '$xschemegrp', '$xdiscountper', '$xdiscountamt', '$xdiscountgrp', '$xcashper', '$xcashamt', '$xcashgrp', '$xspecial1per', '$xspecial1amt', '$xspecial1grp', '$xspecial2per', '$xspecial2amt', '$xspecial2grp', '$xpackper', '$xpackamt', '$xpackgrp', '$xexciseper', '$xexciseamt', '$xexcisegrp', '$xeducessper', '$xeducessamt', '$xeducessgrp', '$xsheducessper', '$xsheducessamt', '$xsheducessgrp', '$xvatper', '$xvatamt', '$xvatgrp', '$xrondper', '$xrondamt', '$xrondgrp', '$xgrandtotal', '$xlrno', '$xlrdt', '$xtransporter', '$xvehicle', '$xprepdt', '$xpreptime', '$xremovedt', '$xremovetime', '$xdespatch', '$xdeliverytype', '$xpayment1', '$xkindatt', '$xsubject', '$xpayment2', '$xexcise', '$xtaxation', '$xfreight', '$xinsurance', '$xothcharge', '$xdeliveryat', '$xdeliverydt', '$xvalidity', '$xinstruct')");
//		if($a==1)
//		{
//			? ><script>alert("Record Inserted Succssfully.....!"); location.replace("enquirycustomer.php"); < /script><?php
//		}
//		else
//		{
//			? ><script>alert("Record Not Inserted.....!"); location.replace("enquirycustomer.php"); < /script><?php
//		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		//$b=mysql_query("update areamast set VOU_NO='$xvouno', VOU_DT='$xvoudt', ENQ_NO='$xenqno', ENQ_DT='$xenqdt', AC_HEAD='$xcustname', xbasicper='$xbasicper', xbasicamt='$xbasicamt', xbasicgrp='$xbasicgrp', xschemeper='$xschemeper', xschemeamt='$xschemeamt', xschemegrp='$xschemegrp', xdiscountper='$xdiscountper', xdiscountamt='$xdiscountamt', xdiscountgrp='$xdiscountgrp', xcashper='$xcashper', xcashamt='$xcashamt', xcashgrp='$xcashgrp', xspecial1per='$xspecial1per', xspecial1amt='$xspecial1amt', xspecial1grp='$xspecial1grp', xspecial2per='$xspecial2per', xspecial2amt='$xspecial2amt', xspecial2grp='$xspecial2grp', xpackper='$xpackper', xpackamt='$xpackamt', xpackgrp='$xpackgrp', xexciseper='$xexciseper', xexciseamt='$xexciseamt', xexcisegrp='$xexcisegrp', xeducessper='$xeducessper', xeducessamt='$xeducessamt', xeducessgrp='$xeducessgrp', xsheducessper='$xsheducessper', xsheducessamt='$xsheducessamt', xsheducessgrp='$xsheducessgrp', xvatper='$xvatper', xvatamt='$xvatamt', xvatgrp='$xvatgrp', xrondper='$xrondper', xrondamt='$xrondamt', xrondgrp='$xrondgrp', xgrandtotal='$xgrandtotal', LRNO='$xlrno', LRDT='$xlrdt', TRANSPORT='$xtransporter', VEHNO='$xvehicle', PREPDATE='$xprepdt', PREPTIME='$xpreptime', REMVDATE='$xremovedt', REMVTIME='$xremovetime', DESPID='$xdespatch', DELVID='$xdeliverytype', PYMTID='$xpayment1', QTNKINDATTN='$xkindatt', QTNSUBJECT='$xsubject', QTNREM1='$xpayment2', QTNREM7='$xexcise', QTNREM2='$xtaxation', QTNREM8='$xfreight', QTNREM9='$xinsurance', QTNREM10='$xothcharge', QTNREM3='$xdeliveryat', QTNREM4='$xdeliverydt', QTNREM5='$xvalidity', QTNREM6='$xinstruct' where ENQ_NO=".$_GET['ENQ_NO']);
//		if($b==1)
//		{
//			? ><script>alert("Record Updated Succssfully.....!"); location.replace("enquirycustomer.php");< /script><?php
//		}
//		else
//		{
//			? ><script>alert("Record Not Updated.....!"); location.replace("enquirycustomer.php");< /script><?php
//		}
	}
	else if(isset($_POST['btnback']))
	{
		header('location: enquirycustomer.php');
	}
?>


<html>
<head>
<?php include 'colorbox/colorbox.php' ?>

<script>
		$(document).ready(function(){
		$(".iframe").colorbox({iframe:true, width:"750", height:"650"});
		});
</script>

		
				
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<script src="js/tabcontent.js" type="text/javascript"></script>
    	<link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="js/jsDatePick_ltr.min.css" />
		<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
		
		<script type="text/javascript">
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
		</script>


</head>

<body>

<a href="editenquirycustomer2.php" class="iframe">update</a>

		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<br>
			<form method="post">
			<center>
			  
				<?php
					if(isset($_GET['ENQ_NO']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from eqcmast where ENQ_NO=".$_GET['ENQ_NO']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
						}
					}
				?>

				
<!--Tab Starts div-->	<div>
<!--Tab Menu Starts-->		<ul class="tabs" data-persist="true">
								<li><a href="#voucher">Voucher Details</a></li>
								<li><a href="#add">Additional Levies</a></li>
								<li><a href="#other">Other Information</a></li>
								<li><a href="#enqinfo">Enquiry/Quotation Info</a></li>
<!--Tab Menu Ends-->		</ul>
				
<!--Tab Contents Starts-->	<div class="tabcontent">
				
				<div style="height:560px; overflow-y:scroll">
				
	<!--1st Tab Starts-->		<div id="voucher" >
									
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
												<input type="text" name="xenqno" value="<?php echo $ENQ_NO; ?>" />&nbsp;&nbsp; 
												Date : <input type="text" id="xenqdt" name="xenqdt" value="<?php echo $ENQ_DT; ?>" onFocus="date()" onClick="javascript:date()" style="width:100px;"/>
											</td>
										</tr>
										<tr>
											<td>Customer Name : </td>
											<td>
												<?php
													include('dbconnect.php');
													$sql = "SELECT * FROM acmst where custcd LIKE 'DB%' Order By ac_head";
													$rs = mysql_query($sql) or die(mysql_error());
													?>
														<select id="xcustname" name="xcustname" value="<?php echo $AC_HEAD; ?>" style="width:360px;">
													<?php
														while($row = mysql_fetch_array($rs))
														{
															if($ledgertype == $row["ac_head"])
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
										<a href="editproddescrip.php" class="iframe" style="float:left; margin-left:10%;">Add New Product</a>
									<span style="float:left; margin-left:30%;">Product Description</span>
									<div style="overflow:auto; width:80%;">
										<table border="1" cellspacing="0" cellpadding="5" align="center">
											<tr bgcolor="grey" align="center" style="color:white;">
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
												<td>Disc 1</td>
												<td>Disc 2</td>
												<td>Disc 3</td>
												<td>P and F</td>
												<td>Excise</td>
												<td>CESS</td>
												<td>H CESS</td>
												<td>Freight</td>
												<td>Oth Exp</td>
												<td>Tax Code</td>
												<td>Tax</td>
												<td>VAT</td>
												<td>Total</td>
												<td>Option</td>
											</tr>
											<tr>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodcode" style="width:150px;" /></td>
												<td><input type="text" name="xproddescr" style="width:200px;" /></td>
												<td><input type="text" name="xprodqty" style="width:100px;" /></td>
												<td><input type="text" name="xprodrate" style="width:100px;" /></td>
												<td><input type="text" name="xprodvalue" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td><input type="text" name="xprodsrno" style="width:100px;" /></td>
												<td>
													<a href="editproddescrip.php?code=<?=$code?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;
													<a href="delproddescrip.php?code=<?=$code?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>
												</td>
											</tr>
										</table>
									</div>
									<br>
									
									<table align="center" cellpadding="5" >
										<tr>
											<td width="130px">Remark : </td><td colspan="2"><input type="text" name="xremark" style="width:360px;" /></td>
										</tr>
									</table>
									
	<!--1st Tab Ends-->			</div>
	
	<!--2nd Tab Starts-->		<div id="add">
									<table id="tbl1" align="center">
										<tr style="font-size:18px;">
											<td width="200px">Description</td>
											<td>%</td>
											<td>Amount</td>
											<td>Grp</td>
										</tr>
										<tr>
											<td>Basic Value : </td>
											<td><input type="text" name="xbasicper" value="<?php echo $xbasicper; ?>" /></td>
											<td><input type="text" name="xbasicamt" value="<?php echo $xbasicamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xbasicgrp" value="<?php echo $xbasicgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Scheme : </td>
											<td><input type="text" name="xschemeper" value="<?php echo $xschemeper; ?>" /></td>
											<td><input type="text" name="xschemeamt" value="<?php echo $xschemeamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xschemegrp" value="<?php echo $xschemegrp; ?>" /></td>
										</tr>
										<tr>
											<td>Discount 1 : </td>
											<td><input type="text" name="xdiscountper" value="<?php echo $xdiscountper; ?>" /></td>
											<td><input type="text" name="xdiscountamt" value="<?php echo $xdiscountamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xdiscountgrp" value="<?php echo $xdiscountgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Cash Discount : </td>
											<td><input type="text" name="xcashper" value="<?php echo $xcashper; ?>" /></td>
											<td><input type="text" name="xcashamt" value="<?php echo $xcashamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xcashgrp" value="<?php echo $xcashgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Special Discount 1 : </td>
											<td><input type="text" name="xspecial1per" value="<?php echo $xspecial1per; ?>" /></td>
											<td><input type="text" name="xspecial1amt" value="<?php echo $xspecial1amt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xspecial1grp" value="<?php echo $xspecial1grp; ?>" /></td>
										</tr>
										<tr>
											<td>Special Discount 2 : </td>
											<td><input type="text" name="xspecial2per" value="<?php echo $xspecial2per; ?>" /></td>
											<td><input type="text" name="xspecial2amt" value="<?php echo $xspecial2amt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xspecial2grp" value="<?php echo $xspecial2grp; ?>" /></td>
										</tr>
										<tr>
											<td>Packing and Forwarding : </td>
											<td><input type="text" name="xpackper" value="<?php echo $xpackper; ?>" /></td>
											<td><input type="text" name="xpackamt" value="<?php echo $xpackamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xpackgrp" value="<?php echo $xpackgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Excise Duty : </td>
											<td><input type="text" name="xexciseper" value="<?php echo $xexciseper; ?>" /></td>
											<td><input type="text" name="xexciseamt" value="<?php echo $xexciseamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xexcisegrp" value="<?php echo $xexcisegrp; ?>" /></td>
										</tr>
										<tr>
											<td>Education Cess : </td>
											<td><input type="text" name="xeducessper" value="<?php echo $xeducessper; ?>" /></td>
											<td><input type="text" name="xeducessamt" value="<?php echo $xeducessamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xeducessgrp" value="<?php echo $xeducessgrp; ?>" /></td>
										</tr>
										<tr>
											<td>SH Edu. Cess : </td>
											<td><input type="text" name="xsheducessper" value="<?php echo $xsheducessper; ?>" /></td>
											<td><input type="text" name="xsheducessamt" value="<?php echo $xsheducessamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xsheducessgrp" value="<?php echo $xsheducessgrp; ?>" /></td>
										</tr>
										<tr>
											<td>VAT/CST : </td>
											<td><input type="text" name="xvatper" value="<?php echo $xvatper; ?>" /></td>
											<td><input type="text" name="xvatamt" value="<?php echo $xvatamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xvatgrp" value="<?php echo $xvatgrp; ?>" /></td>
										</tr>
										<tr>
											<td>Ronding Off : </td>
											<td><input type="text" name="xrondper" value="<?php echo $xrondper; ?>" /></td>
											<td><input type="text" name="xrondamt" value="<?php echo $xrondamt; ?>" style="width:150px;" /></td>
											<td><input type="text" name="xrondgrp" value="<?php echo $xrondgrp; ?>" /></td>
										</tr>
										<tr style="font-size:18px;">
											<td>Grand Total : </td>
											<td></td>
											<td><input type="text" name="xgrandtotal" value="<?php echo $xgrandtotal; ?>" style="width:150px;" /></td>
											<td></td>
										</tr>
									</table>
	<!--2nd Tab Ends-->			</div>
	
	<!--3rd Tab Starts-->		<div id="other">
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
	<!--3rd Tab Ends-->			</div>
	
	<!--4th Tab Starts-->		<div id="enqinfo">
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
	<!--4th Tab Ends-->			</div>
								<?php
								if(isset($_GET['ENQ_NO']))
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
	
<!--Tab Ends div-->		</div>
				</div>
			</center>
			</form>
		</div>


</body>
</html>
<?php
}
else
{
	header('location: index.php');
}
?>