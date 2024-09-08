<?php 
	include("dbconnect.php");
	if(isset($_GET['uomid']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from uom where uomid=".$_GET['uomid']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("uom.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("uom.php"); </script>
			<?php
		}
	}
?>