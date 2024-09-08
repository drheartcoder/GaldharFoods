<?php

session_start();

if($_SESSION['name'])
{
?>

<?php

	if(isset($_POST['btnsave']))
	{
		extract($_POST);
		include("dbconnect.php");
		$r="update subvoumast set VOU_TYPEDESC='$xsubvocnm', VOU_PRNPRFX='$xprnprfx', VOU_STARTNO='$xstartno', VOU_Back_color='$xback_color', VOU_Button_color='$xbutton_color' where VOU_SRNO=".$_GET['VOU_SRNO'];
		$a=mysql_query("$r");
		if($a==1)
		{
			?><script>alert("Record Updated Succssfully.....!"); location.replace("uservouchersetup.php"); </script><?php
		}
		else
		{
			?><script>alert("Record Not Inserted.....!"); location.replace("uservouchersetup.php");</script><?php
		}
	}
			
	else if(isset($_POST['btnback']))
	{
		header('location: uservouchersetup.php');
	}

?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		<script type="text/javascript" src="jscolor.js"></script>
		
		<style>
		input[type='text'] 
		{
			width:150px;
			height:30px;
			vertical-align:middle;
		}
		</style>
		
	</head>
	
	<body>
		<div style="height:745px;">
			<?php include 'toplogo.php'; ?>
			
			<?php include 'menu.php'; ?>
			
			<form method="post">
			<center>
			
			<?php
				if(isset($_GET['VOU_SRNO']))
				{
					extract($_GET);
					include("dbconnect.php");
					$e=mysql_query("select * from subvoumast where VOU_SRNO=".$_GET['VOU_SRNO']);
					while($db1=mysql_fetch_array($e))
					{
						extract($db1);
					}
				}
				?>
			
				<br>
				<table id="tbl" align="center" cellpadding="5" >
					<tr>
						<td>Voucher Sr.No. : </td><td><input type="text" name="xid" value="<?php echo $VOU_SRNO; ?>" /></td>
					</tr>
					<tr>
						<td>Voucher : </td><td><input type="text" name="xsubvocnm" value="<?php echo $VOU_TYPEDESC; ?>" style="width:240px;"/></td>
					</tr>
					<tr>
						<td>Prefix : </td><td><input type="text" name="xprnprfx" value="<?php echo $VOU_PRNPRFX; ?>" /></td>
					</tr>
					<tr>
						<td>Startup Form : </td><td><input type="text" name="xstartno" value="<?php echo $VOU_STARTNO; ?>" /></td>
					</tr>
					<tr>
						<td>Form Color : </td><td><input type="text" class="color" id="formcolor" name="xback_color" value="<?php echo $VOU_Back_color; ?>" style="width:80px;" /></td>
					</tr>
					<tr>
						<td>Button Color : </td><td><input type="text" class="color" id="btncolor" name="xbutton_color" value="<?php echo $VOU_Button_color; ?>" style="width:80px;" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<span style="margin-left:50px;"><input type="submit" name="btnsave" value="Save" /></span>
							<span style="margin-left:50px;"><input type="submit" name="btnback" value="Back" /></span>
						</td>
					</tr>
				</table>
			</center>
			</form>	
					
		</div>
	</body>
	
	<?php include 'footer.php'; ?>
	
</html>
<?php
}
else
{
	header('location: index.php');
}
?>