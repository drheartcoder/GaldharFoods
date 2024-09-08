<?php

session_start();

if($_SESSION['name'])
{
?>

<!--Pageing Starts-->
<?php
/* Include the Pear::Pager file */
require_once ('Pager/Pager.php');
 
/* database details */
include("dbconnect.php");
 
/* First we need to get the total rows in the table */
$result=mysql_query("SELECT count(*) AS total FROM subvoumast");
$row = mysql_fetch_array($result);
 
/* Total number of rows in the logs table */
$totalItems = $row['total'];
 
/* Set some options for the Pager */
$pager_options = array(
'mode'       => 'Sliding',   // Sliding or Jumping mode. See below.
'perPage'    => 1,   // Total rows to show per page
'delta'      => 4,   // See below
'nextImg'    => '<img src="images/next.gif" style="width:20px;"/>',
'prevImg'    => '<img src="images/prev.gif" style="width:20px;"/>',
'totalItems' => $totalItems,
);
 
$pager = Pager::factory($pager_options);

list($from, $to) = $pager->getOffsetByPageId();

$from = $from - 1;
 
/* The number of rows to get per query */
$perPage = $pager_options['perPage'];
 
include("dbconnect.php");
$result = mysql_query("SELECT * FROM subvoumast ORDER BY VOU_SRNO LIMIT $from , $perPage");
?>
<!--Pageing Ends-->

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<script src="js/tabcontent.js" type="text/javascript"></script>
    	<link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="jscolor.js"></script>
		
		<script type="text/javascript">
			function getprefix()
			{
				var elem = document.getElementById("xbasevoc");
				if(elem.options[elem.selectedIndex].innerHTML == "Cash Receipt")
				{
					document.getElementById("xbasevocpre").value = "0";
				} 
				else if(elem.options[elem.selectedIndex].innerHTML == "Cash Payment")
				{
					document.getElementById("xbasevocpre").value = "5";
				}
			}
		</script>
		
		<style>
		input[type='checkbox'] 
		{
			vertical-align:text-top;
		}
		select
		{
			width:75px;
			height:30px;
			vertical-align:top;
		}
		input[type='text'] 
		{
			width:150px;
			height:30px;
			vertical-align:middle;
		}
		#tbl td
		{
			padding-left:10px;
			padding-right:15px;
		}
		#tbl2 td
		{
			padding-left:25px;
			padding-right:15px;
		}
		#tbl2 input[type='text'] 
		{
			width:300px;
		}
		</style>
		
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			<br />
			<form method="post">
			<center>
			
			<?php
				while($res=mysql_fetch_array($result))
				{
					extract($res);
					
					$basevoucher = $res['VOU_PRF'];
					
					$param1 = str_split($res['VOU_PARAM1']);
					$chkcashyn = $param1[0];
					$chkvoutype = $param1[1];
					$chkparty1 = $param1[2];
					$chkconsignee = $param1[3];
					$chkfromdept = $param1[4];
					$chktodept = $param1[5];
					$chkgrninfo = $param1[6];
					$chkgateentryno = $param1[7];
					$chkgrnno = $param1[8];
					$chkdelivery = $param1[9];
					$chkpono = $param1[10];
					$chkbillno = $param1[11];
					$chksalesman = $param1[12];
					$chktransp = $param1[13];
					$chkdtexcise = $param1[14];
					$chkpayment = $param1[15];
					$chkscheduledt = $param1[16];
					$chkbilltotal = $param1[17];
					$chkenquirypan = $param1[18];
					$chkquotationpan = $param1[19];
					
					$param2 = str_split($res['VOU_PARAM2']);
					$chkpartno = $param2[0];
					$chkchkstock = $param2[1];
					$chkratemast = $param2[2];
					
					$param3 = str_split($res['VOU_PARAM3']);
					$chkexciseform = $param3[0];
					$chktaxcode = $param3[1];
					$chkbarcodeable = $param3[2];
					$chkdocuform = $param3[3];
					$chkdefaultcash = $param3[4];
					$chkcountbill = $param3[5];
					$chkinovicetype = $param3[6];
					$chkbilladjust = $param3[7];
					$chkproductexcise = $param3[8];
					$chkautoqtybar = $param3[9];
					$chkzerorate = $param3[10];
					$chkdatabefentry = $param3[11];
					$chklotdetails = $param3[12];
					$chktotalqty = $param3[13];
					$chkmanualvocno = $param3[14];
					$chkbackrefbtn = $param3[15];
					$chkpartrate = $param3[16];
					$chkfitscreen = $param3[17];
					$chktag = $param3[18];
					$chktempdocprint = $param3[19];
					$chkcreditlimit = $param3[20];
					$chklastrecord = $param3[21];
					$chkdirectprint = $param3[22];
					$chkremovetimevoc = $param3[23];
					$chkdeliverybtn = $param3[24];
					$chkimeqty = $param3[25];
					$chkmfginvseperate = $param3[26];
					$chkitemqry = $param3[27];
					$chktraderexcinvo = $param3[28];
					$chkplotaddr = $param3[29];
					
					$param4 = str_split($res['VOU_PARAM4']);
					$xgrpupdstock = $param4[0];
					$xdefaultvoutype = $param4[1];
				}
			?>

			<div style="height:550px; overflow-y:scroll;">
				<table id="tbl" align="center" cellpadding="8" >
					<tr>
						<td>ID : </td><td><input readonly type="text" name="xid" value="<?php echo $VOU_SRNO; ?>" style="cursor:default" /></td>
						<td>Base Voucher : </td>
							<td>
								<select id="xprefix" name="xprefix" value="<?php echo $VOU_PRF; ?>" style="width:240px; margin-right:5px;" >
								<?php
									include('dbconnect.php');
									$queryres = mysql_query("SELECT * FROM voumast") or die(mysql_error());
									while($queryrow = mysql_fetch_array($queryres))
									{
										if($basevoucher == $queryrow["vou_prf"])
										{
											echo "<option selected value='".$queryrow["vou_prf"]."'>".$queryrow["vou_name"]."</option>";
										}
										else
										{
											echo "<option value='".$queryrow["vou_prf"]."'>".$queryrow["vou_name"]."</option>";
										}
									}
								?>
								</select>
							</td>
						<td>Prefix : </td>
						<!--<td><input readonly type="text" name="xprefix" value="< ?php echo $VOU_PRF; ?>" style="width:80px; cursor:default" /></td>-->
						<td><input readonly type="text" value="<?php echo $VOU_PRF; ?>" style="width:80px; cursor:default" /></td>
					</tr>
					<tr>
						<td>Sub Voucher ID : </td><td><input type="text" name="xsubvocid" value="<?php echo $VOU_TYPECD; ?>" /></td>
						<td>Sub Voucher Name : </td><td><input type="text" name="xsubvocnm" value="<?php echo $VOU_TYPEDESC; ?>" style="width:240px;"/></td>
						<td>Access Type : </td>
						<td>
							<select name="xaccess" value="<?php echo $VOU_ACCESS; ?>" >
								<option value="00">00</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Master Table Name : </td>
						<td>
							<select name="xmsttbl" style="width:200px;" value="<?php echo $VOU_MSTTBL; ?>" >
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
						<td>Report : </td><td><select name="xrptname" style="width:200px;" value="<?php echo $VOU_RPTNAME; ?>" ></select></td>
						<td>Voucher Back Link : </td><td><input type="text" name="xbacklink" value="<?php echo $VOU_BACKLINK; ?>" /></td>
					</tr>
					<tr>
						<td>Transaction Table Name : </td>
						<td>
							<select name="xtrntbl" style="width:200px;" value="<?php echo $VOU_TRNTBL; ?>" >
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
						<td>Prefix While Voucher Print : </td><td><input type="text" name="xprnprfx" value="<?php echo $VOU_PRNPRFX; ?>" /></td>
						<td>Field : </td><td><input type="text" name="xbackreffld" value="<?php echo $VOU_BACKREFFLD; ?>" /></td>						
					</tr>
					<tr>
						<td>Grid View Refld. : </td><td><input type="text" name="xgridid" value="<?php echo $VOU_GRIDID; ?>" /></td>
						<td>Color : </td>
						<td>
							Button <input type="text" class="color" id="btncolor" name="xbutton_color" value="<?php echo $VOU_Button_color; ?>" style="width:80px;" />
							&nbsp;
							Form <input type="text" class="color" id="formcolor" name="xback_color" value="<?php echo $VOU_Back_color; ?>" style="width:80px;" />
						</td>
						<td>Start Voucher No. : </td><td><input type="text" name="xstartno" value="<?php echo $VOU_STARTNO; ?>" /></td>						
					</tr>
					<tr>
						<td>A/C Browser : </td><td><input type="text" name="xaccfindstr" value="<?php echo $VOU_AccFindStr; ?>" /></td>
						<td>Back Link Master Table : </td><td><input type="text" name="xbackmsttbl" value="<?php echo $VOU_BACKMSTTBL; ?>" /></td>
						<td>
							<input type="checkbox" name="chkaccpost" value="Y" <?php if($VOU_ACCPOST=='Y'){echo 'checked';} ?> />
							<input type="hidden" name="chkaccpost" value="N" />
							&nbsp;
							Account Posting :
						</td>
						<td>
							<select name="xaccposttype" style="width:50px;" value="<?php echo $VOU_ACCPOSTTYPE; ?>" >
								<?php
								if($VOU_ACCPOSTTYPE=='N')
								{
									?>
									<option value="N" selected="selected">N</option>
									<option value="D">D</option>
									<option value="C">C</option>
									<?php
								}
								else if($VOU_ACCPOSTTYPE=='D')	
								{
									?>
									<option value="N">N</option>
									<option value="D" selected="selected">D</option>
									<option value="C">C</option>
									<?php
								}
								else  if($VOU_ACCPOSTTYPE=='C')	
								{
									?>
									<option value="N">N</option>
									<option value="D">D</option>
									<option value="C" selected="selected">C</option>
									<?php
								}
								?>
							</select>
						</td>						
					</tr>
					<tr>
						<td>Item Browser : </td><td><input type="text" name="xitmfindstr" value="<?php echo $VOU_ItmFindStr; ?>" /></td>
						<td>Back Link Trans Table : </td><td><input type="text" name="xbacktrntbl" value="<?php echo $VOU_BACKTRNTBL; ?>" /></td>
						<td>
							<input type="checkbox" name="chkstockupdt" value="Y" <?php if($VOU_STOCKUPDT=='Y'){echo 'checked';} ?> />
							<input type="hidden" name="chkstockupdt" value="N" />
							&nbsp;
							Stock Update :
						</td>
						<td>
							<select name="xstkposttype" style="width:50px;" value="<?php echo $VOU_STKPOSTTYPE; ?>" >
								<?php
								if($VOU_STKPOSTTYPE=='N')
								{
									?>
									<option value="N" selected="selected">N</option>
									<option value="+">+</option>
									<option value="-">-</option>
									<?php
								}
								else if($VOU_STKPOSTTYPE=='+')	
								{
									?>
									<option value="N">N</option>
									<option value="+" selected="selected">+</option>
									<option value="-">-</option>
									<?php
								}
								else if($VOU_STKPOSTTYPE=='-')	
								{
									?>
									<option value="N">N</option>
									<option value="+">+</option>
									<option value="-" selected="selected">-</option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
				</table>
				<table id="tbl2" align="center" cellpadding="10" >
					<tr>
						<td><input type="checkbox" name="chkshow" value="Y" <?php if($VOU_Show=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkshow" value="N" /> : Show</td>
						<td><input type="checkbox" name="chkautoapprv" value="Y" <?php if($VOU_Autoapprv=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkautoapprv" value="N" /> : Auto Approve</td>
						<td><input type="checkbox" name="chkothinfo" value="Y" <?php if($VOU_OTHINFOSHOW=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkothinfo" value="N" /> : Other Information Tab</td>
						<td><input type="checkbox" name="chkaddlev" value="Y" <?php if($VOU_ADDLEVSHOW=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkaddlev" value="N" /> : Additional Levies Tab</td>
						<td><input type="checkbox" name="chkaccinfo" value="Y" <?php if($VOU_ACCINFOSHOW=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkaccinfo" value="N" /> : Account Information Tab</td>
						<td><input type="checkbox" name="chkothexp" value="Y" <?php if($Vou_OthExp=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkothexp" value="N" /> : Other Expenses Tab</td>
						<td><input type="checkbox" name="chkqtninfo" value="Y" <?php if($VOU_QTNINFOSHOW=='Y'){echo 'checked';} ?>/><input type="hidden" name="chkqtninfo" value="N" /> : Qtn Info Tab</td>
					</tr>
				</table>
			
			
			<br/>
			
<!--Tab Srarts div-->	<div>
<!--Tab Menu Starts-->		<ul class="tabs" data-persist="false">
								<li><a href="#display">Display Level Setup</a></li>
								<li><a href="#fields">Fields Level Validation</a></li>
								<li><a href="#extra">Extra Expenses</a></li>
								<li><a href="#stock">Stock Paramenter</a></li>
								<li><a href="#update">Stock Update Paramenter</a></li>
								<li><a href="#remark">PO / QTN Remark</a></li>
<!--Tab Menu Ends-->		</ul>

<!--Tab Contents Starts-->	<div class="tabcontents">
	<!--1st Tab Starts-->		<div id="display" >
									<table id="tbl2" align="center" cellpadding="8" >
										<tr>
											<td>
												<input type="hidden" value="0" name="chkcashyn" />
												<input type="checkbox" value="1" name="chkcashyn" <?php if($chkcashyn=='1'){echo 'checked';} ?> /> : Cash Y/N
											</td>
											<td>
												<input type="hidden" value="0" name="chkvoutype" />
												<input type="checkbox" value="1" name="chkvoutype" <?php if($chkvoutype=='1'){echo 'checked';} ?> /> : Voucher Type
											</td>
											<td>
												<input type="hidden" value="0" name="chkparty1" />
												<input type="checkbox" value="1" name="chkparty1" <?php if($chkparty1=='1'){echo 'checked';} ?> /> : Party1
											</td>
											<td>
												<input type="hidden" value="0" name="chkconsignee" />
												<input type="checkbox" value="1" name="chkconsignee" <?php if($chkconsignee=='1'){echo 'checked';} ?> /> : Consignee
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkfromdept" />
												<input type="checkbox" value="1" name="chkfromdept" <?php if($chkfromdept=='1'){echo 'checked';} ?> /> : From Department
											</td>
											<td>
												<input type="hidden" value="0" name="chktodept" />
												<input type="checkbox" value="1" name="chktodept" <?php if($chktodept=='1'){echo 'checked';} ?> /> : To Department
											</td>
											<td>
												<input type="hidden" value="0" name="chkgrninfo" />
												<input type="checkbox" value="1" name="chkgrninfo" <?php if($chkgrninfo=='1'){echo 'checked';} ?> /> : GRN Information
											</td>
											<td>
												<input type="hidden" value="0" name="chkgateentryno" />
												<input type="checkbox" value="1" name="chkgateentryno" <?php if($chkgateentryno=='1'){echo 'checked';} ?> /> : Gate Entry No. (GRN Info)
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkgrnno" />
												<input type="checkbox" value="1" name="chkgrnno" <?php if($chkgrnno=='1'){echo 'checked';} ?> /> : GRN No. (GRN Info)
											</td>
											<td>
												<input type="hidden" value="0" name="chkdelivery" />
												<input type="checkbox" value="1" name="chkdelivery" <?php if($chkdelivery=='1'){echo 'checked';} ?> /> : Delivery Challan (GRN Info)
											</td>
											<td>
												<input type="hidden" value="0" name="chkpono" />
												<input type="checkbox" value="1" name="chkpono" <?php if($chkpono=='1'){echo 'checked';} ?> /> : PO No. (GRN Info)
											</td>
											<td>
												<input type="hidden" value="0" name="chkbillno" />
												<input type="checkbox" value="1" name="chkbillno" <?php if($chkbillno=='1'){echo 'checked';} ?> /> : Bill No. (GRN Info)
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chksalesman" />
												<input type="checkbox" value="1" name="chksalesman" <?php if($chksalesman=='1'){echo 'checked';} ?> /> : Salesman (GRN Info)
											</td>
											<td>
												<input type="hidden" value="0" name="chktransp" />
												<input type="checkbox" value="1" name="chktransp" <?php if($chktransp=='1'){echo 'checked';} ?> /> : Transporter Details
											</td>
											<td>
												<input type="hidden" value="0" name="chkdtexcise" />
												<input type="checkbox" value="1" name="chkdtexcise" <?php if($chkdtexcise=='1'){echo 'checked';} ?> /> : Date & Time for Excise Details
											</td>
											<td>
												<input type="hidden" value="0" name="chkpayment" />
												<input type="checkbox" value="1" name="chkpayment" <?php if($chkpayment=='1'){echo 'checked';} ?> /> : Payment Terms
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkscheduledt" />
												<input type="checkbox" value="1" name="chkscheduledt" <?php if($chkscheduledt=='1'){echo 'checked';} ?> /> : Schedule Day & Time
											</td>
											<td>
												<input type="hidden" value="0" name="chkbilltotal" />
												<input type="checkbox" value="1" name="chkbilltotal" <?php if($chkbilltotal=='1'){echo 'checked';} ?> /> : Bill Total
											</td>
											<td>
												<input type="hidden" value="0" name="chkenquirypan" />
												<input type="checkbox" value="1" name="chkenquirypan" <?php if($chkenquirypan=='1'){echo 'checked';} ?> /> : Enquiry Pannel
											</td>
											<td>
												<input type="hidden" value="0" name="chkquotationpan" />
												<input type="checkbox" value="1" name="chkquotationpan" <?php if($chkquotationpan=='1'){echo 'checked';} ?> /> : Quotation Pannel
											</td>
										</tr>
									</table>
	<!--1st Tab Ends-->			</div>
	
	<!--2nd Tab Starts-->		<div id="fields">
									<table id="tbl2" align="center" cellpadding="8" >
										<tr>
											<td>
												<input type="hidden" value="0" name="chkpartno" />
												<input type="checkbox" value="1" name="chkpartno" <?php if($chkpartno=='1'){echo 'checked';} ?> /> : Accept Partno
											</td>
											<td>
												<input type="hidden" value="0" name="chkchkstock" />
												<input type="checkbox" value="1" name="chkchkstock" <?php if($chkchkstock=='1'){echo 'checked';} ?> /> : Check Stock
											</td>
											<td>
												<input type="hidden" value="0" name="chkratemast" />
												<input type="checkbox" value="1" name="chkratemast" <?php if($chkratemast=='1'){echo 'checked';} ?> /> : Rate from Master
											</td>
										</tr>
									</table>
	<!--2nd Tab Ends-->			</div>
	
	<!--3rd Tab Starts-->		<div id="extra">
									
	<!--3rd Tab Ends-->			</div>
	
	<!--4th Tab Starts-->		<div id="stock">
									<table id="tbl2" align="center" cellpadding="8" >
										<tr>
											<td>
												<input type="hidden" value="0" name="chkexciseform" />
												<input type="checkbox" value="1" name="chkexciseform" <?php if($chkexciseform=='1'){echo 'checked';} ?> /> : Excise Format
											</td>
											<td>
												<input type="hidden" value="0" name="chktaxcode" />
												<input type="checkbox" value="1" name="chktaxcode" <?php if($chktaxcode=='1'){echo 'checked';} ?> /> : Accept Taxcode One Time
											</td>
											<td>
												<input type="hidden" value="0" name="chkbarcodeable" />
												<input type="checkbox" value="1" name="chkbarcodeable" <?php if($chkbarcodeable=='1'){echo 'checked';} ?> /> : Barcode Enable
											</td>
											<td>
												<input type="hidden" value="0" name="chkdocuform" />
												<input type="checkbox" value="1" name="chkdocuform" <?php if($chkdocuform=='1'){echo 'checked';} ?> /> : Excise & Non-Excise Document Format Same
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkdefaultcash" />
												<input type="checkbox" value="1" name="chkdefaultcash" <?php if($chkdefaultcash=='1'){echo 'checked';} ?> /> : Default Cash Yes
											</td>
											<td>
												<input type="hidden" value="0" name="chkcountbill" />
												<input type="checkbox" value="1" name="chkcountbill" <?php if($chkcountbill=='1'){echo 'checked';} ?> /> : Counter Billing
											</td>
											<td>
												<input type="hidden" value="0" name="chkinovicetype" />
												<input type="checkbox" value="1" name="chkinovicetype" <?php if($chkinovicetype=='1'){echo 'checked';} ?> /> : Ask Selection of Invoice Type
											</td>
											<td>
												<input type="hidden" value="0" name="chkbilladjust" />
												<input type="checkbox" value="1" name="chkbilladjust" <?php if($chkbilladjust=='1'){echo 'checked';} ?> /> : Bill Adjustment Tab
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkproductexcise" />
												<input type="checkbox" value="1" name="chkproductexcise" <?php if($chkproductexcise=='1'){echo 'checked';} ?> /> : Product Wise Excise
											</td>
											<td>
												<input type="hidden" value="0" name="chkautoqtybar" />
												<input type="checkbox" value="1" name="chkautoqtybar" <?php if($chkautoqtybar=='1'){echo 'checked';} ?> /> : Auto Qty 1 while Barcode
											</td>
											<td>
												<input type="hidden" value="0" name="chkzerorate" />
												<input type="checkbox" value="1" name="chkzerorate" <?php if($chkzerorate=='1'){echo 'checked';} ?> /> : Allow Zero Rate
											</td>
											<td>
												<input type="hidden" value="0" name="chkdatabefentry" />
												<input type="checkbox" value="1" name="chkdatabefentry" <?php if($chkdatabefentry=='1'){echo 'checked';} ?> /> : Ask Data before Entry
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chklotdetails" />
												<input type="checkbox" value="1" name="chklotdetails" <?php if($chklotdetails=='1'){echo 'checked';} ?> /> : Upadte Lot Details
											</td>
											<td>
												<input type="hidden" value="0" name="chktotalqty" />
												<input type="checkbox" value="1" name="chktotalqty" <?php if($chktotalqty=='1'){echo 'checked';} ?> /> : Total Qty
											</td>
											<td>
												<input type="hidden" value="0" name="chkmanualvocno" />
												<input type="checkbox" value="1" name="chkmanualvocno" <?php if($chkmanualvocno=='1'){echo 'checked';} ?> /> : Manual Voucher No.
											</td>
											<td>
												<input type="hidden" value="0" name="chkbackrefbtn" />
												<input type="checkbox" value="1" name="chkbackrefbtn" <?php if($chkbackrefbtn=='1'){echo 'checked';} ?> /> : Do not Show Back Ref Button
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkpartrate" />
												<input type="checkbox" value="1" name="chkpartrate" <?php if($chkpartrate=='1'){echo 'checked';} ?> /> : Party Wise Rate Applicable
											</td>
											<td>
												<input type="hidden" value="0" name="chkfitscreen" />
												<input type="checkbox" value="1" name="chkfitscreen" <?php if($chkfitscreen=='1'){echo 'checked';} ?> /> : Fit Screen
											</td>
											<td>
												<input type="hidden" value="0" name="chktag" />
												<input type="checkbox" value="1" name="chktag" <?php if($chktag=='1'){echo 'checked';} ?> /> : Tag
											</td>
											<td>
												<input type="hidden" value="0" name="chktempdocprint" />
												<input type="checkbox" value="1" name="chktempdocprint" <?php if($chktempdocprint=='1'){echo 'checked';} ?> /> : Use Temporary File while Documen Print
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkcreditlimit" />
												<input type="checkbox" value="1" name="chkcreditlimit" <?php if($chkcreditlimit=='1'){echo 'checked';} ?> /> : Check Credit Limit
											</td>
											<td>
												<input type="hidden" value="0" name="chklastrecord" />
												<input type="checkbox" value="1" name="chklastrecord" <?php if($chklastrecord=='1'){echo 'checked';} ?> /> : Last Record
											</td>
											<td>
												<input type="hidden" value="0" name="chkdirectprint" />
												<input type="checkbox" value="1" name="chkdirectprint" <?php if($chkdirectprint=='1'){echo 'checked';} ?> /> : Direct Print
											</td>
											<td>
												<input type="hidden" value="0" name="chkremovetimevoc" />
												<input type="checkbox" value="1" name="chkremovetimevoc" <?php if($chkremovetimevoc=='1'){echo 'checked';} ?> /> : Remove Time on Manual Voucher
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chkdeliverybtn" />
												<input type="checkbox" value="1" name="chkdeliverybtn" <?php if($chkdeliverybtn=='1'){echo 'checked';} ?> /> : Delivery Button
											</td>
											<td>
												<input type="hidden" value="0" name="chkimeqty" />
												<input type="checkbox" value="1" name="chkimeqty" <?php if($chkimeqty=='1'){echo 'checked';} ?> /> : Ask IME after Qty
											</td>
											<td>
												<input type="hidden" value="0" name="chkmfginvseperate" />
												<input type="checkbox" value="1" name="chkmfginvseperate" <?php if($chkmfginvseperate=='1'){echo 'checked';} ?> /> : Mfg / Trade Inv Seperate
											</td>
											<td>
												<input type="hidden" value="0" name="chkitemqry" />
												<input type="checkbox" value="1" name="chkitemqry" <?php if($chkitemqry=='1'){echo 'checked';} ?> /> : Do Not Show in Item Query
											</td>
										</tr>
										<tr>
											<td>
												<input type="hidden" value="0" name="chktraderexcinvo" />
												<input type="checkbox" value="1" name="chktraderexcinvo" <?php if($chktraderexcinvo=='1'){echo 'checked';} ?> /> : Traders Excise Invoice
											</td>
											<td>
												<input type="hidden" value="0" name="chkplotaddr" />
												<input type="checkbox" value="1" name="chkplotaddr" <?php if($chkplotaddr=='1'){echo 'checked';} ?> /> : Ask for Plot Address
											</td>
										</tr>
									</table>
	<!--4th Tab Ends-->			</div>
	
	<!--5th Tab Starts-->		<div id="update">
									<table id="tbl" align="center" cellpadding="8" >
										<tr>
											<td>Exclude Group while Updating Stock : </td><td><input type="text" name="xgrpupdstock" style="width:350px;" /></td>
										</tr>
										<tr>
											<td>Default Voucher Type : </td><td><input type="text" name="xdefaultvoutype" /></td>
										</tr>
									</table>
	<!--5th Tab Ends-->			</div>
	
	<!--6th Tab Starts-->		<div id="remark">
									<table id="tbl2" align="center" cellpadding="5" >
										<tr>
											<td>Payments Terms : </td><td><input type="text" name="xpaymentterm" /></td>
											<td>Delivery At : </td><td><input type="text" name="xdeliveryat" style="width:300px;" /></td>
										</tr>
										<tr>
											<td>Excise Duty : </td><td><input type="text" name="xexciseduty" /></td>
											<td>Delivery Date : </td><td><input type="text" name="xdeliverydt" style="width:300px;" /></td>
										</tr>
										<tr>
											<td>Taxation : </td><td><input type="text" name="xtaxation" /></td>
											<td>Validity : </td><td><input type="text" name="xvalidity" style="width:300px;" /></td>
										</tr>
										<tr>
											<td>Freight : </td><td><input type="text" name="xfreight" /></td>
											<td>Spc. Instr. : </td><td><input type="text" name="xspcinstr" style="width:300px;" /></td>
										</tr>
										<tr>
											<td>Insurance : </td><td><input type="text" name="xinsurance" /></td>
											<td>Others Charges : </td><td><input type="text" name="xothcharges" style="width:300px;" /></td>
										</tr>
									</table>
	<!--6th Tab Ends-->			</div>

	<!--Tab Contents Ends--></div>
	
							<div style="margin:8px;">
								<a href="editsubvoucher.php" class="button1" style="text-decoration:none">New</a>&nbsp;&nbsp;
								<a href="editsubvoucher.php?VOU_SRNO=<?=$VOU_SRNO?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;
								<a href="delsubvoucher.php?VOU_SRNO=<?=$VOU_SRNO?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>
							</div>
								
<!--Tab Ends div-->		</div>
			
			</center>
			</form>
			
			<div align="center" style="margin-left:30%; margin-right:30%;cursor:pointer; padding:5px; border:1px solid #000000; background-color:#CCCCCC;">
				<?php echo $pager->links; ?>
			</div>
			
		</div>
			
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