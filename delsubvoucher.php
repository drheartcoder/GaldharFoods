<?php 
	include("dbconnect.php");
	if(isset($_GET['VOU_SRNO']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from subvoumast where VOU_SRNO=".$_GET['VOU_SRNO']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("subvoucher.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("subvoucher.php"); </script>
			<?php
		}
	}
?>