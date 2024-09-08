<?php

session_start();

if($_SESSION['name'])
{
?>

<?php
	if(isset($_POST['btnsend']))
	{
		?>
		<script>
			opener.location.href = 'editenquirycustomer.php';
			close();
		</script>
		<?php
	}
	else if(isset($_POST['btnback']))
	{
		header('location: editenquirycustomer.php');
	}
?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
				
		<style>
		select
		{
			height:30px;
			margin-bottom:10px;
		}
		input[type='text'] 
		{
			height:30px;
			vertical-align:middle;
		}
		</style>

		
	</head>
	
	<body>
		
		<?php
			if(isset($_GET['code']))
			{
				extract($_GET);
				include("dbconnect.php");
				$e=mysql_query("select * from eqctrans where code=".$_GET['code']);
				while($db1=mysql_fetch_array($e))
				{
					extract($db1);
					$proddescrip = $MTCD;
				}
			}
		?>

			<form method="post" action="editenquirycustomer.php">
			<!--<form method="post" action="editenquirycustomer.php" onsubmit="submit(); window.close()">-->
			<center>
				<h3>Add Product</h3>
				<hr>
					<table cellpadding="2" align="center">
						<tr>
							<td>Sr. No. : </td><td><input type="text" readonly name="yprodsrno" style="cursor:default;" /></td>
						</tr>
						<tr>
							<td>Product Code : </td><td><input type="text" name="yprodcode" /></td>
						</tr>
						<tr>
							<td>Product Description : </td>
							<td>
								<select id="yproddesc" name="yproddesc" style="width:360px;">
								<?php
								include('dbconnect.php');
								$mq = mysql_query("SELECT * FROM matmst Order By mt_head") or die(mysql_error());
								while($mfa = mysql_fetch_array($mq))
								{
									if($proddescrip == $mfa["mtcd"])
									{
										echo "<option selected value='".$mfa["mtcd"]."'>".$mfa["mt_head"]."</option>";
									}
									else
									{
										echo "<option value='".$mfa["mtcd"]."'>".$mfa["mt_head"]."</option>";
									}
								}
								?>
									</select>&nbsp;
							</td>
						</tr>
						<tr>
							<td>Description : </td><td><input type="text" name="yproddescrip" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="yproddescrip1" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="yproddescrip2" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="yproddescrip3" /></td>
						</tr>
						<tr>
							<td>UOM : </td><td><input type="text" name="yproduom" /></td>
						</tr>
						<tr>
							<td>Qty : </td><td><input type="text" name="yprodqty" /></td>
						</tr>
						<tr>
							<td>Free Qty : </td><td><input type="text" name="yprodfreeqty" /></td>
						</tr>
						<tr>
							<td>Total Qty : </td><td><input type="text" name="yprodtotalqty" /></td>
						</tr>
						<tr>
							<td>MRP : </td><td><input type="text" name="yprodmrp" /></td>
						</tr>
						<tr>
							<td>Rate : </td><td><input type="text" name="yprodrate" /></td>
						</tr>
						<tr>
							<td>Value : </td><td><input type="text" name="yprodvalue" /></td>
						</tr>
						<tr>
							<td>Disc 1 : </td><td><input type="text" name="yproddisc1" /></td>
						</tr>
						<tr>
							<td>Disc 2 : </td><td><input type="text" name="yproddisc2" /></td>
						</tr>
						<tr>
							<td>Disc 3 : </td><td><input type="text" name="yproddisc3" /></td>
						</tr>
						<tr>
							<td>P and F : </td><td><input type="text" name="yprodpandf" /></td>
						</tr>
						<tr>
							<td>Excise : </td><td><input type="text" name="yprodexcise" /></td>
						</tr>
						<tr>
							<td>CESS : </td><td><input type="text" name="yprodcess" /></td>
						</tr>
						<tr>
							<td>H. CESS : </td><td><input type="text" name="yprodhcess" /></td>
						</tr>
						<tr>
							<td>Freight : </td><td><input type="text" name="yprodfreight" /></td>
						</tr>
						<tr>
							<td>Oth Exp : </td><td><input type="text" name="yprodothexp" /></td>
						</tr>
						<tr>
							<td>Tax Code</td><td><input type="text" name="yprodtaxcode" /></td>
						</tr>
						<tr>
							<td>Tax : </td><td><input type="text" name="yprodtax" /></td>
						</tr>
						<tr>
							<td>VAT : </td><td><input type="text" name="yprodvat" /></td>
						</tr>
						<tr>
							<td>Total : </td><td><input type="text" name="yprodtotal" /></td>
						</tr>
						<tr align="center">
							<td colspan="2">
								<?php
								if(isset($_GET['code']))
								{
									?>
									<input type="submit"  value="Update" name="btnupd" />
									<?php
								}
								else 
								{
									?>
									<input type="submit"  value="Save" name="btnsend" />
									<?php
								}
								?>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!--<input type="submit" name="btnback" value="Back" />-->
								<input type=button onClick="self.close();" value="Back">
							</td>
						</tr>
					</table>
				
			</center>
			</form>
			
		</div>
	</body>
	
</html>
<?php
}
else
{
	header('location: index.php');
}
?>