<?php 
	include("dbconnect.php");
	if(isset($_GET['id']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from shift where id=".$_GET['id']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("shift.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("shift.php"); </script>
			<?php
		}
	}
?>