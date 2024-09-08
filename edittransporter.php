<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$yid = "";
		include("dbconnect.php");
		$a=mysql_query("select max(id) as id from transporter");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$yid = $db1['id'];
		}
        $xid = str_pad($yid+1,5,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into transporter(id, code, name, address, city, phone, fax, email, cperson) values('$xid', '$xcode', '$xname', '$xaddress', '$xcity', '$xphone', '$xfax', '$xemail', '$xcperson')");
		if($a==1)
		{
			?>
				<script>alert("Record Inserted Succssfully.....!"); location.replace("transporter.php"); </script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Inserted.....!"); location.replace("transporter.php"); </script>
			<?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update transporter set id='$xid', code='$xcode', name='$xname', address='$xaddress', city='$xcity', phone='$xphone', fax='$xfax', email='$xemail', cperson='$xcperson' where id=".$_GET['id']);
		if($b==1)
		{
			?>
				<script>alert("Record Updated Succssfully.....!"); location.replace("transporter.php");</script>
			<?php
		}
		else
		{
			?>
				<script>alert("Record Not Updated.....!"); location.replace("transporter.php");</script>
			<?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: transporter.php');
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
						$e=mysql_query("select * from transporter where id=".$_GET['id']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
						}
					} //margin-right:35%;
				?>
				
				<br /><br /><br />
				
				<div style="margin-left:38%; margin-right:35%;">
					<span style="width:80%; font-size:17px;">
						<span class="text-lable" style="float:left; width:30%; line-height:40px;">
							ID : <br />
							Code : <br />
							Name : <br />
							Address : <br /><br />
							City : <br />
							Phone : <br />
							Fax : <br />
							Email : <br />
							Contact Person : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" readonly style="cursor:default;" name="xid" value="<?php echo $id; ?>" /><br />
							<input type="text" name="xcode" value="<?php echo $code; ?>" /><br />
							<input type="text" name="xname" value="<?php echo $name; ?>" /><br />
							<textarea name="xaddress" style="width:220px; margin-bottom:10px; max-height:70px; max-width:220px; min-height:70px; max-width:220px"/><?php echo $address; ?></textarea><br />
							<input type="text" name="xcity" value="<?php echo $city; ?>" /><br />
							<input type="text" name="xphone" value="<?php echo $phone; ?>" /><br />
							<input type="text" name="xfax" value="<?php echo $fax; ?>" /><br />
							<input type="text" name="xemail" value="<?php echo $email; ?>" /><br />
							<input type="text" name="xcperson" value="<?php echo $cperson; ?>" /><br />
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