<?php 
	include("dbconnect.php");
	if(isset($_GET['catcd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from custcat where catcd=".$_GET['catcd']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("custcat.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("custcat.php"); </script>
			<?php
		}
	}
?>