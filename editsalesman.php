<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$ycode = "";
		include("dbconnect.php");
		$a=mysql_query("select max(code) as code from salesman");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$ycode = $db1['code'];
		}
        $xcode = str_pad($ycode+1,3,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into salesman(code, descrip, nickname) values('$xcode', '$xdescrip', '$xnickname')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("salesman.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("salesman.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update salesman set code='$xcode', descrip='$xdescrip', nickname='$xnickname' where code=".$_GET['code']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("salesman.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("salesman.php");</script>
			<?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: salesman.php');
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
					if(isset($_GET['code']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from salesman where code=".$_GET['code']);
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
							Code : <br />
							Name : <br />
							Nickname : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" readonly style="cursor:default;" name="xcode" value="<?php echo $code; ?>" /><br />
							<input type="text" name="xdescrip" value="<?php echo $descrip; ?>" /><br />
							<input type="text" name="xnickname" value="<?php echo $nickname; ?>" /><br />
						</span>
					</span>
				
					<?php
					if(isset($_GET['code']))
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