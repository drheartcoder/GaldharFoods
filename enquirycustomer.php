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
$result=mysql_query("SELECT count(*) AS total FROM eqcmast");
$row = mysql_fetch_array($result);
 
/* Total number of rows in the logs table */
$totalItems = $row['total'];
 
/* Set some options for the Pager */
$pager_options = array(
'mode'       => 'Sliding',   // Sliding or Jumping mode. See below.
'perPage'    => 30,   // Total rows to show per page
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
$result = mysql_query("SELECT * FROM eqcmast where MRNNO LIMIT $from , $perPage");
?>
<!--Pageing Ends-->

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		<script src="ajax.js"></script>
	</head>
	
	<body onLoad="searchelement('ac_head')">
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			<!--< ?php echo $totalItems; echo "<br>"; echo $from; echo "<br>"; echo $perPage; echo "<br>"; ?>-->
			<form method="post">
			<br>
				<a href="editenquirycustomer.php" style="margin-left:10%; font-size:18px;">Add Enquiry from Customer</a>
			<span style="float:right; margin-right:10%; font-size:18px;">
				Enter Name  : 
				<input type="text" id="t1" onKeyUp="searchelement('ac_head')" style="vertical-align:baseline;height:30px;">
				<input type="button" value="Search" onClick="searchelement('ac_head')" style="vertical-align:baseline;"/>
			</span>
			<br/><br/>
			<center>
			<div id="mydiv" style="width:85%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<thead>
						<tr bgcolor="grey" align="center" style="color:white;">
							<th width="4.5%;">Sr.No.</th>
							<th width="13.6%;">Date</th>
							<th width="27.5%;">Customer Name</th>
							<th width="13.6%;">Contact No.</th>
							<th width="14%;">Amount</th>
							<th width="14%;">Enq. No.</th>
							<th width="15%;">Option</th>
						</tr>
					</thead>
				</table>
				<div style="overflow-y: scroll; height:65%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<?php
						while($row = mysql_fetch_array($result))
						{
							extract($row);
							$class="odd";
							if($i%2==0)
								$class="even";
							$i++;
							?>
							<tbody>
								<tr align="center" class="<?php echo $class?>">
									<td width="5%;"><?php echo $ENQ_NO; ?></td>
									<td width="15%;"><?php echo $ENQ_DT; ?></td>
									<td width="30%;"><?php echo $AC_HEAD; ?></td>
									<td width="15%;"><?php echo $grpname; ?></td>
									<td width="15%;"><?php echo number_format($MAMOUNT,2); ?></td>
									<td width="15%;"><?php echo $ENQ_NO; ?></td>
									<td width="15%;">
										<a href="editenquirycustomer.php?MRNNO=<?php echo $MRNNO; ?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;<a href="delenquirycustomer.php?MRNNO=<?php echo $MRNNO; ?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>&nbsp;&nbsp;<a href="fpdf/printenquirycustomer.php?MRNNO=<?php echo $MRNNO; ?>" class="button1" style="text-decoration:none">Print</a>
									</td>
								</tr>
							</tbody>
							<?
						}
					?>
				</table>
				</div>
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<tfoot>
					<tr bgcolor="grey" align="center" style="color:white; cursor:default;">
						<td align="center"><?php echo $pager->links; ?></td>
					</tr>
					</tfoot>
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