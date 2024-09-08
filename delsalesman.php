<?php 
	include("dbconnect.php");
	if(isset($_GET['code']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from salesman where code=".$_GET['code']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("salesman.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("salesman.php"); </script>
			<?php
		}
	}
?>