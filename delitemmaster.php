<?php 
	include("dbconnect.php");
	if(isset($_GET['itemid']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from matmst where itemid=".$_GET['itemid']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("itemmaster.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("itemmaster.php"); </script>
			<?php
		}
	}
?>