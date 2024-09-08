<?php 
	include("dbconnect.php");
	if(isset($_GET['locncd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from routemast where locncd=".$_GET['locncd']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("route.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("route.php"); </script>
			<?php
		}
	}
?>