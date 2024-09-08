<?php

session_start();

if($_SESSION['name'])
{
?>

<?php
$str1 = "";
if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$xtid = "";
		include("dbconnect.php");
		$a1=mysql_query("select max(templateId) as id from gridfields");
		while($db=mysql_fetch_array($a1))
		{
			extract($db);
			$xid1 = $db['id'];
		}
		$xid = $xid1+1;
		$xtid = str_pad($xid,5,"0",STR_PAD_LEFT);
		
		$nooffields = sizeof($xfdtype);
		
		if(isset($_POST['xfdtype']))
		{
			$xfdtype12 = array();
			foreach($_POST['xfdtype'] as $val)
			{
				$xfdtype12[] = $val;
			}
			$xfdtypelen = count($xfdtype12);
			
		    for ($x=0; $x<$xfdtypelen; $x++)
		    {
				$strtype2 = $xfdtype12[$x];
				$strtype3 = ($strtype2.'|');
				$strtype1 = $strtype1.$strtype3;
			}
			$xtype = substr($strtype1,0,-1);
			//echo "$xtype"; echo "<br>";
		}
		
		if(isset($_POST['xfddec']))
		{
			$xfddec12 = array();
			foreach($_POST['xfddec'] as $val)
			{
				$xfddec12[] = $val;
			}
			$xfddeclen = count($xfddec12);
			
		    for ($x=0; $x<$xfddeclen; $x++)
		    {
				$strdec2 = $xfddec12[$x];
				$strdec3 = ($strdec2.'|');
				$strdec1 = $strdec1.$strdec3;
			}
			$xdec = substr($strdec1,0,-1);
			//echo "$xdec"; echo "<br>";
		}

		if(isset($_POST['xfdvis']))
		{
			$xfdvis12 = array();
			foreach($_POST['xfdvis'] as $val)
			{
				$xfdvis12[] = $val;
			}
			$xfdvislen = count($xfdvis12);
			for ($x=0; $x<$nooffields; $x++)
			{
				if (in_array("$x",$xfdvis12,true))
				{
					//echo $x; echo "<br>";			
					$strvis2 = "1";
				}
				else
				{
					//echo "Not found ".$x; echo "<br>";			
					$strvis2 = "0";
				}
				$strvis3 = ($strvis2.'|');
				$strvis1 = $strvis1.$strvis3;
			}
			$xvis = substr($strvis1,0,-1);
			//echo "$xvis"; echo "<br>";
		}	
		else
		{
			for ($x=0; $x<$nooffields; $x++)
			{
				$strvis2 = "0";
				$strvis3 = ($strvis2.'|');
				$strvis1 = $strvis1.$strvis3;
			}
			$xvis = substr($strvis1,0,-1);				
			//echo "$xvis"; echo "<br>";				
		}	
		
		if(isset($_POST['xfdedit']))
		{
			$xfdedit12 = array();
			foreach($_POST['xfdedit'] as $val)
			{
				$xfdedit12[] = $val;
			}
			$xfdeditlen = count($xfdedit12);
			for ($x=0; $x<$nooffields; $x++)
			{
				if (in_array("$x",$xfdedit12,true))
				{
					//echo $x; echo "<br>";			
					$stredit2 = "1";
				}
				else
				{
					//echo "Not found ".$x; echo "<br>";			
					$stredit2 = "0";
				}
				$stredit3 = ($stredit2.'|');
				$stredit1 = $stredit1.$stredit3;
			}
			$xedit = substr($stredit1,0,-1);
			//echo "$xedit"; echo "<br>";
		}	
		else
		{
			for ($x=0; $x<$nooffields; $x++)
			{
				$stredit2 = "0";
				$stredit3 = ($stredit2.'|');
				$stredit1 = $stredit1.$stredit3;
			}
			$xedit = substr($stredit1,0,-1);				
			//echo "$xedit"; echo "<br>";				
		}	
		
		if(isset($_POST['xfdinput']))
		{
			$xfdinput12 = array();
			foreach($_POST['xfdinput'] as $val)
			{
				$xfdinput12[] = $val;
			}
			$xfdinputlen = count($xfdinput12);
			
		    for ($x=0; $x<$xfdinputlen; $x++)
		    {
				$strinput2 = $xfdinput12[$x];
				$strinput3 = ($strinput2.'|');
				$strinput1 = $strinput1.$strinput3;
			}
			$xinput = substr($strinput1,0,-1);
			//echo "$xinput"; echo "<br>";
		}

		if(isset($_POST['xfdformula']))
		{
			$xfdformula12 = array();
			foreach($_POST['xfdformula'] as $val)
			{
				$xfdformula12[] = $val;
			}
			$xfdformulalen = count($xfdformula12);
			
		    for ($x=0; $x<$xfdformulalen; $x++)
		    {
				$strformula2 = $xfdformula12[$x];
				$strformula3 = ($strformula2.'|');
				$strformula1 = $strformula1.$strformula3;
			}
			$xformula = substr($strformula1,0,-1);
			//echo "$xformula"; echo "<br>";
		}

		if(isset($_POST['xfdshortnm']))
		{
			$xfdshortnm12 = array();
			foreach($_POST['xfdshortnm'] as $val)
			{
				$xfdshortnm12[] = $val;
			}
			$xfdshortnmlen = count($xfdshortnm12);
			
		    for ($x=0; $x<$xfdshortnmlen; $x++)
		    {
				$strshortnm2 = $xfdshortnm12[$x];
				$strshortnm3 = ($strshortnm2.'|');
				$strshortnm1 = $strshortnm1.$strshortnm3;
			}
			$xshortnm = substr($strshortnm1,0,-1);
			//echo "$xshortnm"; echo "<br>";
		}

		if(isset($_POST['xfdfunction']))
		{
			$xfdfunction12 = array();
			foreach($_POST['xfdfunction'] as $val)
			{
				$xfdfunction12[] = $val;
			}
			$xfdfunctionlen = count($xfdfunction12);
			
		    for ($x=0; $x<$xfdfunctionlen; $x++)
		    {
				$strfunction2 = $xfdfunction12[$x];
				$strfunction3 = ($strfunction2.'|');
				$strfunction1 = $strfunction1.$strfunction3;
			}
			$xfunction = substr($strfunction1,0,-1);
			//echo "$xfunction"; echo "<br>";
		}

		if(isset($_POST['xfdseq']))
		{
			$xfdseq12 = array();
			foreach($_POST['xfdseq'] as $val)
			{
				$xfdseq12[] = $val;
			}
			$xfdseqlen = count($xfdseq12);
			
		    for ($x=0; $x<$xfdseqlen; $x++)
		    {
				$strseq2 = $xfdseq12[$x];
				$strseq3 = ($strseq2.'|');
				$strseq1 = $strseq1.$strseq3;
			}
			$xseq = substr($strseq1,0,-1);
			//echo "$xseq"; echo "<br>";
		}
		
		include("dbconnect.php");
		$a=mysql_query("insert into gridfields(templateId, FldHead, FldList, FldType, FldWidth, FldDecimal, FldShow, FldEdit, FldInputType, FldFormula, FldShortNm, FldFunction, FldSeq, templatename, templateType, formName) values('$xtid', '$xheader', '$xheader', '$xtype', '$xfdwidth', '$xdec', '$xvis', '$xedit', '$xinput', '$xformula', '$xshortnm', '$xfunction', '$xseq', '$xtempname', '$xtempty', '$xformname')");
		if($a==1)
		{
			?><script>alert("Record Inserted Succssfully.....!");</script><?php
		}
		else
		{
			?><script>alert("Record Not Inserted.....!");</script><?php
		}
	}
?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<script src="js/tabcontent.js" type="text/javascript"></script>
    	<link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
		
		<script language="javascript">
		function searchelement(searchFld)
		{
			if(x)
			{	
				var xt1 = document.getElementById("t1").value;
				var fn = "itemgroup.php?mt_head="+xt1;
				x.open("GET",fn);
				x.onreadystatechange=function()
				{
					if(x.readyState==4 && x.status==200)
					{
						document.getElementById("mydiv").innerHTML=x.responseText;
					}
				}
				x.send();
			}
		}
		</script>
		
		<style>
		input[type='checkbox'] 
		{
			width:20px;
			height:20px;
			/*vertical-align:middle;*/
		}
		#cmb
		{
			width:50px;
			height:30px;
			/*vertical-align:middle;*/
		}
		input[type='text'] 
		{
			width:100px;
			height:30px;
			vertical-align:middle;
		}
		</style>

	</head>
	
	<body onLoad="searchelement('mt_head')">
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			<br /><br />
			<form method="post">
			<center>
			<?php	
				include("dbconnect.php");
				$sql = mysql_query("SELECT * FROM gridfields where templateid='00001'") or trigger_error(mysql_error(), E_USER_WARNING);
				while($row = mysql_fetch_array($sql))
				{
					extract($row);
					?>
					<span style="margin:30px; font-size:16px;">Template ID : <input readonly type="text" name="xtempid" value="<?php echo $templateId; ?>" style="cursor:default;" /></span>
					<span style="margin:30px; font-size:16px;">Template Type : <input type="text" name="xtempty" value="<?php echo $templatename; ?>" /></span>
					<span style="margin:30px; font-size:16px;">Template Name : <input type="text" name="xtempname" value="<?php echo $templateType; ?>" style="width:200px;"  /></span>
					<span style="margin:30px; font-size:16px;">Form Name : <input type="text" name="xformname" value="<?php echo $formName; ?>" style="width:200px;" /></span>
					<?php
				}
				?>
				
						<div style="height:70%;">
						<br />
<!--Tab Menu Starts-->		<ul class="tabs" data-persist="false">
								<li><a href="#trans">Trans Details Setting</a></li>
								<li><a href="#add">Additional Details Setting</a></li>
<!--Tab Menu Ends-->		</ul>
							
<!--Tab Contents Starts-->	<div class="tabcontents" style="height:85%;">
<!--1st Tab Starts-->			<div id="trans" style="overflow:auto; height:100%;">
									<table border="1" cellpadding="8px" align="left">
										<tr bgcolor="grey" align="center" style="color:white; width:150%;">
											<td>Sr.No</td>
											<td>Field Header</td>
											<td>Field Name</td>
											<td>Type</td>
											<td>Decimal</td>
											<td>Visible</td>
											<td>Editable</td>
											<td>Input</td>
											<td>Short Name</td>
											<td>Formula</td>
											<td>Function</td>
											<td>Sequence</td>
										</tr>
									<!--</table>-->
									<!--<div id="mydiv" style="overflow-y: scroll; height:90%; width:100%;">-->
									<!--<table border="1" cellspacing="0" cellpadding="5" align="center">-->
										<?php
											$c=0;
											$str3= "";
											$str1= "";
											
//											mysql_connect("localhost","root","") or die("connection".mysql_error());	
//											mysql_select_db("test")or die("database".mysql_error());
//											$head1 = mysql_query("SELECT fdheader FROM test2") or trigger_error(mysql_error(), E_USER_WARNING);
//											while($db=mysql_fetch_array($head1))
//											{
//												extract($db);
//												$xid1 = $db['fdheader'];
//											}											
//											print_r($head);
//											$user = strstr($xid1, '|');
//											$head = explode("|", $xid1);
//											echo $head[0]; echo "<br>";
//											print_r($head);											
//											while (list($id, $name, $salary) = mysql_fetch_row($result))
//											{
//												echo " <tr>\n" .
//													"  <td><a href=\"info.php?id=$id\">$name</a></td>\n" .
//													"  <td>$salary</td>\n" .
//													" </tr>\n";
//											}

											$fromtable = "Y";
											if($fromtable=='Y')
											{
													include("dbconnect.php");
													$sql = mysql_query("SELECT * FROM gridfields where templateid='00001'") or trigger_error(mysql_error(), E_USER_WARNING);
													while($row = mysql_fetch_array($sql))
													{
														extract($row);
														$a = $row['FldHead'];
														$an = (substr_count($a, '|'))+1;
														$aa = explode('|', $a);
														
														$alst = $row['FldList'];
														$aalst = explode('|', $alst);

														$atyp = $row['FldType'];
														$aatyp = explode('|', $atyp);
														
														$adec = $row['FldDecimal'];
														$aadec = explode('|', $adec);
														
														$avis = $row['FldShow'];
														$aavis = explode('|', $avis);
														
														$aedt = $row['FldEdit'];
														$aaedt = explode('|', $aedt);

														$ainp = $row['FldInputType'];
														$aainp = explode('|', $ainp);

														$afor = $row['FldFormula'];
														$aafor = explode('|', $afor);
														
														$asht = $row['FldShortNm'];
														$aasht = explode('|', $asht);
														
														$afun = $row['FldFunction'];
														$aafun = explode('|', $afun);
														
														$aseq = $row['FldSeq'];
														$aaseq = explode('|', $aseq);
														
														for ($i = 0; $i < $an; $i++) 
														{
															$str2 = $aa[$i];
															$str3 = ($str2.'|');
															$str1 = $str1.$str3;
															
															$strname2 = $xfdtype;
															$strname3 = ($strname2.'|');
															$strname1 = $strname1.$strname3;
															
															$class="odd";
															if($xyz%2==0)
																$class="even";
															$xyz++;
															?>
															<tr align="center" class="<?php echo $class?>">
																<td><?php echo $i+1; ?></td>
																<td><input type="text" name="xfdheader" value="<?php echo $aa[$i]; ?>" style="width:200px;" /></td>
																<td><input type="text" name="xfdname" value="<?php echo $aalst[$i]; ?>" style="width:200px;" /></td>
																<td>
																	<select id="cmb" name="xfdtype[]">
																	<?php
																		if($aatyp[$i]=='C')
																		{
																			?>
																			<option value="C" selected="selected">C</option>
																			<option value="D">D</option>
																			<option value="N">N</option>
																			<?php
																		}
																		else if($aatyp[$i]=='D')	
																		{
																			?>
																			<option value="C">C</option>
																			<option value="D" selected="selected">D</option>
																			<option value="N">N</option>
																			<?php
																		}
																		else	
																		{
																			?>
																			<option value="C">C</option>
																			<option value="D">D</option>
																			<option value="N" selected="selected">N</option>
																			<?php
																		}
																		?>
																	</select>
																</td>
																<!--<td width="80px;"><input type="text" name="xfdwidth" /></td>-->
																<td><input type="text" name="xfddec[]" value="<?php echo $aadec[$i]; ?>" /></td>
																<td>
																	<?php	
																	    if($aavis[$i]=='1')
																		 {
																		 	?>
																				<input type="checkbox" checked="checked" name="xfdvis[]" value= "<?php echo $i; ?>" />
																			<?php
																		 }
																		else
																		 {
																		 	?>
																				<input type="checkbox" name="xfdvis[]" value= "<?php echo $i; ?>" />
																			<?php
																		 } 
																	?>
															  </td>
																<td>
																	<?php	
																	    if($aaedt[$i]=='1')
																		 {
																		 	?>
																				<input type="checkbox" checked="checked" name="xfdedit[]" value= "<?php echo $i; ?>" />
																			<?php
																		 }
																		else
																		 {
																		 	?>
																				<input type="checkbox" name="xfdedit[]" value= "<?php echo $i; ?>" />
																			<?php
																		 } 
																	?>
																</td>
																<td>
																	<select id="cmb" name="xfdinput[]">
																	<?php
																		if($aainp[$i]=='T')
																		{
																			?>
																			<option value="T" selected="selected">T</option>
																			<option value="L">L</option>
																			<option value="C">C</option>
																			<option value="B">B</option>
																			<?php
																		}
																		else if($aainp[$i]=='L')	
																		{
																			?>
																			<option value="T">T</option>
																			<option value="L" selected="selected">L</option>
																			<option value="C">C</option>
																			<option value="B">B</option>
																			<?php
																		}
																		else if($aainp[$i]=='C')	
																		{
																			?>
																			<option value="T">T</option>
																			<option value="L">L</option>
																			<option value="C" selected="selected">C</option>
																			<option value="B">B</option>
																			<?php
																		}
																		else	
																		{
																			?>
																			<option value="T">T</option>
																			<option value="L">L</option>
																			<option value="C">C</option>
																			<option value="B" selected="selected">B</option>
																			<?php
																		}
																		?>
																	</select>
																</td>
																<td><input type="text" name="xfdshortnm[]" value="<?php echo $aasht[$i]; ?>" /></td>
																<td><input type="text" name="xfdformula[]" value="<?php echo $aafor[$i]; ?>" style="width:400px;" /></td>
																<td><input type="text" name="xfdfunction[]" value="<?php echo $aafun[$i]; ?>" style="width:400px;" /></td>
																<td><input type="text" name="xfdseq[]" value="<?php echo $aaseq[$i]; ?>" /></td>
															</tr>
															<?php
														}
													}
												$str1 = substr($str1,0,-1); //echo $str1; echo "<br>";
												$strname1 = substr($strname1,0,-1); //echo $strname1;
											}
											else
											{
													include("dbconnect.php");
													$sql = mysql_query("SELECT * FROM gridfields") or trigger_error(mysql_error(), E_USER_WARNING);
													for ($i = 0; $i < mysql_num_fields($sql); $i++) 
													{
														$meta = mysql_fetch_field($sql, $i);
														
														$str2 = $meta->name;
														$str3 = ($str2.'|');
														$str1 = $str1.$str3;
												?>
												<tr align="center">
													<td width="50px;"><?php echo $i+1;?></td>
													<td width="300px;"><input type="text" name="xfdheader" value="<?php echo $meta->name; ?>" /></td>
													<td width="300px;"><input type="text" name="xfdname" value="<?php echo $meta->name; ?>" /></td>
													<td width="80px;">
														<select name="xfdtype" style="width:50px; vertical-align:bottom">
															<option value="C">C</option>
															<option value="D">D</option>
															<option value="N">N</option>
														</select>
													</td>
													<!--<td width="80px;"><input type="text" name="xfdwidth" /></td>-->
													<td width="80px;"><input type="text" name="xfddec" /></td>
													<td width="80px;"><input type="checkbox" name="xfdvis" value="1" /></td>
													<td width="80px;"><input type="checkbox" name="xfdedit" value="1" /></td>
													<td width="80px;">
														<select name="xfdinput" style="width:50px;">
															<option value="T">T</option>
															<option value="L">L</option>
															<option value="C">C</option>
															<option value="B">B</option>
														</select>
													</td>
													<td width="80px;"><input type="text" name="xfldformula" /></td>
													<td width="80px;"><input type="text" name="xfldshortnm" /></td>
													<td width="80px;"><input type="text" name="xfldfunction" /></td>
													<td width="80px;"><input type="text" name="xfldseq" /></td>
												</tr>
												<?php
													}
											}
										?>
									</table>
									<!--</div>-->
<!--1st Tab Ends-->				</div>

<!--2nd Tab Starts-->			<div id="add">
									
									<div id="trans" style="overflow:auto; height:100%; width:100%;">
										<table border="1" cellpadding="8px" align="left" style="width:150%;">
											<tr bgcolor="grey" align="center" style="color:white; width:150%; position:relative;">
												<td>Sr.No</td>
												<td>Field Description</td>
												<td>Field Name</td>
												<td>Short Name</td>
												<td>Group</td>
												<td>Visible</td>
												<td>Opr</td>
												<td>%YN</td>
												<td>Formula</td>
												<td>Map Value</td>
												<td>Map Per</td>
												<td>Map Field Name2</td>
												<td>Upd</td>
												<td>Accd</td>
												<td>Ac_Head</td>
											</tr>
											
											<tr align="center">
												<td></td>
												<td><input type="text" name="xfddesc" style="width:250px;" /></td>
												<td><input type="text" name="xfdname" style="width:150px;" /></td>
												<td><input type="text" name="xshortname" /></td>
												<td><input type="text" name="xgrp" /></td>
												<td>
													<select name="xvis" style="width:50px;">
														<option value="Y">Y</option>
														<option value="N">N</option>
													</select>
												</td>
												<td>
													<select name="xopr" style="width:50px;">
														<option value="+">+</option>
														<option value="-">-</option>
													</select>
												</td>
												<td>
													<select name="xyn" style="width:50px;">
														<option value="Y">Y</option>
														<option value="N">N</option>
													</select>
												</td>
												<td><input type="text" name="xformula" style="width:200px;" /></td>
												<td><input type="text" name="xmapval" /></td>
												<td><input type="text" name="xmapper" /></td>
												<td><input type="text" name="xmapfdnm2" style="width:200px;" /></td>
												<td>
													<select name="xupd" style="width:50px;">
														<option value="C">C</option>
														<option value="I">I</option>
														<option value="A">A</option>
														<option value="F">F</option>
													</select>
												</td>
												<td><input type="text" name="xaccd" style="width:180px;" /></td>
												<td><input type="text" name="xachead" style="width:400px;" /></td>
											</tr>
	
										</table>
									</div>
									
<!--2nd Tab Ends-->				</div>
<!--Tab Contents Ends-->	</div>
							
							<input type="submit" name="btnsav" value="Save" />
							<input type="hidden" name="xheader" value="<?php echo $str1; ?>" />
							<input type="hidden" name="xname" value="<?php echo $strname1; ?>" />
							
<!--Tab Ends div-->		</div>
				
			</center>
				
		</div>
		</form>
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