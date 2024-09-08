<?php
session_start();

	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		include("dbconnect.php");
		$a=mysql_query("
		insert into matmst(itemid, itmcd, itmtype, gp, grp, grpname, grp1, grp2, grp3, grp4, grp5, grp6, accdlink, accd, scd, pcd, mtcd, mt_head, uom, idmark, speci, partno, partno2, location, op_qty, recd_qty, issu_qty, clo_qty, op_rate, op_value, recd_val, issu_val, clo_value, stkfordays, min_lvl, max_lvl, stk_yn, p_rate, pratel, rate, rate2, rate3, rate4, mrate, mrp, loqty, lpqty, liqty, lcqty, qtyinbox, inbox, excid, chapno, value, tag, locn, cf, rg23a_iop, rg23c_iop, rg1_op, rg23a_ici, rg23c_ici, rg1_cl, rg23a_ref, rg23c_ref, rg1_ref, op_date, cr_date, f, stper, exmp, locncd, net_wt, cut_wt, gros_wt, wt, wtunit, rtperwt, subdesc, prndesc, mfgdt, cmfgdt, expdt, cexpdt, disccat, discper, discper2, rtper, boxrt, dm, rm, profitratio1, profitratio2, profitratio3, profitratio4, profitratio5, activeyn, manualrate, i, w, h, royaltyper, batchno, lotno, size, sizeid, vou_no, addedby, addt, editedby, editdt, approvedby, apprdt, appryn, itemdesc, itemdesc2, itemdesc3, sizecd, colorcd, desgcd, color, desgno, pur_ret, stk_trf, stk_ref) values('$xitemid', '$xitmcd', '$xitmtype', '$xgp', '$xgrp', '$xgrpname', '$xgrp1', '$xgrp2', '$xgrp3', '$xgrp4', '$xgrp5', '$xgrp6', '$xaccdlink', '$xaccd', '$xscd', '$xpcd', '$xmtcd', '$xmt_head', '$xuom', '$xidmark', '$xspeci', '$xpartno', '$xpartno2', '$xlocation', '$xop_qty', '$xrecd_qty', '$xissu_qty', '$xclo_qty', '$xop_rate', '$xop_value', '$xrecd_val', '$xissu_val', '$xclo_value', '$xstkfordays', '$xmin_lvl', '$xmax_lvl', '$xstk_yn', '$xp_rate', '$xpratel', '$xrate', '$xrate2', '$xrate3', '$xrate4', '$xmrate', '$xmrp', '$xloqty', '$xlpqty', '$xliqty', '$xlcqty', '$xqtyinbox', '$xinbox', '$xexcid', '$xchapno', '$xvalue', '$xtag', '$xlocn', '$xcf', '$xrg23a_iop', '$xrg23c_iop', '$xrg1_op', '$xrg23a_ici', '$xrg23c_ici', '$xrg1_cl', '$xrg23a_ref', '$xrg23c_ref', '$xrg1_ref', '$xop_date', '$xcr_date', '$xf', '$xstper', '$xexmp', '$xlocncd', '$xnet_wt', '$xcut_wt', '$xgros_wt', '$xwt', '$xwtunit', '$xrtperwt', '$xsubdesc', '$xprndesc', '$xmfgdt', '$xcmfgdt', '$xexpdt', '$xcexpdt', '$xdisccat', '$xdiscper', '$xdiscper2', '$xrtper', '$xboxrt', '$xdm', '$xrm', '$xprofitratio1', '$xprofitratio2', '$xprofitratio3', '$xprofitratio4', '$xprofitratio5', '$xactiveyn', '$xmanualrate', '$xi', '$xw', '$xh', '$xroyaltyper', '$xbatchno', '$xlotno', '$xsize', '$xsizeid', '$xvou_no', '$xaddedby', '$xaddt', '$xeditedby', '$xeditdt', '$xapprovedby', '$xapprdt', '$xappryn', '$xitemdesc', '$xitemdesc2', '$xitemdesc3', '$xsizecd', '$xcolorcd', '$xdesgcd', '$xcolor', '$xdesgno', '$xpur_ret', '$xstk_trf', '$xstk_ref')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("itemmaster.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("itemmaster.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update matmst set itemid='$xitemid', itmcd='$xitmcd', itmtype='$xitmtype', gp='$xgp', grp='$xgrp', grpname='$xgrpname', grp1='$xgrp1', grp2='$xgrp2', grp3='$xgrp3', grp4='$xgrp4', grp5='$xgrp5', grp6='$xgrp6', accdlink='$xaccdlink', accd='$xaccd', scd='$xscd', pcd='$xpcd', mtcd='$xmtcd', mt_head='$xmt_head', uom='$xuom', idmark='$xidmark', speci='$xspeci', partno='$xpartno', partno2='$xpartno2', location='$xlocation', op_qty='$xop_qty', recd_qty='$xrecd_qty', issu_qty='$xissu_qty', clo_qty='$xclo_qty', op_rate='$xop_rate', op_value='$xop_value', recd_val='$xrecd_val', issu_val='$xissu_val', clo_value='$xclo_value', stkfordays='$xstkfordays', min_lvl='$xmin_lvl', max_lvl='$xmax_lvl', stk_yn='$xstk_yn', p_rate='$xp_rate', pratel='$xpratel', rate='$xrate', rate2='$xrate2', rate3='$xrate3', rate4='$xrate4', mrate='$xmrate', mrp='$xmrp', loqty='$xloqty', lpqty='$xlpqty', liqty='$xliqty', lcqty='$xlcqty', qtyinbox='$xqtyinbox', inbox='$xinbox', excid='$xexcid', chapno='$xchapno', value='$xvalue', tag='$xtag', locn='$xlocn', cf='$xcf', rg23a_iop='$xrg23a_iop', rg23c_iop='$xrg23c_iop', rg1_op='$xrg1_op', rg23a_ici='$xrg23a_ici', rg23c_ici='$xrg23c_ici', rg1_cl='$xrg1_cl', rg23a_ref='$xrg23a_ref', rg23c_ref='$xrg23c_ref', rg1_ref='$xrg1_ref', op_date='$xop_date', cr_date='$xcr_date', f='$xf', stper='$xstper', exmp='$xexmp', locncd='$xlocncd', net_wt='$xnet_wt', cut_wt='$xcut_wt', gros_wt='$xgros_wt', wt='$xwt', wtunit='$xwtunit', rtperwt='$xrtperwt', subdesc='$xsubdesc', prndesc='$xprndesc', mfgdt='$xmfgdt', cmfgdt='$xcmfgdt', expdt='$xexpdt', cexpdt='$xcexpdt', disccat='$xdisccat', discper='$xdiscper', discper2='$xdiscper2', rtper='$xrtper', boxrt='$xboxrt', dm='$xdm', rm='$xrm', profitratio1='$xprofitratio1', profitratio2='$xprofitratio2', profitratio3='$xprofitratio3', profitratio4='$xprofitratio4', profitratio5='$xprofitratio5', activeyn='$xactiveyn', manualrate='$xmanualrate', i='$xi', w='$xw', h='$xh', royaltyper='$xroyaltyper', batchno='$xbatchno', lotno='$xlotno', size='$xsize', sizeid='$xsizeid', vou_no='$xvou_no', addedby='$xaddedby', addt='$xaddt', editedby='$xeditedby', editdt='$xeditdt', approvedby='$xapprovedby', apprdt='$xapprdt', appryn='$xappryn', itemdesc='$xitemdesc', itemdesc2='$xitemdesc2', itemdesc3='$xitemdesc3', sizecd='$xsizecd', colorcd='$xcolorcd', desgcd='$xdesgcd', color='$xcolor', desgno='$xdesgno', pur_ret='$xpur_ret', stk_trf='$xstk_trf', stk_ref='$xstk_ref' where itemid=".$_GET['itemid']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("itemmaster.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("itemmaster.php");</script>
			<?php
		}
	}
	
	else if(isset($_POST['btnback']))
	{
		extract($_POST);
		include("dbconnect.php");
		header('location:itemmaster.php');
	}
	
	//include("autoincrementid.php");

?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<script type="text/javascript">
			function getstval()
			{
				var elem = document.getElementById("xf");
				if(elem.options[elem.selectedIndex].innerHTML == "VAT FREE")
				{
					document.getElementById("stval").value = "0";
				} 
				else if(elem.options[elem.selectedIndex].innerHTML == "VAT @ 5.00%")
				{
					document.getElementById("stval").value = "5";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "VAT @ 12.50%")
				{
					document.getElementById("stval").value = "12.50";
				}
			}
			
			function getcalcprate1()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xpratel").value;
				var answer = rate/equ;
				document.getElementById("xp_rate").value = answer;
			}
			
			function getcalcp_rate()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xp_rate").value;
				var answer = rate*equ;
				document.getElementById("xpratel").value = answer;
			}
			
			function getcalcrate2()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xrate2").value;
				var answer = rate/equ;
				document.getElementById("xrate").value = answer;
			}
			
			function getcalcrate()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xrate").value;
				var answer = rate*equ;
				document.getElementById("xrate2").value = answer;
			}
			
			function getcalcrate4()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xrate4").value;
				var answer = rate/equ;
				document.getElementById("xrate3").value = answer;
			}
			
			function getcalcrate3()
			{
				var tax = document.getElementById("stval").value;
				var equ = 1+(tax/100);
				var rate = document.getElementById("xrate3").value;
				var answer = rate*equ;
				document.getElementById("xrate4").value = answer;
			}
		</script>
		
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
		<br>			
			<form method="post">

<?php
	if(isset($_GET['itemid']))
	{
		extract($_GET);
		include("dbconnect.php");
		$e=mysql_query("select * from matmst where itemid=".$_GET['itemid']);
		while($db1=mysql_fetch_array($e))
		{
			extract($db1);
			$maingrp = $itmcd;
			$companygrp = $grp;
			$groupgrp1 = $grp1;
			$groupgrp2 = $grp2;
			$groupgrp3 = $grp3;
			$excise = $excid;
			$depart = $grp6;
			$taxrate = $f;
			$unitofm = $uom;
			$wtunitofm = $wtunit;
		}
	}
	?>
		<!--Form Starts-->
		<div class="info" style="margin-left:50px; overflow-y: scroll; height:78%;">
			<div>
				<span style="float:left; width:50%; font-size:17px">
					<span class="text-lable" style="float:left; width:30%;">
						Main Group :<br />
						Company :<br />
						Group :<br />
						Group 2 : <br />
						Item Description : <br />
						
						Item Code : <br />
						Party's PartNo.:<br />
						Net Weight :<br />
						Qty/Box : <br />
						Tax Form :<br />
						Valve Wt.:<br />
						M.R.P.(L) :<br />
						Purchase Rate (F) : <br />
						Sale Rate 1 (F) :<br />
						Sale Rate 2 (F) :<br />
						Opening Stock : <br />
						Op. Rate :<br />
						Closing Stock:<br />
						Stock for Days :<br />
						Manual Rate :
					</span>
					<span class="in-text" style="float:right; width:70%;">
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM itmtype ORDER BY itmcd";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xitmcd" value="<?php echo $itmcd ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($maingrp == $row["itmcd"])
								{
									echo "<option selected value='".$row["itmcd"]."'>".$row["itmtype"]."</option>";
								}
								else
								{
									echo "<option value='".$row["itmcd"]."'>".$row["itmtype"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM compdetl ORDER BY compid";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xgrp" value="<?php echo $grp ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($companygrp == $row["compid"])
								{
									echo "<option selected value='".$row["compid"]."'>".$row["compnm"]."</option>";
								}
								else
								{
									echo "<option value='".$row["compid"]."'>".$row["compnm"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />	
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM itmgrp ORDER BY gp";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xgrp1" value="<?php echo $grp1 ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($groupgrp1 == $row["gp"])
								{
									echo "<option selected value='".$row["gp"]."'>".$row["grpnm"]."</option>";
								}
								else
								{
									echo "<option value='".$row["gp"]."'>".$row["grpnm"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM itmgrp2 ORDER BY gp1";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xgrp2" value="<?php echo $grp2 ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($groupgrp2 == $row["gp1"])
								{
									echo "<option selected value='".$row["gp1"]."'>".$row["grpnm1"]."</option>";
								}
								else
								{
									echo "<option value='".$row["gp1"]."'>".$row["grpnm1"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br>
						
						<input type="text" name="xmt_head" value="<?php echo $mt_head ?>"/>&nbsp;
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM uom ORDER BY uom";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xuom" value="<?php echo $uom ?>" style="width:100px;">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($unitofm == $row["uomid"])
								{
									echo "<option selected value='".$row["uomid"]."'>".$row["uom"]."</option>";
								}
								else
								{
									echo "<option value='".$row["uomid"]."'>".$row["uom"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br>
						
						
						<input type="text" name="xpartno" value="<?php echo $partno?>" /><br />
						<input type="text" name="xpartno2" value="<?php echo $partno2?>" /><br />
						<input type="text" name="xwt" value="<?php echo $wt?>" />&nbsp;
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM uom ORDER BY uom";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xwtunit" value="<?php echo $wtunit ?>" style="width:100px;">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($wtunitofm == $row["uomid"])
								{
									echo "<option selected value='".$row["uomid"]."'>".$row["uom"]."</option>";
								}
								else
								{
									echo "<option value='".$row["uomid"]."'>".$row["uom"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						<input type="text" name="xinbox" value="<?php echo $inbox?>" style="height:30px; width:220px;"/><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM acsst ORDER BY gp";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xf" id="xf" value="<?php echo $f ?>" onChange="javascript:getstval();" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($taxrate == $row["gp"])
								{
									echo "<option selected value='".$row["gp"]."'>".$row["grpnm"]."</option>";
								}
								else
								{
									echo "<option value='".$row["gp"]."'>".$row["grpnm"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
							
						<input type="text" name="xcut_wt" value="<?php echo $cut_wt ?>" /><br />
						<input type="text" name="xmrp" value="<?php echo $mrp?>" /><br />
						<input type="text" name="xpratel" id="xpratel" onBlur="javascript:getcalcprate1();" value="<?php echo $pratel?>" /><br />
						<input type="text" name="xrate2" id="xrate2" onBlur="javascript:getcalcrate2();" value="<?php echo $rate2?>" /><br />
						<input type="text" name="xrate4" id="xrate4" onBlur="javascript:getcalcrate4();" value="<?php echo $rate4?>" /><br />
						<input type="text" name="xop_qty" value="<?php echo $op_qty?>" /><br />
						<input type="text" name="xop_rate" value="<?php echo $op_rate?>" /><br />
						<input type="text" name="xclo_qty" value="<?php echo $clo_qty?>" /><br />
						<input type="text" name="xstkfordays" value="<?php echo $stkfordays?>" /><br />
						<select name="xactive" value="<?php echo $active?>">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
						
					</span>
				</span>
				
				<span style="float:right; width:50%; font-size:17px">
					<span class="text-lable" style="float:left; width:30%; ">
						Active :<br />
						Group 3 :<br />
						Excise Ch.Head :<br />
						Department :<br />
						(Alias)<br />
						Spec/Drawing No:<br />
						Gross Wt. :<br />
						Scrap Wt. : <br />
						Exempted : <br />
						Tax % : <br />
						Dist. Margin :<br />
						M.R.P (O) :<br />
						Purchase Rate (B) : <br />
						Sale Rate 1 (B) :<br />
						Sale Rate 2 (B) :<br />
						Minimum Level :<br />
						Location :<br />
						Reoder Level :<br />
						Stock :<br />
						Profit % :<br /><br />
					</span>
					<span style="float:right; width:70%; ">
						<select name="xactive" value="<?php echo $active ?>">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM itmgrp3 ORDER BY gp1";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xgrp3" value="<?php echo $grp3 ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($groupgrp3 == $row["gp1"])
								{
									echo "<option selected value='".$row["gp1"]."'>".$row["grpnm1"]."</option>";
								}
								else
								{
									echo "<option value='".$row["gp1"]."'>".$row["grpnm1"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM exchead ORDER BY exid";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xexcid" value="<?php echo $excid ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($excise == $row["exid"])
								{
									echo "<option selected value='".$row["exid"]."'>".$row["prddesc"]."</option>";
								}
								else
								{
									echo "<option value='".$row["exid"]."'>".$row["prddesc"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						
						<?php
							include('dbconnect.php');
							$sql = "SELECT * FROM deptmst ORDER BY id";
							$rs = mysql_query($sql) or die(mysql_error());
						?>
							<select name="xgrp6" value="<?php echo $grp6 ?>" style="width:220px">
						<?php
							while($row = mysql_fetch_array($rs))
							{
								if($depart == $row["id"])
								{
									echo "<option selected value='".$row["id"]."'>".$row["descrip"]."</option>";
								}
								else
								{
									echo "<option value='".$row["id"]."'>".$row["descrip"]."</option>";
								}
							}
							mysql_free_result($rs);
						?>
							</select><br />
						<input type="text" name="xidmark" value="<?php echo $idmark?>" /><br />
						<input type="text" name="xspeci" value="<?php echo $speci?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xgros_wt" value="<?php echo $gros_wt?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xcf" value="<?php echo $cf?>" style="height:30px; width:220px;"/><br />
						<select name="xactive" value="<?php echo $active?>">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select><br />
						<input id="stval" type="text" readonly name="xstper" value="<?php echo $stper?>" style="height:30px; width:220px; cursor:default;"/><br />
						<input type="text" name="xdm" value="<?php echo $dm?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xprofitratio2" value="<?php echo $profitratio2?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xp_rate" id="xp_rate" value="<?php echo $p_rate?>" onBlur="javascript:getcalcp_rate();" style="height:30px; width:220px;"/><br />
						<input type="text" name="xrate" id="xrate" value="<?php echo $rate?>" onBlur="javascript:getcalcrate();" style="height:30px; width:220px;"/><br />
						<input type="text" name="xrate3" id="xrate3" value="<?php echo $rate3?>" onBlur="javascript:getcalcrate3();" style="height:30px; width:220px;"/><br />
						<input type="text" name="xmin_lvl" value="<?php echo $min_lvl?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xlocn" value="<?php echo $locn?>" style="height:30px; width:220px;"/><br />
						<input type="text" name="xmax_lvl" value="<?php echo $max_lvl?>" style="height:30px; width:220px;"/><br />
						<select name="xactive" value="<?php echo $active?>">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select><br />
						<input type="text" name="xprofitratio1" value="<?php echo $profitratio1?>" style="height:30px; width:220px;"/><br /><br />
					</span>
				</span>
			</div>
			
			<div align="left">
				<?php
				if(isset($_GET['itemid']))
				{
					?>
						<span style="font-size:17px; float:right;">
							<span style="padding-right:30px">
								<input type="submit" value="Update" name="btnupd" />
							</span>
							<span style="padding-right:30px">
								<input type="button" value="Print" onClick="window.print()" name="btnprint" />
							</span>
							<span>
								<input type="submit" value="Back" name="btnback" />
							</span>
						</span>
					<?php
				}
				else 
				{
					?>	
						<span style="font-size:17px; float:right;">
							<span style="padding-right:30px">
								<input type="submit" value="Save" name="btnsav" />
							</span>
							<span style="padding-right:30px">
								<input type="reset" value="Clear" />
							</span>
							<span>
								<input type="submit" value="Back" name="btnback" />
							</span>
						</span>
				<?php
				}
				?>
			</div>	
		</div>	
		
		</form>
		<!--Form Ends-->	
		</div>
	</body>
	
	<?php include 'footer.php'; ?>
</html>