<?php 
	include("dbconnect.php");
	if(isset($_GET['typecd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from custtype where typecd=".$_GET['typecd']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("custtype.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("custtype.php"); </script>
			<?php
		}
	}
?>