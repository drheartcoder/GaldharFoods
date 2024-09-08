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
$result = mysql_query("SELECT * FROM subvoumast ORDER BY VOU_SRNO LIMIT $from , $perPage");
?>
<!--Pageing Ends-->

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			
			<form method="post">
			<br>
				
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
							<th width="8%">Code</th>
							<th width="48.5%">Description</th>
							<th width="19.5%">Report Name</th>
							<th width="12.5%">Option</th>
						</tr>
					</thead>
				</table>
			<div style="overflow-y: scroll; height:65%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<tbody>
					<?php
						while($row = mysql_fetch_array($result))
						{
							extract($row);
							$class="odd";
							if($a%2==0)
								$class="even";
							$a++;
							?>
								<tr align="center" class="<?php echo $class; ?>">
									<td width="8%"><?php   ?></td>
									<td width="50%"><?php  ?></td>
									<td width="20%"><?php  ?></td>
									<td width="12%">
										<a href="editreportsetup.php?VOU_SRNO=<?php echo $VOU_SRNO?>" class="button1" style="text-decoration:none">Edit</a>&nbsp;&nbsp;
										<a href="delreportsetup.php?VOU_SRNO=<?php echo $VOU_SRNO?>" class="button1" style="text-decoration:none" onClick="javascript: return confirm('Are you SURE you wish to Delete?');">Delete</a>
									</td>
								</tr>
							<?
						}
					?>
					</tbody>
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