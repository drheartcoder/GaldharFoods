<?php 
	include("dbconnect.php");
	if(isset($_GET['code']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from godown where code=".$_GET['code']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("godown.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("godown.php"); </script>
			<?php
		}
	}
?>