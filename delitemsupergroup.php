<?php 
	include("dbconnect.php");
	if(isset($_GET['itmcd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from itmtype where itmcd=".$_GET['itmcd']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("itemsupergroup.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("itemsupergroup.php"); </script>
			<?php
		}
	}
?>