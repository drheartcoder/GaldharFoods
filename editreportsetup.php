<?php

session_start();

if($_SESSION['name'])
{
?>

<?php

//	if(isset($_POST['btnsave']))
//	{
//		extract($_POST);
//		include("dbconnect.php");
//		$r="update subvoumast set VOU_TYPEDESC='$xsubvocnm', VOU_PRNPRFX='$xprnprfx', VOU_STARTNO='$xstartno', VOU_Back_color='$xback_color', VOU_Button_color='$xbutton_color' where VOU_SRNO=".$_GET['VOU_SRNO'];
//		$a=mysql_query("$r");
//		if($a==1)
//		{
//			? ><script>alert("Record Updated Succssfully.....!"); location.replace("reportsetup.php"); </ script>< ?php
//		}
//		else
//		{
//			? ><script>alert("Record Not Inserted.....!"); location.replace("reportsetup.php");< /script>< ?php
//		}
//	}
			
	//else 
	if(isset($_POST['btnback']))
	{
		header('location: reportsetup.php');
	}

?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<style>
		input[type='text'] 
		{
			width:150px;
			height:30px;
			vertical-align:middle;
		}
		input[type='checkbox'] 
		{
			vertical-align:text-top;
		}
		select
		{
			height:30px;
			/*margin-top:5px;*/
			margin-bottom:8px;
		}
		#tbl td
		{
			padding-left:15px;
			padding-right:15px;
		}
		</style>
		
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			
			<form method="post">
			<center>
			
			<?php
				if(isset($_GET['VOU_SRNO']))
				{
					extract($_GET);
					include("dbconnect.php");
					$e=mysql_query("select * from subvoumast where VOU_SRNO=".$_GET['VOU_SRNO']);
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
					}
				}
				?>
			
				<br>
				<div style="height:600px; overflow-y:scroll">
					<table id="tbl" align="center" cellpadding="5" >
						<tr>
							<td>Report Code : </td><td><input type="text" name="xcode" /></td>
							<td rowspan="4">Report Default Parameter Setup :
								<table align="center" cellpadding="8" style="margin-left:25px;">
									<tr>
										<td>
											<input type="hidden" value="0" name="chkdatetime" />
											<input type="checkbox" value="1" name="chkdatetime" <?php if($chkdatetime=='1'){echo 'checked';} ?> /> : Date and Time
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkletterhead" />
											<input type="checkbox" value="1" name="chkletterhead" <?php if($chkletterhead=='1'){echo 'checked';} ?> /> : On Letter Head
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkaddressline" />
											<input type="checkbox" value="1" name="chkaddressline" <?php if($chkaddressline=='1'){echo 'checked';} ?> /> : Address Line
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkheaderfooter" />
											<input type="checkbox" value="1" name="chkheaderfooter" <?php if($chkheaderfooter=='1'){echo 'checked';} ?> /> : Header and Footer
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkheadonpage" />
											<input type="checkbox" value="1" name="chkheadonpage" <?php if($chkheadonpage=='1'){echo 'checked';} ?> /> : Report Head on Each Page
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>Name : </td><td><input type="text" name="xname" style="width:240px;"/></td>
						</tr>
						<tr>
							<td>Type : </td>
							<td>
								<select name="xtype">
									<option value="General">General</option>
									<option value="Account">Account</option>
									<option value="Inventory">Inventory</option>
									<option value="Payroll">Payroll</option>
									<option value="Production">Production</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>SubType : </td>
							<td>
								<select name="xsubtype">
									<option value="General">General</option>
									<option value="Cash">Cash</option>
									<option value="Bank">Bank</option>
									<option value="JV">JV</option>
									<option value="DBN">DBN</option>
									<option value="CRN">CRN</option>
									<option value="Purchase Report">Purchase Report</option>
									<option value="Sales Report">Sales Report</option>
									<option value="Purchase Return Reports">Purchase Return Reports</option>
									<option value="Sales Return Reports">Sales Return Reports</option>
									<option value="Indent">Indent</option>
									<option value="GRN">GRN</option>
									<option value="Inspection">Inspection</option>
									<option value="Enq to Supp">Enq to Supp</option>
									<option value="Qtn from Supp">Qtn from Supp</option>
									<option value="PO to Supp">PO to Supp</option>
									<option value="Issue Slip">Issue Slip</option>
									<option value="Ret to Store">Ret to Store</option>
									<option value="Pur Req">Pur Req</option>
									<option value="Stk Transfer">Stk Transfer</option>
									<option value="Qtn to Cust">Qtn to Cust</option>
									<option value="Comparative Statement">Comparative Statement</option>
									<option value="Rejection">Rejection</option>
									<option value="Order Acceptance">Order Acceptance</option>
									<option value="Bill of Material">Bill of Material</option>
									<option value="Production">Production</option>
									<option value="Estimate">Estimate</option>
									<option value="Jobwork">Jobwork</option>
									<option value="Delivery Challan">Delivery Challan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Group : </td>
							<td>
								<select name="xgroup">
									<option value="Transaction">Transaction</option>
									<option value="Document (Full Page)">Document (Full Page)</option>
									<option value="Document (Half Page)">Document (Half Page)</option>
									<option value="Master Listing">Master Listing</option>
								</select>
							</td>
							<td rowspan="9">Transaction Report Parameters :
								<table align="center" cellpadding="8" style="margin-left:25px;">
									<tr>
										<td>
											<input type="hidden" value="0" name="chkmainpanl" />
											<input type="checkbox" value="1" name="chkmainpanl" <?php if($chkmainpanl=='1'){echo 'checked';} ?> /> : Main Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkaccountpanl" />
											<input type="checkbox" value="1" name="chkaccountpanl" <?php if($chkaccountpanl=='1'){echo 'checked';} ?> /> : Account Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkitempanl" />
											<input type="checkbox" value="1" name="chkitempanl" <?php if($chkitempanl=='1'){echo 'checked';} ?> /> : Item Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chksummarypanl" />
											<input type="checkbox" value="1" name="chksummarypanl" <?php if($chksummarypanl=='1'){echo 'checked';} ?> /> : Summary and Details Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkvaluepanl" />
											<input type="checkbox" value="1" name="chkvaluepanl" <?php if($chkvaluepanl=='1'){echo 'checked';} ?> /> : Gross Value Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkcompanypanl" />
											<input type="checkbox" value="1" name="chkcompanypanl" <?php if($chkcompanypanl=='1'){echo 'checked';} ?> /> : Company Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkgroupbypanl" />
											<input type="checkbox" value="1" name="chkgroupbypanl" <?php if($chkgroupbypanl=='1'){echo 'checked';} ?> /> : Group by Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chksalesmanpanl" />
											<input type="checkbox" value="1" name="chksalesmanpanl" <?php if($chksalesmanpanl=='1'){echo 'checked';} ?> /> : Salesman Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkareapanl" />
											<input type="checkbox" value="1" name="chkareapanl" <?php if($chkareapanl=='1'){echo 'checked';} ?> /> : Area Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkdepartpanl" />
											<input type="checkbox" value="1" name="chkdepartpanl" <?php if($chkdepartpanl=='1'){echo 'checked';} ?> /> : Department Pannel
										</td>
									</tr>
									<tr>
										<td>
											<input type="hidden" value="0" name="chkmachinepanl" />
											<input type="checkbox" value="1" name="chkmachinepanl" <?php if($chkmachinepanl=='1'){echo 'checked';} ?> /> : Machine Pannel
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>Description : </td><td><input type="text" name="xdescrip" style="width:220px;"/></td>
						</tr>
						<tr>
							<td>Table Mast : </td>
							<td>
								<select name="xtablemast">
									<?php
										include("dbconnect.php");
										$q=mysql_query("SHOW TABLES FROM gfpl");
										while ($row = mysql_fetch_row($q)) 
										{
											echo "<option value='{$row[0]}'>{$row[0]}</option>";
										}
										?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Table Trans : </td>
							<td>
								<select name="xtabletrans">
									<?php
										include("dbconnect.php");
										$q=mysql_query("SHOW TABLES FROM gfpl");
										while ($row = mysql_fetch_row($q)) 
										{
											echo "<option value='{$row[0]}'>{$row[0]}</option>";
										}
										?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Store Procesure Name : </td><td><input type="text" name="xstorenm" /></td>
						</tr>
						<tr>
							<td>Page Header 1 : </td><td><input type="text" name="xpghead1" /></td>
						</tr>
						<tr>
							<td>Page Header 2 : </td><td><input type="text" name="xpghead2" /></td>
						</tr>
						<tr>
							<td>Page Header 3 : </td><td><input type="text" name="xpghead3" /></td>
						</tr>
						<tr>
							<td>Page Footer : </td><td><input type="text" name="xpgfoot" /></td>
						</tr>
						<tr>
							<td>Vou Type : </td><td><input type="text" name="xvoutype" style="width:50px;" /></td>
							<td>Show Y/N : 
								<select name="xshowyn" style="width:50px;">
									<option value="Y">Y</option>
									<option value="N">N</option>
								</select>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3">
								<input type="submit" name="btnsave" value="Save" />
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" name="btnback" value="Back" />
							</td>
						</tr>
					</table>
				</div>
			</center>
			</form>	
					
		</div>
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