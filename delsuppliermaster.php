<?php 
	include("dbconnect.php");
	if(isset($_GET['acid']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from acmst where acid=".$_GET['acid']);
		if($c==1)
		{
			?>
				<script>alert("Record Deleted Succssfully.....!"); location.replace("suppliermaster.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Deleted.....!"); location.replace("suppliermaster.php"); </script>
			<?php
		}
	}
?>