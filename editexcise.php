<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$yid = "";
		include("dbconnect.php");
		$a=mysql_query("select max(id) as id from excise");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$yid = $db1['id'];
		}
        $xid = str_pad($yid+1,4,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into excise(id, descrip, ch_head, ed, exduty, edcess, shedcess) values('$xid', '$xdescrip', '$xch_head', '$xed', '$xexduty', '$xedcess', '$xshedcess')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("excise.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("excise.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update excise set id='$xid', descrip='$xdescrip', ch_head='$xch_head', ed='$xed', exduty='$xexduty', edcess='$xedcess', shedcess='$xshedcess' where id=".$_GET['id']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("excise.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("excise.php");</script>
			<?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: excise.php');
	}

 ?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
	</head>
	
	<body>
		<div class="info" style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			
			<form method="post" id="form">
				
				<?php
					if(isset($_GET['id']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from excise where id=".$_GET['id']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
						}
					}
				?>
				
				<br /><br /><br />
				
				<div style="margin-left:35%; margin-right:30%;">
					<span style="width:80%; font-size:17px;">
						<span class="text-lable" style="float:left; width:30%; line-height:40px;">
							ID : <br />
							Description : <br />
							CETH No. : <br />
							Excise Duty Applicable : <br />
							Excise Duty : <br />
							Edu. Cess : <br />
							SH Edu. Cess : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" readonly style="cursor:default;" name="xid" value="<?php echo $id; ?>" /><br />
							<input type="text" name="xdescrip" value="<?php echo $descrip; ?>" /><br />
							<input type="text" name="xch_head" value="<?php echo $ch_head; ?>" /><br />
							<input type="text" name="xed" value="<?php echo $ed; ?>" /><br />
							<input type="text" name="xexduty" value="<?php echo $exduty; ?>" /><br />
							<input type="text" name="xedcess" value="<?php echo $edcess; ?>" /><br />
							<input type="text" name="xshedcess" value="<?php echo $shedcess; ?>" /><br />
						</span>
					</span>
				
					<?php
					if(isset($_GET['id']))
					{
						?>
						<div align="left">
							<span style="font-size:17px;">
								<span style="margin:15%;">
									<input type="submit" value="Update" name="btnupd" />
								</span>
								<span>
									<input type="button" value="Print" onClick="window.print()" name="btnprint" />
								</span>
								<span style="margin:15%;">
									<input type="submit" value="Back" name="btnback" />
								</span>
							</span>
						</div>
						<?php
					}
					else 
					{
						?>	
							<div align="left">
								<span style="font-size:17px;">
									<span style="margin:10%;">
										<input type="submit" value="Save" name="btnsav" />
									</span>
									<span>
										<input type="reset" value="Clear" />
									</span>
									<span style="margin:10%;">
										<input type="submit" value="Back" name="btnback" />
									</span>
								</span>
							</div>
					<?php
					}
					?>
					</div>
			
			</form>
			
		</div>
	</body>
	
		
	<?php include 'footer.php'; ?>
	
</html>