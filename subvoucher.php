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
'perPage'    => 20,   // Total rows to show per page
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
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			<br />
			<form method="post">
			<br>
				<a href="editsubvoucher.php" style="margin-left:10%; font-size:18px;">New Sub Voucher</a>
			<span style="float:right; margin-right:10%; font-size:18px;">
				Enter Name  : 
				<input type="text" id="t1" onKeyUp="searchelement('mt_head')" style="vertical-align:baseline;height:30px;">
				<input type="button" value="Search" onClick="searchelement('mt_head')" style="vertical-align:baseline;"/>
			</span>
			<br/><br/>
			<center>
			<div id="mydiv" style="width:85%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<thead>
						<tr bgcolor="grey" align="center" style="color:white;">
							<th width="10%;">ID</th>
							<th width="20%;">Base Voucher</th>
							<th width="20%;">Base Voucher</th>
							<th width="20%;">Base Voucher</th>
							<th width="20%;">Base Voucher</th>
							<th width="12%;">Option</th>
						</tr>
					</thead>
				</table>
			<div id="mydiv" style="overflow-y: scroll; height:65%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<?php
						//$mt_head = $_GET['mt_head'];
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
									<td width="10%;"><?=$VOU_SRNO?></td>
									<td width="50%;"><?=$descrip?></td>
									<td width="12%;">
										<a href="editsubvoucher.php?VOU_SRNO=<?=$VOU_SRNO?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;
										<a href="delsubvoucher.php?VOU_SRNO=<?=$VOU_SRNO?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>
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