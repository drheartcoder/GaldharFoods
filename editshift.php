<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$yid = "";
		include("dbconnect.php");
		$a=mysql_query("select max(id) as id from shift");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$yid = $db1['id'];
		}
        $xid = str_pad($yid+1,2,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into shift(id, descrip, start, end) values('$xid', '$xdescrip', '$xstart', '$xend')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("shift.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("shift.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update shift set id='$xid', descrip='$xdescrip', start='$xstart', end='$xend' where id=".$_GET['id']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("shift.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("shift.php");</script>
			<?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: shift.php');
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
						$e=mysql_query("select * from shift where id=".$_GET['id']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
						}
					}
				?>
				
				<br /><br /><br />
				
				<div style="margin-left:38%; margin-right:35%;">
					<span style="width:80%; font-size:17px;">
						<span class="text-lable" style="float:left; width:30%; line-height:40px;">
							ID : <br />
							Description : <br />
							Start Time : <br />
							End Time : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" readonly style="cursor:default;" name="xid" value="<?php echo $id; ?>" /><br />
							<input type="text" name="xdescrip" value="<?php echo $descrip; ?>" /><br />
							<input type="text" name="xstart" placeholder="HH:MM:SS" value="<?php echo $start; ?>" /><br />
							<input type="text" name="xend" placeholder="HH:MM:SS" value="<?php echo $end; ?>" /><br />
						</span>
					</span>
				
					<?php
					if(isset($_GET['id']))
					{
						?>
						<div align="left">
							<span style="font-size:17px;">
								<span style="margin:10%;">
									<input type="submit" value="Update" name="btnupd" />
								</span>
								<span>
									<input type="button" value="Print" onClick="window.print()" name="btnprint" />
								</span>
								<span style="margin:10%;">
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