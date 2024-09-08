<?php 
include 'session.php';

$ledgertypesel = "3440001";

	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$ycustnm = strtoupper(trim($xac_head));
		$xcustnm = str_replace(' ', '', $ycustnm);
		
		$xcode = "";
		include("dbconnect.php");
		$a=mysql_query("select max(accd) as code from acmst where LEFT(accd,2)= '".$xaccprfx."'");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$xcode = $db1['code'];
		}
        $X1= substr($xcode,0,2);    
        $X2= substr($xcode,2,5);    
		$X3 = $X2+1;
		$X4 = $X1.str_pad($X3,5,"0",STR_PAD_LEFT);
		
		$xid = "";
		include("dbconnect.php");
		$a1=mysql_query("select max(acid) as id from acmst");
		while($db=mysql_fetch_array($a1))
		{
			extract($db);
			$xid1 = $db['id'];
		}
		$xid = $xid1+1;
		$xcustid = str_pad($xid,6,"0",STR_PAD_LEFT);
		
		include("dbconnect.php");
		$e=mysql_query("select * from acctype where acctypecd4 ='".$xacctypecd4."'");
		while($db1=mysql_fetch_array($e))
		{
			extract($db1);
			$ygp = $db1['acctypecd'];
			$yacctypecd = $db1['acctypecd'];
			$yacctypecd1 = $db1['acctypecd1'];
			$yacctype = $db1['acctype'];
			$yacctypecd2 = $db1['acctypecd2'];
			$yacctype2 = $db1['acctype2'];
			$yacctypecd3 = $db1['acctypecd3'];
			$yacctype3 = $db1['acctype3'];
			$yaccnature = $db1['accnature'];
			$yaccsumyn = $db1['accsumyn'];
			$yrpttype = $db1['rpttyp'];
		}
		$xgp = $ygp;
		$xcrdb = "N";
		$xacctypecd = $yacctypecd;
		$xacctypecd1 = $yacctypecd1;
		$xacctype = $yacctype;
		$xacctypecd2 = $yacctypecd2;
		$xacctype2 = $yacctype2;
		$xacctypecd3 = $yacctypecd3;
		$xacctype3 = $yacctype3;
		$xaccnature = $yaccnature;
		$xaccsumyn = $yaccsumyn;
		$xrpttype = $yrpttype;
		$xsubledgyn = "N";

		include("dbconnect.php");
		$a=mysql_query("insert into acmst(acid, custid, ac_head, acctypecd4, bilwbal, op_bal, vendcd, add1, add2, add3, city, phone, lstno, lstdt, cstno, cstdt, crdays, crlimit, cc, accd, activeyn, tdsyn, intax, tdsper, landmark, area, actyp, locncd, phone2, fax, sr, girno, custcat, email, cperson, drglicno1, drglicexpdt1, pestlicno1, pestlicexpdt1, eccno, cediv, cerange, cecomm, panno, category, dpyn, dp, mtcd, gp, type, crdb, acctypecd, acctypecd1, acctype, acctypecd2, acctype2, acctypecd3, acctype3, accnature, accsumyn, rpttyp, subledgyn, custnm) values('$xid', '$xcustid', '$xac_head', '$xacctypecd4', '$xbilwbal', '$xop_bal', '$xvendcd', '$xadd1', '$xadd2', '$xadd3', '$xcity', '$xphone', '$xlstno', '$xlstdt', '$xcstno', '$xcstdt', '$xcrdays', '$xcrlimit', '$xcc', '$X4', '$xactiveyn', '$xtdsyn', '$xintax', '$xtdsper', '$xlandmark', '$xarea', '$xactyp', '$xlocncd', '$xphone2', '$xfax', '$xsr', '$xgirno', '$xcustcat', '$xemail', '$xcperson', '$xdrglicno1', '$xdrglicexpdt1', '$xpestlicno1', '$xpestlicexpdt1', '$xeccno', '$xcediv', '$xcerange', '$xcecomm', '$xpanno', '$xcategory', '$xdpyn', '$xdp', '$X4', '$xgp', '$xtype', '$xcrdb', '$xacctypecd', '$xacctypecd1', '$xacctype', '$xacctypecd2', '$xacctype2', '$xacctypecd3', '$xacctype3', '$xaccnature', '$xaccsumyn', '$xrpttype', '$xsubledgyn', '$xcustnm')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("suppliermaster.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("suppliermaster.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		
		$ycustnm = strtoupper(trim($xac_head));
		$xcustnm = str_replace(' ', '', $ycustnm);
		
		include("dbconnect.php");
		$e=mysql_query("select * from acctype where acctypecd4 ='".$xacctypecd4."'");
		while($db1=mysql_fetch_array($e))
		{
			extract($db1);
			$ygp = $db1['acctypecd'];
			$yacctypecd = $db1['acctypecd'];
			$yacctypecd1 = $db1['acctypecd1'];
			$yacctype = $db1['acctype'];
			$yacctypecd2 = $db1['acctypecd2'];
			$yacctype2 = $db1['acctype2'];
			$yacctypecd3 = $db1['acctypecd3'];
			$yacctype3 = $db1['acctype3'];
			$yaccnature = $db1['accnature'];
			$yaccsumyn = $db1['accsumyn'];
			$yrpttype = $db1['rpttyp'];
		}
		$xgp = $ygp;
		$xacctypecd = $yacctypecd;
		$xacctypecd1 = $yacctypecd1;
		$xacctype = $yacctype;
		$xacctypecd2 = $yacctypecd2;
		$xacctype2 = $yacctype2;
		$xacctypecd3 = $yacctypecd3;
		$xacctype3 = $yacctype3;
		$xaccnature = $yaccnature;
		$xaccsumyn = $yaccsumyn;
		$xrpttype = $yrpttype;
		
		include("dbconnect.php");
		$b=mysql_query("update acmst set ac_head='$xac_head', acctypecd4='$xacctypecd4', bilwbal='$xbilwbal', op_bal='$xop_bal', vendcd='$xvendcd', add1='$xadd1', add2='$xadd2', add3='$xadd3', city='$xcity', phone='$xphone', lstno='$xlstno', lstdt='$xlstdt', cstno='$xcstno', cstdt='$xcstdt', crdays='$xcrdays', crlimit='$xcrlimit', cc='$xcc', accd='$xaccd', activeyn='$xactiveyn', tdsyn='$xtdsyn', intax='$xintax', tdsper='$xtdsper', landmark='$xlandmark', area='$xarea', actyp='$xactyp', locncd='$xlocncd', phone2='$xphone2', fax='$xfax', sr='$xsr', girno='$xgirno', custcat='$xcustcat', email='$xemail', cperson='$xcperson', drglicno1='$xdrglicno1', drglicexpdt1='$xdrglicexpdt1', pestlicno1='$xpestlicno1', pestlicexpdt1='$xpestlicexpdt1', eccno='$xeccno', cediv='$xcediv', cerange='$xcerange', cecomm='$xcecomm', panno='$xpanno', category='$xcategory', dpyn='$xdpyn', dp='$xdp', mtcd='$xmtcd', type='$xtype', custnm='$xcustnm', gp='$xgp', acctypecd='$xacctypecd', acctypecd1='$xacctypecd1', acctype='$xacctype', acctypecd2='$xacctypecd2', acctype2='$xacctype2', acctypecd3='$xacctypecd3', acctype3='$xacctype3', accnature='$xaccnature', accsumyn='$xaccsumyn', rpttyp='$xrpttype' where acid=".$_GET['acid']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("suppliermaster.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("suppliermaster.php");</script>
			<?php
		}
	}
	
	else if(isset($_POST['btnback']))
	{
		header('location: suppliermaster.php');
	}

?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
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
					target:"lstdt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"cstdt",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"drglicexpdt1",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
				new JsDatePick(
				{
					useMode:2,
					target:"pestlicexpdt1",
					isStripped:false,
					limitToToday:false,
					dateFormat:"%d-%m-%Y"
				});
			};
			
			function gettypecd()
			{
				var elem = document.getElementById("xcc1");
				if(elem.options[elem.selectedIndex].innerHTML == "Retailer")
				{
					document.getElementById("xcc").value = "1";
				} 
				else if(elem.options[elem.selectedIndex].innerHTML == "Wholeseller")
				{
					document.getElementById("xcc").value = "2";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "Both")
				{
					document.getElementById("xcc").value = "3";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "Other")
				{
					document.getElementById("xcc").value = "4";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "--")
				{
					document.getElementById("xcc").value = "";
				}
			}
			
			function getcatcd()
			{
				var elem = document.getElementById("xcustcat1");
				if(elem.options[elem.selectedIndex].innerHTML == "--")
				{
					document.getElementById("xcustcat").value = "";
				} 
				else if(elem.options[elem.selectedIndex].innerHTML == "Manufacturer")
				{
					document.getElementById("xcustcat").value = "1";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "Importer")
				{
					document.getElementById("xcustcat").value = "2";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "1Stage Dealer")
				{
					document.getElementById("xcustcat").value = "3";
				}
				else if(elem.options[elem.selectedIndex].innerHTML == "2nd Stage Dealer")
				{
					document.getElementById("xcustcat").value = "4";
				}
			}
			
			function getacctypecd()
			{
				var elem = document.getElementById("xacctype4");
				<?php
					include("dbconnect.php");
					$e=mysql_query("select * from acctype");
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
				?>
				if(elem.options[elem.selectedIndex].innerHTML == "<?php echo $acctype4; ?>")
				{
					document.getElementById("xacctypecd4").value = "<?php echo $acctypecd4; ?>";
					document.getElementById("xaccprfx").value = "<?php echo $accprfx; ?>";
				}
				<?php
					}
				?>
			}
		</script>
		
	</head>
	
	<body onLoad="javascript:getacctypecd();">
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			
			<br>
			<?php
			if(isset($_GET['acid']))
			{
				extract($_GET);
				include("dbconnect.php");
				$e=mysql_query("select * from acmst where acid=".$_GET['acid']);
				while($db1=mysql_fetch_array($e))
				{
					extract($db1);
					$ledgertype = $acctypecd4;
					$areaname = $area;
					$localname = $locncd;
					$categorycd = $custcat;
					$typename = $cc;
				}
			}
			?>
			<form method="post" id="form" >
<!--Tab Starts div-->	<div class="info">
<!--Tab Menu Starts-->		<ul class="tabs" data-persist="true">
								<li><a href="#account">Account Information</a></li>
								<li><a href="#other">Other Information</a></li>
<!--Tab Menu Ends-->		</ul>
							
<!--Tab Contents Starts-->	<div class="tabcontents" style="overflow-y: scroll; height:75%;">
<!--1st Tab Starts-->			<div id="account">
									
									<span style="float:left; width:50%; font-size:17px">
										<span class="text-lable" style="float:left; width:30%;">
											Ledger Name : <br />
											Ledger Type : <br />
											Bill Wise Bal. : <br />
											Op. Bal. : <br />
											Vendor Code : <br />
											Address : <br />
											<br />
											<br />
											City : <br />
											Phone : <br />
											Phone2 : <br />
											VAT TIN No. : <br />
											CST TIN No. : <br />
											Credit Days : <br />
											Credit Limit : 
										</span>
										<span style="float:right; width:70%;">
											<input type="text" name="xac_head" value="<?php echo $ac_head; ?>" /><br />
											
											<?php
											if(isset($_GET['acid']))
											{
												include('dbconnect.php');
												$sql = "SELECT * FROM acctype ORDER BY acctype4";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select disabled id="xacctype4" name="xacctype4" value="<?php echo $acctype4; ?>" onChange="javascript:getacctypecd();" style="width:220px; cursor:default;">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($ledgertype == $row["acctypecd4"])
													{
														echo "<option selected value='".$row["acctypecd4"]."'>".$row["acctype4"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select>&nbsp;
												<?php
											}
											else
											{
												include('dbconnect.php');
												$sql = "SELECT * FROM acctype ORDER BY acctype4";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select id="xacctype4" name="xacctype4" value="<?php echo $acctype4; ?>" onChange="javascript:getacctypecd();" style="width:220px;">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($ledgertypesel == $row["acctypecd4"])
													{
														echo "<option selected value='".$row["acctypecd4"]."'>".$row["acctype4"]."</option>";
													}
													else
													{
														echo "<option value='".$row["acctypecd4"]."'>".$row["acctype4"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select>&nbsp;
												<?php
											}
											?>
											
											<input type="text" id="xacctypecd4" name="xacctypecd4" readonly value="<?php echo $acctypecd4 ?>" style="width:100px; cursor:default;" />
											<input type="hidden" id="xaccprfx" name="xaccprfx" style="width:60px;"/>
											<br />
												
											<select name="xbilwbal">
												<?php
												if($bilwbal=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											<input type="text" name="xop_bal" value="<?php echo $op_bal; ?>" />&nbsp;
											<select name="xtype" style="width:100px;">
												<?php
												if($xtype=='D')
												{
												?>
													<option value="C">Credit</option>
													<option value="D" selected="selected">Debit</option>
												<?php }
												else	
												{
												?>
													<option value="C" selected="selected">Credit</option>
													<option value="D">Debit</option>
													<?php
												}
												?>
											</select><br />
											<input type="text" name="xvendcd" value="<?php echo $vendcd; ?>" /><br />
											<input type="text" name="xadd1" value="<?php echo $add1; ?>" /><br />
											<input type="text" name="xadd2" value="<?php echo $add2; ?>" /><br />
											<input type="text" name="xadd3" value="<?php echo $add3; ?>" /><br />
											<input type="text" name="xcity" value="<?php echo $city; ?>" /><br />
											<input type="text" name="xphone" value="<?php echo $phone; ?>" /><br />
											<input type="text" name="xphone2" value="<?php echo $phone2; ?>" /><br />
											<input type="text" name="xlstno" value="<?php echo $lstno; ?>" />&nbsp;
											<input type="text" name="xlstdt" id="lstdt" onFocus="date()" value="<?php echo $lstdt; ?>" onClick="javascript:date()" style="width:100px;" /><br />
											<input type="text" name="xcstno" value="<?php echo $cstno; ?>" />&nbsp;
											<input type="text" name="xcstdt" id="cstdt" onFocus="date()" onClick="javascript:date()" value="<?php echo $cstdt; ?>" style="width:100px;" /><br />
											<input type="text" name="xcrdays" value="<?php echo $crdays; ?>" /><br />
											<input type="text" name="xcrlimit" value="<?php echo $crlimit; ?>" />
											
										</span>
									</span>
									
									<span style="float:right; width:50%; font-size:17px">
										<span class="text-lable" style="float:left; width:30%;">
											ID : <br />
											Ledger Code : <br />
											Active : <br />
											TDS App. : <br />
											TDS % : <br />
											Consider for Tax Calc : <br />
											Landmark : <br />
											Area : <br />
											Local : <br />
											Route : <br />
											LBT No. : <br />
											Sr. No. : <br />
											Price Category : <br />
											Category : <br />
											Type : 
										</span>
										<span style="float:right; width:70%;">
											<input type="text" readonly name="xacid" value="<?php echo $acid; ?>" style="cursor:default;" /><br />
											<input type="text" readonly id="xaccd" name="xaccd" value="<?php echo $accd; ?>" style="cursor:default;" /><br />
											<select name="xactiveyn">
												<?php
												if($activeyn=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											<select name="xtdsyn">
												<?php
												if($tdsyn=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											<input type="text" name="xtdsper" value="<?php echo $tdsper ?>"/><br />
											<select name="xintax">
												<?php
												if($intax=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											<input type="text" name="xlandmark" value="<?php echo $landmark; ?>" /><br />
											
											<?php
												include('dbconnect.php');
												$sql = "SELECT * FROM areamast ORDER BY area";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select name="xarea" value="<?php echo $area ?>" style="width:220px">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($areaname == $row["code"])
													{
														echo "<option selected value='".$row["code"]."'>".$row["area"]."</option>";
													}
													else
													{
														echo "<option value='".$row["code"]."'>".$row["area"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select><br />
											
											<select name="xactyp">
												<?php
												if($actyp=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											
											<?php
												include('dbconnect.php');
												$sql = "SELECT * FROM routemast ORDER BY locnnm";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select name="xlocncd" value="<?php echo $locncd ?>" style="width:220px">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($localname == $row["locncd"])
													{
														echo "<option selected value='".$row["locncd"]."'>".$row["locnnm"]."</option>";
													}
													else
													{
														echo "<option value='".$row["locncd"]."'>".$row["locnnm"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select><br />
											
											<input type="text" name="xfax" value="<?php echo $fax; ?>" /><br />
											<input type="text" name="xsr" value="<?php echo $sr; ?>" /><br />
											<select name="xgirno">
												<?php
												if($girno=='N')
												{
												?>
													<option value="Y">Yes</option>
													<option value="N" selected="selected">No</option>
												<?php }
												else	
												{
												?>
													<option value="Y" selected="selected">Yes</option>
													<option value="N">No</option>
													<?php
												}
												?>
											</select><br />
											
											<?php
												include('dbconnect.php');
												$sql = "SELECT * FROM custcat ORDER BY catcd";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select id="xcustcat1" name="xcustcat1" value="<?php echo $custcat; ?>" onChange="javascript:getcatcd();" style="width:220px">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($categorycd == $row["catcd"])
													{
														echo "<option selected value='".$row["catcd"]."'>".$row["catdesc"]."</option>";
													}
													else
													{
														echo "<option value='".$row["catcd"]."'>".$row["catdesc"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select>&nbsp;
											<input type="text" id="xcustcat" name="xcustcat" value="<?php echo $custcat; ?>" readonly style="width:100px; cursor:default;" /><br>
											
											<?php
												include('dbconnect.php');
												$sql = "SELECT * FROM custtype ORDER BY typecd";
												$rs = mysql_query($sql) or die(mysql_error());
											?>
												<select id="xcc1" name="xcc1" value="<?php echo $cc; ?>" onChange="javascript:gettypecd();" style="width:220px">
											<?php
												while($row = mysql_fetch_array($rs))
												{
													if($typename == $row["typecd"])
													{
														echo "<option selected value='".$row["typecd"]."'>".$row["cust_type"]."</option>";
													}
													else
													{
														echo "<option value='".$row["typecd"]."'>".$row["cust_type"]."</option>";
													}
												}
												mysql_free_result($rs);
											?>
												</select>&nbsp;
											<input type="text" id="xcc" name="xcc" value="<?php echo $cc; ?>" readonly style="width:100px; cursor:default;" />

												
										</span>
									</span>
									
<!--1st Tab Ends-->				</div>

<!--2nd Tab Starts-->			<div id="other">
									
									<div style="margin-left:20%; margin-right:20%;">
										<span style="width:80%; font-size:17px;">
											<span class="text-lable" style="float:left; width:30%; line-height:40px;">
												E-Mail ID : <br />
												Contact Person : <br />
												Drug Lic. No. : <br />
												Pesticide Lic. No. : <br />
												ECC No. : <br />
												Division : <br />
												Range : <br />
												Commisionrate : <br />
												PAN No. : <br />
												Category : <br />
												Discount/GRN : <br />
												Sharing % GRN : <br />
												Ledger Code in Next F.Year : 
											</span>
											<span style="float:right; width:70%;">
												<input type="text" name="xemail" value="<?php echo $email; ?>" /><br />
												<input type="text" name="xcperson" value="<?php echo $cperson; ?>" /><br />
												<input type="text" name="xdrglicno1" value="<?php echo $drglicno1; ?>" />&nbsp;
												<input type="text" name="xdrglicexpdt1" id="drglicexpdt1" onFocus="date()" onClick="date()" value="<?php echo $drglicexpdt1; ?>" style="width:100px;" /><br />
												<input type="text" name="xpestlicno1" value="<?php echo $pestlicno1; ?>" />&nbsp;
												<input type="text" name="xpestlicexpdt1" id="pestlicexpdt1" onFocus="date()" onClick="date()" value="<?php echo $pestlicexpdt1; ?>" style="width:100px;" /><br />
												<input type="text" name="xeccno" value="<?php echo $eccno; ?>" /><br />
												<input type="text" name="xcediv" value="<?php echo $cediv; ?>" /><br />
												<input type="text" name="xcerange" value="<?php echo $cerange; ?>" /><br />
												<input type="text" name="xcecomm" value="<?php echo $cecomm; ?>" /><br />
												<input type="text" name="xpanno" value="<?php echo $panno; ?>" /><br />
												<input type="text" name="xcategory" value="<?php echo $category; ?>" /><br />
												<select name="xdpyn">
													<?php
													if($dpyn=='N')
													{
													?>
														<option value="Y">Yes</option>
														<option value="N" selected="selected">No</option>
													<?php }
													else	
													{
													?>
														<option value="Y" selected="selected">Yes</option>
														<option value="N">No</option>
														<?php
													}
													?>
												</select><br />
												<input type="text" name="xdp" value="<?php echo $dp; ?>" /><br />
												<input type="text" readonly name="xmtcd" value="<?php echo $mtcd; ?>" style="cursor:default;" /><br />
											</span>
										</span>
									</div>
									
<!--2nd Tab Ends-->				</div>
								
								<div align="left">
								<?php
								if(isset($_GET['acid']))
								{
									?>
									<div style="margin-left:30%;">
										<span style="font-size:17px;">
											<span style="float:left; width:10%;">
												<input type="submit" value="Update" name="btnupd" />
											</span>
											<span style="float:left; width:10%;">
												<input type="button" value="Print" onClick="window.print()" name="btnprint" />
											</span>
											<span style="float:left; width:10%;">
												<input type="submit" value="Back" name="btnback" />
											</span>
										</span>
									</div>
									<?php
								}
								else 
								{
									?>	
										<div style="margin-left:30%;">
											<span style="font-size:17px;">
												<span style="float:left; width:10%;">
													<input type="submit" value="Save" name="btnsav" />
												</span>
												<span style="float:left; width:10%;">
													<input type="reset" value="Clear" />
												</span>
												<span style="float:left; width:10%;">
													<input type="submit" value="Back" name="btnback" />
												</span>
											</span>
										</div>
								<?php
								}
								?>
								</div>
								
<!--Tab Contents Ends-->	</div>
<!--Tab Ends div-->		</div>
			</form>
			
		</div>
	</body>
	
	<?php include 'footer.php'; ?>
</html>