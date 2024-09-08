<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$ycode = "";
		include("dbconnect.php");
		$a=mysql_query("select max(catcd) as code from custcat");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$ycode = $db1['code'];
		}
        $xcode = str_pad($ycode+1,2,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into custcat(catcd, catdesc) values('$xcode', '$xcatdesc')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("custcat.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("custcat.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update custcat set catcd='$xcatcd', catdesc='$xcatdesc' where catcd=".$_GET['catcd']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("custcat.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("custcat.php");</script>
			<?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: custcat.php');
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
					if(isset($_GET['catcd']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from custcat where catcd=".$_GET['catcd']);
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
							Item Code : <br />
							Group : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" readonly style="cursor:default;" name="xcatcd" value="<?php echo $catcd; ?>" /><br />
							<input type="text" name="xcatdesc" value="<?php echo $catdesc; ?>" /><br />
						</span>
					</span>
				
					<?php
					if(isset($_GET['catcd']))
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