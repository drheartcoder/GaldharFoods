<?php 
	include 'session.php';
	
	if(isset($_POST['btnsav']))
	{
		extract($_POST);
		
		$ysrno = "";
		include("dbconnect.php");
		$a=mysql_query("select max(srno) as srno from voumast");
		while($db1=mysql_fetch_array($a))
		{
			extract($db1);
			$ysrno = $db1['srno'];
		}
        $xsrno = str_pad($ysrno+1,4,"0",STR_PAD_LEFT);   
		
		include("dbconnect.php");
		$a=mysql_query("insert into voumast(srno, descrip) values('$xsrno', '$xdescrip')");
		if($a==1)
		{
			?><script>alert("Record Inserted Succssfully.....!"); location.replace("basevoucher.php"); </script><?php
		}
		else
		{
			?><script>alert("Record Not Inserted.....!"); location.replace("basevoucher.php"); </script><?php
		}
	}
	else if(isset($_POST['btnupd']))
	{
		extract($_POST);
		include("dbconnect.php");
		$b=mysql_query("update voumast set srno='$xsrno', descrip='$xdescrip' where srno=".$_GET['srno']);
		if($b==1)
		{
			?><script>alert("Record Updated Succssfully.....!"); location.replace("basevoucher.php");</script><?php
		}
		else
		{
			?><script>alert("Record Not Updated.....!"); location.replace("basevoucher.php");</script><?php
		}
	}

	else if(isset($_POST['btnback']))
	{
		header('location: basevoucher.php');
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
			
			<form method="post" srno="form">
				
				<?php
					if(isset($_GET['srno']))
					{
						extract($_GET);
						include("dbconnect.php");
						$e=mysql_query("select * from voumast where srno=".$_GET['srno']);
						while($db1=mysql_fetch_array($e))
						{
							extract($db1);
						}
					}
				?>
				
				<br /><br /><br />
				
				<div style="margin-left:35%; margin-right:20%;">
					<span style="width:80%; font-size:17px;">
						<span class="text-lable" style="float:left; width:30%; line-height:40px;">
							Template ID : <br />
							Voucher Catagory : <br />
							Voucher Type : <br />
							Voucher Name : <br />
							Voucher Prefix : <br />
							A/C Post : <br />
							Voucher Master Table : <br />
							Voucher Transaction Table : <br />
						</span>
						<span style="float:right; width:70%;">
							<input type="text" disabled name="xsrno" value="<?php echo $srno; ?>" /><br />
							<input type="text" name="xvou_catg" value="<?php echo $vou_catg; ?>" /><br />
							<input type="text" name="xvou_type" value="<?php echo $vou_type; ?>" /><br />
							<input type="text" name="xvou_name" value="<?php echo $vou_name; ?>" /><br />
							<input type="text" name="xvou_prf" value="<?php echo $vou_prf; ?>" /><br />
							<select name="xacpost">
							<?php
								if($acpost=='Y')
								{
								?>
									<option value="Y" selected="selected">Y</option>
									<option value="N">N</option>
								<?php }
								else	
								{
								?>
									<option value="Y">Y</option>
									<option value="N" selected="selected">N</option>
									<?php
								}
								?>
							</select>
							<br />
							<input type="text" name="xvou_msttbl" value="<?php echo $vou_msttbl; ?>" /><br />
							<input type="text" name="xvou_trntbl" value="<?php echo $vou_trntbl; ?>" /><br />
						</span>
					</span>
				
					<?php
					if(isset($_GET['srno']))
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