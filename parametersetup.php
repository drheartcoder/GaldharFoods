<?php

session_start();

if($_SESSION['name'])
{
?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<script src="js/tabcontent.js" type="text/javascript"></script>
    	<link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
		
		<style>
		input[type='checkbox'] 
		{
			vertical-align:text-top;
		}
		input[type='text'] 
		{
			width:50px;
			height:30px;
			vertical-align:middle;
		}
		td
		{
			padding-left:25px;
			padding-right:15px;
		}
		#tbl input[type='text'] 
		{
			width:250px;
		}
		</style>

	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			<br>
			
			<form>
			<center>
			
<!--Tab Srarts div-->	<div>
<!--Tab Menu Starts-->		<ul class="tabs" data-persist="false">
								<li><a href="#parameter1">General Parameter 1</a></li>
								<li><a href="#parameter2">General Parameter 2</a></li>
								<li><a href="#parameter3">General Parameter 3</a></li>
<!--Tab Menu Ends-->		</ul>

<!--Tab Contents Starts-->	<div class="tabcontents">

	<!--1st Tab Starts-->		<div id="parameter1">
									<table id="tbl" align="center" cellpadding="5" >
										<tr>
											<td>
												<input type="hidden" value="0" name="chkenter" />
												<input type="checkbox" value="1" name="chkenter" <?php if($chkenter=='1'){echo 'checked';} ?> /> : Enable Enter Key
											</td>
											<td>
												<input type="hidden" value="0" name="chkbatchstock" />
												<input type="checkbox" value="1" name="chkbatchstock" <?php if($chkbatchstock=='1'){echo 'checked';} ?> /> : Batchwise Stock
											</td>
											<td>
												<input type="hidden" value="0" name="chkmenuvalid" />
												<input type="checkbox" value="1" name="chkmenuvalid" <?php if($chkmenuvalid=='1'){echo 'checked';} ?> /> : Menu Validate at Startup
											</td>
											<td>
												<input type="hidden" value="0" name="chksavelotgr" />
												<input type="checkbox" value="1" name="chksavelotgr" <?php if($chksavelotgr=='1'){echo 'checked';} ?> /> : Save Batch/Lot No. as it while GR/issue/MR
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkpratemrp" />
												<input type="checkbox" value="1" name="chkpratemrp" <?php if($chkpratemrp=='1'){echo 'checked';} ?> /> : Batch On P.rate+MRP
											</td>
											<td>
												<input type="hidden" value="0" name="chksepcific" />
												<input type="checkbox" value="1" name="chksepcific" <?php if($chksepcific=='1'){echo 'checked';} ?> /> : Specification Details
											</td>
											<td>
												<input type="hidden" value="0" name="chkitemcdauto" />
												<input type="checkbox" value="1" name="chkitemcdauto" <?php if($chkitemcdauto=='1'){echo 'checked';} ?> /> : In Item Master Item Code Auto
											</td>
											<td>
												<input type="hidden" value="0" name="chkopenlotmr" />
												<input type="checkbox" value="1" name="chkopenlotmr" <?php if($chkopenlotmr=='1'){echo 'checked';} ?> /> : Open new Window for Lot/Batch No. in MR
											</td>
										</tr>
									</table>
									<br>
									<table id="tbl" align="center" cellpadding="5" >
										<tr>
											<td>Invoice Code : </td><td><input type="text" name="xinvoicecd" /></td>
											<td>Report Path : </td><td><input type="text" name="xreportpath" /></td>
										</tr>
										<tr>
											<td>Cash Sel Code : </td><td><input type="text" name="xcashselcd" /></td>
											<td>Backup Path : </td><td><input type="text" name="xbackuppath" /></td>
										</tr>
										<tr>
											<td>Cash Pur Code : </td><td><input type="text" name="xcashpurcd" /></td>
											<td>Barcode Lable Script : </td><td><input type="text" name="xbarcdlable" /></td>
										</tr>
									</table>
									
									<table align="center" cellpadding="5" >
										<tr>
											<td>Prod. Process Flag : </td><td><input type="text" name="xprocessflag" style="width:100px;" /></td>
											<td>Stock Differentiate Recd/Issue : </td><td><input type="text" name="xstockdiff" /></td>
											<td>Other Language : </td><td><input type="text" name="xothlang" /></td>
										</tr>
										<tr>
											<td>Font Name : </td><td><input type="text" name="xfontname" style="width:150px;" /></td>
											<td>Barcode Stock for Readymade : </td><td><input type="text" name="xbarcdready" /></td>
											<td>Barcode Format (N/A) : </td><td><input type="text" name="xbarcdformat" /></td>
										</tr>
										<tr>
											<td>Sale Rate Logic : </td><td><input type="text" name="xsaleratelogic" />&nbsp; 0= Master, 1= Dt. Price List</td>
											<td>Bill No. Date wise for Return Bill : </td><td><input type="text" name="xbilldtreturn" /></td>
											<td>Ask for Job Flow After Saving : </td><td><input type="text" name="xjobflowsave" /></td>
										</tr>
										<tr>
											<td>Stock Rate Logic : </td><td><input type="text" name="xstockratelogic" />&nbsp; 0= Purchase, 1= GRN</td>
											<td>Process Flow Button on Brow Item : </td><td><input type="text" name="xprocessbtn" /></td>
											<td>IME Window for Mobile Stock : </td><td><input type="text" name="ximemobilestock" /></td>
										</tr>
										<tr>
											<td>Debtor/Salesman Link : </td><td><input type="text" name="xdebtorlink" /></td>
										</tr>
									</table>
									
	<!--1st Tab Ends-->			</div>
	
	<!--2nd Tab Starts-->		<div id="parameter2">
									<table id="tbl" align="center" cellpadding="5" >
										<tr>
											<td>Default UOM for Item : </td><td><input type="text" name="xuomitem" /></td>
										</tr>
										<tr>
											<td>Default Department for Production : </td><td><input type="text" name="xdepartprod" /></td>
										</tr>
										<tr>
											<td>Default Chapter Heading : </td><td><input type="text" name="xchapterhead" /></td>
										</tr>
									</table>
	<!--2nd Tab Ends-->			</div>
	
	<!--3rd Tab Starts-->		<div id="parameter3">
									<table align="center" cellpadding="5" >
										<tr>
											<td>Show Discount Window : </td><td><input type="text" name="xdiscount" /></td>
											<td></td><td></td>
										</tr>
										<tr>
											<td>Bill DOS Printing : </td><td><input type="text" name="xdosprint" /></td>
											<td></td><td></td>
										</tr>
										<tr>
											<td>Direct Print After Saving : </td><td><input type="text" name="xdirectprint" /></td>
											<td></td><td></td>
										</tr>
										<tr>
											<td>Retail Bill Form at Startup : </td><td><input type="text" name="xretailbill" /></td>
											<td></td><td></td>
										</tr>
										<tr>
											<td>Default Username at Startup : </td><td><input type="text" name="xusername" /></td>
											<td></td><td></td>
										</tr>
										<tr>
											<td>Edit/Delete Password Enabled : </td><td><input type="text" name="xeditpwd" /></td>
											<td>Password : </td><td><input type="text" name="xpwd1" style="width:120px;" /></td>
										</tr>
										<tr>
											<td>Report Password Enabled : </td><td><input type="text" name="xreportpwd" /></td>
											<td>Password : </td><td><input type="text" name="xpwd2" style="width:120px;" /></td>
										</tr>
										<tr>
											<td>EXE Command for Bill Print : </td><td><input type="text" name="xexebillprint" /></td>
											<td>Port : </td><td><input type="text" name="xport1" style="width:120px;" /></td>
										</tr>
										<tr>
											<td>EXE Command for Lable Print : </td><td><input type="text" name="xexelableprint" /></td>
											<td>Port : </td><td><input type="text" name="xport2" style="width:120px;" /></td>
										</tr>
									</table>
	<!--3rd Tab Ends-->			</div>
	
	<!--Tab Contents Ends--></div>
					<input type="submit" name="btnsav" value="Save" />
<!--Tab Ends div-->		</div>
			
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