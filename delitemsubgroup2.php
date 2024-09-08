<?php 
	include("dbconnect.php");
	if(isset($_GET['gp1']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from itmgrp2 where gp1=".$_GET['gp1']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("itemsubgroup2.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("itemsubgroup2.php"); </script>
			<?php
		}
	}
?>