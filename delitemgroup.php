<?php 
	include("dbconnect.php");
	if(isset($_GET['gp']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from itmgrp where gp=".$_GET['gp']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("itemgroup.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("itemgroup.php"); </script>
			<?php
		}
	}
?>