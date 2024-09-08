<?php 
	include("dbconnect.php");
	if(isset($_GET['srno']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from voumast where srno=".$_GET['srno']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("basevoucher.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("basevoucher.php"); </script>
			<?php
		}
	}
?>