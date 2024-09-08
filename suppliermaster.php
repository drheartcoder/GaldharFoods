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
$result=mysql_query("SELECT count(*) AS total FROM acmst where accd LIKE 'SU%'");
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
$result = mysql_query("SELECT * FROM acmst where accd LIKE 'SU%' ORDER BY acid LIMIT $from , $perPage");
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
				<a href="editsuppliermaster.php" style="margin-left:10%; font-size:18px;">Add Supplier Master</a>
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
							<th width="5%;">A/C ID</th>
							<th width="10%;">AcCd</th>
							<th width="25%;">A/C_Head</th>
							<th width="25%;">Group Name</th>
							<th width="15%;">City</th>							
							<th width="10%;">Cust Cd</th>
							<th width="10%;">Option</th>
						</tr>
					</thead>
				</table>
				<div style="overflow-y: scroll; height:65%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<?php
//					if(isset($_GET['ac_head']))
//					{
						//$accd = $_GET['accd'];
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
									<td width="5%;"><?php echo $acid; ?></td>
									<td width="10%;"><?=$accd?></td>
									<td width="25%;"><?=$ac_head?></td>
									<td width="25%;"><?=$grpname?></td>
									<td width="15%;"><?=$city?></td>
									<td width="10%;"><?=$custcd?></td>
									<td width="10%;">
										<a href="editsuppliermaster.php?acid=<?=$acid?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;
										<a href="delsuppliermaster.php?acid=<?=$acid?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>
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